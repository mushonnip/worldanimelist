@extends('dashboard.index')

@section('title')
Create Genre
@endsection

@section('main')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Genre</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="/dashboard/">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="/dashboard/anime">Genre</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tambah Genre</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Ada beberapa masalah dengan inputanmu.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('genre.store') }}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama Genre</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Genre"
                                        name="nama">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('customjs')
<script>
    moment.locale('id')
    $('#aired').datetimepicker({
        format: 'YYYY-MM-DD'
    })
</script>
@endsection
