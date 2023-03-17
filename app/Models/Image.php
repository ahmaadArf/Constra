<?php

namespace App\Models;

use App\Models\ProjectDetait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function detail()
    {
        return $this->belongsTo(ProjectDetait::class);
    }
}
