@extends('layouts.base')
@section('title')
Dashboard
@endsection
@section('customcss')
<style>
    .main-panel {
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="wrapper">
    <div class="main-header">
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="navbar brand" class="navbar-brand" width="100">
            </a>
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    @if (Auth::check())
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="{{ asset('assets/img/avatar.jpg') }}" alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="{{ asset('assets/img/avatar.jpg') }}"
                                                alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>@if (Auth::check())
                                                {{ Auth::user()->name }}</h4>
                                            @endif
                                            <p class="text-muted">@if (Auth::check())
                                                {{ Auth::user()->email }}
                                                @endif</p><a href="profile.html"
                                                class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown hidden-caret">
                        <a href="/login" class="nav-link">
                            <i class="fas fa-sign-in-alt"> Login</i>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row row-projects">
                    @foreach ($animes as $anime)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="p-2">
                                <img class="card-img-top rounded" src="{{ $anime->image }}" alt="{{ $anime->title }}"
                                    height="400">
                            </div>
                            <div class="card-body pt-2">
                                <div class="row mb-1">
                                    <div class="col-6 pt-1 text-muted small">{{ $anime->tot_fav }} Loves</div>
                                    <div class="col-6 text-right">
                                        @if (Auth::check())
                                        @if ($anime->is_fav)
                                        <a href="{{ route('remove-loves', $anime->id) }}"><button type="submit"
                                                class="btn btn-icon btn-round btn-xs grey"><i
                                                    class="fas fa-heart heart text-danger"></i></button></a>
                                        @else
                                        <a href="{{ route('add-loves', $anime->id) }}"><button type="submit"
                                                class="btn btn-icon btn-round btn-xs grey"><i
                                                    class="far fa-heart heart text-danger"></i></button></a>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <h4 class="mb-1 fw-bold">
                                    <a data-id="{{ $anime->id }}" data-toggle="modal" data-target="#showAnime"
                                        onclick="animeDetail(event.target)">{{ $anime->title }}</a>
                                </h4>
                                <p class="text-muted small mb-2">
                                    @foreach ($anime->genres as $genre)
                                    {{ $genre->nama }}@if ($loop->last)

                                    @else
                                    ,
                                    @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Modal Show -->
                <div class="modal fade" id="showAnime" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="" alt="" srcset="" width="250" id="animeImage">
                                <h1 id="animeTitle"></h1>
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Team</a>
                </div>
            </div>
        </footer>
    </div>
</div>
@section('customjs')
<script>
    $(document).ready(function () {

    });
    function check(param) {
            $.ajax({
                type: "GET",
                url: "/check-loves/" + param,
                dataType: "JSON",
                success: function (response) {
                    return response;
                }
            });
         }

    function animeDetail(event) {
        var id  = $(event).data("id");
        let _url = `/dashboard/anime/${id}`;

        $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if(response) {
                $('#animeImage').attr("src", response.image)
                $('#animeTitle').text(response.title)
            }
        }
        });
    }
</script>
@endsection
