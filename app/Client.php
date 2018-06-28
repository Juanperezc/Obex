<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ClientTrait;
class Client extends Model
{
    //
    use SoftDeletes;
    use ClientTrait;
    protected $appends = ['section'];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y'
    ];
    protected $dates = ['deleted_at'];
    protected $table = "clients";
    public function projects()
    {
        return $this->hasMany('App\Project', 'client_id');
    }
}
