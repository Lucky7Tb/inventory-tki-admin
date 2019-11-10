@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>{{$dataItemGoodCondition}}</p>
                    </div>
                    <p class="text-black">Barang kondisi baik</p>
                    <div class="text-center">
                      <i class="mdi mdi-briefcase" style="font-size:50px"></i>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>{{$dataItemBadCondition}}</p>
                    </div>
                    <p class="text-black">Barang kondisi tidak baik</p>
                    <div class="text-center">
                      <i class="mdi mdi-briefcase-minus" style="font-size:50px"></i>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>{{$dataBorrowing}}</p>
                    </div>
                    <p class="text-black">Peminjaman</p>
                    <div class="text-center">
                      <i class="mdi mdi-toolbox" style="font-size:50px"></i>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>{{$dataStudent}}</p>
                    </div>
                    <p class="text-black">Siswa</p>
                    <div class="text-center">
                      <i class="mdi mdi-account" style="font-size:50px"></i>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-12 equel-grid">
                <div class="grid">
                    <div class="grid-body">
                      <h2 class="grid-title">Statistik peminjaman</h2>
                      <div class="item-wrapper">
                        <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
  <script>
      var BarData = {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: '# Peminjaman',
          data: [{{$dataStatistikBorrowing['Bulan 1']}}, {{$dataStatistikBorrowing['Bulan 2']}}, {{$dataStatistikBorrowing['Bulan 3']}}, {{$dataStatistikBorrowing['Bulan 4']}}, {{$dataStatistikBorrowing['Bulan 5']}}, {{$dataStatistikBorrowing['Bulan 6']}}, {{$dataStatistikBorrowing['Bulan 7']}}, {{$dataStatistikBorrowing['Bulan 8']}}, {{$dataStatistikBorrowing['Bulan 9']}}, {{$dataStatistikBorrowing['Bulan 10']}}, {{$dataStatistikBorrowing['Bulan 11']}}, {{$dataStatistikBorrowing['Bulan 12']}}],
          backgroundColor: chartColors,
          borderColor: chartColors,
          borderWidth: 0
        }]
      };
      var barChartCanvas = $("#chartjs-bar-chart").get(0).getContext("2d");
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: BarData,
        options: {
          legend: false
        }
      });
  </script>
@endpush