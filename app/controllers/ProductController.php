<?php
class ProductController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
		$products = Product::withTrashed()->orderBy('name')->get();

		$selectedProduct = self::__checkExistence($id);
		if (! $selectedProduct) {
    		$selectedProduct = new Product;
    	}

        return View::make('products.main')
            ->with('id', $id)
        	->with('selectedProduct', $selectedProduct)
        	->with('products', $products);
	}

	public function post()
	{
		$post = Input::all();
		$validator = Product::validate($post);
		$productId = $post['id'];

		if ($validator->fails()) {
            return Redirect::to('productos/'.$productId)->withErrors($validator)->withInput();
        } else {
    		$product = self::__checkExistence($productId);
        	if (! $productId) {
        		$product = new Product;
        	}
        	$product->name = $post['name'];
        	$product->minimum_stock = $post['minimum_stock'];
        	$product->cost = str_replace(',', '.', $post['cost']);
    		$product->save();

        	if ($post['status']=='inactive') {
        		$product->delete();
        	} else {
        		if ($product->trashed()) {
        			$product->restore();
        		}
        	}

        	Session::flash('success', 'Producto guardado correctamente.');
        	return Redirect::to('productos');

        }
	}


	### PRIVATE FUNCTIONS ###
	/**
	* Checks if the parameter is a valid product id
	* @param $id int
	* @return Product object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '') {
    		$product = Product::withTrashed()->find($id);
    		if (is_null($product)) {
    			return false;
    		}
			return $product;
    	}
		return false;
	}
}