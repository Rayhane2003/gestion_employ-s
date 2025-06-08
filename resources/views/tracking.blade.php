<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Gestion de pointage</title>
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
    <h1 class="title">pointage</h1>
    <div class="container contact">	
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div >
                        <button type="button" class="btn btn-custom-blue btn-no-wrap btn-employe btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" btn-no-wrap px-4 py-2 fw-bold> Indiquer le jour  </button>
                    </div>
                </div>
            </div> 
        
            <div class="employee-table-container">
                <div class="table-header">
                    <h3 class="table-title">Liste de pointage</h3>
                </div>
                
                <table id="myTable" class="employee-table display">
                    <thead class="thead">
                        <tr class="list">
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th> date Jour</th>
                            <th>heure Entree </th>
                            <th>heure Sortie </th>
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Indiquer le jour</h5>
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
                            <label>heure Entree </label>
                            <input type="time" name="heureEntree" id="heureEntree" class="form-control" required >
                            <small class="text-danger d-none" id="heureEntree_error"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>heure Sortie</label>
                            <input type="time" name="heureSortie" id="heureSortie" class="form-control" required >
                            <small class="text-danger d-none" id="heureSortie_error"></small>
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="save-leave-btn">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModallLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modifier un pointage</h5>
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
                            <label>heure Entree </label>
                            <input type="time" name="heureEntree" id="edit-heureEntree" class="form-control" required>
                            <small class="text-danger d-none" id="heureEntree_error"></small>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>heure Sortie </label>
                            <input type="time" name="heureSortie" id="edit-heureSortie" class="form-control" required>
                            <small class="text-danger d-none" id="heureSortie_error"></small>
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" form="edit-form">Modifier</button>
                </div>
        </div>
    </div>
</div>
<!-- Add leave Modal Ends-->


  <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="js/iconify-icon.min.js"></script>

