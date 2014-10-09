<?php
class SupplierOrderController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
		$supplierOrders = SupplierOrder::where('status','generated')->get();

		$selectedSupplierOrder = self::__checkExistence($id);
		if (! $selectedSupplierOrder) {
    		$selectedSupplierOrder = new SupplierOrder;
    	}

        $products = $selectedSupplierOrder->products->toArray();
        $suppliers = Supplier::orderBy('name')->get()->lists('name','id');

        return View::make('supplierOrders.main')
            ->with('id', $id)
            ->with('selectedSupplierOrder', $selectedSupplierOrder)
            ->with('products', $products)
        	->with('suppliers', $suppliers)
        	->with('supplierOrders', $supplierOrders);
	}

	public function post()
	{
		$post = Input::all();
        if ($post['products'] == '[]') {
            $post['products'] = '';
        }

        $validator = SupplierOrder::validate($post);

        if ($validator->fails()) {
            return Redirect::to('pedidos/'.$post['id'])->withErrors($validator)->withInput();
        } else {
            try {
                DB::transaction(function() use ($post){
                    $supplierOrder = self::__checkExistence($post['id']);
                    if (! $supplierOrder) {
                        $supplierOrder = new SupplierOrder;
                        $supplierOrder->suppliers_id = $post['suppliers_id'];
                        $supplierOrder->users_id = Auth::user()->id;
                        $supplierOrder->save();

                        $products = json_decode($post['products']);
                        $toSync = array();

                        foreach($products as $current) {
                            $product = Product::find($current->id);
                            if ( ! is_null($product)) {
                                $toSync[$current->id]['cost'] = $product->cost;
                                $toSync[$current->id]['amount'] = $current->amount;
                            }
                        }

                        $supplierOrder->products()->sync($toSync);
                    } else {
                        if (isset($post['received']) AND $post['received'] == 1) {
                            $supplierOrder->status = 'received';
                            $supplierOrder->save();

                            foreach ($supplierOrder->products as $pivotProduct) {
                                $array = $pivotProduct->toArray();
                                $product = Product::find($array['id']);
                                if ( ! is_null($product)) {
                                    $product->stock = $product->stock + $array['pivot']['amount'];
                                    $product->save();
                                }
                            }
                        } elseif (isset($post['received']) AND $post['received'] == 2) {
                            $supplierOrder->status = 'canceled';
                            $supplierOrder->save();                            
                        } else {
                            Session::flash('error', 'Error en la recepción de su pedido, por favor vuelva a intentarlo.');
                        }
                    }
                });
                Session::flash('success', 'Pedido procesado exitosamente.');
            } catch (Exception $e) {
                Session::flash('error', 'Ocurrió un error inesperado, por favor vuelva a intentarlo.');
            }
            return Redirect::to('pedidos'); 
        }
	}

    public function postProductos()
    {
        $post = Input::all();
        $supplierId = $post['supplierId'];
        $supplier = SupplierOrder::find($supplierId);
        if ($post['action'] == 'select') {
            $supplier->products()->attach($post['items'][0]);
        } else {
            $supplier->products()->detach($post['items'][0]);
        }
        return Response::json(true);
    }


	### PRIVATE FUNCTIONS ###
	/**
	* Checks if the parameter is a valid supplier id
	* @param $id int
	* @return SupplierOrder object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '') {
    		$supplier = SupplierOrder::find($id);
    		if (is_null($supplier)) {
    			return false;
    		}
			return $supplier;
    	}
		return false;
	}
}