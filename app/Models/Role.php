<?php

namespace App\Models;

use App\Models\Abiality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function abialities()
    {
        return $this->belongsToMany(Abiality::class);
    }
}
