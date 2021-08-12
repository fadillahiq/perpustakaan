@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Buku</h4>
          </div>
          <div class="card-body">
            {{ $total_buku }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Anggota</h4>
          </div>
          <div class="card-body">
            {{ $total_anggota }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-bookmark"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Penerbit</h4>
          </div>
          <div class="card-body">
            {{ $total_penerbit }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Peminjaman</h4>
          </div>
          <div class="card-body">
            {{ $total_peminjaman }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row">
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">Total Buku Berdasarkan Penerbit</div>
                                    <div class="card-body" style="height: 420px">
                                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                            </div>
                                        </div> <canvas id="donut-chart" width="299" height="100" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row">
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="col-sm-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">Peminjaman</div>
                                        <div class="card-body" style="height: 420px">
                                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                </div>
                                            </div> <canvas id="bar-chart" width="299" height="100" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
@push('scripts')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    var label_donuts = '{!! json_encode($label_donuts) !!}';
    var data_donuts = '{!! json_encode($data_donuts) !!}';
    $(document).ready(function() {
        var ctx = $("#donut-chart");
        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: JSON.parse(label_donuts),
                datasets: [{
                    data: JSON.parse(data_donuts),
                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            }
        });
    });
</script>
<script>
    var label_bar = '{!! json_encode($label_bar) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';
    $(document).ready(function() {
        var ctx = $("#bar-chart");
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: JSON.parse(data_bar)
            },
        });
    });
</script>
@endpush
