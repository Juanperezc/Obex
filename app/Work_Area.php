<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\WorkAreaTrait;
class Work_Area extends Model
{
    use SoftDeletes;
    use WorkAreaTrait;
    protected $dates = ['deleted_at'];
    protected $table = 'work_areas';
    protected $appends = ['section'];
    public function team()
    {
        return $this->hasOne('App\Team', 'work_area');
    }
}
