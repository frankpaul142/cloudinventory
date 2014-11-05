<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "Debe aceptar los Términos y Condiciones.",
	"active_url"           => "Ingrese una URL válida.",
	"after"                => "Debe ser una fecha posterior a :date.",
	"alpha"                => "Debe contener solo texto.",
	"alpha_dash"           => "Debe contener solo texto, slash (/) o subguión (_).",
	"alpha_num"            => "Debe contener solo letras y números",
	"array"                => "Debe ser un arreglo.",
	"before"               => "Debe ser una fecha anterior a :date.",
	"between"              => array(
		"numeric" => "El valor debe estar entre :min y :max.",
		"file"    => "El archivo debe pesar entre :min y :max kilobytes.",
		"string"  => "Debe contener entre :min y :max caracteres.",
		"array"   => "Debe seleccionar entre :min y :max items.",
	),
	"confirmed"            => "Este campo debe coincidir con su campo confirmación.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "Debe contener :digits digitos.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "El valor debe ser un entero.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => "Valor mínimo es :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "El valor tiene que ser numérico.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "Campo obligatorio.",
	"required_if"          => "Campo obligatorio.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "Formato inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'name' => array(
			'required' => 'Por favor ingrese un nombre.',
			'unique' => 'El nombre ingresado ya existe.'
		),
		'email' => array(
			'required' => 'Por favor ingrese un e-mail.',
			'email' => 'Por favor ingrese un e-mail válido.',
			'unique' => 'El e-mail ingresado ya existe.'
		),
		'chk' => array(
			'required' => 'Debe seleccionar al menos una acción.',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
