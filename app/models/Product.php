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
            'code' => 'required|unique:products,code,' . $id,
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
            'minimum_stock' => 'required|integer|min:0',
        );
        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function suppliers(){
        return $this->belongsToMany('Supplier','supplier_products','products_id','suppliers_id');
    }
}