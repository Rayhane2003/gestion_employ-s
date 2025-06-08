<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion des budgets </title>
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
        <h1 class="title">budgets</h1>
         <div class="container contact">	
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
               <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                         <h3 class="panel-title"></h3>
                        </div>
                       <div >
                       
                          <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un budget </button>
                        </div>
                   </div>
                </div> 
            
                <div class="employee-table-container">
                    <div class="table-header">
                      <h3 class="table-title">Liste des budgets</h3>
                    </div>
                    
                    <table id="myTable" class="employee-table display">
                      <thead class="thead">
                        <tr class="list">
                          <th>ID</th>
                          <th>budget</th>
                          <th>date </th>
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
                      <h5 class="modal-title" id="exampleModalLabel">Ajouter un budget</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="budget-form" method="post">
                          <div class="row">
                              <div class="col-lg">
                                  <label>budget</label>
                                  <input type="text" name="budget" id="budget" class="form-control" required minlength="2" >
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="budget-form">Enregistrer</button>
                  </div>
              </div>
          </div>
        </div>
       
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Modifier budget</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="edit-form" method="post">
                          <input type="hidden" id="edit-id" name="id">
                          <div class="row">
                              <div class="col-lg">
                                  <label>budget</label>
                                  <input type="text" name="budget" id="edit-budget" class="form-control" required minlength="2" >
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
  // Validation functions
 


  // Initialize DataTable 
  var table = $('#myTable').DataTable({
      ajax: {
          url: "{{ route('budget-action') }}",
          method: "POST",
          dataType: "json",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          "dataSrc": function (response) {
              if (response.status === 200) {
                  return response.Budget;
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
          
          { "data": "budget" },
          { "data": "date" },
          {
               "data": null,
              "render": function (data, type, row) {
                  return `<ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
       
        <li><a  href="#" class=" dropdown-item   edit-btn" 
                        data-id="${data.idbudget}" 
                        data-budget="${data.budget}" 
                       >
                          <i class="bi bi-pencil-square"></i>  edit </a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a  href="#"class=" dropdown-item   delete-btn" data-id="${data.idbudget}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul>  ` 
              }
          }
       ]
  });

  $('#myTable tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var budget = $(this).data('budget');
    
      
    
      $('#edit-id').val(id);
     
      $('#edit-budget').val(budget);
     
     
      
      $('#editModal').modal('show');
  });
 
  // Add employee form submission
  $('#budget-form').submit(function (e) {
      e.preventDefault();
      

   

      const employeedata = new FormData(this);
      
      $.ajax({
          url: "{{ route('addbudget') }}",
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
                  $('#budget-form')[0].reset();
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
      
      // Validate all fields before submission
      let isValid = true;
      const employeedata = new FormData(this);
      $.ajax({
          url: "{{ route('updatebudget') }}",
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
      
      if (confirm('Êtes-vous sûr de vouloir supprimer cet budget?')) {
          $.ajax({
              url: "{{ route('deletebudget') }}",
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