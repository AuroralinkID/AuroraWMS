@extends('adminlte::page')
@section('title')
    AuroraWMS | Produk
@endsection
@section('content_header')
<h1>
    <span class="fa  fa-cube"></span> Produk
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Produk <span style="margin: 19px;"></h3>
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
                                        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                        <div class="box-body">
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Nama</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Nama Jenis Perusahaan" required="required" name="nama" type="text" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Deskripsi</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Deskripsi" required="required" name="deskripsi" type="textarea" id="deskripsi">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Harga Jual</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Deskripsi" required="required" name="harga_jual" type="money" id="harga_jual">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Harga beli</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Deskripsi" required="required" name="harga_beli" type="money" id="harga_beli">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Exp. Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Deskripsi" required="required" name="exp_date" type="date" id="exp_date">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Kategori Produk</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                        <option value="#">-- Pilih Kategori Produk --</option>
                                                        @foreach (\App\Kategori::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Varian Produk</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="varian_id" class="form-control select2" name="varian_id">
                                                        <option value="#">-- Pilih varian Produk --</option>
                                                        @foreach (\App\Varian::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Satuan Produk</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="satuan_id" class="form-control select2" name="satuan_id">
                                                        <option value="#">-- Pilih Satuan Produk --</option>
                                                        @foreach (\App\Satuan::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Kubikasi Produk</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="jenis_id" class="form-control select2" name="jenis_id">
                                                        <option value="#">-- Pilih Kubikasi Produk --</option>
                                                        @foreach (\App\Kubikasi::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Supplier</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="supplier_id" class="form-control select2" name="supplier_id">
                                                        <option value="#">-- Pilih Satuan Produk --</option>
                                                        @foreach (\App\Supplier::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Ned</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="ned_id" class="form-control select2" name="ned_id">
                                                        <option value="#">-- Pilih Ned --</option>
                                                        @foreach (\App\Ned::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                        <input class="form-control" placeholder="Upload Gambar Produk"  name="gambar" type="file" id="gambar"  enctype="multipart/form-data">
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gambar</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barcode</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sku</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Harga Jual</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Harga Beli</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Stock</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($produk ->count())
                        @foreach($produk  as $key => $jn)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$jn->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset('image/'.$jn->gambar)}}" style="width:100px;height:100px;" class="profile-user-img img-responsive img-circle"></td>
                            <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($jn->barcode, 'C39')}}" height="30" width="100"></td>
                            <td>{{$jn->sku}}</td>
                            <td>{{$jn->nama}}</td>
                            <td>Rp. {{$jn->harga_jual}}</td>
                            <td>Rp. {{$jn->harga_beli}}</td>
                            <td>{{$jn->stock}} {{$jn->satuan['name']}}</td>

                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $jn->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $jn->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $jn->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Produk <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($jn->barcode, 'C39')}}" height="50" width="200">
                                                        <div class="text-center">
                                                            <h3><strong>{{$jn->nama}} ({{$jn->sku}})</strong></h3>
                                                            <img src="{{asset('image/'.$jn->gambar)}}" style="width:300px;padding:10px;height:300px;margin-top:10px";><br><br>
                                                        </div><!--text-center -->
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                                <table class="table table-bordered">
                                                                        <tr>
                                                                            <td><b>Nama </b></td>
                                                                            <td>{{$jn->nama}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Deskripsi </b></td>
                                                                            <td>{{ $jn->deskripsi }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Harga </b></td>
                                                                            <td>Rp. {{ $jn->harga_beli }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Kubikasi </b></td>
                                                                            <td>{{ $jn->kubikasi['nama'] }} ({{ $jn->kubikasi['panjang'] }} X {{ $jn->kubikasi['lebar'] }} X {{ $jn->kubikasi['tinggi'] }})</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Supplier </b></td>
                                                                            <td>{{ $jn->supplier['kode_supplier'] }} {{ $jn->supplier['name'] }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Varian </b></td>
                                                                            <td>{{ $jn->varian{'name'} }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Satuan </b></td>
                                                                            <td>{{ $jn->satuan['name'] }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Kategori </b></td>
                                                                            <td>{{ $jn->kategori['name'] }}</td>
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
                            <div  id="myEditModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Jenis <strong>{{$jn->name}}</strong><span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                        <form method="POST" action="{{ route('produk.update', $jn->id) }}" enctype="multipart/form-data" files="true">
                                                            <input name="_method" type="hidden" value="PATCH">
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
                                                                <label for="description" class="control-label">Deskripsi</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="deskripsi" type="text" value="{{$jn->deskripsi}}" id="deskripsi">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Harga Jual</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="harga_jual" type="money" value="{{$jn->harga_jual}}" id="harga_jual">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Harga Beli</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="harga_beli" type="money" value="{{$jn->harga_beli}}" id="harga_beli">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="description" class="control-label">Exp. Date</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                                                                        <input class="form-control" placeholder="Masukkan Keterangan" required="required" name="exp_date" type="date" value="{{$jn->exp_date}}" id="exp_date">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                    <label for="name" class="control-label">Kategori produk</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                        <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                                            <option value="#">-- Pilih Kategori produk --</option>
                                                                            @foreach (\App\Kategori::all() as $jp)
                                                                            <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                            @endforeach
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6 required ">
                                                                        <label for="name" class="control-label">Varian Produk</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                            <select id="varian_id" class="form-control select2" name="varian_id">
                                                                                <option value="#">-- Pilih Varian Produk --</option>
                                                                                @foreach (\App\Varian::all() as $jp)
                                                                                <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                                @endforeach
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Satuan produk</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="satuan_id" class="form-control select2" name="satuan_id">
                                                                        <option value="#">-- Pilih Satuan produk --</option>
                                                                        @foreach (\App\Satuan::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Kubikasi produk</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="kubikasi_id" class="form-control select2" name="kubikasi_id">
                                                                        <option value="#">-- Pilih Kubikasi Produk --</option>
                                                                        @foreach (\App\Kubikasi::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->nama}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Supplier</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="supplier_id" class="form-control select2" name="supplier_id">
                                                                        <option value="#">-- Pilih Supplier --</option>
                                                                        @foreach (\App\Supplier::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                <label for="name" class="control-label">Near Expired Date</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="ned_id" class="form-control select2" name="ned_id">
                                                                        <option value="#">-- Pilih Ned --</option>
                                                                        @foreach (\App\Ned::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 required ">
                                                                    <label for="name" class="control-label">Gambar <i> ({{$jn->gambar}})</i></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                        <input class="form-control" placeholder="Upload Logo"  name="gambar" type="file" value="{{asset('image/'.$jn->gambar)}}" id="gambar" files="true" enctype="multipart/form-data">
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
                                                    <h3>Yakin Mau Menghapus<strong> {{$jn->nama}}({{$jn->sku}}) </strong>?</h3>
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
                                            <form method="post" action="{{ route('produk.destroy',$jn->id) }}" style="margin: 19px;">
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
