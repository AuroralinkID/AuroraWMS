@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>
        Data Tables
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>

<button style="margin: 19px;" type="button" class="btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fa fa-plus"></span> Tambah Hak Akses</button>
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_length" id="example1_length">
    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select></label>
    </div>
</div>
<div class="col-sm-6 pull-right">
        <div id="example1_filter" class="dataTables_filter">
             <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
        </div>
    </div>
</div>
@stop
@section('content')
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Nama Display</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Deskripsi</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($hak->count())
                        @foreach($hak as $key => $hk)
                        <tr>
                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$hk->id}}"></td> --}}
                            <td>{{$key+1}}</td>
                            <td>{{$hk->name}}</td>
                            <td>{{$hk->display_name}} </td>
                            <td>{{$hk->description}} </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#myDetailModal" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                <a href="#" data-toggle="modal" data-target="#myEditModal" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                <a href="#" data-toggle="modal" data-target="#myHapusModal" class="btn-sm btn-primary"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
        </table>
@stop
