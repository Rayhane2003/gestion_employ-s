<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
</head>

<body>
  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="../assets/images/logos/logo-light.svg" alt="">
                  </a>
                  <p class="text-center"> Votre société SCN Globale </p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  <form action="{{ route('connecter') }}" method="post">
                      @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">nom d'utilisateur</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name='nom'>
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name='password'>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                    </div>
                    <input type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Se connecter">
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>