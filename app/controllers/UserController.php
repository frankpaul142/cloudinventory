<?php
class UserController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
		$users = User::withTrashed()
            ->where('id', '!=', 1)
            ->orderBy('last_name')
            ->get();

		$selectedUser = self::__checkExistence($id);
		if (! $selectedUser) {
    		$selectedUser = new User;
    	}

    	$profiles = array('' => ' - Seleccione - ') + User::$profiles;

        return View::make('users.main')
            ->with('id', $id)
        	->with('selectedUser', $selectedUser)
        	->with('profiles', $profiles)
        	->with('users', $users);
	}

	public function post()
	{
		$post = Input::all();
		$validator = User::validate($post);
		$userId = $post['id'];

		if ($validator->fails()) {
            return Redirect::to('usuarios/'.$userId)->withErrors($validator)->withInput();
        } else {
    		$user = self::__checkExistence($userId);
        	if (! $userId) {
        		$user = new User;
        	}
        	$user->name = $post['name'];
        	$user->last_name = $post['last_name'];
        	$user->display_name = $post['display_name'];
        	$user->profile_type = $post['profile_type'];
        	$user->email = $post['email'];
        	$user->mobile = $post['mobile'];

        	$sendMail = false;

        	if (! $user->id) { //new user
    			$passwordText = str_random(8);
    			$passwordHashed = Hash::make($passwordText);
    			$sendMail = true;
    			$user->password = $passwordHashed;
                $user->is_approved = true;
    		}

    		//save user data
        		$user->save();

        	if ($post['status']=='inactive') {
        		$user->delete();
        	} else {
        		if ($user->trashed()) {
        			$user->restore();
        		}
        	}

        	if ($sendMail) {
				$mailView = 'emails.newPassword';
				$subject = 'Bienvenido a CloudInventory';

        		Mail::send(
        			$mailView,
        			array(
        				'user' => $user->email,
        				'password' => $passwordText,
    				),
        			function($message) use ($user, $subject){
				    	$message->to($user->email, $user->display_name)->subject($subject);
					}
				);
        	}

        	Session::flash('success', 'Usuario guardado correctamente.');
            Session::flash('warning', 'Su contraseña fue enviada a su correo electrónico.');
        	return Redirect::to('usuarios');

        }
	}


	### PRIVATE FUNCTIONS ###
	/**
	* Checks if the parameter is a valid user id
	* @param $id int
	* @return User object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '' && $id != 1) {
    		$user = User::withTrashed()->find($id);
    		if (is_null($user)) {
    			return false;
    		}
			return $user;
    	}
		return false;
	}
}