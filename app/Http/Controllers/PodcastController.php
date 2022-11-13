<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PodcastController extends Controller
{
  public function index($episode)
  {
    $episode = Podcast::where('slug', $episode)->first();
    if (!$episode) return back()->with('error', 'Could not find the episode');

    return view('episode', compact('episode'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' =>'required|max:55',
      'description' =>'required|max:255',
      'audio' => 'required',
      'hour' =>'required',
      'minutes' =>'required',
      'seconds' =>'required'
    ]);

    if ($validator->fails()) return back()->withErrors($validator)->withInput();

    $slug = Str::of($request->title)->slug('-')."-".now()->getTimestamp();
    $the_file = $request->file("audio");
    $_file = $the_file->storeAs('audios', $slug . '.' . $the_file->getClientOriginalExtension());
    
    $duration = $request->hour .":". $request->minutes .":". $request->seconds;
    $length = ($request->hour  * 120) + ($request->minutes * 60) + $request->seconds;

    $episode_image = 'default.png';
    if ($request->hasFile("image")) {
      $image = $request->file("image");
      $episode_image = $slug . '.' . $image->getClientOriginalExtension();
      $image->storeAs('images', $episode_image);
    }

    if ($_file){
      $podcast = Podcast::create([
        'title' => $request->title,
        'slug' => $slug,
        'episode_image' => $episode_image,
        'audio' => $slug .'.'.$the_file->getClientOriginalExtension(),
        'duration' => $duration,
        'length' => $length,
        'description' => $request->description,
      ]);
      if ($podcast) return back()->with('success', 'Podcast created successfully !');
    } else return back()->with('error', 'An Error has occurred');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Podcast  $podcast
   * @return \Illuminate\Http\Response
   */
  public function show(Podcast $podcast)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Podcast  $podcast
   * @return \Illuminate\Http\Response
   */
  public function edit(Podcast $podcast)
  {
    //
  }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Podcast  $podcast
   * @return \Illuminate\Http\Response
   */
  public function destroy(Podcast $podcast)
  {
    //
  }
}
