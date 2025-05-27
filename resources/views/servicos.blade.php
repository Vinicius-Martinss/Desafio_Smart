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

    <title>Demo: Container - Layouts | Sneat - Bootstrap Dashboard FREE</title>

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

    <!-- endbuild -->

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

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

          <nav
            class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base bx bx-menu icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center me-auto">
                <div class="nav-item d-flex align-items-center">
                  <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
               
                <!-- User Dropdown - ÁREA MODIFICADA -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-px-40 h-auto rounded-circle" />
                      @else
                        <div class="avatar-initials bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                          {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                      @endif
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                              <div class="avatar avatar-online">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt class="w-px-40 h-auto rounded-circle" />
                              </div>
                            @else
                              <div class="avatar-initials bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                              </div>
                            @endif
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <small class="text-body-secondary">{{ Auth::user()->email }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    <li><div class="dropdown-divider my-1"></div></li>
                    
                    <li>
                      <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="icon-base bx bx-user icon-md me-3"></i>
                        <span>{{ __('Profile') }}</span>
                      </a>
                    </li>
                    
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <li>
                        <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                          <i class="icon-base bx bx-key icon-md me-3"></i>
                          <span>{{ __('API Tokens') }}</span>
                        </a>
                      </li>
                    @endif
                    
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                      <li><div class="dropdown-divider my-1"></div></li>
                      
                      <li>
                        <div class="dropdown-header text-body-secondary small">
                          {{ __('Manage Team') }}
                        </div>
                      </li>
                      
                      <li>
                        <a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                          <i class="icon-base bx bx-group icon-md me-3"></i>
                          <span>{{ __('Team Settings') }}</span>
                        </a>
                      </li>
                      
                      @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <li>
                          <a class="dropdown-item" href="{{ route('teams.create') }}">
                            <i class="icon-base bx bx-plus-circle icon-md me-3"></i>
                            <span>{{ __('Create New Team') }}</span>
                          </a>
                        </li>
                      @endcan
                      
                      @if (Auth::user()->allTeams()->count() > 1)
                        <li><div class="dropdown-divider my-1"></div></li>
                        
                        <li>
                          <div class="dropdown-header text-body-secondary small">
                            {{ __('Switch Teams') }}
                          </div>
                        </li>
                        
                        @foreach (Auth::user()->allTeams() as $team)
                          <li>
                            <form method="POST" action="{{ route('current-team.update') }}" x-data>
                              @method('PUT')
                              @csrf
                              <input type="hidden" name="team_id" value="{{ $team->id }}">
                              
                              <a class="dropdown-item" href="#" @click.prevent="$root.submit();">
                                @if (Auth::user()->isCurrentTeam($team))
                                  <i class="icon-base bx bx-check icon-md me-3 text-success"></i>
                                @else
                                  <i class="icon-base bx bx-circle icon-md me-3"></i>
                                @endif
                                <span>{{ $team->name }}</span>
                              </a>
                            </form>
                          </li>
                        @endforeach
                      @endif
                    @endif
                    
                    <li><div class="dropdown-divider my-1"></div></li>
                    
                    <li>
                      <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                          <i class="icon-base bx bx-power-off icon-md me-3"></i>
                          <span>{{ __('Log Out') }}</span>
                        </a>
                      </form>
                    </li>
                  </ul>
                </li>
                <!--/ User Dropdown -->
              </ul>
            </div>
          </nav>

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
    {{ url('')}}
    <script src="{{ url('/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{ url('/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ url('/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ url('/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <script src="{{ url('/assets/js/main.js')}}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>