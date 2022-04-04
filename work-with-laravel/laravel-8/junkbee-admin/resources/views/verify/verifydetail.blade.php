@extends('layout.main')

@section('content')

    <div class="card">
        <div class="col-12">
            <div class="card-header">
                <h3 class="card-title">Verify Request</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" value="{{ $user->full_name }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $user->phone }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $user->address }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 my-3 ">
                        <b>Selfie</b>
                        <img src="{{ asset('/storage/selfie-images/' . $user->selfie) }}"
                            class="img-fluid mx-auto d-block" alt="..." style="border-radius: 5%;">
                    </div>
                    <div class="col-lg-6 my-3 ">
                        <b>KTP</b>
                        <img src="{{ asset('/storage/ktp-images/' . $user->ktp) }}" class="img-fluid mx-auto d-block"
                            alt="..." style="border-radius: 5%; ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center my-3">
            <button type="button" class="btn btn-danger">Reject</button>
            <form action="{{ route('verifyMember') }}" method="post" class="d-inline">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $user->id }}" name="user_id">
                <button type="submit" class="btn btn-success">Accept</button>
            </form>
        </div>
    </div>
@endsection
