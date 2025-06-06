
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
      <x-footer-app />
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