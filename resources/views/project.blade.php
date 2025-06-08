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
                    <div >
             <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalEquipe" btn-no-wrap px-4 py-2 fw-bold> Ajouter une équipe </button>
                    <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un projet </button>
                    </div>

                    
                </div>
            </div> 

            <form class="Listes" >
              <select  class="form-select" id="projet_equipe" >
                <option selected disabled>Listes</option>
                <option value="projet">projets</option>
                <option value="equipe">equipes</option>
              </select>
           
            </form>

            <div id="projet">
               <div class="employee-table-container">
                  <div class="table-header">
                    <h3 class="table-title">Liste des projets </h3>
                  </div>
                
                 <table id="myTable" class="employee-table display">
                    <thead class="thead">
                        <tr class="list">
                            <th>ID</th>
                            {{-- <th>Photo</th> --}}
                            <th>Nom d'équipe</th>
                            <th>Nom de projet</th>
                            <th> Description</th>
                            <th>Priorite</th>
                            <th>Budget</th>
                            <th> DateDebut</th>
                            <th>DateFin</th>
                            <th>Responsable</th>
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
        <div id="equipe">
            <div class="employee-table-container">
                <div class="table-header">
                    <h3 class="table-title">Liste des équipes </h3>
                </div>
                
                <table id="myTablek" class="employee-table display">
                    <thead class="thead">
                        <tr class="list">
                            <th>ID</th>
                            {{-- <th>Photo</th> --}}
                            <th>Nom d'équipe</th>
                            <th> Description</th>
                            <th> DateCreation</th>
                            <th>Responsable</th>
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
</div>

</div>
</div>
</div>
</div>

<!--  Table Ends -->

<!-- Add project Modal Starts-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form id="project-form" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Equipe</label>
                             <select name="equipe_id" id="equipe_id" class="form-control" required>
                                <option value="">Sélectionner une équipe</option>
                                @foreach($equipe as $team)
                                <option value="{{ $team->idEquipe }}">
                                    {{ $team->nomEquipe }} 
                                </option>
                                @endforeach
                            </select> 
                            <small class="text-danger d-none" id="employe_id_error"></small>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <label>Nom du projet </label>
                                <input type="text" name="nomProjet" id="nomProjet	" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                            <div class="col-lg">
                                <label>Description</label>
                                <input type="text" name="description" id="description" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <label>Priorite </label>
                                <input type="text" name="priorite" id="priorite	" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                            <div class="col-lg">
                                <label>Budget</label>
                                <input type="text" name="budget" id="budget" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                        </div>

                        <div class="col-lg">
                            <label>Responsable</label>
                            <input type="text" name="responsable" id="responsable" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                        </div>

                       
                       
                        <div class="col-lg-12 mb-3">
                            <label>Date Début</label>
                            <input type="date" name="dateDebut" id="dateDebut" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Date Fin</label>
                            <input type="date" name="dateFin" id="dateFin" class="form-control" required>
                            <small class="text-danger d-none" id="date_fin_error"></small>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="save-project-btn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<!-- Add leave Modal Ends-->

