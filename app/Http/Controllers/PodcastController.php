<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($episode)
  {
    return ;
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
  public function store()
  {
    //
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
