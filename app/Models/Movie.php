<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Movie extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id', 'title', 'popularity' ,'status' ,'vote_count' 
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


     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = false;


    public function getcategory()
    {

        return $this->hasOne('App\Models\CategoryMovies', 'movie_id');
    }

}
