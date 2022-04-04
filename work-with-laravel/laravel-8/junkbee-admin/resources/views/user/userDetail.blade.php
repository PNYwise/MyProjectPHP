@extends('layout.main')

@section('content')
    <div class="row pt-3">
        <div class="col-lg-12 d-block">
            <div class="card bg-light d-flex flex-fill justify-content-center">
                <div class="card-body">
                    <div class="text-right">
                        @if ($user->active == 1)
                            <p class="text-success mb-0">
                                <b>Active</b>
                            </p>
                        @else
                            <p class="text-warning mb-0">
                                <b>Suspend</b>
                            </p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12 px-3 text-center">
                            <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="user-avatar"
                                class="img-circle img-fluid">
                            <br>
                            <br>
                            <b>{{ $user->role }}</b>
                            @if ($user->verified)
                                <p class="text-success">
                                    <i class="fas fa-check-circle text-success"></i>
                                    <b>Verified</b>
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-times-circle text-danger"></i>
                                    <b>Unverified</b>
                                </p>
                            @endif
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6 pl-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    value="{{ date('dmY', strtotime($user->created_at)) . $user->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="{{ $user->full_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Wallet</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="Rp. {{ number_format($user->balance, 2) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">E-mail</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Register</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="{{ date('d/m/Y', strtotime($user->created_at)) }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light d-flex flex-fill justify-content-center">
                <div class="card-body">
                    <div class="row pt-3">
                        <div class="col-lg-6 pl-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Suceed order</label>
                                <input type="text" class="form-control" id="suceed_order" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Suceed Beever</label>
                                <input type="text" class="form-control" id="suceed_beever" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cenceled Order</label>
                                <input type="text" class="form-control" id="cenceled_order" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cenceled Beever</label>
                                <input type="text" class="form-control" id="cenceled_beever" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                @if ($user->active == 1)
                    @if ($user->role != 'customer rep')
                        @if ($user->role != 'manager')
                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal"
                                data-target="#modal-suspend">&nbsp;Suspend&nbsp;</button>
                        @endif
                    @else

                    @endif
                @else
                    <button type="button" class="btn btn-warning btn-md" data-toggle="modal"
                        data-target="#modal-unsuspend">&nbsp;Unsuspend&nbsp;</button>
                @endif
                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-remove">&nbsp;
                    Remove &nbsp;</button>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                    data-target="#modal-role">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Role
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-suspend">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="my-2">Are you sure to suspend this user?&hellip;</p>
                    <div class="d-block text-right">
                        <form action="{{ route('suspend') }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-unsuspend">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="my-2">Are you sure to Unsuspend this user?&hellip;</p>
                    <div class="d-block text-right">
                        <form action="{{ route('unsuspend') }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-role">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- <p class="my-2">Are you sure to c this user?&hellip;</p> --}}
                    <div class="d-block">
                        <form action="{{ route('changerole') }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <div class="form-group">
                                <label for="role">
                                    <p class="text-left">Change Role</p>
                                </label>
                                <select class="form-control" name="role" id="role">
                                    @foreach ($role as $item)
                                        <option value="{{ $item }}" @if ($user->role == $item) selected @endif>{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-remove">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="my-2">Are you sure to remove this user?&hellip;</p>
                    <div class="d-block text-right">
                        <form action="{{ route('remove') }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary">Yes, I'm sure</button>
                        </form>
                    </div>
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

            $.get("{{ route('userStratistic', $user->id) }}", function(data, status) {
                $.map(data.suceedOrder, function(v, i) {
                    $('#suceed_order').val(v);
                });
                $.map(data.cenceledOrder, function(v, i) {
                    $('#cenceled_order').val(v);
                });
                $.map(data.suceedOrderBeever, function(v, i) {
                    $('#suceed_beever').val(v);
                });
                $.map(data.cenceledOrderBeever, function(v, i) {
                    $('#cenceled_beever').val(v);
                });
            });

            if (
                $('#suceed_order').val() == '' ||
                $('#cenceled_order').val() == '' ||
                $('#suceed_beever').val() == '' ||
                $('#cenceled_beever').val() == ''
            ) {

                $('#suceed_order').val('0');
                $('#cenceled_order').val('0');
                $('#suceed_beever').val('0');
                $('#cenceled_beever').val('0');

            }
        })
    </script>
@endsection