<script>
$(document).ready(function () {//Ensures the code runs only after the HTML page is fully loaded.
    // Validation functions
    function validateDateRange(startTime, endTime) { //Custom function to validate that a start time is earlier than an end time.
        if (!startTime || !endTime) return false;// Return false if either time is missing.

//// Divide time into hours and minutes
const [startHour, startMinute] = startTime.split(':').map(Number);//Split the startTime (e.g., "08:30") into numbers.
const [endHour, endMinute] = endTime.split(':').map(Number);//Same for endTime.

//// Convert time to minutes for easier comparison
const startTotal = startHour * 60 + startMinute; // Convert start time to total minutes.
const endTotal = endHour * 60 + endMinute; // Convert end time to total minutes.

return startTotal < endTotal;//Return true if start is earlier than end.
    }

    function showError(input, message) {//Displays an error message under a specific input field.
        const errorElement = $(`#${input.attr('id')}_error`);
        input.addClass('is-invalid');
        errorElement.removeClass('d-none').text(message);
    }
    //Removes error styling and hides the error message.
    function showSuccess(input) {
        const errorElement = $(`#${input.attr('id')}_error`);
        input.removeClass('is-invalid');
        errorElement.addClass('d-none').text('');
    }

    $('#edit-form').submit(function (e) {//Handles the form submission when the user clicks to save changes.
      
      e.preventDefault();// Prevents the default form submission (page reload).
      
      // Validate all fields before submission
      let isValid = true;//Initializes a flag to track if the form is valid (you could use it to add validation logic later).
      const employeedata = new FormData(this);// Collects the form fields into a FormData object for sending via AJAX.
      $.ajax({//Sends the form data to the server using AJAX.
          url: "{{ route('update_Pointage') }}",//Laravel route where the update request is sent.
          method: 'POST',//HTTP method used.
          data: employeedata,// The form data being sent.
          cache: false,// Required for sending FormData correctly.
          contentType: false,
          processData: false,
          dataType: 'json',
          headers: {//Adds Laravel's CSRF token to the request headers for protection.
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {//If the server returns a successful response:
              if (response.status === 200) {//If response.status === 200: Show a success message.Reset the form.Hide the modal.Reload the DataTable.
                  alert(response.message);
                  $('#edit-form')[0].reset();
                  $('#editModal').modal('hide');
                  $('#myTable').DataTable().ajax.reload();
              } else {
                  alert(response.message);
              }
          },
          error: function(xhr) {// If the server request fails (e.g., 500 error), show the raw error text.
              alert("Erreur: " + xhr.responseText);
          }
      });
  });
    // Initialize DataTable 
    var table = $('#myTable').DataTable({
        ajax: {
            url: "{{ route('pointage') }}",
            method: "post",
            dataType: "json",
            headers: {
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
        "columns": [
            { "data": "idPointage" },
            { 
                "data": "photoProfil",
                "render": function(data, type, row) {
                    if (data) {
                        return `<img src="image/${data}" class="profile-image" alt="Profile Image">`;
                    } else {
                        return `<div class="profile-image-placeholder"><i class="bi bi-person-circle" style="font-size: 40px; color: #a0aec0;"></i></div>`;
                    }
                }
            },
            { "data": "nom" },
            { "data": "prénom" },
            { 
                "data": "dateJour",
            },
            { "data": "heureEntree" },
            { 
                "data": "heureSortie",
            },
           
           
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <ul class="nav nav-pills">
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Actions</a>
      <ul class="dropdown-menu">
        <li><a  href="#"class=" dropdown-item    details-btn" 
                      
                       data-id="${data.idPointage}"
                            data-nom="${data.nom}"
                            data-prenom="${data.prénom}"
                            data-photo-profil="${data.photo_profil || ''}"
                            data-dateJour="${data.dateJour}"
                            data-heureentree="${data.heureEntree}"
                            data-heuresortie="${data.heureSortie}"
                             data-photoprofil="${data.photoProfil}">
                        <i class="bi bi-eye"></i> 
                    details  </a> </li>
        <li><a  href="#" class=" dropdown-item    edit-btn" 
                     
                         data-id="${data.idPointage}"
                            data-employe_id="${data.Id_employe}" 
                        data-heure_entree="${data.heureEntree}" 
                        data-heure_sortie="${data.heureSortie}" 
                        data-photoprofil="${data.photoProfil}"
                            >
                       
                        <i class="bi bi-pencil-square"></i>  edit </a></li>
                         
        <li><hr class="dropdown-divider"></li>
        <li> <a href="#" class="dropdown-item   delete-btn" data-id="${data.idPointage}">
                        <i class="bi bi-trash"> </i>  delete </a></li>
      </ul>
    </li>
       </ul> 
                      `;
                }
            }
        ]
    });
    $('#myTable tbody').on('click', '.edit-btn', function () {         
        var employe_id= $(this).data('employe_id');
        var id= $(this).data('id');
    
      var heure_entree = $(this).data('heure_entree');
      var heure_sortie = $(this).data('heure_sortie');
      $('#edit-id').val(id);
      $('#edit-employe_id').val(employe_id);

      $('#edit-heureEntree').val(heure_entree);
      $('#edit-heureSortie').val(heure_sortie);
      $('#editModal').modal('show');
  });
  

    // Add leave form submission
    $('#save-leave-btn').on('click', function (e) {
        e.preventDefault();
        
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
        
        
        // Validate dates
     
        
      
        
        if (!validateDateRange($('#heureEntree').val(), $('#heureSortie').val())) {
            showError($('#heureEntree'), 'La date de début doit être avant la date de fin');
            showError($('#heureSortie'), 'La date de fin doit être après la date de début');
            isValid = false;
        }
        
        if (!isValid) {
            return false;
        }
        
        // Prepare form data
        const formData = new FormData($('#leave-form')[0]);
        
        // Add CSRF token
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        
        // Show loading state
        $('#save-leave-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enregistrement...');
        
        $.ajax({
            url: "{{ route('add_Pointage') }}",
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    alert("Congé enregistré avec succès");
                    $('#leave-form')[0].reset();
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
                $('#save-leave-btn').prop('disabled', false).text('Enregistrer');
            }
        });
    });

     //Delete
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Êtes-vous sûr de vouloir supprimer ce congé?')) {
            $.ajax({
                url: "{{ route('delete_Pointage') }}",
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