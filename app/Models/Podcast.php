<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Podcast extends Model
{
  use HasFactory;

  public function getImageAttribute()
  {
    return Storage::url("images/".$this->episode_image);
  }

  public function getUrlAttribute()
  {
    return Storage::url("audio/".$this->content_resource);
  }

  protected $appends = ['url', 'image'];
}
