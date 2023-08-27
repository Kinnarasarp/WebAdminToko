@extends('template.app')

@section('dashboard_active', 'active')

@section('title', 'Web Toko')

@section('content')
  <style>
    .card-body p {
      font-weight: 600;
    }
  </style>
  <div class="judul">
    <h1>Dashboard Admin</h1>
  </div>
  <div id="chart"></div>
  <div class="row mx-1" style="display: flex; justify-content: space-between;">
    <div class="col-6 card shadow-none bg-transparent border border-primary" style="width: 50%;">
      <div class="card-body">
        @if ($toko)
          <h5 class="card-title">{{ $toko->nama }}</h5>
          <p class="card-text">{{ $toko->alamat }}</p>
          <div class="social d-flex" style="gap: 20px;">
            <div>
              <p class="card-text">No.Telp</p>
              <p class="card-text">Instagram</p>
            </div>
            <div>
              <p class="card-text">:</p>
              <p class="card-text">:</p>
            </div>
            <div>
              <p class="card-text">{{ $toko->notelp }}</p>
              <p class="card-text">{{ $toko->instagram }}</p>
            </div>
          </div>
        @else
          <p class="card-text">Mohon Isi Data Toko di Tab Toko !</p>
        @endif
      </div>
    </div>

    <div class="col-6">
      <div class="row h-100">
        <div class="col-6">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('assets') }}/img/icons/unicons/chart-success.png" alt="chart success"
                    class="rounded">
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total Keuntungan</span>
              @php
                $total_keuntungan = 0;
                foreach ($transaksi as $t) {
                    $total_keuntungan += $t->keuntungan;
                }
              @endphp
              <h3 class="card-title mb-2">@currency($total_keuntungan)</h3>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('assets') }}/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                </div>
              </div>
              <span>Total Omzet</span>
              @php
                $total_omzet = 0;
                foreach ($penjualan as $p) {
                    $total_omzet += $p->grand_total;
                }
              @endphp
              <h3 class="card-title text-nowrap mb-1">@currency($total_omzet)</h3>
              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="omset" value="{{ json_encode($omset_per_month) }}">
    <input type="hidden" id="profit" value="{{ json_encode($profit_per_month) }}">
  </div>

  <script>
    let omset = $("#omset").val();
    let profit = $("#profit").val();



    var options = {
      series: [{
        name: "Omzet",
        data: JSON.parse(omset),

      }, {
        name: "Keuntungan",
        data: JSON.parse(profit),
      }],
      chart: {
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
      },
      yaxis: {
        labels: {
          formatter: function(val, series) {
            return "Rp" + val.toLocaleString("id-ID")
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>
@endsection
