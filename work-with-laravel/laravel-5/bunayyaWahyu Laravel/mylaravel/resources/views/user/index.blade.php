@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">User Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>

  <!-- /.content-wrapper -->

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                    
                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                        <h2 class="lead"><b>{{ auth::user()->namalengkap }}</b></h2>
                        <p class="text-muted text-sm"><b>Panggilan: </b> {{ auth::user()->name }}</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:{{ auth::user()->alamat }}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open"></i></span>{{ auth::user()->email }}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{ auth::user()->notelfon }}</li>
                        </ul>
                        <p class="text-muted text-sm"><b>About: </b> {{ auth::user()->about }}</p>
                        </div>
                        <div class="col-5 text-right">
                            <img src="{{ url('cool/images/icon/avatar-01.jpg')}}" alt="" class="img-circle img-fluid">
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-right">
                       <button href="#"><i class="fas fa-lg fa-cog"></i></button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
