<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="layout-menu-fixed layout-compact"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}@isset($header) — {{ strip_tags($header) }}@endisset</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

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
</head>
<body class="layout-menu-fixed layout-content-navbar">
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      {{-- seu sidebar --}}
      <x-sidebar />

      <div class="layout-page">

        {{-- seu navbar --}}
        <x-navbar />

        <div class="content-wrapper">

          {{-- slot de header --}}
          @if (isset($header))
            <header class="bg-white shadow-sm">
              <div class="container-xxl py-4 px-4">
                {!! $header !!}
              </div>
            </header>
          @endif

          {{-- slot de conteúdo --}}
          <main class="container-xxl flex-grow-1 container-p-y">
            {{ $slot }}
          </main>

          {{-- seu footer --}}
          <x-footer />

          <div class="content-backdrop fade"></div>
        </div>

      </div>
    </div>
  </div>

  <!-- Sneat Core JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('modals')
  @livewireScripts
</body>
</html>
