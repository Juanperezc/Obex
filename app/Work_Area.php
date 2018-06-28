<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\WorkAreaTrait;
class Work_Area extends Model
{
    use SoftDeletes;
    use WorkAreaTrait;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y'
    ];
    protected $dates = ['deleted_at'];
    protected $table = 'work_areas';
    protected $appends = ['section'];
    public function team()
    {
        return $this->hasMany('App\Team');
    }
}
