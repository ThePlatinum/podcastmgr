<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class PodcastController extends Controller
{
  public function index($episode)
  {
    $episode = Podcast::where('slug', $episode)->first();
    if (!$episode) return back()->with('error', 'Could not find the episode');

    return view('episode', compact('episode'));
  }

  public function create()
  {
    return view('create');
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required|max:100',
      'description' => 'required|max:800',
      'audio' => 'required',
      'hour' => 'required',
      'minutes' => 'required',
      'seconds' => 'required'
    ]);

    if ($validator->fails()) return back()->withErrors($validator)->withInput();

    $slug = Str::of($request->title)->slug('-') . "-" . now()->getTimestamp();
    $the_file = $request->file("audio");
    $_file = $the_file->storeAs('audios', $slug . '.' . $the_file->getClientOriginalExtension());

    $duration = $request->hour . ":" . $request->minutes . ":" . $request->seconds;
    $length = ($request->hour  * 120) + ($request->minutes * 60) + $request->seconds;

    $episode_image = 'default.png';
    if ($request->hasFile("image")) {
      $image = $request->file("image");
      $episode_image = $slug . '.' . $image->getClientOriginalExtension();

      $image_resize = Image::make($image->getRealPath());
      $image_resize->resize(null, 250, function ($constraint) {
        $constraint->aspectRatio();
      });
      $image_resize->save(public_path('storage/images/' . $episode_image), 100);
    }

    if ($_file) {
      $podcast = Podcast::create([
        'title' => $request->title,
        'slug' => $slug,
        'episode_image' => $episode_image,
        'audio' => $slug . '.' . $the_file->getClientOriginalExtension(),
        'duration' => $duration,
        'length' => $length,
        'description' => $request->description,
      ]);
      if ($podcast) return back()->with('success', 'Podcast created successfully!');
    } else return back()->with('error', 'An error occurred');
  }

  public function delete(Request $request)
  {
    $episode = Podcast::where('slug', $request->episode)->first();
    if (!$episode) return back()->with('error', 'Could not find the episode');

    $episode->delete();
    return Session::flash('success', 'Podcast deleted successfully!');
  }

  public function edit($slug)
  {
    $episode = Podcast::where('slug', $slug)->first();
    if (!$episode) return back()->with('error', 'Could not find the episode');

    $time = explode(":", $episode->duration);
    return view('edit', compact('episode', 'time'));
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'episode' => 'exists:podcasts,id',
      'title' => 'required|max:100',
      'description' => 'required|max:1000',
      'hour' => 'required',
      'minutes' => 'required',
      'seconds' => 'required'
    ]);

    if ($validator->fails()) return back()->withErrors($validator)->withInput();

    $episode = Podcast::find($request->episode);

    if ($request->file("audio")) {
      if (Storage::exists("audios/" . $episode->audio)) Storage::delete("audios/" . $episode->audio);
      $the_file = $request->file("audio");
      $the_file->storeAs('audios', $episode->slug . '.' . $the_file->getClientOriginalExtension());
      $episode->audio = $episode->slug . '.' . $the_file->getClientOriginalExtension();
    }

    $duration = $request->hour . ":" . $request->minutes . ":" . $request->seconds;
    $length = ($request->hour  * 120) + ($request->minutes * 60) + $request->seconds;

    $episode_image = $episode->episode_image;
    if ($request->hasFile("image")) {
      if ($episode->episode_image != 'default.png' && Storage::exists("images/" . $episode->episode_image)) Storage::delete("images/" . $episode->episode_image);
      $image = $request->file("image");
      $episode_image = $episode->slug . '.' . $image->getClientOriginalExtension();

      $image_resize = Image::make($image->getRealPath());
      $image_resize->resize(null, 250, function ($constraint) {
        $constraint->aspectRatio();
      });
      $image_resize->save(public_path('storage/images/' . $episode_image), 100);
    }
    $episode->title = $request->title;
    $episode->episode_image = $episode_image;
    $episode->duration = $duration;
    $episode->length = $length;
    $episode->description = $request->description;
    if ($episode->save()) return redirect()->route('dashboard')->with('success', 'Podcast updated successfully!');
    else return back()->with('error', 'An error occurred');
  }
}
