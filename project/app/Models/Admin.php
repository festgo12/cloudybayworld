<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'phone', 'password', 'role_id', 'photo', 'created_at', 'updated_at', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
    	return $this->belongsTo('App\Models\Role')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }
   
    public function IsSuper(){
        if ($this->id == 1) {
           return true;
        }
        return false;
    }

    public function sectionCheck($value){
        $sections = explode(" , ", $this->role->section);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }
    


}
