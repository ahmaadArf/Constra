<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectDetait extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);

    }


}