<!-- Add group Modal Starts-->
<div class="modal fade" id="exampleModalEquipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une équipe </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="team-form" method="post" >
                    @csrf
                    <div class="row">
                       {{-- <div class="col-lg-12 mb-3">
                            <label>Employé</label>
                             <select name="employe_id" id="employe_id" class="form-control" required>
                                <option value="">Sélectionner un employé</option>
                                @foreach($employe as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->prénom }} {{ $employee->nom }}
                                </option>
                                @endforeach
                            </select> 
                            <small class="text-danger d-none" id="employe_id_error"></small>
                        </div>--}}

                        <div class="row">
                            <div class="col-lg">
                                <label>Nom d'équipe </label>
                                <input type="text" name="nomEquipe" id="nomEquipe" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                            <div class="col-lg">
                                <label>Description</label>
                                <input type="text" name="description" id="description" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Date Creation</label>
                            <input type="date" name="dateCreation" id="dateCreation" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>

                       
                        <div class="col-lg">
                            <label>Responsable</label>
                            <input type="text" name="responsable" id="responsable" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="save-team-btn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<!-- Add leave Modal Ends-->


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModallLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modifier un projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-idProjet" name="idProjet">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Equipe</label>
                             <select name="equipe_id" id="edit-equipe_id" class="form-control" required>
                                <option value="">Sélectionner une équipe</option>
                                @foreach($equipe as $team)
                                <option value="{{ $team->idEquipe }}">
                                    {{ $team->nomEquipe }} 
                                </option>
                                @endforeach
                            </select> 
                            <small class="text-danger d-none" id="employe_id_error"></small>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <label>Nom du projet </label>
                                <input type="text" name="nomProjet" id="edit-nomProjet" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                            <div class="col-lg">
                                <label>Description</label>
                                <input type="text" name="description" id="edit-description" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <label>Priorite </label>
                                <input type="text" name="priorite" id="edit-priorite" class="form-control" required minlength="2" >
                            </div>
                            <div class="col-lg">
                                <label>Budget</label>
                                <input type="text" name="budget" id="edit-budget" class="form-control" required minlength="2">
                            </div>
                        </div>

                        <div class="col-lg">
                            <label>Responsable</label>
                            <input type="text" name="responsable" id="edit-responsable" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                        </div>

                       
                       
                        <div class="col-lg-12 mb-3">
                            <label>Date Début</label>
                            <input type="date" name="dateDebut" id="edit-dateDebut" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Date Fin</label>
                            <input type="date" name="dateFin" id="edit-dateFin" class="form-control" required>
                            <small class="text-danger d-none" id="date_fin_error"></small>
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
                <h5 class="modal-title" id="detailsModalLabel">Détails du projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                   
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nom Groupe :</strong> <span id="details-NomGroupe"></span></p>
                                <p><strong>Nom Projet :</strong> <span id="details-nomProjet"></span></p>
                                <p><strong>Description:</strong> <span id="details-description"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Priorite:</strong> <span id="details-priorite"></span></p>
                                <p><strong>	Budget:</strong> <span id="details-budget"></span></p>
                                <p><strong>	Responsable:</strong> <span id="details-responsable"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date Debut:</strong> <span id="details-dateDebut"></span></p>
                                <p><strong>	Date Fin:</strong> <span id="details-dateFin"></span></p>
                               
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



               
<div class="modal fade" id="editModalEquipes" tabindex="-1" role="dialog" aria-labelledby="editModallLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modifier un equipes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-formEquipes" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-idEquipes" name="idEquipes">
                    @csrf
                    <div class="row">
                        
                        <div class="row">
                            <div class="col-lg">
                                <label>Nom du equipes </label>
                                <input type="text" name="nomEquipes" id="edit-nomEquipes" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                            <div class="col-lg">
                                <label>Description</label>
                                <input type="text" name="description" id="edit-descriptionE" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                            </div>
                        </div>
                            <div class="col-lg">
                                <label>dateCreation </label>
                                <input type="date" name="dateCreation" id="edit-dateCreation" class="form-control" required minlength="2" >
                            </div>
                        <div class="col-lg">
                            <label>Responsable</label>
                            <input type="text" name="responsable" id="edit-responsableE" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                        </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" form="edit-formEquipes">Modifier</button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModalEquipes" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Détails du equipes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                   
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nom Groupe :</strong> <span id="details-NomGroupeE"></span></p>
                                <p><strong>Description:</strong> <span id="details-descriptionE"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date Creation:</strong> <span id="details-datecreation"></span></p>
                                <p><strong>	Responsable:</strong> <span id="details-responsableE"></span></p>
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

  <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="js/iconify-icon.min.js"></script>
