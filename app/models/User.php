<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
	protected $table = 'users';
    protected $softDelete = true;

    public static $profiles = array('general' => 'Cliente', 'admin' => 'Administrador');

	public static function validate($post)
	{
		$id = $post['id'] ? $post['id'] : 0;
        $rules = array(
            'name' => 'required',
            'last_name' => 'required',
            'display_name' => 'required',
            'profile_type' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required',
    	);

    	$validator = Validator::make($post, $rules);

    	return $validator;
	}

    public static function validateLogin($post)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make($post, $rules);

        return $validator;
    }

    public static function validateChangePassword($post)
    {
        $rules = array(
            'current_pass' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        );

        $validator = Validator::make($post, $rules);

        return $validator;
    }

    public function alerts(){
        return $this->belongsToMany('Alert','alerts_to','users_id','alerts_id')->withPivot('to_facebook', 'to_email', 'to_sms')->withTimestamps();
    }

    ### REQUIRED FOR AUTH. DO NOT TOUCH ###
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}