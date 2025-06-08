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
     <div class="container" style="min-height:500px; ">
        </br>  </br>  </br>
    
         <div class="container contact">	
          <div >   		
              
             <div class="card Details">
            <div class="card-header">
                <h5 class="card-title text-center">Détails du employee</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($photoProfil == null)
                        <img id="details-photo" src=" {{ asset('image/' .$photoProfil) }} " class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                       @else
<div class="profile-image-placeholder"><i class="bi bi-person-circle" style="font-size: 40px; color: #a0aec0;"></i></div>
@endif
                        <div>
                            <span class="badge rounded-pill" id="details-status"></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                
 
                                <p><strong>Nom:</strong> <span id="details-nom">  {{ $nom }}</span></p>
                                <p><strong>Prénom:</strong> <span id="details-prenom">  {{ $prenom }} </span></p>
                                <p><strong>dateN aissance:</strong> <span id="details-dateNaissance">{{ $dateNaissance }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>adresse:</strong> <span id="details-adresse">  {{ $adresse }} </span></p>
                                <p><strong>	telephone:</strong> <span id="details-telephone">  {{ $telephone }}</span></p>
                                <p><strong>	email:</strong> <span id="details-email">   {{ $email }} </span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>poste:</strong> <span id="details-poste">  {{ $poste }}</span></p>
                                <p><strong>	salaire:</strong> <span id="details-salaire">   {{ $salaire }} </span></p>
                                <p><strong>dateEmbauche:</strong> <span id="details-dateEmbauche">  {{ $dateEmbauche }} </span></p>
                            </div>
                            <div class="col-md-6">
                                @if ($statut === 'Actif') 
                                   <p><strong>	statut:</strong> <span id="details-statut" class="status-badge badge-active"> {{ $statut }}</span></p>
                   
                   @elseif ($statut === 'Inactif') 
 <p><strong>	statut:</strong> <span id="details-statut  "class="status-badge badge-inactive"> {{ $statut }}</span></p>
                   
                   @elseif ($statut === 'Congé') 
  <p><strong>	statut:</strong> <span id="details-statut" class="status-badge badge-conge"> {{ $statut }}</span></p>                   
                     
                  
                  @endif

                            <p><strong>	typeContrat:</strong> <span id="details-typeContrat"> {{ $typeContrat }} </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>  
                  </div>
                </div>
              </div>
<!--  Table Starts -->

              
<!------------ Add Employee Modal Starts-------------->
   <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="../js/iconify-icon.min.js"></script>
</body>
</html>