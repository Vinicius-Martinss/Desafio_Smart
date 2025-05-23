<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Telecom</title>

  <!-- Fontes -->
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/core.css" />
  <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/theme-default.css" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  @vite(['resources/js/app.js'])
</head>

<body>
  <!-- Navbar no padrão Smart Telecom -->
  <nav class="smart-navbar">
    <div class="nav-container">
      <!-- Logo -->
      <a class="navbar-brand" href="/">
        <img src="https://smarttelecom.eng.br/wp-content/uploads/2023/05/logo.png" alt="Smart Telecom">
      </a>
      
      <!-- Menu -->
      <div class="nav-menu">
        <a href="/">Início</a>
        <a href="/servicos">Serviços</a>
        <a href="/sobre">Sobre Nós</a>
        <a href="/blog">Blog</a>
        <a href="/contato">Contato</a>
      </div>
      
      <!-- Botões -->
      <div class="nav-actions">
        <a href="/login" class="text-primary">Área do Cliente</a>
        <a href="/contato" class="btn-contact">Fale Conosco</a>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <h4>Conteúdo da sua página aqui</h4>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer no estilo Smart Telecom -->
  <footer class="smart-footer">
    <div class="footer-container">
      <!-- Coluna 1: Logo e sobre -->
      <div class="footer-about">
        <div class="footer-logo">
          <img src="https://smarttelecom.eng.br/wp-content/uploads/2023/05/logo.png" alt="Smart Telecom">
        </div>
        <p>Oferecendo soluções inovadoras em telecomunicações com qualidade e excelência no atendimento.</p>
        <div class="footer-social">
          <a href="#"><i class="material-icons">facebook</i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      
      <!-- Coluna 2: Links rápidos -->
      <div class="footer-links">
        <h3 class="footer-title">Links Rápidos</h3>
        <ul>
          <li><a href="/">Início</a></li>
          <li><a href="/servicos">Serviços</a></li>
          <li><a href="/sobre">Sobre Nós</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/contato">Contato</a></li>
        </ul>
      </div>
      
      <!-- Coluna 3: Serviços -->
      <div class="footer-links">
        <h3 class="footer-title">Nossos Serviços</h3>
        <ul>
          <li><a href="/servicos/link-dedicado">Link Dedicado</a></li>
          <li><a href="/servicos/internet">Internet Empresarial</a></li>
          <li><a href="/servicos/telefonia">Telefonia VoIP</a></li>
          <li><a href="/servicos/cloud">Cloud Computing</a></li>
          <li><a href="/servicos/seguranca">Segurança Digital</a></li>
        </ul>
      </div>
      
      <!-- Coluna 4: Contato -->
      <div class="footer-contact">
        <h3 class="footer-title">Contato</h3>
        <p><i class="material-icons">place</i> Av. Exemplo, 1234 - São Paulo/SP</p>
        <p><i class="material-icons">email</i> contato@smarttelecom.com.br</p>
        <p><i class="material-icons">phone</i> (11) 1234-5678</p>
        <p><i class="material-icons">schedule</i> Seg-Sex: 8h às 18h</p>
      </div>
    </div>
    
    <!-- Rodapé inferior -->
    <div class="footer-bottom">
      <div class="footer-container">
        <p>&copy; 2025 Smart Telecom. Todos os direitos reservados.</p>
      </div>
    </div>

  </footer>

  <!-- Scripts -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.bundle.js"></script>
  <!-- Font Awesome para ícones sociais -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.bundle.js"></script>
</body>
</html>