@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Data</h3>
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
                            <th>Role</th>
                            {{-- <th class="text-center">Verified</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                {{-- <td class="text-center">
                                    @if ($user->verified)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('detailuser', $user->id) }}" class="btn btn-primary btn-sm">
                                        Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
