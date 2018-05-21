<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "clients";
    public function projects()
    {
        return $this->hasMany('App\Project', 'client_id');
    }
}
