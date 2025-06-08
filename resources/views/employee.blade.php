<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion des employés </title>
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
        <h1 class="title">employés</h1>
         <div class="container contact">	
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
               <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                         <h3 class="panel-title"></h3>
                        </div>
                       <div >
                       
                          <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un employé </button>
                        </div>
                   </div>
                </div> 
            
                <div class="employee-table-container">
                    <div class="table-header">
                      <h3 class="table-title">Liste des employés</h3>
                    </div>
                    
                    <table id="myTable" class="employee-table display">
                      <thead class="thead">
                        <tr class="list">
                          <th>ID</th>
                          <th>Photo</th>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Poste</th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Salaire</th>
                          <th>Statut</th>
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
                      <h5 class="modal-title" id="exampleModalLabel">Ajouter un employé</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="employee-form" method="post">
                          <div class="row">
                              <div class="col-lg">
                                  <label>Nom</label>
                                  <input type="text" name="nom" id="nom" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                              <div class="col-lg">
                                  <label>Prénom</label>
                                  <input type="text" name="prénom" id="prénom" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date de Naissance</label>
                                  <input type="date" name="dateNaissance" id="dateNaissance" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Email</label>
                                  <input type="email" name="email" id="email" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Téléphone</label>
                                  <input type="tel" name="telephone" id="telephone" class="form-control" required pattern="\+?[\d\s\-\(\)]{7,15}">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Adresse</label>
                                  <input type="text" name="adresse" id="adresse" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Poste</label>
                                  <input type="text" name="poste" id="poste" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Salaire</label>
                                  <input type="number" name="salaire" id="salaire" class="form-control" required min="0" step="0.01">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date d'embauche</label>
                                  <input type="date" name="dateEmbauche" id="dateEmbauche" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                              <div class="col-lg">
                                  <label>Statut</label>
                                  <select name="statut" id="statut" class="form-control" required>
                                    <option value="">Sélectionner</option>
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Type de contrat</label>
                                  <select name="typeContrat" id="typeContrat" class="form-control" required>
                                    <option value="">Sélectionner</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                  >
                                  </select>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Photo de profil</label>
                                  <input type="file" name="photoProfil" id="photoProfil" class="form-control">
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="employee-form">Enregistrer</button>
                  </div>
              </div>
          </div>
        </div>
       
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Modifier Employé</h5>
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
                                  <label>Prénom</label>
                                  <input type="text" name="prénom" id="edit-prénom" class="form-control" required minlength="2" pattern="[a-zA-ZÀ-ÿ\s\-']+">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date de Naissance</label>
                                  <input type="date" name="dateNaissance" id="edit-dateNaissance" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Email</label>
                                  <input type="email" name="email" id="edit-email" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Téléphone</label>
                                  <input type="tel" name="telephone" id="edit-telephone" class="form-control" required pattern="\+?[\d\s\-\(\)]{7,15}">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Adresse</label>
                                  <input type="text" name="adresse" id="edit-adresse" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Poste</label>
                                  <input type="text" name="poste" id="edit-poste" class="form-control" required>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Salaire</label>
                                  <input type="number" name="salaire" id="edit-salaire" class="form-control" required min="0" step="0.01">
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Date d'embauche</label>
                                  <input type="date" name="dateEmbauche" id="edit-dateEmbauche" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                              </div>
                              <div class="col-lg">
                                  <label>Statut</label>
                                  <select name="statut" id="edit-statut" class="form-control" required>
                                    <option value="">Sélectionner</option>
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Type de contrat</label>
                                  <select name="typeContrat" id="edit-typeContrat" class="form-control" required>
                                    <option value="">Sélectionner</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>Photo de profil</label>
                                  <input type="file" name="photoProfil" id="edit-photoProfil" class="form-control">
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
     <div class="modal fade" id="addequipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addequipe">Ajouter un equipe</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="equipe-form" method="post">
                          <div class="row">
                              <div class="col-lg">
                                  <input type="text" name="idEmploye" id="emplye-id" class="form-control" >
                              </div>
                          <div class="row mt-2">
                              <div class="col-lg">
                                  <label>nom equipe</label>
                                  <select name="idProjet" id="typeContrat" class="form-control" required>
                                      @foreach($equipe as $equipe)
                                <option value="{{ $equipe->idEquipe }}">
                                    {{ $equipe->nomEquipe }} 
                                </option>
                                @endforeach
                                  </select>
                              </div>
                          </div>
                        
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" form="equipe-form">Enregistrer</button>
                  </div>
              </div>
          </div>
        </div>
