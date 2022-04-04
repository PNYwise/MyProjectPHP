@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">FeedBack</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Feedback</th>
                            <th>Date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->user->full_name }}</td>
                                <td>{{ substr(strip_tags($feedback->message), 0, 500) }}</td>
                                <td>{{ date('d-m-Y', strtotime($feedback->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#modal-feedback" data-username="{{ $feedback->user->full_name }}"
                                        data-message="{{ $feedback->message }}"
                                        data-date="{{ date('d-m-Y', strtotime($feedback->created_at)) }}">detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-feedback">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <p id="message"></p>
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


            $('#modal-feedback').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var message = button.data('message')

                var modal = $(this)
                modal.find('.modal-body #message').append(message);
            });

            $('#modal-feedback').on('hidden.bs.modal', function() {
                var modal = $(this)
                modal.find('.modal-body #message').empty();
            })
        });
    </script>
@endsection
