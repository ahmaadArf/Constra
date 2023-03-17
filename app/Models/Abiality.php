<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abiality extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function rolse()
    {
        return $this->belongsToMany(Role::class);
    }
}
