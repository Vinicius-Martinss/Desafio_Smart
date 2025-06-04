
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}@isset($header) — {{ strip_tags($header) }}@endisset</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Sneat Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<!-- Helpers & Config -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>


  <!-- Vite + Livewire -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles

  <style>
    /* RESET DE ESTILOS */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Public Sans', sans-serif;
      background-color: #f5f5f9;
      overflow-x: hidden;
    }
    
    /* LAYOUT PRINCIPAL */
    .app-container {
      display: flex;
      min-height: 100vh;
    }
    
    /* SIDEBAR */
    .app-sidebar {
      width: 80px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      z-index: 1000;
      background: #fff;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      transition: transform 0.4s ease, width 0.4s ease;
      overflow: hidden;
    }
    
    .app-sidebar.expanded {
      width: 260px;
      transform: translateX(0);
      box-shadow: 5px 0 25px rgba(0,0,0,0.2);
    }
    
    /* ANIMAÇÃO DE ABERTURA */
    @keyframes slideIn {
      from {
        transform: translateX(-100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    .app-sidebar.expanded {
      animation: slideIn 0.3s ease forwards;
    }
    
    /* CONTEÚDO PRINCIPAL */
    .main-content {
      margin-left: 80px;
      width: calc(100% - 80px);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      transition: none;
    }
    
    .content-area {
      flex: 1;
      padding: 2rem;
    }
    
    /* NAVBAR */
    .app-navbar {
      background: #fff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      height: 64px;
      display: flex;
      align-items: center;
      padding: 0 2rem;
      position: sticky;
      top: 0;
      z-index: 900;
    }
    
    /* HEADER DE PÁGINA */
 /* HEADER DE PÁGINA (RESPONSIVO) */
.page-header {
  background: #fff;
  /* Use padding relativo para telas pequenas e médias */
  padding: 1rem 1rem;          
  /* Em telas grandes, aumente um pouco, mas sem exagerar */
  padding: clamp(1rem, 2vw, 1.5rem) clamp(1rem, 3vw, 2rem);

  /* Deixe o tamanho automático mas limite a um máximo */
  width: 100%;
  max-width: 100%;
  margin: 0 auto 1.5rem auto;

  border-radius: 0.5rem;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);

  /* Ajusta o texto para se comportar em responsividade */
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}

/* Título dentro do header */
.page-header h2,
.page-header h4 {
  margin: 0;
  font-size: clamp(1.25rem, 2vw, 1.75rem);
  line-height: 1.2;
}

/* Se você tiver um breadcrumb ou subtítulo ao lado */
.page-header .subheader {
  font-size: clamp(0.875rem, 1.5vw, 1rem);
  color: #666;
  margin-top: 0.25rem;
}

/* Em telas pequenas, centraliza tudo e empilha verticalmente */
@media (max-width: 576px) {
  .page-header {
    flex-direction: column;
    align-items: flex-start;
    padding: 1rem;
  }
  .page-header h2,
  .page-header h4 {
    font-size: 1.25rem;
  }
  .page-header .subheader {
    font-size: 0.875rem;
  }
}
    
    /* RESPONSIVIDADE */
    @media (max-width: 992px) {
      .main-content {
        margin-left: 0;
        width: 100%;
      }
      
      .app-sidebar {
        transform: translateX(-100%);
      }
      
      .app-sidebar.expanded {
        width: 260px;
        transform: translateX(0);
        box-shadow: 5px 0 25px rgba(0,0,0,0.2);
      }
    }
  </style>

@stack('styles')
</head>
<body>
  <div class="app-container">
    <!-- Sidebar -->
    <aside class="app-sidebar collapsed">
      <x-sidebar />
    </aside>

    <!-- Conteúdo principal -->
    <div class="main-content">
      <!-- Navbar -->
      <nav class="app-navbar">
        <x-navbar />
      </nav>

      <!-- Conteúdo da página -->
      <div class="content-area">
        @if (isset($header))
          <header class="page-header">
            {!! $header !!}
          </header>
        @endif

        <main>
          {{ $slot }}
        </main>
      </div>

      <!-- Footer -->
      <x-footer />
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.querySelector('.app-sidebar');
      const toggleBtn = document.querySelector('.toggle-btn');
      
      if(toggleBtn) {
        toggleBtn.addEventListener('click', function() {
          const isExpanding = !sidebar.classList.contains('expanded');
          
          sidebar.classList.toggle('collapsed');
          sidebar.classList.toggle('expanded');
          
          // Alternar ícone
          const icon = toggleBtn.querySelector('i');
          if (sidebar.classList.contains('expanded')) {
            icon.classList.replace('bx-chevrons-right', 'bx-chevrons-left');
          } else {
            icon.classList.replace('bx-chevrons-left', 'bx-chevrons-right');
          }
          
          // Bloquear scroll em mobile quando sidebar aberta
          if(window.innerWidth <= 992) {
            document.body.style.overflow = isExpanding ? 'hidden' : '';
          }
        });
      }
      
      // Fechar sidebar ao clicar fora em mobile
      document.addEventListener('click', function(event) {
        if(window.innerWidth <= 992 && sidebar.classList.contains('expanded')) {
          if(!sidebar.contains(event.target) {
            sidebar.classList.remove('expanded');
            sidebar.classList.add('collapsed');
            
            const icon = toggleBtn.querySelector('i');
            icon.classList.replace('bx-chevrons-left', 'bx-chevrons-right');
            document.body.style.overflow = '';
          }
        }
      });
    });
  </script>
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@stack('scripts')
@stack('modals')
 @livewireScripts
</body>
</html>