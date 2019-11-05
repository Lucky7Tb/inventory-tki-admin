@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>43%</p>
                      <p>+15.7%</p>
                    </div>
                    <p class="text-black">Barang</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="45" id="stat-line_2"></canvas>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>43%</p>
                      <p>+15.7%</p>
                    </div>
                    <p class="text-black">Peminjaman</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="90" id="stat-line_1"></canvas>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>43%</p>
                      <p>+15.7%</p>
                    </div>
                    <p class="text-black">Kategori barang</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="90" id="stat-line_3"></canvas>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>43%</p>
                      <p>+15.7%</p>
                    </div>
                    <p class="text-black">Ruangan</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="90" id="stat-line_4"></canvas>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-12 equel-grid">
                <div class="grid">
                    <div class="grid-body">
                      <h2 class="grid-title">Bar Chart</h2>
                      <div class="item-wrapper">
                        <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
