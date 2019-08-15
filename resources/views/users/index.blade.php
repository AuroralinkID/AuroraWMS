@extends('adminlte::page')
@section('title')
@section('content_header')
<h1>
    <span class="fa fa-user"></span> Pengguna
    <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah User</a>
</h1>
<div class="text-right">
<a href="#" data-toggle="modal" data-target="#myExpModal" class="btn-sm btn-success"><span class="fa fa-download"></span> Export</a>
<a href="#" data-toggle="modal" data-target="#myImpModal" class="btn-sm btn-success"><span class="fa fa-upload"></span> Import</a>
</div>
@stop
@section('content')
<div class="box box-warning">
        <div class="box-header with-border">
                @if(Session::has('success'))
                <div class="alert alert-success">
                <strong>Done: </strong>{{ Session::get('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-warning">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
              <!-- Ini awalan modal tambah -->
              <div  id="myAddModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Tambah Pengguna  <span style="margin: 19px;"></h3>
                                    <div class="box box-warning">
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
                                            <form method="POST" action="{{ route('users.store') }}" >
                                                    {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Nama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Nama" required="required" name="name" type="text" id="name">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 required ">
                                                <label for="email" class="control-label">E-mail</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                        <input class="form-control" placeholder="Masukkan E-mail" required="required" name="email" type="email" id="email">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 required ">
                                                <label for="password" class="control-label">Sandi</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Sandi" required="required" name="password" type="password" value="" id="password" : disabled="auto_password">
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6 required ">
                                                <label for="password_confirmation" class="control-label">Konfirmasi Sandi</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Konfirmasi Sandi" required="required" name="password_confirmation" type="password" value="" id="password_confirmation" : disabled="auto_password">
                                                    </div>
                                                </div>

                                                 <!-- /Checkbox -->
                                                 <div class="form-group col-md-6">
                                                     <div class="icheck-danger d-inline">
                                                            @foreach(\App\Role::all() as $r)
                                                            <input type="hidden" name="role{{$r->id}}" value="0">
                                                            <input class="form-check-input" type="checkbox" name="role" value="{{$r->id}}" style="position: relative;">
                                                            <label class="form-check-label" >{{$r->display_name}}</label>
                                                            @endforeach
                                                     </div>
                                                 </div>
                                                 <!-- /.Checkbox -->
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

                <!-- Form cari dan filter -->
                <div class="form-group">
                    <div class="input-group">
                        <form method="GET" action="#" accept-charset="UTF-8" role="form">
                            <div class="pull-left">
                                <select class="form-control input-filter input-sm" onchange="this.form.submit()" name="limit">
                                    <option value="10">10</option>
                                    <option value="25" selected="selected">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="pull-left">
                                    <input class="form-control input-filter input-sm" placeholder="Ketik untuk mencari.." name="search" type="text">
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-sm btn-default btn-filter"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                            <div class="pull-right">
                                <select class="form-control input-filter input-sm" name="role"><option value="" selected="selected"> Semua Peran </option>
                                <option value="1">Admin</option>
                            </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Form cari dan filter -->

        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Role</th>
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
                            <td>{{($usr->status ? 'Active' : 'Inactive')}} </td>
                            <td>
                                @foreach ($usr->roles as $rl)
                                {{$rl->name}},
                                @endforeach
                            </td>
                            <td>{{$usr->created_at}} </td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $usr->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $usr->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $usr->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$usr->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Pengguna  <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama :</label>
                                                                {{$usr->name}}
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="email" class="control-label">E-mail :</label>
                                                                {{$usr->email}}
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                @foreach ($usr->roles as $key => $rl)
                                                                <label for="email" class="control-label">Role {{$key+1}}:</label>
                                                                {{$rl->name}}
                                                                @endforeach
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
                            <div  id="myEditModal{{$usr->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Data Pengguna  <span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                <form method="POST" action="{{ route('users.update', $usr->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                    {{method_field('patch')}}
                                                    {{csrf_field()}}
                                                    <div class="box-body">
                                                        <div class="form-group col-md-6 required ">
                                                        <label for="name" class="control-label">Nama</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                            <input class="form-control" placeholder="Masukkan Nama" required="required" name="name" type="text" value="{{$usr->name}}" id="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 required ">
                                                        <label for="email" class="control-label">E-mail</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                <input class="form-control" placeholder="Masukkan E-mail" required="required" name="email" type="email" value="{{$usr->email}}" id="email">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6  ">
                                                        <label for="password" class="control-label">Sandi</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                <input class="form-control" placeholder="Masukkan Sandi" name="password" type="password" value="{{$usr->password}}" id="password">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6  ">
                                                        <label for="password_confirmation" class="control-label">Konfirmasi Sandi</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                <input class="form-control" placeholder="Masukkan Konfirmasi Sandi" name="password_confirmation" type="password" value="{{$usr->password}}" id="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <!-- /Checkbox -->
                                                   <div class="form-group">
                                                        <label for="roles" class="control-label"><span class="fa fa-user"></span>  ROLE </label>
                                                        <div class="form-check">
                                                            @foreach(\App\Role::all() as $r)
                                                            <input type="hidden" name="role{{$r->id}}" value="0">
                                                            <input class="form-check-input" type="checkbox" name="role" value="{{$r->id}}" style="position: relative;" @if($usr->roles->contains($r->id)) checked=checked @endif>
                                                            <label class="form-check-label" >{{$r->display_name}}</label>
                                                            @endforeach
                                                        </div>
                                                  </div>
                                                   <!-- /.Checkbox -->

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
                                                </form>
                                                <!-- End Form -->
                                                </div>
                                            </div>
                                        </div><!--md-header-->
                                    </div><!--md-content-->
                                </div><!--md-dialog-->
                            </div><!--mydetailmodal-->
                            <!-- Ini akhiran modal detail -->
                            <!-- Large modal  Hapus-->
                            <div  id="myHapusModal{{$usr->id}}" class="modal modal-danger fade" role="document">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="text-center">
                                                            <h3>Yakin Mau Menghapus<strong> {{$usr->display_name}} </strong>?</h3>
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
                                                <form method="POST" action="{{ route('users.destroy',$usr->id) }}" style="margin: 19px;">
                                                        @csrf
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
</div>
@stop
