<?php

class Alert extends Eloquent
{
    protected $table = 'alerts';

    public function users(){
        return $this->belongsToMany('User','alerts_to','alerts_id','users_id')->withPivot('to_facebook', 'to_email', 'to_sms')->withTimestamps();
    }
}