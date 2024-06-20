@extends('auth.layouts.main')
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Kas</h4>
                    <form method="post" action="/admin-kas/{{ $kas->id }}" class="form-material m-t-40"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label>Kas Masuk</label>
                            <input type="number" class="form-control form-control-line"
                                value="{{ old('kas_masuk', $kas->kas_masuk) }}" name="kas_masuk"
                                placeholder="Kas Masuk">
                                @error('kas_masuk')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kas Keluar</label>
                            <input type="number" class="form-control form-control-line"
                                value="{{ old('kas_keluar', $kas->kas_keluar) }}" name="kas_keluar"
                                placeholder="Kas Keluar">
                                @error('kas_keluar')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Saldo</label>
                            <input type="number" class="form-control form-control-line"
                                value="{{ old('saldo', $kas->saldo) }}" name="saldo"
                                placeholder="saldo">
                                @error('saldo')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control form-control-line"
                                value="{{ old('detail', $kas->detail) }}" name="detail"
                                placeholder="detail">
                                @error('detail')
                                <div class="form-group has-danger mb-0">
                                    <div class="form-control-feedback">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection
