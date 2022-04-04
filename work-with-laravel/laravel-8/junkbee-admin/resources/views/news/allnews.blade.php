@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">News</h3>
                <div class="text-right">
                    <a href="{{ route('addNews') }}" class="btn btn-success btn-sm">Add news</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>date</th>
                            <th>author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    ({{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }})
                                </td>
                                <td>{{ $item->user->full_name }}</td>
                                <td>
                                    <a href="{{ route('detailNews', $item->slug) }}" class="btn btn-primary btn-sm">
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
