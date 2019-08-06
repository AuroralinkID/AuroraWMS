@extends('adminlte::page')
@section('title')
@section('content_header')
<h1>Pengguna    <span style="margin: 19px;" class="new-button"><a href="{{route('users.create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;Tambah Baru</a></span></h1>
@stop
@section('content')
<div class="box box-warning">
        <div class="box-header with-border">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
                <form method="GET" action="http://localhost/laravel/aurorakutansi/auth/users" accept-charset="UTF-8" role="form">
                <div class="pull-left">
                    <span class="title-filter hidden-xs">Cari:</span>
                    <input class="form-control input-filter input-sm" placeholder="Ketik untuk mencari.." name="search" type="text">
                </div>
                <div class="pull-right">
                    <select class="form-control input-filter input-sm" name="role"><option value="" selected="selected">Semua Peran </option><option value="1">Admin</option><option value="2">Manager</option><option value="3">Customer</option></select>
                    <button type="submit" class="btn btn-sm btn-default btn-filter"><span class="fa fa-filter"></span> &nbsp;Menyaring</button>
                </div>
                </form>
            </div>
<div class="pull-left">
        <span class="title-filter hidden-xs">Menampilkan:</span>
        <select class="form-control input-filter input-sm" onchange="this.form.submit()" name="limit"><option value="10">10</option><option value="25" selected="selected">25</option><option value="50">50</option><option value="100">100</option></select>
        </div>
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date Creat</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($user->count())
                        @foreach($user as $key => $usr)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$usr->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}} </td>
                            <td>{{$usr->status}} </td>
                            <td>{{$usr->created_at}} </td>
                            <td>
                                    <a href="{{route('users.show', $usr->id)}}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="{{route('users.edit', $usr->id)}}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="{{route('users.destroy', $usr->id)}}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                {{-- <form action="{{ route('users.destroy',$usr->id) }}" method="POST">
                                    <a href="{{route('users.show', $usr->id)}}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="{{route('users.edit', $usr->id)}}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    @csrf
                                    @method('DELETE')
                                    <a type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
        </table>
        <ul class="pagination justify-content-center">
                {{ $user->links() }}
        </ul>
</div>
@stop
