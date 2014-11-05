<?php
class AlertController extends BaseController
{
	### SHOW ALL ###
	public function get($id = null)
	{
        if(Auth::user()->profile_type == 'admin') {
            $users = User::all();
        } else {
            $users = User::where('id',Auth::user()->id)->get();
        }

		$selectedUser = self::__checkExistence($id);
		if (! $selectedUser) {
    		$selectedUser = new User;
    	}

        $alerts = Alert::all();

        $selectedUserAlerts = array();

        if ($selectedUser->id) {
            $pivotData = $selectedUser->alerts;
            foreach ($pivotData as $current) {
                $selectedUserAlerts[$current->pivot->alerts_id]['fb'] = $current->pivot->to_facebook;
                $selectedUserAlerts[$current->pivot->alerts_id]['mail'] = $current->pivot->to_email;
                $selectedUserAlerts[$current->pivot->alerts_id]['sms'] = $current->pivot->to_sms;
            }
        }

        return View::make('alerts.main')
            ->with('usersId', $id)
            ->with('selectedUserAlerts', $selectedUserAlerts)
            ->with('selectedUser', $selectedUser)
            ->with('users', $users)
            ->with('alerts', $alerts);
	}

	public function post()
	{
		$post = Input::all();

        $user = self::__checkExistence($post['users_id']);
        if (! $user) {
            Session::flash('error', 'Usuario incorrecto. Vuelva a intentarlo.');
            return Redirect::to('alertas');
        }

        $alerts = $post['alerts'];
        $toSync = array();

        foreach($alerts as $key => $current) {
            $toSync[$key]['to_facebook'] = in_array('fb', $current) ? true : false;
            $toSync[$key]['to_sms'] = in_array('sms', $current) ? true : false;
            $toSync[$key]['to_email'] = in_array('mail', $current) ? true : false;
        }

        $user->alerts()->sync($toSync);

        Session::flash('success', 'Alertas generadas exitosamente.');
        return Redirect::to('alertas');
	}

	### PRIVATE FUNCTIONS ###
	/**
	* Checks if the parameter is a valid supplier id
	* @param $id int
	* @return User object if $id is found, otherwise false
	*/
	private function __checkExistence($id){
		if (! is_null($id) && $id != '') {
    		$supplier = User::find($id);
    		if (is_null($supplier)) {
    			return false;
    		}
			return $supplier;
    	}
		return false;
	}
}