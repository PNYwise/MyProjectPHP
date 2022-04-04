@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Collection</h3>
            </div>
            <!-- /.card-header -->
            @foreach ($collections as $collection)
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p>Order No.{{ $collection->order_code }}</p>
                        </div>
                        <div class="col-6 text-right">
                            @if ($collection->status == 'on going')

                                <p class="text-warning"><b>{{ $collection->status }}</b></p>

                            @elseIf($collection->status == 'completed')

                                <p class="text-success">{{ $collection->status }}</p>
                            @elseIf($collection->status == 'requested')

                                <p class="text-warning">{{ $collection->status }}</p>
                            @else
                                <p class="text-danger">{{ $collection->status }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <b>Order By</b>
                            <div class="card mt-2">
                                <div class="card-body card-sm">
                                    <div class="row">
                                        <div class="col-lg-1 text-center">
                                            <img src="https://source.unsplash.com/250x250?"
                                                class="brand-image img-circle elevation-3" alt=".."
                                                style="max-height:80px ;    width: 80px">
                                        </div>
                                        <div class="col-lg-3 pt-3 text-center">
                                            <b>{{ $collection->user->full_name }}</b>
                                            <p>{{ $collection->user->phone }}</p>
                                        </div>
                                        <div class="col-lg-8 text-right py-4">
                                            <a href="{{ route('detailuser', $collection->user_id) }}"
                                                class="text-decorate-none">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <b>Pick Up Location</b>
                            <p>{{ $collection->location1 }}</p>
                            <br>
                            <b>Fee Order</b>
                            <p>Rp. {{ number_format($collection->total, 2) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            @if ($collection->driver_id)
                                <b>Driver By</b>
                                <div class="card mt-2">
                                    <div class="card-body card-sm">
                                        <div class="row">
                                            <div class="col-lg-1 text-center">
                                                <img src="https://source.unsplash.com/250x250?{{ $collection->driver->full_name }}"
                                                    class="brand-image img-circle elevation-3" alt=".."
                                                    style="max-height:80px ; max-width: 80px">
                                            </div>
                                            <div class="col-lg-3 pt-3 text-center">
                                                <b>{{ $collection->driver->full_name }}</b>
                                                <p>{{ $collection->driver->phone }}</p>
                                            </div>
                                            <div class="col-lg-8 text-right py-4">
                                                <a href="{{ route('detailuser', $collection->driver_id) }}"
                                                    class="text-decorate-none">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <b>Drop Location</b>
                                <p>{{ $collection->location2 }}</p>
                                <br>
                                <b>Fee Driver</b>
                                <p>Rp. {{ number_format($collection->fee_driver, 2) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        {{-- @foreach ($collection as $item)

        @endforeach --}}

        @foreach ($detailCollection as $detail)
            @php
                $userImages = DB::select("SELECT * FROM images WHERE order_code = '$detail->order_code'AND user_id = $collection->user_id");
                
                if ($collection->driver_id) {
                    $beeverImages = DB::select("SELECT * FROM images WHERE order_code = '$detail->order_code'AND user_id = $collection->driver_id");
                }
            @endphp

            <label for="type">User Image</label>
            <div class="row text-center mb-3">
                @foreach ($userImages as $image)
                    <div class='col-md-4'>
                        <img src='https://source.unsplash.com/250x250?{{ $image->directory }}' class='img-thumbnail'
                            alt='...' style='max-height: 250px; max-width: 250px; overflow:hidden;'>
                    </div>
                @endforeach
            </div>

            @if ($collection->driver_id)
                <label for="type">Beever Image</label>
                <div class="row text-center mb-3">
                    @foreach ($beeverImages as $image)
                        <div class='col-md-4'>
                            <img src='https://source.unsplash.com/250x250?{{ $image->directory }}' class='img-thumbnail'
                                alt='...' style='max-height: 250px; max-width: 250px; overflow:hidden;'>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <p> {{ $detail->waste_type }} </p>
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <p> {{ $detail->waste_weight }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
