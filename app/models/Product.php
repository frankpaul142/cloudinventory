<?php

class Product extends Eloquent
{
    protected $table = 'products';
    protected $softDelete = true;

    public static function validate($post)
	{
        $id = $post['id'] ? $post['id'] : 0;
        //reglas de validacion
        $rules = array(
            'name' => 'required|unique:products,name,' . $id,
            'cost' => 'required|numeric',
            'minimum_stock' => 'required|integer',
        );
        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function suppliers(){
        return $this->belongsToMany('Supplier','supplier_products','products_id','suppliers_id');
    }
}