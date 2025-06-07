<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Sobre Nós – Smart Telecom</title>

  {{-- Fonts e ícones --}}
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  {{-- CSS Sneat Bootstrap --}}
  <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/core.css"/>
  <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/theme-default.css"/>
  @vite(['resources/js/app.js'])

 
</head>
<body>

  {{-- Navbar (inalterada) --}}
  <nav class="smart-navbar">
    <div class="nav-container">
      <a class="navbar-brand" href="/"><img src="{{ asset('img/LogoHorizontal.png') }}" alt="Smart Telecom"></a>
      <div class="nav-menu">
        <a href="/">Início</a>
        <a href="#servicos">Serviços</a>
        <a href="/sobre" class="active">Sobre Nós</a>
      </div>
      <div class="nav-actions">
        <a href="/login" class="login-areacliente">Área do Cliente</a>
        <a href="/contato" class="btn-contact">Fale Conosco</a>
      </div>
    </div>
  </nav>

  <main class="py-5" style="margin-top: 50px;">


    {{-- 1. Introdução --}}
    <section class="container py-5">
      <h1 class="mb-4">Conheça a Smart Telecom</h1>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <p class="lead">Desde 2010, a Smart Telecom entrega soluções de telecomunicações corporativas com foco em performance, segurança e atendimento personalizado.</p>
        </div>
        <div class="col-lg-6 text-center">
          <img src="{{ asset('img/LogoHorizontal.png') }}" alt="Smart Telecom" class="img-fluid rounded shadow-sm" style="width: 500px">
        </div>
      </div>
    </section>

    {{-- 2. Nossos Diferenciais --}}
    <section class="bg-white py-5">
      <div class="container text-center">
        <h2 class="section-title">Por que nos escolher?</h2>
        <div class="row gy-4 mt-4">
          <div class="col-md-4">
            <i class="fas fa-user-shield feature-icon"></i>
            <h5>Segurança</h5>
            <p>Infraestrutura robusta e criptografia de ponta a ponta.</p>
          </div>
          <div class="col-md-4">
            <i class="fas fa-tachometer-alt feature-icon"></i>
            <h5>Alta Performance</h5>
            <p>Conexões estáveis com baixa latência garantida.</p>
          </div>
          <div class="col-md-4">
            <i class="fas fa-headset feature-icon"></i>
            <h5>Suporte 24/7</h5>
            <p>Equipe especializada disponível a qualquer hora.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- 3. Missão, Visão e Valores --}}
    <section class="container py-5">
      <h2 class="section-title">Missão, Visão & Valores</h2>
      <div class="row gy-4">
        <div class="col-md-4">
          <h5>Missão</h5>
          <p>Conectar empresas ao futuro com soluções de telecom inteligentes.</p>
        </div>
        <div class="col-md-4">
          <h5>Visão</h5>
          <p>Ser referência nacional em serviços de telecom corporativa.</p>
        </div>
        <div class="col-md-4">
          <h5>Valores</h5>
          <ul class="list-unstyled">
            <li>• Compromisso</li>
            <li>• Ética</li>
            <li>• Inovação</li>
            <li>• Qualidade</li>
            <li>• Foco no Cliente</li>
          </ul>
        </div>
      </div>
    </section>

    {{-- 4. Equipe --}}
    <section class="bg-white py-5">
      <div class="container text-center">
        <h2 class="section-title">Nossa Equipe</h2>
        <div class="row gy-4 justify-content-center mt-4">
          <div class="col-6 col-md-3">
            <img src="{{ asset('img/func.jpeg') }}" alt="João Silva" class="rounded-circle mb-2" style="width:140px; height:140px; object-fit:cover;">
            <h6>João Silva</h6>
            <small class="text-muted">CEO & Fundador</small>
          </div>
          <div class="col-6 col-md-3">
            <img src="{{ asset('img/func1.jpeg') }}" alt="Mariana Costa" class="rounded-circle mb-2" style="width:140px; height:140px; object-fit:cover;">
            <h6>Mariana Costa</h6>
            <small class="text-muted">Gerente de Projetos</small>
          </div>
        </div>
      </div>
    </section>

    {{-- 5. Chamada para ação simples --}}
    <section class="container py-5 text-center">
      <div class="d-flex flex-column w-100 gap-2 align-items-center">
        <div class="d-flex gap-2 w-100 justify-content-center flex-wrap">
          <a href="https://wa.me/5511999999999?text=Gostaria%20de%20contratar%20o%20servi%C3%A7o"
             class="btn btn-lg"
             style="background: var(--detalhe); color: #fff;"
             target="_blank">
            <i class="fab fa-whatsapp me-2"></i> Fale Conosco
          </a>
        </div>
      </div>
    </section>

  </main>

  {{-- Rodapé --}}
  <x-footer-app />

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
