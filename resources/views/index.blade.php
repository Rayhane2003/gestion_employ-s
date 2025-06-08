<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
   <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="{{ asset('css/font/bootstrap-icons.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>   
  <script src="{{ asset('js/sidebarmenu.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  @include('layouts.sidebar')
@include('layouts.header')
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card chart">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center gap-2 mb-4">
                            Traffic Overview
                            <span>
                                <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Traffic Overview"></iconify-icon>
                            </span>
                        </h5>
                        <div id="chart" >
                        </div>
                    </div>
                </div>
            </div>
        

        <div class="col-lg-12">
          <div class="card chart">
            <div class="card-body">
              <div class="vstack gap-4 mt-7 pt-2">
                <div>
                  <div class="hstack justify-content-between">
                    <span class="fs-3 fw-medium">pointage Count</span>
                    <h6 class="fs-3 fw-medium text-dark lh-base mb-0"> {{ $pointageCount }}%</h6>
                  </div>
                  <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-primary" style="width:  {{ $pointageCount }}%"></div>
                  </div>
                </div>
                <div>
                  <div class="hstack justify-content-between">
                    <span class="fs-3 fw-medium">absent Count</span>
                    <h6 class="fs-3 fw-medium text-dark lh-base mb-0">{{ $absentCount }}%</h6>
                  </div>
                  <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-secondary" style="width:  {{ $absentCount }}%"></div>
                  </div>
                </div>
                <div>
                  <div class="hstack justify-content-between">
                    <span class="fs-3 fw-medium">conge Count</span>
                    <h6 class="fs-3 fw-medium text-dark lh-base mb-0">{{ $congeCount }}%</h6>
                  </div>
                  <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    
                  <div class="progress-bar bg-success" style="width:  {{ $congeCount }}%"></div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        
        
      </div>
    </div>
 
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script src="{{ asset('js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('js/app.min.js') }}"></script>
 
 <script>
$(document).ready(function () {
    $.ajax({
        url: "{{ route('count') }}",
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            const data = response.data;

            let series = [];
            const colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8'];

            const months = [
              " ",  "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
            ];
          for (let i = 0; i < data.length; i++) {
  let year = data[i][0]; // السنة في العمود الأول
  let monthlyValues = data[i].slice(1); // باقي الأعمدة هي قيم الأشهر

  series.push({
    name:"year : "+ year,
    data: monthlyValues
  });
}

            const options = {
                chart: {
                    type: 'line',
                    height: 400
                },
                colors: colors.slice(0, series.length), // لضمان تطابق الألوان مع عدد السنوات
                series: series,
                xaxis: {
                   categories:months,
                    title: {
                        text: 'الشهر'
                    }
                },
                yaxis: {
                    title: {
                        text: 'الرصيد التنازلي للميزانية'
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                markers: {
                    size: 5
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (val) {
                             return val !== null ? val + ' DZ' : ' No data';
                        }
                    }
                },
                legend: {
                    position: 'top'
                }
            };

            const chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        },
        error: function (xhr, status, error) {
            console.error("حدث خطأ في جلب البيانات:", error);
        }
    });
});
</script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>

  