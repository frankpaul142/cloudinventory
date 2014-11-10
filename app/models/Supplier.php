<?php

class Supplier extends Eloquent
{
    protected $table = 'suppliers';
    protected $softDelete = true;

    public static function validate($post)
	{
        $id = $post['id'] ? $post['id'] : 0;
        //reglas de validacion
        $rules = array(
            'name' => 'required|unique:suppliers,name,' . $id,
            'ruc' => 'required|digits:13|unique:suppliers,ruc,' . $id,
            'phone' => 'integer',
            'web' => 'url',
            'email' => 'required|email',
            'contact' => 'required',
            'contact_phone' => 'required|integer',

        );
        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function products(){
        return $this->belongsToMany('Product','supplier_products','suppliers_id','products_id');
    }
}