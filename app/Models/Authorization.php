<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authorization extends Model
{
    use HasFactory;
    protected $table = 'authorization';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'idproject',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function projects(){
        return $this->hasMany('App\Models\Project','idproject','idproject');
    }
    public function users(){
        return $this->hasMany('App\Models\User','id','iduser');
    }
}
