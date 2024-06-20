<?php

namespace App\Http\Controllers;
use App\Models\Saldo;
use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
     {
       
        $saldo = Saldo::all()->sortByDesc('created_at')->sortByDesc('id')->values();
        //$kas = Kas::latest()->paginate(1);
        $kas = DB::select("select * from kas order by created_at desc limit 1");
        $bulan = 'Juli';

       return view('auth.laporan.index', [
         'saldo' => $saldo,
         'bulan' => $bulan,
         'kas' => $kas,
       ]);
     }
}
