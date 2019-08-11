@extends('adminlte::page')

@section('title', 'Halaman Admin')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')
<section class="content content-center">
<div class="row">
    <!---Income-->
    <div class="col-md-4">
        <div class="info-box">
                            <a href="http://localhost/laravel/aurorakutansi/reports/income-summary"><span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Inbound</span>
                {{-- <span class="info-box-number">Rp0,00</span> --}}
                <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka Faktur: Rp0,00<br>Faktur yang telah lewat: Rp0,00">
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                    {{-- <span class="progress-text">Piutang</span>
                    <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                </div>
            </div>
        </div>
    </div>

    <!---Expense-->
    <div class="col-md-4">
        <div class="info-box">
                            <a href="http://localhost/laravel/aurorakutansi/reports/expense-summary"><span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Outbound</span>
                {{-- <span class="info-box-number">Rp0,00</span> --}}

                <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka tagihan: Rp0,00<br>Tagihan terlambat: Rp0,00">
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>
                    {{-- <span class="progress-text">Hutang</span>
                    <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                </div>
            </div>
        </div>
    </div>

    <!---Profit-->
    <div class="col-md-4">
        <div class="info-box">
                            <a href="http://localhost/laravel/aurorakutansi/reports/income-expense-summary"><span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Kiriman Pending</span>
                {{-- <span class="info-box-number">Rp0,00</span> --}}

                <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka Keuntungan: Rp0,00<br>Keuntungan jatuh tempo: Rp0,00">
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                    </div>
                    {{-- <span class="progress-text">Mendatang</span>
                    <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <!---Income-->
        <div class="col-md-4">
            <div class="info-box">
                                <a href="http://localhost/laravel/aurorakutansi/reports/income-summary"><span class="info-box-icon bg-orange"><i class="fa fa-edit"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Stock Opname</span>
                    {{-- <span class="info-box-number">Rp0,00</span> --}}
                    <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka Faktur: Rp0,00<br>Faktur yang telah lewat: Rp0,00">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                        </div>
                        {{-- <span class="progress-text">Piutang</span>
                        <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                    </div>
                </div>
            </div>
        </div>

        <!---Expense-->
        <div class="col-md-4">
            <div class="info-box">
                                <a href="http://localhost/laravel/aurorakutansi/reports/expense-summary"><span class="info-box-icon bg-blue"><i class="fa fa-undo"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Bad Stock</span>
                    {{-- <span class="info-box-number">Rp0,00</span> --}}

                    <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka tagihan: Rp0,00<br>Tagihan terlambat: Rp0,00">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                        </div>
                        {{-- <span class="progress-text">Hutang</span>
                        <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                    </div>
                </div>
            </div>
        </div>

        <!---Profit-->
        <div class="col-md-4">
            <div class="info-box">
                                <a href="http://localhost/laravel/aurorakutansi/reports/income-expense-summary"><span class="info-box-icon bg-yellow"><i class="fa fa-hdd-o"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Penyimpanan</span>
                    {{-- <span class="info-box-number">Rp0,00</span> --}}

                    <div class="progress-group" title="" data-toggle="tooltip" data-html="true" data-original-title="Membuka Keuntungan: Rp0,00<br>Keuntungan jatuh tempo: Rp0,00">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                        </div>
                        {{-- <span class="progress-text">Mendatang</span>
                        <span class="progress-number">Rp0,00 / Rp0,00</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <!---Income, Expense and Profit Line Chart-->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Arus barang</h3>
                <div class="box-tools pull-right">
                    <button type="button" id="cashflow-monthly" class="btn btn-default btn-sm">Bulanan</button>&nbsp;&nbsp;
                    <button type="button" id="cashflow-quarterly" class="btn btn-default btn-sm">Tiga Bulan</button>&nbsp;&nbsp;
                    <input type="hidden" name="period" id="period" value="month">
                    <div class="btn btn-default btn-sm">
                        <div id="cashflow-range" class="pull-right">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                            <span>1 Jan 2019 - 31 Des 2019</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body" id="cashflow">
                <div class="charts" style="background: inherit;">
                    <div data-duration="500" class="charts-loader " style="display: none; position: relative; top: 120px; height: 0;">
                        <center>
                            <div class="loading-spinner" style="border: 3px solid #6da252; border-right-color: transparent;"></div>
                        </center>
                    </div>
                <div class="charts-chart">
                    <div><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="xBvCNKIskR" height="300" width="659" class="chartjs-render-monitor" style="display: block; width: 659px; height: 300px;"></canvas>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Pendapatan menurut Kategori</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="charts" style="background: inherit;">
                    <div data-duration="500" class="charts-loader " style="display: none; position: relative; top: 50px; height: 0;">
                        <center>
                            <div class="loading-spinner" style="border: 3px solid #6da252; border-right-color: transparent;"></div>
                        </center>
                    </div>
                <div class="charts-chart">
                    <div><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="IKCGJYfOTz" height="160" width="659" class="chartjs-render-monitor" style="display: block; width: 659px; height: 160px;"></canvas>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Biaya Berdasarkan Kategori</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="charts" style="background: inherit;">
                    <div data-duration="500" class="charts-loader " style="display: none; position: relative; top: 50px; height: 0;">
                        <center>
                            <div class="loading-spinner" style="border: 3px solid #6da252; border-right-color: transparent;"></div>
                        </center>
                    </div>
            <div class="charts-chart">
                <div><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="zZwYPJNHxb" height="160" width="659" class="chartjs-render-monitor" style="display: block; width: 659px; height: 160px;"></canvas>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Account Balance List-->
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Saldo rekening</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td class="text-left">Kas</td>
                                <td class="text-right">$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <!-- Latest Incomes List-->
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Pendapatan Terbaru</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <h5 class="text-center">Tidak ada catatan.</h5>
            </div>
        </div>
    </div>

    <!-- Latest Expenses List-->
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Biaya Terakhir</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <h5 class="text-center">Tidak ada catatan.</h5>
            </div>
        </div>
    </div>
</div>

        </section>
@stop
