@extends('auth.layouts.main')
@section('content')
    {{-- @php
    var_dump($kontak);
    exit();
    @endphp --}}
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Kas</h4>
                    <form method="post" action="/admin-kas" class="form-material m-t-40" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kas Masuk</label>
                            <input type="number" class="form-control form-control-line" value="0"
                                name="kas_masuk" placeholder="Masukkan Kas Masuk">
                            @error('kas_masuk')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                            <input type="hidden" class="form-control form-control-line" value="0"
                                name="kas_keluar" placeholder="Masukkan Kas Keluar">
                            @forelse ($kas as $kas)
                            <input type="hidden" class="form-control form-control-line" value="{{ $kas->saldo }}"
                                name="saldo" placeholder="Saldo">
                            @empty
                            <input type="hidden" class="form-control form-control-line" value="0"
                                name="saldo" placeholder="Saldo">
                            @endforelse
                            @foreach ($user as $user)
                            <input type="hidden" class="form-control form-control-line" value="{{ $user->name }}"
                                name="user" placeholder="user">
                            <input type="hidden" class="form-control form-control-line" value="kas masuk"
                                name="ket" placeholder="ket">
                            @endforeach
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea class="textarea_editor form-control" rows="15"
                                    name="detail" placeholder="Masukan Detail Kas"> </textarea>
                            @error('detail')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                       
                       
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection
