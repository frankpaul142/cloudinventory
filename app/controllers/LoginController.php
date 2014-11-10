<?php
class LoginController extends BaseController
{
	public function getIndex()
	{
		if (Auth::check()){
			Auth::logout();
			return Redirect::to('login');
		}		$FacebookRedirectLoginHelper = Facebook::connect();		 $loginUrl = $FacebookRedirectLoginHelper->getLoginUrl(array('email'));
        return View::make('login.login')->with('loginurl',$loginUrl);
	}

	public function postIndex()
	{
		$post = Input::all();
		$validator = User::validateLogin($post);

		if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator)->withInput();
        } else {
        	if (Auth::attempt(array('email' => $post['username'], 'password' => $post['password']))) {
        		if (Auth::user()->is_approved == false) {
        			Auth::logout();
        			Session::flash('message', 'Su usuario aún no ha sido aprovado.');
					return Redirect::to('login');
        		}
        		if (Auth::user()->password_changed == false) {
        			return Redirect::to('cambiarContrasena');
        		} 
			    return Redirect::intended('/');
			} else {
				Session::flash('message', 'Datos de inicio de sesión incorrectos.');
				return Redirect::to('login');
			}
        }
	}

	public function getFacebook()
	{
		$session = Facebook::process()->getLongLivedSession();
		// Access Token
		$accessToken = $session->getToken();
		// User info
		$userfb = Facebook::api($session, 'GET', '/me');
		//die($userfb->getProperty('id'));
		$user = self::__checkExistenceFb($userfb->getProperty('id'));

		if($user){
		if($user->is_approved){
				Auth::login($user);
				return Redirect::to('/');

		}else{
			Session::flash('message', 'Su usuario aún no ha sido aprovado.');
			return Redirect::to('login');
		}
	}else{
			
			$user = new User;
			$user->facebook_id  =	$userfb->getProperty('id');
			
			$user->name = $userfb->getProperty('name');

        	$user->last_name = $userfb->getProperty('last_name');

        	$user->display_name = $userfb->getProperty('name')." ".$userfb->getProperty('last_name');

        	$user->profile_type = "general";

        	$user->email = $userfb->getProperty('email');

        	$user->mobile = "0999999999";
        	$sendMail = false;

        	if (! $user->id) { //new user

    			$passwordText = str_random(8);

    			$passwordHashed = Hash::make($passwordText);

    			$sendMail = true;

    			$user->password = $passwordHashed;

                $user->is_approved = false;

    		}
    			$user->save();
    			Auth::logout();
    			Session::flash('message', 'Su usuario debe ser aprobado por el administrador.');
    			return Redirect::to('login');

	}
	}

	public function getChangePassword()
	{
        return View::make('login.changePassword');
	}

	public function postChangePassword()
	{
		$post = Input::all();
		$validator = User::validateChangePassword($post);

		if ($validator->fails()) {
            return Redirect::to('cambiarContrasena')->withErrors($validator)->withInput();
        } else {
        	if ( ! Hash::check($post['current_pass'], Auth::user()->password)) {
        		Session::flash('error','La contraseña actual es incorrecta');
        		return Redirect::to('cambiarContrasena');
        	} else {
        		$user = Auth::user();
        		$user->password = Hash::make($post['password']);
        		$user->password_changed = true;
        		$user->save();
        		return Redirect::to('/');
        	}
        }
	}
		private function __checkExistenceFb($id){

		if (! is_null($id) && $id != '') {

    		$user = User::where('facebook_id',$id)->first();

    		if (is_null($user)) {
    		
    			return false;

    		}
    		return $user;

    	}

		return false;

	}


}