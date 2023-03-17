<?php

namespace App\Models;

use App\Models\Mnue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function mnues()
    {
        return $this->hasMany(Mnue::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
