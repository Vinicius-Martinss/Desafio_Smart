@vite(['resources/js/app.js'])

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
        type="search"
        class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
        placeholder="Search..."
        aria-label="Search..." 
        autocomplete="none"
        />
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-md-auto">
   
    <!-- User Dropdown - ÁREA MODIFICADA -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-px-40 h-px-40 rounded-circle object-fit-cover" />
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
                    <img src="{{ Auth::user()->profile_photo_url }}" alt class="w-px-40 h-px-40 rounded-circle object-fit-cover" />
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
              {{ __('Gerenciar equipes') }}
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
                {{ __('Trocar de Equipe') }}
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
