@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Collection</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>status</th>
                            <th>Weight</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $collection)
                            <tr>
                                <td>{{ $collection->user->full_name }}</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($collection->date)) }}
                                </td>
                                <td>
                                    @if ($collection->status == 'requested' || $collection->status == 'beever_requested')
                                        <p class="text-danger">{!! str_replace('_', ' ', $collection->status) !!}</p>
                                    @else
                                        <p class="text-success">{!! str_replace('_', ' ', $collection->status) !!}</p>
                                    @endif
                                </td>
                                <td>{{ $collection->total_weight }} Kg</td>
                                <td>
                                    <a href="{{ route('disputeCollectionDetail', $collection->order_code) }}"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                    @if ($collection->status == 'requested' || $collection->status == 'beever_requested')
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#modal-cenceled" data-ordercode="{{ $collection->order_code }}"
                                            data-username="{{ $collection->user->full_name }}"
                                            data-status="{{ $collection->status }}"
                                            data-reason="{{ $collection->reason }}">
                                            accept
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cenceled">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">cencel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <p id="reason"></p>
                    <form class="d-inline" action="{{ route('disputeCollection.accept') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="accept" id="accept">
                        <input type="hidden" name="role_accept" id="role_accept">
                        <button type="submit" class="btn btn-warning btn-sm">
                            accept
                        </button>
                    </form>
                    <form class="d-inline" action="{{ route('disputeCollection.cencel') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="cencel" id="cencel">
                        <button class="btn btn-danger btn-sm">
                            cencel
                        </button>
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
            $("#user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');


            $('#modal-cenceled').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var reason = button.data('reason')
                var orderCode = button.data('ordercode')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #reason').append(reason);
                modal.find('.modal-body #accept').val(orderCode);
                modal.find('.modal-body #cencel').val(orderCode);
                modal.find('.modal-body #role_accept').val(status);
            });

            $('#modal-cenceled').on('hidden.bs.modal', function() {
                var modal = $(this)
                modal.find('.modal-body #reason').empty();
                modal.find('.modal-body #accept').empty();
                modal.find('.modal-body #cencel').empty();
            })
        });
    </script>
@endsection
