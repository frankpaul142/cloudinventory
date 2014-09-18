<?php

class SupplierOrder extends Eloquent
{
    protected $table = 'supplier_orders';

    public static function validate($post)
	{
        $id = $post['id'] ? $post['id'] : 0;
        $rules = array(
            'suppliers_id' => 'required',
            'products' => 'required'
        );
        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function products(){
        return $this->belongsToMany('Product','order_details','suppliers_id','products_id')->withPivot('amount', 'cost');
    }
    public function supplier(){
        return $this->belongsTo('Supplier', 'suppliers_id');
    }
}