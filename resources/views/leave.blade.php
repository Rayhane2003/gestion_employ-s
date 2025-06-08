<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion de congé</title>
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
    <h1 class="title">congés</h1>
    <div class="container contact">	
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div >
                        <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Ajouter un congé </button>
                    </div>
                </div>
            </div> 
        
            <div class="employee-table-container">
                <div class="table-header">
                    <h3 class="table-title">Liste des congés</h3>
                </div>
                
                <table id="myTable" class="employee-table display">
                    <thead class="thead">
                        <tr class="list">
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Type Congé</th>
                            <th>Date Début</th>

                            <th>Document</th>
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
</div>
<!--  Table Ends -->

<!-- Add leave Modal Starts-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un congé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="leave-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
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
                        </div>

                        <div class="col-lg-12 mb-3">
                             <label>Type de congé</label>
                            <select name="type_conge" id="type_conge" class="form-control" required>
                                <option value="">Sélectionner</option>
                                <option value="Maladie">Maladie</option>
                                <option value="Maternite">Maternité</option>
                                <option value="Annuel">Annuel</option>
                                {{-- <option value="Autre">Autre</option> --}}
                            </select>
                            <small class="text-danger d-none" id="type_conge_error"></small>
                        </div> 

                       
                        <div class="col-lg-12 mb-3">
                            <label>Date Début</label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Date Fin</label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                            <small class="text-danger d-none" id="date_fin_error"></small>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Document de Justification</label>
                            <input type="file" name="document_justification" id="document_justification" class="form-control">
                            <small class="text-muted">Format acceptés: PDF, JPG, PNG (Max 2MB)</small>
                            <small class="text-danger d-none" id="document_justification_error"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="save-leave-btn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModallLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modifier un conge</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-id" name="id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Employé</label>
                            <select name="employe_id" id="edit-employe_id" class="form-control" required>
                                <option value="">Sélectionner un employé</option>
                                @foreach($employe as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->prénom }} {{ $employee->nom }}
                                </option>
                                @endforeach
                            </select>
                            <small class="text-danger d-none" id="edit-employe_id_error"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                             <label>Type de congé</label>
                            <select name="type_conge" id="edit-type_conge" class="form-control" required>
                                <option value="">Sélectionner</option>
                                <option value="Maladie">Maladie</option>
                                <option value="Maternite">Maternité</option>
                                <option value="Annuel">Annuel</option>
                                <option value="Autre">Autre</option>
                            </select>
                            <small class="text-danger d-none" id="edit-date_fintype_conge_error"></small>
                        </div> 
                        <div class="col-lg-12 mb-3">
                            <label>Date Début</label>
                            <input type="date" name="date_debut" id="edit-date_debut" class="form-control" required>
                            <small class="text-danger d-none" id="date_debut_error"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>Date Fin</label>
                            <input type="date" name="date_fin" id="edit-date_fin" class="form-control" required>
                            <small class="text-danger d-none" id="date_fin_error"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>Document de Justification</label>
                            <input type="file" name="document_justification" id="editdocument_justification" class="form-control">
                            <small class="text-muted">Format acceptés: PDF, JPG, PNG (Max 2MB)</small>
                            <small class="text-danger d-none" id="edit-document_justification_error"></small>
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
<!-- Add leave Modal Ends-->


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
          url: "{{ route('update') }}",
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

    // Initialize DataTable 
    var table = $('#myTable').DataTable({// Initializes the DataTable plugin on the HTML table with the ID myTable.
        ajax: {//Configures how data is fetched from the server.
            url: "{{ route('conge') }}",//Configures how data is fetched from the server.
            method: "post",// Sends a POST request to the server.
            dataType: "json",// Expects the server response to be in JSON format.
            headers: {// Sends the CSRF token in the headers for security (Laravel requirement).
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "dataSrc": function (response) {
                if (response.status === 200) {
                    return response.leaves;
                } else {
                    return [];
                }
            }
        },
        "columns": [//Defines how each column in the table is populated.
            {// First column: displays the row index (starting from 1).
        "data": null,
        "render": function (data, type, row, meta) {
            return meta.row + 1; // يبدأ من 0
        }
    },
            { // Second column: shows the profile image. If none, shows a placeholder icon.
                "data": "photoProfil",
                "render": function(data, type, row) {
                    if (data) {
                        return `<img src="image/${data}" class="profile-image" alt="Profile Image">`;
                    } else {
                        return `<div class="profile-image-placeholder"><i class="bi bi-person-circle" style="font-size: 40px; color: #a0aec0;"></i></div>`;
                    }
                }
            },
            { "data": "nom" },//Third column: displays the employee's last name.
            { "data": "prénom" },// Fourth column: displays the first name.
            { "data": "dateDebut" },// Fifth column: shows the start date as-is.
            { 
                "data": "dateFin",// Sixth column: formats the end date into a local date string.
                "render": function(data) {
                    return new Date(data).toLocaleDateString();
                }
            },
            { 
                "data": "documentsJustification",// Seventh column: shows a link to the document if it exists, else shows "Aucun document".
                "render": function(data) {
                    if (data) {
                        return `<a href="/image/${data}" target="_blank">Voir document</a>`;
                    }
                    return 'Aucun document';
                }
            },
            { 
                "data": "statut",//Eighth column: shows the leave status with color-coded badge (Approuvé, Rejeté, En attente).
                "render": function(data) {
                    let badgeClass = '';
                    if (data === 'Approuvé') {
                        badgeClass = 'badge-active';
                    } else if (data === 'Rejeté') {
                        badgeClass = 'badge-inactive';
                    } else if (data === 'En attente') {
                        badgeClass = 'badge-warning';
                    }
                    return `<span class="status-badge ${badgeClass}">${data}</span>`;
                }
            },
            {//Ninth column: shows an "Actions" dropdown with three options
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item    details-btn" 
                      
                         data-id="${data.idConge}"
                            data-nom="${data.nom}"
                            data-prenom="${data.prénom}"
                            data-photo-profil="${data.photo_profil || ''}"
                            data-type-conge="${data.typeConge}"
                            data-date-debut="${data.dateDebut}"
                            data-date-fin="${data.dateFin}"
                             data-photoprofil="${data.photoProfil}"
                            data-document-justification="${data.documentsJustification || ''}"
                            data-statut="${data.statut}">
                        <i class="bi bi-eye"></i> 
                    details  </a> </li>
        <li><a  href="#" class=" dropdown-item    edit-btn" 
                     
                       data-id="${data.idConge}"
                            data-employe_id="${data.id}" 
                        data-typeconge="${data.typeConge}" 
                        data-datedebut="${data.dateDebut}" 
                        data-datefin="${data.dateFin}" 
                        data-photoprofil="${data.photoProfil}"
                         >
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li> <a href="#" class="dropdown-item   delete-btn" data-id="${data.idConge}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
           </ul>
         </li>
        </ul> 
                    `;
                }
            }
        ]
    });

    $('#myTable tbody').on('click', '.edit-btn', function () {  // Listens for a click on any .edit-btn inside the tbody of the table with ID myTable.        
      var employe_id= $(this).data('employe_id'); //Gets the employe_id from the button's data-employe_id attribute.
      var id= $(this).data('id');//Gets the id of the leave record from the data-id attribute.
      var typeconge = $(this).data('typeconge'); //Gets the leave type from the button's data-typeconge attribute.
      var datedebut = $(this).data('datedebut');// Gets the start date of the leave from data-datedebut.
      var datefin = $(this).data('datefin');// Gets the end date of the leave from data-datefin.
      
      $('#edit-id').val(id);//Sets the hidden input field #edit-id with the selected leave’s ID.
      $('#edit-employe_id').val(employe_id);// Fills the employee dropdown/input with the selected employe_id.
      $('#edit-type_conge').val(typeconge);// Sets the leave type field to the selected value.
      $('#edit-date_debut').val(datedebut);//  Sets the start date field with the retrieved datedebut.
      $('#edit-date_fin').val(datefin);//Sets the end date field with the retrieved datefin.
      $('#editModal').modal('show');//Opens the modal dialog (likely a Bootstrap modal) to edit the selected leave.
  });
   
    ////// Add leave form submission
    $('#save-leave-btn').on('click', function (e) { //When the button with ID save-leave-btn is clicked, run the function below.
        e.preventDefault(); //Prevents the default form submission (e.g., page reload).
        
        // Reset errors
        $('.is-invalid').removeClass('is-invalid');
        $('.text-danger').addClass('d-none');
        
        // Validate form
        let isValid = true;
        
        // Validate employee selection
        if ($('#employe_id').val() === '') {
            showError($('#employe_id'), 'Veuillez sélectionner un employé');
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
        
        if (!isValid) {
            return false;
        }
        
        // Prepare form data
        const formData = new FormData($('#leave-form')[0]);
        
        /* // Add CSRF token
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
        // Show loading state
        $('#save-leave-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enregistrement...'); */
        
        $.ajax({
            url: "{{ route('add_leave') }}",//The route that handles the form submission (probably defined in Laravel backend).
            method: 'POST', //Use POST method for sending data.
            data: formData, //Send the prepared formData.
            cache: false, //Don’t cache the response.
            contentType: false, //Tell jQuery not to set a content-type header — needed when using FormData.
            processData: false, //Do not transform the data (again, necessary with FormData).
            dataType: 'json', //Expect a JSON response.
            success: function(response) { //If the server returns a successful response...
                if (response.status == 200) { //If the response status is OK...
                    alert("Congé enregistré avec succès"); //Show a success message.
                    $('#leave-form')[0].reset(); //Show a success message.
                    $('#exampleModal').modal('hide'); //Hide the modal window (assuming the form is inside a Bootstrap modal).
                    $('#myTable').DataTable().ajax.reload(); //Reload the data table (likely used to show leave records).
                } else { // If the response indicates an error...

                    // Handle server-side validation errors
                    if (response.errors) { //If there are validation errors from the server...
                        for (const [field, error] of Object.entries(response.errors)) { //Loop through each error.
                            showError($(`#${field}`), error[0]); //Show the first error message for each invalid field.
                        }
                    } else {
                        alert("Erreur: " + response.message);//If there's a general error message, show it.
                    }
                }
            },
            error: function(xhr) { //If the AJAX request itself fails (e.g. server down), show a generic error.
                alert("Une erreur est survenue: " + xhr.responseText);
            },
            complete: function() { //Re-enable the submit button and restore its original text.
                $('#save-leave-btn').prop('disabled', false).text('Enregistrer');
            }
        });
    });


    //delete leave
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Êtes-vous sûr de vouloir supprimer ce congé?')) {
            $.ajax({ //Begins an AJAX request using jQuery to delete the leave from the database.
                url: "{{ route('delete') }}", //The endpoint (route) to which the delete request will be sent.
                type: 'DELETE', //HTTP method: DELETE — used to tell the server we want to remove a resource.
                data: {id: id}, //Sends the id of the leave to be deleted as data in the request.
                headers: { //Specifies custom headers to send with the request.
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) { //Callback function executed if the request succeeds.
                    if (response.status === 200) { //If the server confirms the deletion with HTTP status 200 (OK)….
                        alert(response.message); //Show a success message returned by the server (e.g., "Leave deleted successfully").
                        $('#myTable').DataTable().ajax.reload(); //Refreshes the data table (most likely showing the list of leaves) to reflect the deletion.
                    } else {
                        alert(response.message);//If the status is not 200, still show the error or warning message sent by the server.
                    }
                },
                error: function(xhr) {
                    alert("Erreur: " + xhr.responseText); //If the AJAX request itself fails (e.g., server error or network issue), show an error with the server’s response.
                }
            });
        }
    });
});
</script>
</body>
</html>