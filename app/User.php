<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany("App\Role","role_user");
    }

    /*public function rutbe($id)
    {
        //$this->belongsToMany("App\Role","role_user");
        $role_id = DB::table("role_user")->where("user_id",$id)->min('role_id');
        return dd(DB::table("role_user")
            ->join('roles','role_user.role_id','=','roles_id')
        );
    }*/
    public function yetki($id)
    {
       $role = DB::table("role_user")->where("user_id",$id)->min('role_id');
       //$role_id= DB::table("role_user")->where("role_id",$role)->min('id');
       return DB::table("roles")->where("id",$role)->min('name');
    }

    public function yetki_kontrol($yetki){
        foreach ($this->roles()->get() as $role){
            if($role->name == $yetki){
                return true;
                break;
            }
        }
        return false;
    }

}
