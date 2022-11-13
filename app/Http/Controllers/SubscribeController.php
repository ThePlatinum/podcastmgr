<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
      'email' =>'required|email|max:255',
    ]);
    if ($validator->fails()) return back()->withErrors($validator)->withInput();

    $check = Subscribe::where('email', $request->email)->get();
    if ($check) return back()->with('warning', 'Thanks, You have already subscribed');

    Subscribe::create([
      'email' => $request->email
    ]);

    return back()->with('success','You have subscribed successfully!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Subscribe  $subscribe
   * @return \Illuminate\Http\Response
   */
  public function destroy(Subscribe $subscribe)
  {
    //
  }
}