<script>
$(document).ready(function () {
    // Validation functions
    function validateName(name) {
        return /^[a-zA-ZÀ-ÿ\s\-']{2,}$/.test(name);
    }

    function validateDate(dateStr) {
        if (!dateStr) return false;
        const date = new Date(dateStr);
        return date instanceof Date && !isNaN(date);
    }

    function validateDateRange(startDate, endDate) {
        if (!startDate || !endDate) return false;
        return new Date(startDate) <= new Date(endDate);
    }

    function showError(input, message) {
        const errorElement = $(`#${input.attr('id')}_error`);
        input.addClass('is-invalid');
        errorElement.removeClass('d-none').text(message);
    }

    function showSuccess(input) {
        const errorElement = $(`#${input.attr('id')}_error`);
        input.removeClass('is-invalid');
        errorElement.addClass('d-none').text('');
    }
  
    $('#edit-form').submit(function (e) {
      
      e.preventDefault();
      
      // Validate all fields before submission
      let isValid = true;
      const employeedata = new FormData(this);
      $.ajax({
          url: "{{ route('updateProject') }}",
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
   $('#edit-formEquipes').submit(function (e) {
      
      e.preventDefault();
      
      // Validate all fields before submission
      let isValid = true;
      const employeedata = new FormData(this);
      $.ajax({
          url: "{{ route('updateTeam') }}",
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
                  $('#edit-formEquipes')[0].reset();
                  $('#editModalEquipes').modal('hide');
                  $('#myTablek').DataTable().ajax.reload();
              } else {
                  alert(response.message);
              }
          },
          error: function(xhr) {
              alert("Erreur: " + xhr.responseText);
          }
      });
  });
    // Initialize Project DataTable  
      var table = $('#myTable').DataTable({
        ajax: {
            url: "{{ route('projetTable') }}",
            method: "post",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "dataSrc": function (response) {
                if (response.status === 200) {
                    return response.projects;
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
            { "data": "nomEquipe" },
            { "data": "nomProjet" },
            { "data": "description" },
            { "data": "priorite" },
            { "data": "budget" },

            { "data": "dateDebut" },
            { 
                "data": "dateFin",
                "render": function(data) {
                    return new Date(data).toLocaleDateString();
                }
            },
            { "data": "responsable" },

            
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item    details-btn" 
                      data-id="${data.idProjet}"
                      data-nomequipe="${data.nomEquipe}"
                             data-nomprojet="${data.nomProjet}" 
                        data-description="${data.description}" 
                        data-budget="${data.budget}" 
                           data-priorite="${data.priorite}" 
                        data-date_fin="${data.dateFin}"
                            data-date_debut="${data.dateDebut}"
                        data-responsable="${data.responsable}">
                        <i class="bi bi-eye"></i> 
                    details  </a> </li>
        <li><a  href="#" class=" dropdown-item    edit-btn" 
                     
                        data-id="${data.idProjet}"
                            data-idequipe="${data.idEquipe}" 
                        data-nomprojet="${data.nomProjet}" 
                        data-description="${data.description}" 
                        data-budget="${data.budget}" 
                           data-priorite="${data.priorite}" 
                        data-date_fin="${data.dateFin}"
                            data-date_debut="${data.dateDebut}"
                        data-responsable="${data.responsable}">
                       
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                         
        <li><hr class="dropdown-divider"></li>
        <li> <a href="#" class="dropdown-item   delete-btn" data-id="${data.idProjet}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul>  `;
                }
            }
        ]
    }); 

     // Initialize Project DataTable  
     var table = $('#myTablek').DataTable({
        ajax: {
            url: "{{ route('equipeTable') }}",
            method: "post",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "dataSrc": function (response) {
                if (response.status === 200) {
                    return response.equipes;
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
            { "data": "nomEquipe" },
            { "data": "description" },
            { "data": "dateCreation" },  
            { "data": "responsable" },           
         
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                     <ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item    details-btnEquipes" 
                      
                      data-id="${data.idEquipe}"
                            data-nomequipe="${data.nomEquipe}"
                            data-description="${data.description}"
                            data-datecreation="${data.dateCreation}"
                            data-responsable="${data.responsable}">
                            <i class="bi bi-eye"></i> 
                    details  </a> </li>
        <li><a  href="#" class=" dropdown-item    edit-btnEquipes" 
                     
                         data-idequipe="${data.idEquipe}"
                            data-nomequipe="${data.nomEquipe}" 
                            data-description="${data.description}" 
                            data-datecreation="${data.dateCreation}"
                            data-responsable="${data.responsable}"  >
                           
                       
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                         
        <li><hr class="dropdown-divider"></li>
        <li> <a href="#" class="dropdown-item   delete-btnEquipes" data-idequipes="${data.idEquipe}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul>
                   `;
                }
            }
        ]
    }); 
 $('#myTable tbody').on('click', '.details-btn', function () {
 /*   const data = $(this).data();

      $('#details-NomGroupe').text(data.nomequipe);
      $('#details-nomProjet').text(data.nomprojet);
      $('#details-description').text(data.description);
      $('#details-priorite').text(data.priorite);
      $('#details-budget').text(data.budget);
      $('#details-responsable').text(data.responsable);
      $('#details-dateDebut').text(data.date_debut);
      $('#details-dateFin').text(data.date_fin);
     
      
      $('#detailsModal').modal('show');*/
         var id = $(this).data('id');
      
         window.location.href = '/projetDétails/' + id;
      
  });   
    $('#myTable tbody').on('click', '.edit-btn', function () {         
     var idProjet =$(this).data('id');
        var idEquipe= $(this).data('idequipe');
      var nomProjet = $(this).data('nomprojet');
      var description = $(this).data('description');
      var priorite = $(this).data('priorite');
      var budget = $(this).data('budget');
      var datedebut = $(this).data('date_debut');
      var datefin = $(this).data('date_fin');
      var responsable = $(this).data('responsable');

      $('#edit-equipe_id').val(idEquipe);
       $('#edit-idProjet').val(idProjet);
      $('#edit-nomProjet').val(nomProjet);
      $('#edit-description').val(description);
      $('#edit-priorite').val(priorite);
      $('#edit-budget').val(budget);
      $('#edit-dateDebut').val(datedebut);
      $('#edit-dateFin').val(datefin);
      $('#edit-responsable').val(responsable);

      $('#editModal').modal('show');
  });
   $('#myTablek tbody').on('click', '.details-btnEquipes', function () {
  /*  const data = $(this).data();

      $('#details-NomGroupeE').text(data.nomequipe);
     
      $('#details-descriptionE').text(data.description);
    
      $('#details-datecreation').text(data.datecreation);
      $('#details-responsableE').text(data.responsable);

      
      $('#detailsModalEquipes').modal('show');*/
         var id = $(this).data('id');
           window.location.href = '/equipeDétails/' + id;
      
  });   
    $('#myTablek tbody').on('click', '.edit-btnEquipes', function () {         
   
        var idEquipe= $(this).data('idequipe');
      var nomEquipes = $(this).data('nomequipe');
      var description = $(this).data('description');
      var datecreation = $(this).data('datecreation');
    
      var responsable = $(this).data('responsable');

      $('#edit-idEquipes').val(idEquipe);
     
      $('#edit-nomEquipes').val(nomEquipes);
      $('#edit-descriptionE').val(description);
     
      $('#edit-dateCreation').val(datecreation);
      $('#edit-responsableE').val(responsable);

      $('#editModalEquipes').modal('show');
  });
    
   
    /////// ///////Add project form submission starts /////// /////// ///////
   
    $('#save-project-btn').on('click', function (e) {
        e.preventDefault();
        
        // Reset errors
        $('.is-invalid').removeClass('is-invalid');
        $('.text-danger').addClass('d-none');

        // Validate form
        let isValid = true;
        
        // Validate employee selection
        if ($('#project_id').val() === '') {
            showError($('#project_id'), 'Veuillez sélectionner un employé');
            isValid = false;
        }
        
        // Validate leave type
        if ($('#type_conge').val() === '') {
            showError($('#type_conge'), 'Veuillez sélectionner un type de congé');
            isValid = false;
        }

        // Validate dates
        if (!validateDate($('#date_debut').val())) {
            showError($('#date_debut'), 'Date de début invalide');
            isValid = false;
        }
        
        if (!validateDate($('#date_fin').val())) {
            showError($('#date_fin'), 'Date de fin invalide');
            isValid = false;
        }

        if (!validateDateRange($('#date_debut').val(), $('#date_fin').val())) {
            showError($('#date_debut'), 'La date de début doit être avant la date de fin');
            showError($('#date_fin'), 'La date de fin doit être après la date de début');
            isValid = false;
        }
        

       /*  if (!isValid) {
            return false;
        } */

        // Prepare form data
        const formData = new FormData($('#project-form')[0]);
        
        // Add CSRF token
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
        // Show loading state
        $('#save-project-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enregistrement...');
        
        $.ajax({   
            url: "{{ route('add_project') }}",
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    alert("Projet enregistré avec succès");
                    $('#project-form')[0].reset();
                    $('#exampleModal').modal('hide');
                    $('#myTable').DataTable().ajax.reload();
                } else {
                    // Handle server-side validation errors
                    if (response.errors) {
                        for (const [field, error] of Object.entries(response.errors)) {
                            showError($(`#${field}`), error[0]);
                        }
                    } else {
                        alert("Erreur: " + response.message);
                    }
                }
            },
            error: function(xhr) {
                alert("Une erreur est survenue: " + xhr.responseText);
            },
            complete: function() {
                $('#save-project-btn').prop('disabled', false).text('Enregistrer');
            }
        });
    });
        /////// ///////Add project form submission ends /////// /////// ///////


         /////// ///////Add team form submission starts /////// /////// ///////
   
    $('#save-team-btn').on('click', function (e) {
        e.preventDefault();
       
        // Reset errors
        $('.is-invalid').removeClass('is-invalid');
        $('.text-danger').addClass('d-none');

        // Validate form
        let isValid = true;
        
        // Validate team selection
        if ($('#team_id').val() === '') {
            showError($('#team_id'), 'Veuillez sélectionner un employé');
            isValid = false;
        }
        
        // Validate leave type
        if ($('#type_conge').val() === '') {
            showError($('#type_conge'), 'Veuillez sélectionner un type de congé');
            isValid = false;
        }

        // Validate dates
        if (!validateDate($('#date_debut').val())) {
            showError($('#date_debut'), 'Date de début invalide');
            isValid = false;
        }
        
        if (!validateDate($('#date_fin').val())) {
            showError($('#date_fin'), 'Date de fin invalide');
            isValid = false;
        }

        if (!validateDateRange($('#date_debut').val(), $('#date_fin').val())) {
            showError($('#date_debut'), 'La date de début doit être avant la date de fin');
            showError($('#date_fin'), 'La date de fin doit être après la date de début');
            isValid = false;
        }
        

       /*  if (!isValid) {
            return false;
        } */

        // Prepare form data
        const formData = new FormData($('#team-form')[0]);
        
        // Add CSRF token
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
        // Show loading state
        $('#save-project-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enregistrement...');
        
        $.ajax({   
            url: "{{ route('add_team') }}",
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    alert("equipe enregistré avec succès");
                    $('#team-form')[0].reset();
                    $('#exampleModalEquipe').modal('hide');
                    $('#myTablek').DataTable().ajax.reload();
                } else {
                    // Handle server-side validation errors
                    if (response.errors) {
                        for (const [field, error] of Object.entries(response.errors)) {
                            showError($(`#${field}`), error[0]);
                        }
                    } else {
                        alert("Erreur: " + response.message);
                    }
                }
            },
            error: function(xhr) {
                alert("Une erreur est survenue: " + xhr.responseText);
            },
            complete: function() {
                $('#save-project-btn').prop('disabled', false).text('Enregistrer');
            }
        });
    });
        /////// ///////Add team form submission ends /////// /////// ///////



     $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Êtes-vous sûr de vouloir supprimer ce projet?')) {
            $.ajax({
                url: "{{ route('deleteProject') }}",
                type: 'DELETE',
                data: {idProjet: id},
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
  $(document).on('click', '.delete-btnEquipes', function() {
        var id = $(this).data('idequipes');
        if (confirm('Êtes-vous sûr de vouloir supprimer ce Equipes?')) {
            $.ajax({
                url: "{{ route('deleteTeam') }}",
                type: 'DELETE',
                data: {idEquipes: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 200) {
                        alert(response.message);
                        $('#myTablek').DataTable().ajax.reload();
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

   
/* const type2 = document.getElementById("type2");

type2.style.display = "none";
document.getElementById("liste").addEventListener("change", function () {
    const selectedValue = this.value;
    const typeINsDiv = document.getElementById("typeINs");
    
     if(selectedValue === "projets") {
       
        typeINsDiv.style.display = "block";
        type2.style.display = "none";
    }else{
        typeINsDiv.style.display = "none";
        type2.style.display = "block";
    }
 */
    /* document.getElementById("typeUtilisateur").addEventListener("change", function () {
    const selectedValue = this.value;
    const typeINsDiv = document.getElementById("projet");
    
    if (projet table === "comptables") {
        
        typeINsDiv.style.display = "none";
    } else {
       
        typeINsDiv.style.display = "block";
    } */

   //equipe اسم  id موجود في  div سطر 33
const equipe = document.getElementById("equipe");

equipe.style.display = "none";
//projet_equipe اسم  id موجود في  select 
document.getElementById("projet_equipe").addEventListener("change", function () {
    const selectedValue = this.value;
    //projet اسم  id موجود في  div سطر 27
    const projet = document.getElementById("projet");
     //projet اسم  كلمة موجود في  option value
     if(selectedValue === "projet") {
       
        projet.style.display = "block";
        equipe.style.display = "none";
    }else{
        projet.style.display = "none";
        equipe.style.display = "block";
    }
});
});

</script>
</body>
</html>