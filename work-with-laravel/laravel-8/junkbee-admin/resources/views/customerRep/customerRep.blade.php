@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Customer Rep List</h3>
                <div class="text-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-addmanager">Add Customer Rep</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Reg Date</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerReps as $customerRep)
                            <tr>
                                <td>{{ $customerRep->full_name }}</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($customerRep->created_at)) }}
                                    ({{ \Carbon\Carbon::parse($customerRep->created_at)->diffForHumans() }})
                                </td>
                                <td>{{ $customerRep->phone }}</td>
                                <td>{{ $customerRep->email }}</td>
                                <td>
                                    <a href="{{ route('detailcustomerrep', $customerRep->id) }}"
                                        class="btn btn-primary btn-sm">
                                        Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-addmanager">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Add customer Rep</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form action="/dashboard/adcustomerrep" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
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
            $("#user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
