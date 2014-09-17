<?php

class Supplier extends Eloquent
{
    protected $table = 'supplier_orders';

    public static function validate($post)
	{
        $id = $post['id'] ? $post['id'] : 0;
        //reglas de validacion
        $rules = array(
            'name' => 'required|unique:products,name,' . $id,
            'ruc' => 'required',
            'cost' => 'required',
            'minimum_stock' => 'required',
        );
        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function products(){
        return $this->hasMany('Product');
    }
    public function supplier(){
        return $this->belongsTo('Supplier');
    }
}