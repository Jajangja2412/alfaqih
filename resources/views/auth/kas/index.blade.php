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
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                            <h3 class="text-success"><i class="fa fa-check-circle"></i> {{ session('success') }}
                            </h3>
                        </div>
                    @endif
                    <h4 class="card-title">Data Kas</h4>
                    <a href="/admin-kas/create">
                        <button type="button" class="btn waves-effect waves-light btn-primary mb-3">
                            <i class="fa fa-plus"></i> Kas masuk
                        </button>
                    </a>
                    <a href="/kas-keluar">
                        <button type="button" class="btn waves-effect waves-light btn-primary mb-3">
                            <i class="fa fa-plus"></i> Kas keluar
                        </button>
                    </a>
                   
                    {{-- <div class="table-responsive">
                        <table class="table table-bordered"> --}}
                    <div class="table-responsive m-t-0">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kas Masuk</th>
                                    <th>Kas Keluar</th>
                                    <th>Keterangan</th>
                                    <th>Saldo</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($kas as $kas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp. {{ number_format($kas->kas_masuk,2,',','.'); }}</td>
                                        <td>Rp. {{ number_format($kas->kas_keluar,2,',','.'); }}</td>
                                        <!-- <td>{{ substr($kas->detail,0, 50) }}</td> -->
                                        <td>{!! $kas->detail !!}</td>
                                        <td>Rp. {{ number_format($kas->saldo,2,',','.'); }}</td>
                                        <td class="text-nowrap" align="center">
                                            <a href="/admin-kas/{{ $kas->id }}/edit">
                                                <button type="button" class="btn btn-info waves-effect waves-light">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <form action="/admin-kas/{{ $kas->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger waves-effect waves-light"
                                                    onclick="return confirm('Yakin ingin menghapus data?')">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" align="center"><b>Data masih kosong</b></td>
                                    </tr>
                                    @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection
