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

        return View::make('supplierOrders.main')
            ->with('id', $id)
        	->with('selectedSupplierOrder', $selectedSupplierOrder)
        	->with('supplierOrders', $supplierOrders);
	}

	public function post()
	{
		$post = Input::all();
		$validator = SupplierOrder::validate($post);
		$supplierId = $post['id'];

		if ($validator->fails()) {
            return Redirect::to('distribuidores/'.$supplierId)->withErrors($validator)->withInput();
        } else {
    		$supplier = self::__checkExistence($supplierId);
        	if (! $supplierId) {
        		$supplier = new SupplierOrder;
        	}
        	$supplier->name = $post['name'];
        	$supplier->minimum_stock = $post['minimum_stock'];
        	$supplier->cost = $post['cost'];
    		$supplier->save();

        	if ($post['status']='inactive') {
        		$supplier->delete();
        	} else {
        		if ($supplier->trashed()) {
        			$supplier->restore();
        		}
        	}

        	Session::flash('success', 'Distribuidor guardado correctamente.');
        	return Redirect::to('distribuidores');

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