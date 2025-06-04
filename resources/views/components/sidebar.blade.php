@vite(['resources/js/app.js'])
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme collapsed">
    <div class="app-brand demo position-relative">
    <a href="{{ route('dashboard') }}" class="app-brand-link d-flex align-items-center">
      <img src="{{ asset('img/Logo.png') }}" alt="Smart Telecom" class="d-block" style="height: 65px; width: auto; " />
    </a>    
    <button id="menu-toggle-btn" class="btn p-0 toggle-btn">
      <i class="bx bx-chevrons-right fs-4"></i>
    </button>
  </div>
  
  <div class="menu-divider mt-0"></div>
  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Seção Suporte - Serviços como link simples -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>
    <li class="menu-item">
      <a href="{{ route('dashboard') }}" class="menu-link"> 
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div class="text-truncate" data-i18n="Account Settings">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase"><span class="menu-header-text">Serviços</span></li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div class="text-truncate" data-i18n="Account Settings">Serviços</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('planos.index') }}" class="menu-link" >
            <div class="text-truncate" data-i18n="Basic">Planos</div>
          </a>
        </li>

      </ul>
    </li>


    <!-- Itens COM dropdown (mantidos) -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Configurações</span></li>
    <li class="menu-item active open">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
        <div class="text-truncate" data-i18n="Authentications">Conta Empresa</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="menu-link">
            <div class="text-truncate" data-i18n="Basic">Informações</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('teams.create') }}" class="menu-link" >
            <div class="text-truncate" data-i18n="Basic">Teams</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('api-tokens.index') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Basic"> API Tokens</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Outro item COM dropdown -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div class="text-truncate" data-i18n="Account Settings">Conta Pessoal</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('profile.show') }}" class="menu-link" >
            <div class="text-truncate" data-i18n="Basic">Informações</div>
          </a>
        </li>

      </ul>
    </li>
  </ul>
</aside>