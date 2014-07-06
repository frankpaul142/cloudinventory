<?php

class Supplier extends Eloquent
{
	static $person_types = array('natural' => 'Natural', 'legal' => 'Legal');
	static $types = array('national' => 'Nacional','foreign' => 'Extranjero');
    
    public static function validateForm($input)
	{
        $id = $input['id'] ? $input['id'] : 0;
        //reglas de validacion
        $rules = array(
            'comercial_name' => 'required|unique:suppliers,comercial_name,' . $id,
            'legal_name' => 'required',
            'document' => 'required',
            'phone_1' => 'required | numeric',
            'phone_2' => 'numeric',            
            'email' => 'required | email',
            'web' => 'url',
        );
        $validator = Validator::make($input, $rules);
        
    	return $validator;
	}
    public function city()
    {
        return $this->belongsTo('City','cities_id');
    }
    public function saveInfo($input)
    {
        $this->comercial_name 	= $input['comercial_name'];
        $this->legal_name 	= $input['legal_name'];
        $this->cities_id 	= $input['cities_id'];
        $this->document 	= $input['document'];
        $this->phone_1 	= $input['phone_1'];
        $this->phone_2 	= $input['phone_2'];
        $this->email 	= $input['email'];
        $this->web 	= $input['web'];
        $this->person_type 	= $input['person_type'];
        $this->type 	= $input['type'];
        $this->work_days 	= $input['work_days'];
        $this->work_hours 	= $input['work_hours'];
        $this->approved_by 	= $input['approved_by'];
        
        if ($this->save()) {
			return true;
		} else {
			return false;
		}
    }
}