@extends('dashboard.index')
@section('main')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">World Anime List</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> --}}
                <a href="/dashboard/anime/create" class="btn btn-secondary btn-round">Add Anime</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Informasi jumlah total</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 text-center">
                            <h1>{{ App\User::count() }}</h1>
                            <h6 class="fw-bold mb-0">Pengguna</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <h1>{{ App\Anime::count() }}</h1>
                            <h6 class="fw-bold mt-3 mb-0">Anime</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <h1>{{ App\Genre::count() }}</h1>
                            <h6 class="fw-bold mt-3 mb-0">Genre</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
