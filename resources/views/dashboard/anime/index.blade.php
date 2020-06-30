@extends('dashboard.index')
@section('title')
Anime
@endsection
@section('main')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Anime</h4>
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
                <a href="#">Anime</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Anime List</h4>
                        <a href="{{ route('p.anime.create') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add Anime
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Anime</th>
                                    <th>Episode</th>
                                    <th>Produser</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Anime</th>
                                    <th>Episode</th>
                                    <th>Produser</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($animes as $index => $anime)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td><img src="{{ asset($anime->image) }}" alt="" srcset="" width="50px"></td>
                                    <td>{{ $anime->title }}</td>
                                    <td>{{ $anime->episodes }}</td>
                                    <td>{{ $anime->producers }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('p.anime.edit', $anime->id) }}"
                                                class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Edit Task"" id=" idEditButton">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('p.anime.destroy', $anime->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-original-title="Remove">
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
    // $('#addRowModal').on('shown.bs.modal', function (e) {
    //     $('#airedAdd').datetimepicker({
	//         format: 'MM/DD/YYYY',
    //     });
    // })

    $('#airedAdd').datetimepicker({
	        format: 'MM/DD/YYYY',
    });

    $(document).ready(function() {

            // Add Row
                $('#add-row').DataTable({
                    "pageLength": 50,
                });
        });

    $(document).on("click", "#idEditButton", function () {
        var animeId = $(this).data('id');
        var animeTitle = $(this).data('title');
        $(".modal-body #title").val(animeTitle);
        $('#formEdit').attr('action', `/dashboard/anime/${animeId}`);
    });


</script>
@endsection
