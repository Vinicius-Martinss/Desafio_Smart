@vite(['resources/js/app.js'])
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
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
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Suporte</span></li>
    <li class="menu-item">
      <a href="{{ route('servicos') }}" class="menu-link"> <!-- Removido menu-toggle e colocado link real -->
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div class="text-truncate" data-i18n="Account Settings">Serviços</div>
      </a>
    </li>

    <!-- Removi a segunda entrada duplicada de Serviços -->
    
    <!-- Itens COM dropdown (mantidos) -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Suporte</span></li>
    <li class="menu-item active open">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
        <div class="text-truncate" data-i18n="Authentications">Authentications</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="auth-login-basic.html" class="menu-link" target="_blank">
            <div class="text-truncate" data-i18n="Basic">Login</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="auth-register-basic.html" class="menu-link" target="_blank">
            <div class="text-truncate" data-i18n="Basic">Register</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
            <div class="text-truncate" data-i18n="Basic">Forgot Password</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Outro item COM dropdown -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div class="text-truncate" data-i18n="Account Settings">Account Settings</div>
      </a>
      <ul class="menu-sub">
        <!-- Subitens podem ser adicionados aqui -->
      </ul>
    </li>
  </ul>
</aside>