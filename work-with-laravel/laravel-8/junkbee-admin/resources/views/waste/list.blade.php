@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Waste</h3>
                <div class="text-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addwaste"
                        id="buttonAdd">Add
                        Waste</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="badword" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width=" 60%">Type</th>
                            <th>Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wastes as $item)
                            <tr>
                                <td>{{ $item->type }}</td>
                                <td>{{ number_format($item->price, 2) }}/Kg</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-id="{{ $item->id }}"
                                        data-type="{{ $item->type }}" data-price="{{ $item->price }}"
                                        data-toggle="modal" data-target="#modal-updatewaste">Update</button>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modal-deletewaste" data-id="{{ $item->id }}">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-addwaste">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Add Waste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form action="{{ route('wasteadd') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
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

    {{-- update --}}
    <div class="modal fade" id="modal-updatewaste">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Waste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form action="{{ route('wasteupdate') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="d-block text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- delete --}}
    <div class="modal fade" id="modal-deletewaste">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <p>Are you sure want to delete this waste type?</p>
                    <form class="text-right" action="{{ route('wastedelete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
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


            $('#modal-updatewaste').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var type = button.data('type')
                var price = button.data('price')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #type').val(type);
                modal.find('.modal-body #price').val(price);
            });
            $('#modal-deletewaste').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            });
        });
    </script>
@endsection
