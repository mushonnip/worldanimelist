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
                        <a href="{{ route('genre.create') }}" class="btn btn-primary btn-round ml-auto"">
                            <i class=" fa fa-plus"></i>
                            Add Genre
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
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
                                            <a href="{{ route('genre.edit', $genre->id) }}"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" id="idEditButton">
                                                <i class="fa fa-edit"></i>
                                            </a>
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
