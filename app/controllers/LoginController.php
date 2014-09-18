<?php
class LoginController extends BaseController
{
	public function getIndex()
	{
		if (Auth::check()){
			Auth::logout();
			return Redirect::to('login');
		}
        return View::make('login.login');
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
}