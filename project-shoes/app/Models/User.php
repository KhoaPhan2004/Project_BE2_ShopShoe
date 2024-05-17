<?php

namespace App\Models;
use App\Models\Role;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'image_url',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasPermission($route){
        $routes = $this->routes();
        
        return in_array($route,$routes) ? true:false;
    }
    public function routes(){
        $data =[];
        foreach($this->getRoles as $role){
            $permission = json_decode($role->permissions);
            foreach($permission as $per){
                if (!in_array($per,$data)) {
                    array_push($data,$per);
                }
                
            }
           
           
        }
        
        return $data;
    }
    public function getRoles(){
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }
}
