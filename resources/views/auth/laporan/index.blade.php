@extends('auth.layouts.main')
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <h4 class="card-title">&nbsp;&nbsp;Laporan Saldo Perbulan - <b>Juli</b></h4><br>
                                                
                                                    
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Pilih Bulan</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control custom-select">
                                                            <option value="">Juli 2022</option>
                                                            <option value="">Juni 2022</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                @foreach ($kas as $kas)
                                <h4 class="card-subtitle">Saldo<code> Rp. {{ number_format($kas->saldo,2,',','.'); }}</code></h4>
                                @endforeach
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Keterangan</th>
                                                <th>Nominal</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @forelse ($saldo as $saldo)
                                        
                                        <?php
                                            $simbol=$saldo->ket;
                                            if ($simbol=="kas masuk"){
                                                $smbl='right';
                                            }elseif ($simbol=="kas keluar"){
                                                $smbl='left';
                                            }

                                            $simbol=$saldo->ket;
                                            if ($simbol=="kas masuk"){
                                                $color='black';
                                            }elseif ($simbol=="kas keluar"){
                                                $color='red';
                                            }
                                        ?>
                                            <tr>
                                                <td><i class="mdi mdi-chevron-{{ $smbl }}" style="color:{{ $color }}"></i>    {!! $saldo->detail !!}</td>
                                                <td><font color='{{ $color; }}'>Rp. {{ number_format($saldo->transaksi,2,',','.'); }}</font></td>
                                                <td>Rp. {{ $saldo->created_at; }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" align="center"><b>Data masih kosong</b></td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <select name="bln">
                                    <option selected="selected">Bulan</option>
                                    <?php
                                    $bln=date('Y-m-d');;
                                    // var_dump($bln);
                                    $bulan=array(date('m'));
                                    $jlh_bln=count($bulan);
                                    for($c=0; $c<$jlh_bln; $c+=1){
                                        echo"<option value=$bulan[$c]> $bln </option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection