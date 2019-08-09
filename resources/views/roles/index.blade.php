@extends('adminlte::page')
@section('title')
@section('content_header')
<h1>
    <span class="fa fa-check"></span> Role
    <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Role</a>
</h1>
<div class="text-right">
    <a href="#" data-toggle="modal" data-target="#myExpModal" class="btn-sm btn-success"><span class="fa fa-download"></span> Export</a>
    <a href="#" data-toggle="modal" data-target="#myImpModal" class="btn-sm btn-success"><span class="fa fa-upload"></span> Import</a>
</div>
@stop
@section('content')
@include('sweet::alert')

<!-- Include this after the sweet alert js file -->

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
            @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success: </strong>{{ Session::get('success') }}
            </div>
            @endif
              <!-- Ini awalan modal tambah -->
              <div  id="myAddModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Tambah Role  <span style="margin: 19px;"></h3>
                                    <div class="box box-warning">
                                            @if ($message = Session::get('info'))
                                            <div class="alert alert-info alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @endif
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                              <ul>
                                                  @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                  @endforeach
                                              </ul>
                                            </div><br />
                                          @endif
                                        <div class="modal-body">
                                            <div class="box-body">

                                            <!-- Start Form -->
                                            <form method="POST" action="{{ route('roles.store') }}" >
                                                    {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Nama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Nama Role" required="required" name="name" type="text" id="name">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 required ">
                                                <label for="display_name" class="control-label">Alias</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Alias" required="required" name="display_name" type="text" id="display_name">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 required ">
                                                    <label for="description" class="control-label">Keterangan</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                            <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="description" type="textarea" id="description">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <!-- box-footer -->
                                            <div class="box-footer">
                                            <div class="col-md-12">
                                                <div class="form-group no-margin">
                                                <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span> &nbsp;Simpan</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- /.box-footer -->
                                            </form>
                                            <!-- End Form -->
                                            </div><!-- box-body-->
                                        </div><!-- modal-body-->
                                    </div><!-- box-warning-->
                            </div><!--md-header-->
                        </div><!--md-content-->
                    </div><!--md-dialog-->
                </div><!--mydetailmodal-->
                <!-- Ini akhiran modal tambah -->
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Alias</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Keterangan</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($roles->count())
                        @foreach($roles as $key => $role)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$role->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $role->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $role->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $role->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$role->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Role  <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama : {{$role->name}}</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama : {{$role->display_name}}</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama : {{$role->description}}</label>
                                                            </div>
                                                        </div><!-- box-body-->
                                                    </div><!-- modal-body-->
                                                </div><!-- box-warning-->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
                                            </div><!-- md-footer -->
                                        </div><!--md-header-->
                                    </div><!--md-content-->
                                </div><!--md-dialog-->
                            </div><!--mydetailmodal-->
                            <!-- Ini akhiran modal detail -->

                            <!-- Ini awalan modal Edit -->
                            <div  id="myEditModal{{$role->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Data Pengguna  <span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                        @include('sweet::alert')
                                                <!-- Start Form -->
                                                        <form method="POST" action="{{ route('roles.update', $role->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                            {{method_field('patch')}}
                                                            {{csrf_field()}}
                                                            <div class="box-body">
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="name" type="text" value="{{$role->name}}" id="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="display_name" class="control-label">Alias</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Alias" required="required" name="display_name" type="text" value="{{$role->display_name}}" id="display_name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Keterangan</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="description" type="text" value="{{$role->description}}" id="description">
                                                                    </div>
                                                                </div>
                                                                <!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group no-margin">
                                                                        <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span>Simpan</button>
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.box-footer -->
                                                            </div>
                                                        </form>
                                                <!-- End Form -->
                                                </div>
                                            </div>
                                        </div><!--md-header-->
                                    </div><!--md-content-->
                                </div><!--md-dialog-->
                            </div><!--mydetailmodal-->
                            <!-- Ini akhiran modal Edit -->

                            <!-- Large modal  Hapus-->
                            <div  id="myHapusModal{{$role->id}}" class="modal modal-danger fade" role="document">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="text-center">
                                                    <h3>Yakin Mau Menghapus<strong> {{$role->display_name}} </strong>?</h3>
                                                </div>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div><br />
                                                @endif
                                            <form method="post" action="{{ route('roles.destroy',$role->id) }}" style="margin: 19px;">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                            <div class="modal-footer">
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Ya, Hapus</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal Hapus -->


                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
        </table>
        {{-- <ul class="pagination justify-content-center">
                {{ $roles->links() }}
        </ul> --}}

</div>
@stop

