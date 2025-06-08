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
                <h5 class="card-title text-center">Détails du congé</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
 @if($photoProfil == null)
                        <img id="details-photo" src=" {{ asset('image/' .$photoProfil) }} " class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                       @else
<div class="profile-image-placeholder"><i class="bi bi-person-circle" style="font-size: 40px; color: #a0aec0;"></i></div>
@endif                        <div>
                            <span class="badge rounded-pill" id="details-status"></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nom:</strong> <span id="details-nom">  {{ $nom }}</span></p>
                                <p><strong>Prénom:</strong> <span id="details-prenom">  {{ $prenom }} </span></p>
                                <p><strong>Type Congé:</strong> <span id="details-type-conge">{{ $typeConge }}</span></p>
                            </div>
                            <div class="col-md-6">
                               <p><strong>Date Début:</strong> <span id="details-date-debut">{{ $dateDebut }}</span></p>
                                <p><strong>Date Fin:</strong> <span id="details-date-fin">{{ $dateFin }}</span></p>
                                <p><strong>Document:</strong> <a href=" {{ asset('image/' .$documentsJustification) }}" id="details-document-link" target="_blank">Voir document</a></p>
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