<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CategoryMovies extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies_categories';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id', 'category_id',
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
    public $timestamps = false;
}
