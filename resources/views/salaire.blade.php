<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion des projets</title>
  <!--  css adding -->


<link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
<link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.css') }}" />
<link rel="stylesheet" href="{{ asset('css/font/bootstrap-icons.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/dataTables.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>


@include('layouts.sidebar')
@include('layouts.header')

<!--  Table Starts -->
<div class="container" style="min-height:500px;">
    <h1 class="title">projets</h1>
    <div class="container contact">	
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title"></h3>
                    </div>
                </div>
            </div> 

                <form id="salaire-form" method="post" >
                    @csrf
                     <div class="row">
                              <div class="col-lg">
                       
                            <label>Date Début</label>
                            <input type="date" name="dateDebut" id="dateDebut" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>
<div class="col-lg">
                            <label>Date Fin</label>
                            <input type="date" name="dateFin" id="dateFin" class="form-control" required>
                            <small class="text-danger d-none" id="date_fin_error"></small>
                        </div>
                       
 <div class="col-lg">
     <label></label>
  <input type="button" class="btn btn-primary form-control" id="rechareg" value="rechareg">
                            <small class="text-danger d-none" id="date_fin_error"></small>

                        </div>
                    </div>
                </form>
         
     


            <div id="projet">
               <div class="employee-table-container">
                  <div class="table-header">
                    <h3 class="table-title">Liste des salaire </h3>
                  </div>
                 <table id="myTable" class="employee-table display">
                    <thead class="thead">
                        <tr class="list">
                            <th>ID</th>
                         
                            <th>Nom d'employee</th>
                            <th> heures de présence</th>
                            <th>heures d'absence</th>
                            <th>daya des vacances</th>
                            <th> salaire</th>
                            <th>Salaire total</th>
                        </tr>
                    </thead>
                    @csrf
                </table>

                <!--  pagination  -->
                <div class="pagination-container">
                    <div class="pagination-info">
                        Showing <span class="fw-bold">1</span> to <span class="fw-bold">5</span> of <span class="fw-bold">6</span> entries
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>


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

  <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="js/iconify-icon.min.js"></script>
<script>
$(document).ready(function () {
    // Validation functions
    function validateName(name) {
        return /^[a-zA-ZÀ-ÿ\s\-']{2,}$/.test(name);
    }

     var x=0;
    // Initialize Project DataTable  
      var table = $('#myTable').DataTable({
     
        ajax: {
            url: "{{ route('rech_salaire') }}",
            method: "post",
            data: function (d) {
            d.dateDebut = $('#dateDebut').val();
            d.dateFin = $('#dateFin').val();
        },
       
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "dataSrc": function (response) {
                if (response.status === 200) {
                    return response.salaire;
                } else {
                    return [];
                }
            }
        },
       
        "columns": [
          {
        "data": null,
        "render": function (data, type, row, meta) {
            return meta.row + 1; // يبدأ من 0
        }
    },
            { "data": "nom" },
            { "data": "presence" },

          {
        "data": null,
        "render": function(data, type, row) {
           const  x=240 - row.presence -  row.date_conge*8-64;
            return x;
        },
    },
            { "data": "date_conge" },
            { "data": "salaire" },
             {
        "data": null,
        "render": function(data, type, row) {
            const x = 240 - row.presence -  row.date_conge*8-64; // أو استخدم عدد الساعات الغائبة إن كان المقصود ذلك
        const netSalaire = row.salaire - (row.salaire * x / 176);
        return netSalaire.toFixed(2);
        },
        
    },
           

        ]
     
    }); 
$('#rechareg').on('click', function (e) {
    e.preventDefault();
    $('#myTable').DataTable().ajax.reload(); // فقط إعادة تحميل البيانات
});

});

</script>
</body>
</html>