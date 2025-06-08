<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion des rapport </title>
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
        <h1 class="title">rapports</h1>
         <div class="container contact">	
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
               <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                         <h3 class="panel-title"></h3>
                        </div>
                       <div >
                       
                          <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un rapport </button>
                        </div>
                   </div>
                </div> 
            
                <div class="employee-table-container">
                    <div class="table-header">
                      <h3 class="table-title">Liste des rapports</h3>
                    </div>
                    
                    <table id="myTable" class="employee-table display">
                      <thead class="thead">
                        <tr class="list">
                          <th>ID</th>
                          <th>titre</th>
                          <th>dateCreation</th>
                          <th>description</th>
                          <th>contenu</th>
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
                      <h5 class="modal-title" id="exampleModalLabel">Ajouter un rapport</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="report-form" method="post">
                          <div class="row">
                              <div class="col-lg">
                                  <label>titre</label>
                                  <input type="text" name="titre" id="titre" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                              
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date de creation</label>
                                  <input type="date" name="dateCreation" id="dateCreation" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                          
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Description</label>
                                  <input type="text" name="description" id="description" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Contenu</label>
                                  <input type="text" name="contenu" id="contenu" class="form-control" required>
                              </div>
                          </div>
                          
                          
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="report-form">Enregistrer</button>
                  </div>
              </div>
          </div>
        </div>



        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Modifier Rapport</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="edit-form" method="post">
                          <input type="hidden" id="edit-id" name="id">
                          <div class="row">
                              <div class="col-lg">
                                  <label>titre</label>
                                  <input type="text" name="titre" id="edit-titre" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                              
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date de creation</label>
                                  <input type="date" name="dateCreation" id="edit-dateCreation" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Description</label>
                                  <input type="text" name="description" id="edit-description" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Contenu</label>
                                  <input type="text" name="contenu" id="edit-contenu" class="form-control" required>
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
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Détails du Rapport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                   
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>titre :</strong> <span id="details-titre"></span></p>
                                <p><strong>Description:</strong> <span id="details-description"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date de creation:</strong> <span id="details-datecreation"></span></p>
                                <p><strong>	Contenu:</strong> <span id="details-Contenu"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!--------------- Edit Employee Modal Ends-------->
        


  <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="js/iconify-icon.min.js"></script>


<script>


  // Initialize DataTable 
  var table = $('#myTable').DataTable({
      ajax: {
          url: "{{ route('rapportTable') }}",
          method: "POST",
          dataType: "json",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          "dataSrc": function (response) {
              if (response.status === 200) {
                  return response.reports;
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
          { "data": "titre" },
          { "data": "dateCreation" },
          { "data": "description" },
          { "data": "contenu" },
          
        
          {
               "data": null,
              "render": function (data, type, row) {
                  return `
                  <ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item    details-btn" 
                      
                        data-idrapport="${data.idRapport}" 
                        data-titre="${data.titre}" 
                        data-dateCreation="${data.dateCreation}" 
                        data-description="${data.description}" 
                        data-contenu="${data.contenu}">
                        <i class="bi bi-eye"></i> 
                    details  </a> </li>
        <li><a  href="#" class=" dropdown-item    edit-btn" 
                     
                        data-idrapport="${data.idRapport}" 
                        data-titre="${data.titre}" 
                        data-datecreation="${data.dateCreation}" 
                        data-description="${data.description}" 
                        data-contenu="${data.contenu}">
                       
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                         
        <li><hr class="dropdown-divider"></li>
        <li> <a href="#" class="dropdown-item   delete-btn" data-id="${data.idRapport}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul>  ` 
                   
                   
              }
          }
       
       ]
  }); 

  $('#myTable tbody').on('click', '.details-btn', function () {
  /*  const data = $(this).data();
    
    
    
      $('#details-titre').text(data.titre);
      $('#details-datecreation').text(data.datecreation);
      $('#details-description').text(data.description);
      $('#details-Contenu').text(data.contenu);
    
      
      $('#detailsModal').modal('show');*/
             var id = $(this).data('idrapport');
           window.location.href = '/rapportDétails/' + id;
      
  });

  // Delete employee from details modal

 

  // Edit data
  $('#myTable tbody').on('click', '.edit-btn', function () {
      var idRapport  = $(this).data('idrapport');
      var titre = $(this).data('titre');
      var dateCreation = $(this).data('datecreation');
      var description = $(this).data('description');
      var contenu = $(this).data('contenu');
      
      $('#edit-id').val(idRapport);
      $('#edit-titre').val(titre);
      $('#edit-dateCreation').val(dateCreation);
      $('#edit-description').val(description);
      $('#edit-contenu').val(contenu);
     
      
      $('#editModal').modal('show');
  });

  // Add rapport form submission
  $('#report-form').submit(function (e) {
      e.preventDefault();
    
      // Validate all fields before submission
      let isValid = true;

      // If any validation failed, stop submission
      if (!isValid) {
          alert('Veuillez corriger les erreurs dans le formulaire');
          return false;
      }
      
      const reportData = new FormData(this);
      
      $.ajax({
          url: "{{ route('add_report') }}",
          method: 'post',
          data: reportData,
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
                  $('#report-form')[0].reset();
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

  // Edit Report form submission
  $('#edit-form').submit(function (e) {
      e.preventDefault();
      
      /* // Validate all fields before submission
      let isValid = true;
      
      // Validate name
      if (!validateName($('#edit-nom').val())) {
          showError($('#edit-nom'), 'Nom invalide (lettres seulement, min 2 caractères)');
          isValid = false;
      }
      
      // Validate surname
      if (!validateName($('#edit-prénom').val())) {
          showError($('#edit-prénom'), 'Prénom invalide (lettres seulement, min 2 caractères)');
          isValid = false;
      }
      
      // Validate birth date
      if (!validateDate($('#edit-dateNaissance').val())) {
          showError($('#edit-dateNaissance'), 'Date de naissance invalide');
          isValid = false;
      }
      
      // Validate email
      if (!validateEmail($('#edit-email').val())) {
          showError($('#edit-email'), 'Email invalide');
          isValid = false;
      }
      
      // Validate phone
      if (!validatePhoneNumber($('#edit-telephone').val())) {
          showError($('#edit-telephone'), 'Téléphone invalide');
          isValid = false;
      }
      
      // Validate salary
      if (!validateSalary($('#edit-salaire').val())) {
          showError($('#edit-salaire'), 'Salaire invalide');
          isValid = false;
      }
      
      // Validate hire date
      if (!validateDate($('#edit-dateEmbauche').val())) {
          showError($('#edit-dateEmbauche'), 'Date d\'embauche invalide');
          isValid = false;
      }
      
      // If any validation failed, stop submission
      if (!isValid) {
          alert('Veuillez corriger les erreurs dans le ');
          return false;
      } */
      
      const reportdata = new FormData(this);
      
      $.ajax({
          url: "{{ route('update_Rapport') }}",
          method: 'POST',
          data: reportdata,
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

  // Delete report
   $(document).on('click', '.delete-btn', function() {
      var id = $(this).data('id');
      
      if (confirm('Êtes-vous sûr de vouloir supprimer ce rapport?')) {
          $.ajax({
              url: "{{ route('delete_Rapport') }}",
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


</script>
</body>
</html>