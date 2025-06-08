<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion des costss </title>
           <!--  css adding -->

   <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.css') }}" />
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

<!--  Table Starts -->
     <div class="container" style="min-height:500px;">
        <h1 class="title">costs</h1>
         <div class="container contact">	
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
               <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                         <h3 class="panel-title"></h3>
                        </div>
                       <div >
                       
                          <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un costs </button>
                        </div>
                   </div>
                </div> 
            
                <div class="employee-table-container">
                    <div class="table-header">
                      <h3 class="table-title">Liste des costs</h3>
                    </div>
                    
                    <table id="myTable" class="employee-table display">
                      <thead class="thead">
                        <tr class="list">
                          <th>ID</th>
                          <th>nom frais</th>
                          <th>prix</th>
                          <th>Quantity</th>
                          <th>prix Toutale</th>
                          <th>Actions</th>
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
<!--  Table Starts -->

              
<!------------ Add Employee Modal Starts-------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ajouter un costs</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="costs-form" method="post">
                          <div class="row">
                              <div class="col-lg">
                                  <label>Nom</label>
                                  <input type="text" name="nom" id="nom" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                              <div class="col-lg">
                                  <label>prix</label>
                                  <input type="decmla" name="prix" id="prix" class="form-control" required minlength="2" >
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Quantity</label>
                                  <input type="number" name="Quantity" id="Quantity" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                         
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="costs-form">Enregistrer</button>
                  </div>
              </div>
          </div>
        </div>
       
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Modifier costs</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="edit-form" method="post">
                          <input type="hidden" id="edit-id" name="id">
                          <div class="row">
                              <div class="col-lg">
                                  <label>Nom</label>
                                  <input type="text" name="nom" id="edit-nom" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                              <div class="col-lg">
                                  <label>prix</label>
                                  <input type="text" name="prix" id="edit-prix" class="form-control" required minlength="2" >
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Quantity</label>
                                  <input type="number" name="Quantity" id="edit-Quantity" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="edit-form">Modifier</button>
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
  var table = $('#myTable').DataTable({
      ajax: {
          url: "{{ route('costs-action') }}",
          method: "POST",
          dataType: "json",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          "dataSrc": function (response) {
              if (response.status === 200) {
                  return response.Costs;
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
          { "data": "prix" },
          { "data": "Quantity" },
           { "data": "date" },
          { 
              "data": "null",
              "render": function(data, type, row) {
                return (row.prix * row.Quantity).toFixed(2);
              }
          },
        
          {
               "data": null,
              "render": function (data, type, row) {
                  return `<ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">

        <li><a  href="#" class=" dropdown-item   edit-btn" 
                        data-id="${data.idcosts}" 
                        data-nom="${data.nom}" 
                        data-prix="${data.prix}" 
                        data-quantity="${data.Quantity}" 
                       
                       >
                        <i class="bi bi-pencil-square"></i>  edit </a></li>  
        <li><hr class="dropdown-divider"></li>
        <li><a  href="#"class=" dropdown-item   delete-btn" data-id="${data.idcosts}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul>  ` 
              }
          }
       ]
  });
  $('#myTable tbody').on('click', '.details-btn', function () {
    const data = $(this).data();
      $('#details-prenom').text(data.prix);
      $('#details-Quantity').text(data.Quantity);
      $('#details-nom').text(data.nom);
      // Set status badge
      let statusBadge = $('#details-status');
      statusBadge.text(data.statut);
      statusBadge.removeClass('badge-active badge-inactive badge-conge');
      $('#detailsModal').modal('show');
      
  });

  // Delete employee from details modal


  // Edit data
  $('#myTable tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var nom = $(this).data('nom');
    
      var prix = $(this).data('prix');
      var Quantity = $(this).data('quantity');
     
    
      $('#edit-id').val(id);
      $('#edit-prix').val(prix);
      $('#edit-Quantity').val(Quantity);
      $('#edit-nom').val(nom);
     
     
      
      $('#editModal').modal('show');
  });
 
  // Add employee form submission
  $('#costs-form').submit(function (e) {
      e.preventDefault();
      
      // Validate all fields before submission
      let isValid = true;
      const employeedata = new FormData(this);
      
      $.ajax({
          url: "{{ route('addcosts') }}",
          method: 'post',
          data: employeedata,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              if (response.status == 200) {
                  alert("Enregistré avec succès");
                  $('#costs-form')[0].reset();
                  $('#exampleModal').modal('hide');
                  $('#myTable').DataTable().ajax.reload();
              } else {
                  alert("Erreur: " + response.message);
              }
          },
          error: function(xhr) {
              alert("Erreur: " + xhr.responseText);
          }
      });
  });

  // Edit employee form submission
  $('#edit-form').submit(function (e) {
      e.preventDefault();
      

      
     

   
      
      const employeedata = new FormData(this);
      
      $.ajax({
          url: "{{ route('updatecosts') }}",
          method: 'POST',
          data: employeedata,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              if (response.status === 200) {
                  alert(response.message);
                  $('#edit-form')[0].reset();
                  $('#editModal').modal('hide');
                  $('#myTable').DataTable().ajax.reload();
              } else {
                  alert(response.message);
              }
          },
          error: function(xhr) {
              alert("Erreur: " + xhr.responseText);
          }
      });
  });

  // Delete employee
  $(document).on('click', '.delete-btn', function() {
      var id = $(this).data('id');
      
      if (confirm('Êtes-vous sûr de vouloir supprimer cet costs?')) {
          $.ajax({
              url: "{{ route('deletecosts') }}",
              type: 'DELETE',
              data: {id: id},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                  if (response.status === 200) {
                      alert(response.message);
                      $('#myTable').DataTable().ajax.reload();
                  } else {
                      alert(response.message);
                  }
              },
              error: function(xhr) {
                  alert("Erreur: " + xhr.responseText);
              }
          });
      }
  });

});
</script>
</body>
</html>