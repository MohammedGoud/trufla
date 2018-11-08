<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name',
    ];


     /**
     * Primmary Key
     *
    
     */
    protected $primaryKey = 'id';
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
