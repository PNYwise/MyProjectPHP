@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">News</h3>
                <div class="text-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addbadword"
                        id="buttonAdd">Add
                        Badword</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="badword" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="90%">Word</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->word }}</td>
                                <td class="text-center">
                                    <form action="{{ route('delete') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-addbadword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Add Bad Word</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form action="{{ route('add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="word">Word</label>
                            <input type="text" class="form-control" id="word" name="word">
                        </div>
                        <div class="d-block text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#badword").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>
@endsection
