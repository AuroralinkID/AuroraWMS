@extends('adminlte::page')
@section('content_header')
<h1>Pengguna Baru  <span style="margin: 19px;"></h1>
@endsection
@section('content')
<section class="content content-center">
    <!-- Default box -->
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
            <form method="POST" action="{{ route('users.store') }}" >
                {{-- <input name="_token" type="hidden" value="K49nyQIj2ac2n0dzLugcRmye93TcNulx3kPPCjuX"> --}}
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

            {{-- <div class="form-group col-md-6 required ">
            <label for="locale" class="control-label">Bahasa </label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                    <select class="form-control select2-hidden-accessible" required="required" id="locale" name="locale" tabindex="-1" aria-hidden="true"><option value="">-Pilih Bahasa  -</option><option value="ar-SA">العربية</option><option value="bg-BG">български</option><option value="cs-CZ">Čeština</option><option value="da-DK">Dansk</option><option value="de-DE">Deutsch</option><option value="el-GR">Ελληνικά</option><option value="en-GB">English (GB)</option><option value="es-ES">Español</option><option value="es-MX">Español de México</option><option value="fa-IR">فارسی</option><option value="fr-FR">Français</option><option value="he-IL">עִבְרִית</option><option value="hr-HR">Hrvatski</option><option value="id-ID" selected="selected">Bahasa Indonesia</option><option value="it-IT">Italiano</option><option value="ja-JP">日本語</option><option value="ka-GE">ქართული</option><option value="ko-KR">한국어</option><option value="lt-LT">Lietuvių</option><option value="lv-LV">Latviešu valoda</option><option value="mk-MK">Македонски јазик</option><option value="nb-NO">Norsk Bokmål</option><option value="nl-NL">Nederlands</option><option value="pt-BR">Português do Brasil</option><option value="pt-PT">Português</option><option value="ro-RO">Română</option><option value="ru-RU">Русский</option><option value="sk-SK">Slovenčina</option><option value="sr-RS">Српски језик</option><option value="sq-AL">Shqip</option><option value="sv-SE">Svenska</option><option value="th-TH">ไทย</option><option value="tr-TR">Türkçe</option><option value="uk-UA">Українська</option><option value="ur-PK">اردو</option><option value="vi-VN">Tiếng Việt</option><option value="zh-CN">简体中文</option><option value="zh-TW">繁體中文</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 588px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-locale-container"><span class="select2-selection__rendered" id="select2-locale-container" title="Bahasa Indonesia">Bahasa Indonesia</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
            </div> --}}
{{--
            <div class="form-group col-md-6  " style="min-height: 59px">
            <label for="picture" class="control-label">Gambar </label>
                <div class="fancy-file">
                    <div class="fake-file">
                    <input class="fake-input form-control" type="text" placeholder="Tidak ada Berkas yang dipilih..." style="width: 207px; height: 34px;"><button type="button" class="btn btn-default" style="height: 34px;"><i class="icon-file glyphicon glyphicon-file"></i> Pilih Berkas</button>
                    </div>
                    <input class="form-control" name="picture" type="file" id="picture" style="width: 333px;">
                </div>
            </div> --}}

            {{-- <div class="form-group col-md-12 required ">
            <label for="companies" class="control-label">Perusahaan </label>
                <br>
                <div class="col-md-3">
                    <div class="icheckbox_square-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                        <input name="companies[]" type="checkbox" value="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                        <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                        </ins>
                    </div>
                    &nbsp; Auroralink
                </div>

                <div class="col-md-3">
                    <div class="icheckbox_square-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                        <input name="companies[]" type="checkbox" value="2" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                        <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                        </ins>
                    </div>
                    &nbsp; Fshn
                </div>
            </div> --}}
{{--
            <div class="form-group col-md-12 required ">
            <label for="roles" class="control-label">Peran </label>
                <br>
                <div class="col-md-3">
                    <div class="icheckbox_square-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input name="roles[]" type="checkbox" value="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> &nbsp; Admin
                    </div>
                    <div class="col-md-3">
                    <div class="icheckbox_square-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input name="roles[]" type="checkbox" value="2" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> &nbsp; Manager
                </div>
            </div>
 --}}


        {{-- <div class="form-group col-md-6  ">
        <label for="enabled" class="control-label">Generate Kata Sandi</label>
            <div class="input-group">
                <div class="btn-group radio-inline" data-toggle="buttons">
                <label id="auto_generate" class="btn btn-default">
                    <input name="enabled" type="radio" value="1" id="enabled">
                    <span class="radiotext">Ya</span>
                </label>
                <label id="enabled_0" class="btn btn-danger active">
                    <input checked="checked" name="enabled" type="radio" value="0" id="enabled">
                    <span class="radiotext">Tidak</span>
                </label>
            </div>
        </div>
    </div> --}}
</div>
<!-- /.box-body -->
<!-- box-footer -->
    <div class="box-footer">
        <div class="col-md-12">
            <div class="form-group no-margin">
            <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span> &nbsp;Simpan</button>
            <a href="{{ route('users.store') }}" class="btn btn-default"><span class="fa fa-times-circle"></span> &nbsp;Batal</a>
            </div>
        </div>
    </div>
<!-- /.box-footer -->
        </form>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        var app= new vue({
            el: '$app',
            data: {
                auto_password: true
            }
        });
    </script>
@endsection
