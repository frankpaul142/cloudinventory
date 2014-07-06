<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('reminders.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$post = Input::all();
		$rules = array(
            'email' => 'required|email'
        );

        $validator = Validator::make($post, $rules);

        if ($validator->fails()) {
        	return Redirect::to('recordar')->withErrors($validator)->withInput();
        } else {
        	switch ($response = Password::remind(Input::only('email'), function($message){ $message->subject('Nueva Contraseña'); })) {
				case Password::INVALID_USER:
					return Redirect::back()->with('error', Lang::get($response));

				case Password::REMINDER_SENT:
					return Redirect::back()->with('success', Lang::get($response));
			}
        }
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('reminders.form')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$post = Input::all();
		$rules = array(
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required'
        );

        $validator = Validator::make($post, $rules);

        if ($validator->fails()) {
        	return Redirect::to('recordar/form/'.$post['token'])->withErrors($validator)->withInput();
        } else {
        	$credentials = Input::only(
				'email', 'password', 'password_confirmation', 'token'
			);

			$response = Password::reset($credentials, function($user, $password)
			{
				$user->password = Hash::make($password);
				$user->password_changed = true;
				$user->save();
			});

			switch ($response)
			{
				case Password::INVALID_PASSWORD:
				case Password::INVALID_TOKEN:
				case Password::INVALID_USER:
					return Redirect::back()->with('error', Lang::get($response));

				case Password::PASSWORD_RESET:
					Session::flash('success', 'Su contraseña ha sido cambiada exitósamente.');
					return Redirect::to('login');
			}
        }
	}

}