<!--------- Employee Details Modal Ends----------->
  </div>
    </div>
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Détails du congé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="details-photo" src="" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <div>
                            <span class="badge rounded-pill" id="details-status"></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nom:</strong> <span id="details-nom"></span></p>
                                <p><strong>Prénom:</strong> <span id="details-prenom"></span></p>
                                <p><strong>dateN aissance:</strong> <span id="details-dateNaissance"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>adresse:</strong> <span id="details-adresse"></span></p>
                                <p><strong>	telephone:</strong> <span id="details-telephone"></span></p>
                                <p><strong>	email:</strong> <span id="details-email"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>poste:</strong> <span id="details-poste"></span></p>
                                <p><strong>	salaire:</strong> <span id="details-salaire"></span></p>
                                <p><strong>dateEmbauche:</strong> <span id="details-dateEmbauche"></span></p>
                            </div>
                            <div class="col-md-6">
                            <p><strong>	statut:</strong> <span id="details-statut"></span></p>

                            <p><strong>	typeContrat:</strong> <span id="details-typeContrat"></span></p>
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

 
function validatePhoneNumber(phone) {
    // Remove all non-digit characters (spaces, hyphens, etc.)
    const digitsOnly = phone.replace(/\D/g, '');

    // Check if it starts with 0 and has exactly 10 digits
    return /^0\d{9}$/.test(digitsOnly);
}
  function validateEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validateDate(dateStr) {
      if (!dateStr) return false;
      const date = new Date(dateStr);
      const today = new Date();
      return date instanceof Date && !isNaN(date) && date <= today;
  }

  function validateSalary(salary) {
      return /^\d+(\.\d{1,2})?$/.test(salary) && parseFloat(salary) > 0;
  }

  function showError(input, message) {
      const formControl = input.parent();
      formControl.addClass('error');
      const small = formControl.find('small');
      if (small.length === 0) {
          formControl.append(`<small class="text-danger">${message}</small>`);
      } else {
          small.text(message);
      }
  }

  function showSuccess(input) {
      const formControl = input.parent();
      formControl.removeClass('error');
      formControl.find('small').remove();
  }

  // Real-time validation
  $('#nom, #prénom, #edit-nom, #edit-prénom').on('input', function() {
      if (validateName($(this).val())) {
          showSuccess($(this));
      } else {
          showError($(this), 'Nom/Prénom invalide (lettres seulement, min 2 caractères)');
      }
  });

  $('#email, #edit-email').on('input', function() {
      if (validateEmail($(this).val())) {
          showSuccess($(this));
      } else {
          showError($(this), 'Email invalide (ex: exemple@domaine.com)');
      }
  });

  $('#telephone, #edit-telephone').on('input', function() {
      if (validatePhoneNumber($(this).val())) {
          showSuccess($(this));
      } else {
          showError($(this), 'Téléphone invalide (Le numéro doit commencer par 0 et contenir 10 chiffres)');
      }
  });
  


  $('#salaire, #edit-salaire').on('input', function() {
      if (validateSalary($(this).val())) {
          showSuccess($(this));
      } else {
          showError($(this), 'Salaire invalide (nombre positif)');
      }
  });

  $('#dateNaissance, #dateEmbauche, #edit-dateNaissance, #edit-dateEmbauche').on('change', function() {
      if (validateDate($(this).val())) {
          showSuccess($(this));
      } else {
          showError($(this), 'Date invalide (doit être dans le passé)');
      }
  });

  // Initialize DataTable 
  var table = $('#myTable').DataTable({
      ajax: {
          url: "{{ route('ajax-action') }}",
          method: "POST",
          dataType: "json",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          "dataSrc": function (response) {
              if (response.status === 200) {
                  return response.employees;
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
          { 
              "data": "photoProfil",
              "render": function(data, type, row) {
                  if (data) {
                      return `<img src="image/${data}" class="profile-image" alt="Pro">`;
                  } else {
                      return `<div class="profile-image-placeholder"><i class="bi bi-person-circle" style="font-size: 40px; color: #a0aec0;"></i></div>`;
                  }
              }
          },
          { "data": "nom" },
          { "data": "prénom" },
          { "data": "poste" },
          { "data": "email" },
          { "data": "telephone" },
          { 
              "data": "salaire",
              "render": function(data, type, row) {
                  return parseFloat(data).toFixed(2) + ' DA';
              }
          },
          { 
              "data": "statut",
              "render": function(data, type, row) {
                  let badgeClass = '';
                  if (data === 'Actif') {
                      badgeClass = 'badge-active';
                  } else if (data === 'Inactif') {
                      badgeClass = 'badge-inactive';
                  } else if (data === 'Congé') {
                      badgeClass = 'badge-conge';
                  }
                  return `<span class="status-badge ${badgeClass}">${data}</span>`;
              }
          },
        
          {
               "data": null,
              "render": function (data, type, row) {
                  return `<ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item   details-btn" 
                        data-id="${data.id}" 
                        data-nom="${data.nom}" 
                        data-prénom="${data.prénom}" 
                        data-datenaissance="${data.dateNaissance}" 
                        data-adresse="${data.adresse}"
                        data-telephone="${data.telephone}" 
                        data-email="${data.email}" 
                        data-poste="${data.poste}" 
                        data-salaire="${data.salaire}" 
                        data-dateembauche="${data.dateEmbauche}"
                        data-statut="${data.statut}" 
                        data-typecontrat="${data.typeContrat}" 
                        data-photoprofil="${data.photoProfil}">
                        <i class="bi bi-eye"></i> details </a></li>
        <li><a  href="#" class=" dropdown-item   edit-btn" 
                        data-id="${data.id}" 
                        data-nom="${data.nom}" 
                        data-prénom="${data.prénom}" 
                        data-datenaissance="${data.dateNaissance}" 
                        data-adresse="${data.adresse}"
                        data-telephone="${data.telephone}" 
                        data-email="${data.email}" 
                        data-poste="${data.poste}" 
                        data-salaire="${data.salaire}" 
                        data-dateembauche="${data.dateEmbauche}"
                        data-statut="${data.statut}" 
                        data-typecontrat="${data.typeContrat}" 
                        data-photoprofil="${data.photoProfil}">
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                          <li><a  href="#"class=" dropdown-item   add-groupe" data-id="${data.id}">
                        <i class="bi bi-plus"> </i>  add groupe </a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a  href="#"class=" dropdown-item   delete-btn" data-id="${data.id}">
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
      $('#details-prenom').text(data.prénom);
      $('#details-dateNaissance').text(data.datenaissance);
      $('#details-nom').text(data.nom);
      $('#details-email').text(data.email);
      $('#details-telephone').text(data.telephone);
      $('#details-adresse').text(data.adresse);
      $('#details-poste').text(data.poste);
      $('#details-salaire').text(data.salaire);
      $('#details-statut').text(data.statut);
      $('#details-dateEmbauche').text(data.dateembauche);
      $('#details-typeContrat').text(data.typecontrat);
    
      
    
      // Set status badge
      let statusBadge = $('#details-status');
      statusBadge.text(data.statut);
      statusBadge.removeClass('badge-active badge-inactive badge-conge');
      
      if (data.statut === 'Actif') {
          statusBadge.addClass('badge-active');
      } else if (data.statut === 'Inactif') {
          statusBadge.addClass('badge-inactive');
      } 
      
      // Set photo
      if (data.photoprofil) {
          $('#details-photo').attr('src','image/'+ data.photoprofil);
      } else {
          $('#details-photo').attr('src', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMjQgMjQiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzY0NzQ4YiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0yMCAyMXYtMmE0IDQgMCAwIDAtNC00SDhhNCA0IDAgMCAwLTQgNHYyIj48L3BhdGg+PGNpcmNsZSBjeD0iMTIiIGN5PSI3IiByPSI0Ij48L2NpcmNsZT48L3N2Zz4=');
      }
      $('#detailsModal').modal('show');*/
       var id = $(this).data('id');
           window.location.href = '/employeeDetails/' + id;
      
      
  });

  // Delete employee from details modal


  // Edit data
  $('#myTable tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var nom = $(this).data('nom');
      var email = $(this).data('email');
      var adresse = $(this).data('adresse');
      var prénom = $(this).data('prénom');
      var dateNaissance = $(this).data('datenaissance');
      var telephone = $(this).data('telephone');
      var poste = $(this).data('poste');
      var salaire = $(this).data('salaire');
      var dateEmbauche = $(this).data('dateembauche');
      var statut = $(this).data('statut');
      var typeContrat = $(this).data('typecontrat');

     var photoProfil = $(this).data('photoProfil');
    
      $('#edit-id').val(id);
      $('#edit-prénom').val(prénom);
      $('#edit-dateNaissance').val(dateNaissance);
      $('#edit-nom').val(nom);
      $('#edit-email').val(email);
      $('#edit-telephone').val(telephone);
      $('#edit-adresse').val(adresse);
      $('#edit-poste').val(poste);
      $('#edit-salaire').val(salaire);
      $('#edit-dateEmbauche').val(dateEmbauche);
      $('#edit-statut').val(statut);
      $('#edit-typeContrat').val(typeContrat);
      $('#edit-photoProfil').val(photoProfil);
      
      $('#editModal').modal('show');
  });

  
 $('#myTable tbody').on('click', '.add-groupe', function () {
      var id = $(this).data('id');
      $('#emplye-id').val(id);
      $('#addequipe').modal('show');
  });

  // Add employee form submission
  $('#employee-form').submit(function (e) {
      e.preventDefault();
      
      // Validate all fields before submission
      let isValid = true;
      
      // Validate name
      if (!validateName($('#nom').val())) {
          showError($('#nom'), 'Nom invalide (lettres seulement, min 2 caractères)');
          isValid = false;
      }
      
      // Validate familyname
      if (!validateName($('#prénom').val())) {
          showError($('#prénom'), 'Prénom invalide (lettres seulement, min 2 caractères)');
          isValid = false;
      }
      
      // Validate birth date
      if (!validateDate($('#dateNaissance').val())) {
          showError($('#dateNaissance'), 'Date de naissance invalide');
          isValid = false;
      }
      
      // Validate email
      if (!validateEmail($('#email').val())) {
          showError($('#email'), 'Email invalide');
          isValid = false;
      }
      
      // Validate phone
       if (!validatePhoneNumber($('#telephone').val())) {
          showError($('#telephone'), 'Téléphone invalide');
          isValid = false;
      } 
    
     
      // Validate salary
      if (!validateSalary($('#salaire').val())) {
          showError($('#salaire'), 'Salaire invalide');
          isValid = false;
      }
      
      // Validate hire date
      if (!validateDate($('#dateEmbauche').val())) {
          showError($('#dateEmbauche'), 'Date d\'embauche invalide');
          isValid = false;
      }
      
      // If any validation failed, stop submission
      if (!isValid) {
          alert('Veuillez corriger les erreurs dans le formulaire');
          return false;
      }
      
       // Prepare form data
      const employeedata = new FormData(this);
      
      $.ajax({
          url: "{{ route('store') }}", //ارسال المعلومات الى الصفحة
          method: 'post',//نوع ارسال المعلومات
          data: employeedata,// المعلومات المدخلة للفورم
          cache: false,//
          contentType: false,
          processData: false,
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              if (response.status == 200) {
                  alert("Enregistré avec succès");//
                  $('#employee-form')[0].reset();
                  $('#exampleModal').modal('hide');//hide form
                  $('#myTable').DataTable().ajax.reload();//update the table
              } else {
                  alert("Erreur: " + response.message);//message if there is an erreur 
              }
          },
          error: function(xhr) {
              alert("Erreur: " + xhr.responseText);//message if there is an erreur in data  
          }
      });
  });


  $('#equipe-form').submit(function (e) {
      e.preventDefault();
      
      // Validate all fields before submission
      let isValid = true;
      const equipedata = new FormData(this);
      $.ajax({
          url: "{{ route('addequipe') }}",
          method: 'post',
          data: equipedata,
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
                  $('#equipe-form')[0].reset();
                  $('#addequipe').modal('hide');
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
          alert('Veuillez corriger les erreurs dans le formulaire ');
          return false;
      }
      
      const employeedata = new FormData(this);
      
      $.ajax({
          url: "{{ route('updateEmploye') }}",
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
      
      if (confirm('Êtes-vous sûr de vouloir supprimer cet employé?')) {
          $.ajax({
              url: "{{ route('deleteEmploye') }}",
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