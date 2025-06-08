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
                <h5 class="card-title text-center">Détails du Rapport</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>titre :</strong> <span id="details-titre">{{ $titre }}</span></p>
                                <p><strong>Description:</strong> <span id="details-description">{{ $description }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date de creation:</strong> <span id="details-datecreation">{{ $dateCreation }}</span></p>
                                <p><strong>	Contenu:</strong> <span id="details-Contenu">{{ $contenu }}</span></p>
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
   <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="../js/iconify-icon.min.js"></script>
</body>
</html>