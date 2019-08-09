@extends('layouts.app')
@section('content')
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif
 <h1>Selamat datang </h1>
@endsection
