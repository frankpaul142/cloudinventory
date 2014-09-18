<?php
class AdjustmentController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
		$adjustments = Adjustment::latest()->get();

		$selectedAdjustment = self::__checkExistence($id);
		if (! $selectedAdjustment) {
    		$selectedAdjustment = new Adjustment;
    	}

        $products = Product::all()->lists('name', 'id');

        return View::make('adjustments.main')
            ->with('id', $id)
            ->with('products', $products)
        	->with('selectedAdjustment', $selectedAdjustment)
        	->with('adjustments', $adjustments);
	}

	public function post()
	{
		$post = Input::all();
		$validator = Adjustment::validate($post);
		$adjustmentId = $post['id'];

		if ($validator->fails()) {
            return Redirect::to('ajustes/'.$adjustmentId)->withErrors($validator)->withInput();
        } else {
    		$adjustment = self::__checkExistence($adjustmentId);
        	if (! $adjustmentId) {
                DB::beginTransaction();
            		$adjustment = new Adjustment;
                    $adjustment->products_id = $post['products_id'];
                    $adjustment->users_id = Auth::user()->id;
                    $adjustment->type = $post['type'];
                    $adjustment->amount = $post['amount'];
                    $adjustment->reason = $post['reason'];
                    $adjustment->save();

                    $product = Product::find($post['products_id']);
                    
                    if ($post['type'] == 'credit') {
                        $product->stock = $product->stock + $post['amount'];
                        $product->save();
                    } else {
                        if ($product->stock >= $post['amount']) {
                            $product->stock = $product->stock - $post['amount'];
                            $product->save();
                            Globals::triggerAlerts(1, array('productId'=>$product->id));
                            Globals::triggerAlerts(2, array('productId'=>$product->id));
                        }else{
                            Session::flash('error', 'No se puede debitar más de lo que hay en stock.');
                            DB::rollback();
                            return Redirect::to('ajustes');
                        }
                    }
                    Session::flash('success', 'Ajuste realizado exitosamente.');
                DB::commit();
            }

        	return Redirect::to('ajustes');
        }
	}


	### PRIVATE FUNCTIONS ###
	/**
	* Checks if the parameter is a valid adjustment id
	* @param $id int
	* @return Adjustment object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '') {
    		$adjustment = Adjustment::find($id);
    		if (is_null($adjustment)) {
    			return false;
    		}
			return $adjustment;
    	}
		return false;
	}
}