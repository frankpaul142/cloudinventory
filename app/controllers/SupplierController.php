<?php
class SupplierController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
        $search = Input::get('search');

        if ( ! is_null($search)) {
            $suppliers = Supplier::withTrashed()
                ->where('name', 'like', '%'.$search.'%')
                ->orWhere('ruc', 'like', '%'.$search.'%')
                ->orderBy('name')
                ->paginate(15);
        } else {
            $suppliers = Supplier::withTrashed()
                ->orderBy('name')
                ->paginate(15);
        }

		$selectedSupplier = self::__checkExistence($id);
		if (! $selectedSupplier) {
    		$selectedSupplier = new Supplier;
    	}

        $allProducts = Product::orderBy('name')->get()->lists('name','id');
        
        $selectedSupplierProducts = $selectedSupplier->products()->orderBy('name')->get()->toArray();

        return View::make('suppliers.main')
            ->with('id', $id)
            ->with('allProducts', $allProducts)
            ->with('selectedSupplierProducts', array_fetch($selectedSupplierProducts,'id'))
        	->with('selectedSupplier', $selectedSupplier)
            ->with('search', $search)
        	->with('suppliers', $suppliers);
	}

	public function post()
	{
		$post = Input::all();
		$validator = Supplier::validate($post);
		$supplierId = $post['id'];

		if ($validator->fails()) {
            return Redirect::to('distribuidores/'.$supplierId)->withErrors($validator)->withInput();
        } else {
    		$supplier = self::__checkExistence($supplierId);
        	if (! $supplierId) {
        		$supplier = new Supplier;
        	}
            $supplier->name = $post['name'];
            $supplier->ruc = $post['ruc'];
            $supplier->address = $post['address'];
            $supplier->phone = $post['phone'];
            $supplier->email = $post['email'];
            $supplier->web = $post['web'];
            $supplier->contact = $post['contact'];
            $supplier->contact_phone = $post['contact_phone'];
    		$supplier->save();

        	if ($post['status']=='inactive') {
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
        $supplier = Supplier::withTrashed()->find($supplierId);
        
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
	* @return Supplier object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '') {
    		$supplier = Supplier::withTrashed()->find($id);
    		if (is_null($supplier)) {
    			return false;
    		}
			return $supplier;
    	}
		return false;
	}
}