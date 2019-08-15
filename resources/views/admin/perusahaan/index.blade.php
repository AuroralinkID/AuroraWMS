@extends('adminlte::page')
@section('title')
@section('content_header')
<h1>
    <span class="fa fa-building-o"></span> Perusahaan
    <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Perusahaan</a>
</h1>
<div class="text-right">
    <a href="#" data-toggle="modal" data-target="#myExpModal" class="btn-sm btn-success"><span class="fa fa-download"></span> Export</a>
    <a href="#" data-toggle="modal" data-target="#myImpModal" class="btn-sm btn-success"><span class="fa fa-upload"></span> Import</a>
</div>
@stop
@section('content')

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
                            <h3 class="modal-title" id="myModalLabel">Tambah Perusahaan  <span style="margin: 19px;"></h3>
                                    <div class="box box-warning">
                                            @if ($message = Session::get('info'))
                                            <div class="alert alert-info alert-block">
                                                <button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <img src="{{asset('image/upload'.$perusahaan->getLogo())}}">
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
                                            <form method="POST" action="{{ route('perusahaan.store') }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Nama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Nama Perusahaan" required="required" name="name" type="text" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Alamat</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Alamat Perusahaan" required="required" name="alamat" type="text" id="alamat">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Telepon</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Telepon Perusahaan" required="required" name="telepon" type="text" id="telepon">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Email Perusahaan" required="required" name="email" type="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Website</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Website Perusahaan" required="required" name="website" type="text" id="website">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Npwp</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                        <input class="form-control" placeholder="Masukkan Npwp Perusahaan" required="required" name="npwp" type="text" id="npwp">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Jenis Perusahaan</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="jenis_id" class="form-control select2" name="jenis_id">
                                                        <option value="#">-- Pilih Jenis Perusahaan --</option>
                                                        @foreach (\App\Jenis::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Kategori Perusahaan</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                        <option value="#">-- Pilih Kategori Perusahaan --</option>
                                                        @foreach (\App\Kategori::all() as $kp)
                                                        <option value="{{$kp->id}}">{{$kp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">LOGO <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                        <input class="form-control" placeholder="Upload Logo Perusahaan" required="required" name="logo" type="file" id="logo" enctype="multipart/form-data">
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Alamat</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Telepon</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Website</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Jenis Perusahaan</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($perusahaan->count());
                        @foreach($perusahaan as $key => $pt)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$pt->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td>{{$pt->name}}</td>
                            <td>{{$pt->alamat}}</td>
                            <td>{{$pt->telepon}}</td>
                            <td>{{$pt->website}}</td>
                            <td>{{$pt->jenis['name']}}</td>
                            <td>{{$pt->kategori['name']}}</td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $pt->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $pt->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $pt->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$pt->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel"><span style="margin: 19px;" class="fa fa-building-o"> Detail Perusahaan  </h3>
                                                <div class="box box-warning">
                                                    <div class="text-center"><img src="{{asset('image/'.$pt->logo)}}" style="width:300px;padding:10px;height:100px;margin-top:10px";><br><br></div><!--text-center -->
                                                    <div class="modal-body">
                                                            <div class="box-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td><b>Nama </b></td>
                                                                    <td>:</td>
                                                                    <td>{{$pt->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Alamat </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Telepon </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Email </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Website </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->website }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Npwp </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->npwp }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Type </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->jenis['name'] }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Kategori </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $pt->kategori['name'] }}</td>
                                                                </tr>
                                                            </table>
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
                            <div  id="myEditModal{{$pt->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Data Perusahaan <span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                        <form method="POST" action="{{ route('perusahaan.update', $pt->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                            {{method_field('patch')}}
                                                            {{csrf_field()}}
                                                            <div class="box-body">
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="name" type="text" value="{{$pt->name}}" id="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Alamat</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Alamat" required="required" name="alamat" type="text" value="{{$pt->alamat}}" id="alamat">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Telepon</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Telepon" required="required" name="telepon" type="number" value="{{$pt->telepon}}" id="telepon">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Email</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Email" required="required" name="email" type="email" value="{{$pt->email}}" id="email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Website</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Website" required="required" name="website" type="text" value="{{$pt->website}}" id="website">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Npwp</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Npwp" required="required" name="npwp" type="number" value="{{$pt->npwp}}" id="npwp">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Jenis Perusahaan</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="jenis_id" class="form-control select2" name="jenis_id">
                                                                        <option value="#">-- Pilih Jenis Perusahaan --</option>
                                                                        @foreach (\App\Jenis::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Kategori Perusahaan</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                                        <option value="#">-- Pilih Kategori Perusahaan --</option>
                                                                        @foreach (\App\Kategori::all() as $kp)
                                                                        <option value="{{$kp->id}}" selected="selected">{{$kp->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Logo <i> ({{$pt->logo}})</i></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                    <input class="form-control" placeholder="Upload Logo"  name="logo" type="file" value="{{asset('image/'.$pt->logo)}}" id="logo" enctype="multipart/form-data">
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
                            <div  id="myHapusModal{{$pt->id}}" class="modal modal-danger fade" role="document">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="text-center">
                                                    <h3>Yakin Mau Menghapus<strong> {{$pt->name}} </strong>?</h3>
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
                                            <form method="post" action="{{ route('perusahaan.destroy',$pt->id) }}" style="margin: 19px;">
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
                {{ $perusahaan->links() }}
        </ul> --}}

</div>
@stop

