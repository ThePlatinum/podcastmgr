<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class FeedController extends Controller
{

  public function __invoke()
  {
    $podcasts = Podcast::all();
    $content = view('podcastrss', compact('podcasts'));
    return response($content, 200)->header('Content-Type', 'text/xml');
  }
}
