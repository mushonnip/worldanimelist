@extends('dashboard.index')

@section('title')
Edit Anime
@endsection

@section('main')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Anime</h4>
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
                <a href="/dashboard/anime">Anime</a>
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
                        <h4 class="card-title">Edit Anime</h4>
                        {{-- <a href="{{ route('anime.create') }}" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Tambah Anime
                        </a> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive"> --}}
                    <form action="{{ route('anime.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <label for="image">Current: {{ $anime->image }}</label>
                                    <input type="file" class="form-control-file" id="image" name="image" value="{{ $anime->image }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul Anime</label>
                                    <input type="text" class="form-control" id="title" placeholder="Nama Anime"
                                        name="title" value="{{ $anime->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="episodes">Epidose</label>
                                    <input type="number" class="form-control" id="episodes" placeholder="Episode"
                                        name="episodes" value="{{ $anime->episodes }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        @if ($anime->status == 'Currently Airing')
                                        <option value="{{ $anime->status }}" selected>{{ $anime->status }}</option>
                                        <option value="Finished Airing">Finished Airing</option>
                                        @else
                                        <option value="{{ $anime->status }}" selected>{{ $anime->status }}</option>
                                        <option value="Currently Airing">Currently Airing</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Genre</label>
                                    <div class="selectgroup selectgroup-pills">
                                        @foreach ($genres as $genre)
                                        @foreach ($anime->genres as $item)
                                        @if ($item->id == $genre->id)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                                class="selectgroup-input" checked>
                                            <span class="selectgroup-button">{{ $genre->nama }}</span>
                                        </label>
                                        @else
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">{{ $genre->nama }}</span>
                                        </label>
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </div>
                                </div>


                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Aired Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control aired" id="aired" name="aired" value="{{ $anime->aired }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="studios">Studio</label>
                                    <input type="text" class="form-control" id="studios" placeholder="Studio"
                                        name="studios" value="{{ $anime->studios }}">
                                </div>
                                <div class="form-group">
                                    <label for="producers">Produser</label>
                                    <input type="text" class="form-control" id="producers" placeholder="Produser"
                                        name="producers" value="{{ $anime->producers }}">
                                </div>
                                <div class="form-group">
                                    <label for="duration">Durasi</label>
                                    <input type="number" class="form-control" id="duration" placeholder="Durasi"
                                        name="duration" value="{{ $anime->duration }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('customjs')
<script>

    $('#aired').datetimepicker({
			format: 'LL',
		});
</script>
@endsection
