<!doctype html>

<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Serviços</title>

    <meta name="description" content="" />   

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('/assets/vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href=" {{ url('/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    
    <link rel="stylesheet" href="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Helpers -->
    <script src="{{ url('/assets/vendor/js/helpers.js')}}"></script>
   

    <script src="{{ url('/assets/js/config.js')}}"></script>
    @vite(['resources/js/app.js'])
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

          <x-sidebar/>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <x-navbar/>

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- onde botar coisa na tela  -->
              
             
            </div>
            <!-- / Content -->

          <x-footer/>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      
    </div>


    <!-- Core JS -->

    <script src="{{ url('/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{ url('/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ url('/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ url('/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <script src="{{ url('/assets/js/main.js')}}"></script>
  </body>
</html>