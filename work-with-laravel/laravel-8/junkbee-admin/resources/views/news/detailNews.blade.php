@extends('layout.main')

@section('content')
    @foreach ($news as $item)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-1">News</h3>
                    <div class="text-right">
                        <a href="{{ route('updateNews', $item->slug) }}" class="btn btn-primary btn-sm">edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-remove">remove</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3><b>{{ $item->judul }}</b></h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col text-left">
                            <p>Author : {{ $item->user->full_name }}</p>
                        </div>
                        <div class="col text-right">
                            <p>{{ date('d F Y, H:i', strtotime($item->date)) }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center"
                        style="max-height: 450px; overflow:hidden;  border-radius: 10px;">
                        <img src="{{ asset('storage/news-images/' . $item->banner) }}" class="img-fluid" alt="">
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4 text-center">
                            <p style="color:rgb(109, 109, 109)">{{ $item->banner_desctiption }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <p>{!! $item->desctiption !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-remove">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="my-2">Are you sure to remove this user?&hellip;</p>
                        <div class="d-block text-right">
                            <form action="{{ route('deleteNews') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="banner" value="{{ $item->banner }}">
                                <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
