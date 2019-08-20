@extends('adminlte::page')
@section('title')
    AuroraWMS | Dimensi
@endsection
@section('content_header')
<h1>
    <span class="fa fa-cube"></span> Dimensi Barang
    <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
</h1>
<div class="text-right">
    <a href="#" data-toggle="modal" data-target="#myExpModal" class="btn-sm btn-success"><span class="fa fa-download"></span> Export Data</a>
    <a href="#" data-toggle="modal" data-target="#myImpModal" class="btn-sm btn-success"><span class="fa fa-upload"></span> Import Data</a>
</div>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Dimensi Barang <span style="margin: 19px;"></h3>
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
                                        <form method="POST" action="{{ route('kubikasi.store') }}" >
                                                {{ csrf_field() }}
                                        <div class="box-body">
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Nama</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Nama Kubikasi" required="required" name="nama" type="text" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Panjang</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Panjang Barang" required="required" name="panjang" type="number" id="panjang">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Lebar</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Lebar Barang" required="required" name="lebar" type="number" id="lebar">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Tinggi</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Tinggi Barang" required="required" name="tinggi" type="number" id="tinggi">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Berat</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Berat Barang" required="required" name="berat" type="number" id="berat">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <!-- box-footer -->
                                        <div class="box-footer">
                                        <div class="col-md-12">
                                            <div class="form-group no-margin">
                                            <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span> Simpan</button>
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Panjang cm</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Lebar cm</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tinggi cm</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Berat kg</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Luas cm</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Aksi</th>
                </thead>
                <tbody>
                        @if($kubikasi->count())
                        @foreach($kubikasi as $key => $jn)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$jn->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td>{{$jn->nama}} ({{$jn->panjang}}cm X {{$jn->lebar}}cm X {{$jn->tinggi}}cm )</td>
                            <td>{{$jn->panjang}}</td>
                            <td>{{$jn->lebar}}</td>
                            <td>{{$jn->tinggi}}</td>
                            <td>{{$jn->berat}}</td>
                            <td>{{$jn->luas}}</td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $jn->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $jn->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $jn->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Dimensi <strong>{{$jn->nama}} ({{$jn->panjang}}cm X {{$jn->lebar}}cm X {{$jn->tinggi}}cm )</strong>  <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama : {{$jn->nama}}</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Panjang : {{$jn->panjang}}cm</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Lebar : {{$jn->lebar}}cm</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Tinggi : {{$jn->tinggi}}cm</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Berat : {{$jn->berat}}kg</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Luas : {{$jn->luas}}cm2</label>
                                                            </div>
                                                            <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Dimensi : {{$jn->dimensi}}cm3</label>
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
                            <div  id="myEditModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Dimensi <strong>{{$jn->nama}} ({{$jn->panjang}}cm X {{$jn->lebar}}cm X {{$jn->tinggi}}cm )</strong><span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                        <form method="POST" action="{{ route('kubikasi.update', $jn->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                            {{method_field('patch')}}
                                                            {{csrf_field()}}
                                                            <div class="box-body">
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Nama</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="nama" type="text" value="{{$jn->nama}}" id="nama">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Panjang</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" required="required" name="panjang" type="number" value="{{$jn->description}}" id="description">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Lebar</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" required="required" name="lebar" type="number" value="{{$jn->lebar}}" id="lebar">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Tinggi</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" required="required" name="tinggi" type="number" value="{{$jn->tinggi}}" id="tinggi">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Berat</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-subscript"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" required="required" name="berat" type="number" value="{{$jn->berat}}" id="berat">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Luas</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" name="luas" type="number" value="{{$jn->luas}}" id="luas" disabled='true'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Dimensi</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Panjang Barang" name="dimensi" type="number" value="{{$jn->dimensi}}" id="dimensi" disabled='true'>
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
                            <div  id="myHapusModal{{$jn->id}}" class="modal modal-danger fade" role="document">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="text-center">
                                                    <h3>Yakin Mau Menghapus<strong> {{$jn->nama}} ({{$jn->panjang}}cm X {{$jn->lebar}}cm X {{$jn->tinggi}}cm ) </strong>?</h3>
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
                                            <form method="post" action="{{ route('kubikasi.destroy',$jn->id) }}" style="margin: 19px;">
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
        </div>
    </div>
@endsection
