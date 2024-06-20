<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
  {
    $profiles = Profile::latest()->paginate(1);
    return view('auth.profile', compact('profiles'))->with('i', (request()->input('page', 1) - 1) * 1);
  }

  
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Profile  $profile
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // echo "UPDATE";exit;
    // echo $request->isi_profile;exit;
    $request->validate([
      'isi_profile' => 'required',
      'isi_profile2' => 'required'
    ]);

    $profile = Profile::findOrFail($id);
    $profile->update($request->all());
    if ($profile) {
      return redirect('/admin-profile')->with('success', 'Data profile berhasil diupdate');
    } else {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Some problem has occured, please try again'
        ]);
    }
    // return redirect()->route('auth.profile')
    //   ->with('success', 'Profile updated successfully');
  }

  public function store(Request $request)
  {
    $request->validate([
      'isi_profile' => 'required',
      'isi_profile2' => 'required'
    ]);

    Profile::create($request->all());
    return redirect('/admin-profile')->with('success', 'Data profile berhasil diupdate');
  }
}
