<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas;
use App\Models\Saldo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class KasController extends Controller
{
    public function index()
  {
    // $kas = Kas::latest()->paginate(9);
     $kas = Kas::all()->sortByDesc('created_at')->sortByDesc('id')->values();
    return view('auth.kas.index', compact('kas'))->with('i', (request()->input('page', 1) - 1) * 1);
  }
    public function create()
  {
    $kas = Kas::latest()->paginate(1);
    $user = User::all();
    return view('auth.kas.create', compact('kas','user'))->with('i', (request()->input('page', 1) - 1) * 1);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $pesan = [
      'kas_masuk.required' => 'Field kas masuk masih kosong',
      'kas_keluar.required' => 'Field kas keluar masih kosong',
      'saldo.required' => 'Field saldo masih kosong',
      'detail.required' => 'Field detail masih kosong',
      'ket.required' => 'Field ket masih kosong',
    ];

    $validateData = $request->validate([
      'kas_masuk' => 'required',
      'kas_keluar' => 'required',
      'saldo' => 'required',
      'detail' => 'required',
      'user' => 'required',
      'ket' => 'required'
    ], $pesan);
    // return $request->file('gambar')->store('img-prestasi');
    
    $kas = Kas::create([
      'kas_masuk' => $request->kas_masuk,
      'kas_keluar' => $request->kas_keluar,
      'saldo' => $request->saldo+$request->kas_masuk,
      'detail' => $request->detail
    ]);
    $saldo = Saldo::create([
      'transaksi' => $request->kas_masuk,
      'detail' => $request->detail,
      'user' => $request->user,
      'ket' => $request->ket
    ]);
    if ($kas or $saldo) {
      //redirect dengan pesan sukses
      return redirect('/admin-kas')->with(['success' => 'Kas berhasil ditambahkan']);
    } else {
      //redirect dengan pesan error
      return redirect()->back()->with(['error' => 'Gagal menambahkan kas !']);
    }
  }
   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $kas = Kas::where('id', $id)->first();
    Kas::destroy($id);
    return redirect('/admin-kas')->with('success', 'Kas berhasil dihapus');
  }
   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
   $kas = Kas::where('id', $id)->first();
   return view('auth.kas.edit', [
     'kas' => $kas
   ]);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $pesan = [
      'kas_masuk.required' => 'Field kas masuk masih kosong',
      'kas_keluar.required' => 'Field kas keluar masih kosong',
      'saldo.required' => 'Field saldo masih kosong',
      'detail.required' => 'Field keterangan masih kosong',
    ];

    $rules = [
      'kas_masuk' => 'required',
      'kas_keluar' => 'required',
      'saldo' => 'required',
      'detail' => 'required'
    ];

    $validateData = $request->validate($rules, $pesan);

    $kas = Kas::findOrFail($id);
    $kas->update($validateData);

    if ($kas) {
      return redirect('/admin-kas')->with('success', 'Data kas berhasil diupdate');
    } 
    else {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Some problem has occured, please try again'
        ]);
    }
  }
  public function KasKeluar()
  {
    $kas = Kas::latest()->paginate(1);
    $user = User::all();
    return view('auth.kas.kas_keluar', compact('kas','user'))->with('i', (request()->input('page', 1) - 1) * 1);
  }
  public function simpan(Request $request)
  {
    $pesan = [
      'kas_masuk.required' => 'Field kas masuk masih kosong',
      'kas_keluar.required' => 'Field kas keluar masih kosong',
      'saldo.required' => 'Field saldo masih kosong',
      'detail.required' => 'Field detail masih kosong',
      'ket.required' => 'Field ket masih kosong',
      
    ];

    $validateData = $request->validate([
      'kas_masuk' => 'required',
      'kas_keluar' => 'required',
      'saldo' => 'required',
      'detail' => 'required',
      'user' => 'required',
      'ket' => 'required'
    ], $pesan);
    // return $request->file('gambar')->store('img-prestasi');
    
    $kas = Kas::create([
      'kas_masuk' => $request->kas_masuk,
      'kas_keluar' => $request->kas_keluar,
      'saldo' => $request->saldo-$request->kas_keluar,
      'detail' => $request->detail
    ]);
    $saldo = Saldo::create([
      'transaksi' => $request->kas_keluar,
      'detail' => $request->detail,
      'user' => $request->user,
      'ket' => $request->ket
    ]);
    if ($kas or $saldo) {
      //redirect dengan pesan sukses
      return redirect('/admin-kas')->with(['success' => 'Kas berhasil ditambahkan']);
    } else {
      //redirect dengan pesan error
      return redirect()->back()->with(['error' => 'Gagal menambahkan kas !']);
    }
  }
}
