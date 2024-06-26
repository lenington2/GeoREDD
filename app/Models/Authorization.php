<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authorization extends Model
{
    use HasFactory;
    protected $table = 'authorizations';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_id',
        'is_authorized',
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
