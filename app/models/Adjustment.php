<?php

class Adjustment extends Eloquent
{
    protected $table = 'adjustments';
    public static $types = array('credit'=>'Crédito', 'debit'=>'Débito');

    public static function validate($post)
	{
        $id = $post['id'] ? $post['id'] : 0;
        //reglas de validacion
        $rules = array(
            'products_id' => 'required',
            'reason' => 'required',
            'amount' => 'required|integer',
        );

        $validator = Validator::make($post, $rules);
        
    	return $validator;
	}

    public function product(){
        return $this->belongsTo('Product','products_id');
    }
}