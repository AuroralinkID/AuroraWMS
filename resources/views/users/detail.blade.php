@extends('adminlte::page')
@section('content_header')
<h1>Detail Pengguna  <span style="margin: 19px;"></h1>
@endsection

@section('content')
<div class="box box-warning">
        <div class="box-body">
                <div class="form-group col-md-6 required ">
                <label for="name" class="control-label">Nama :</label>
                {{$user->name}}
                </div>
                <div class="form-group col-md-6 required ">
                <label for="email" class="control-label">E-mail :</label>
                {{$user->email}}
                </div>
</div>
@endsection
