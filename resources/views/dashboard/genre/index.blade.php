@extends('dashboard.index')
@section('title')
Genre
@endsection
@section('main')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Genre</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Genre</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Genre List</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                            data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Genre
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            New</span>
                                        <span class="fw-light">
                                            Genre
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Isikan form berikut</p>
                                    <form action="{{ route('genre.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="genre">Nama Genre</label>
                                                    <input type="text" class="form-control" id="genre"
                                                        placeholder="Nama Genre" name="nama">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edit -->
                    <div class="modal fade" id="editGenre" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            Edit</span>
                                        <span class="fw-light">
                                            Genre
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Isikan form berikut</p>
                                    <form method="POST" id="formEdit">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="genre">Nama Genre</label>
                                                    <input type="text" class="form-control" id="genre"
                                                        placeholder="Nama Genre" name="nama">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="editGenreButton" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Genre</th>
                                    <th>Dibuat</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Genre</th>
                                    <th>Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($genres as $index => $genre)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $genre->nama }}</td>
                                    <td>{{ date('d-M-y', strtotime($genre->created_at)) }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Edit Task" data-toggle="modal"
                                                data-target="#editGenre" data-id="{{ $genre->id }}" data-nama="{{ $genre->nama }}" id="idEditButton">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form action="{{ route('genre.destroy', $genre->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customjs')
<script>
    $(document).ready(function() {
            // Add Row
                $('#add-row').DataTable({
                    "pageLength": 50,
                });
        });

    $(document).on("click", "#idEditButton", function () {
        var genreId = $(this).data('id');
        var genreNama = $(this).data('nama');
        $(".modal-body #genre").val(genreNama);
        $('#formEdit').attr('action', `/dashboard/genre/${genreId}`);
    });
</script>
@endsection
