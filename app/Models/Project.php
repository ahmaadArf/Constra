<?php

namespace App\Models;

use App\Models\ProjectDetait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function detaits()
    {
        return $this->hasMany((ProjectDetait::class));
    }
}
