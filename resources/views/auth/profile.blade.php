@extends('auth.layouts.main')

@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
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
                    @if (session()->has('error'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                    aria-hidden="true">&times;</span> </button>
                            <h3 class="text-success"><i class="fa fa-check-circle"></i> {{ session('error') }}
                            </h3>
                        </div>
                    @endif
                    <h4 class="card-title">Edit Profile</h4>
                    @forelse ($profiles as $profile)
                        <form action="/admin-profile/{{ $profile->id }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Bagian 1</label>
                                <textarea class="textarea_editor form-control" rows="15"
                                    name="isi_profile">{{ $profile->isi_profile }}</textarea>
                                <label>Bagian 2</label>
                                <textarea class="textarea_editor form-control" rows="15"
                                    name="isi_profile2">{{ $profile->isi_profile2 }}</textarea>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    @empty
                        <form action="/admin-profile" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Bagian 1</label>
                                <textarea class="textarea_editor form-control" rows="15"
                                    name="isi_profile"></textarea>
                                <label>Bagian 2</label>
                                <textarea class="textarea_editor form-control" rows="15"
                                    name="isi_profile2"></textarea>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    @endforelse
                    @foreach ($profiles as $profile)

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
