@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Push Notification</h3>
                <div class="text-right">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('send.notification') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Message</label>
                        <input type="text" class="form-control" id="body" name="body" required>
                    </div>
                    <div class="d-block text-right">
                        <button type="submit" class="btn btn-primary">send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
