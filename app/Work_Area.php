<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Work_Area extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'work_areas';
    public function team()
    {
        return $this->hasOne('App\Team', 'work_area');
    }
}
