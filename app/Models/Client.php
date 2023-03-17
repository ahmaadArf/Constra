<?php

namespace App\Models;

use App\Models\ProjectDetait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
    public function detait()
    {
        return $this->hasOne(ProjectDetait::class);
    }
}
