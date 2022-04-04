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
                            <th>Order No</th>
                            <th>Order By</th>
                            <th>Date</th>
                            <th>Beever</th>
                            <th>status</th>
                            <th>Weight</th>
                            <th>Fee Order</th>
                            <th>Fee beever</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $collection)
                            <tr>
                                <td>{{ $collection->order_code }}</td>
                                <td>{{ $collection->user->full_name }}</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($collection->created_at)) }}
                                </td>
                                @if ($collection->driver_id)
                                    <td>{{ $collection->driver->full_name }}</td>
                                @else
                                    <td></td>
                                @endIf

                                <td>
                                    @if ($collection->status == 'completed')
                                        <p class="text-success">{{ $collection->status }}</p>
                                    @else
                                        <p>{{ $collection->status }}</p>
                                    @endif
                                </td>
                                <td>{{ $collection->total_weight }} Kg</td>
                                <td> Rp. {{ number_format($collection->total, 2) }}</td>
                                <td> Rp.{{ number_format($collection->fee_beever, 2) }}</td>
                                <td>
                                    <a href="{{ route('allCollectionDetail', $collection->order_code) }}"
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
