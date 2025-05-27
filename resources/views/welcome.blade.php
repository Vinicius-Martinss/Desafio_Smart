
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

<style>

[v-cloak], .v-cloak { display: none !important; }



</style>

<body class="v-cloak">
  <!-- Navbar no padrão Smart Telecom -->
  <nav class="smart-navbar">
    <div class="nav-container">
      <!-- Logo -->
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img/LogoHorizontal.png')}}" alt="Smart Telecom">
      </a>
      
      <!-- Menu -->
      <div class="nav-menu">
        <a href="#">Início</a>
        <a href="#servicos">Serviços</a>
        <a href="/sobre">Sobre Nós</a>
        <a href="/blog">Blog</a>
      </div>
      
      <!-- Botões -->
      <div class="nav-actions">
        <a href="/login" class="login-areacliente" >Área do Cliente</a>
        <a href="/contato" class="btn-contact">Fale Conosco</a>
      </div>
    </div>
  </nav>

  <section class="hero-banner">
    <div class="hero-container">
      <!-- Conteúdo do lado esquerdo -->
      <div class="hero-text">
        <h1 class="hero-title">Soluções em Telecomunicações para sua Empresa</h1>
        <p class="hero-subtitle">Internet dedicada, links corporativos e soluções em nuvem com a qualidade Smart Telecom</p>
        <div class="hero-buttons">
          <a href="#servicos" class="btn-primary">Nossos Serviços</a>
        </div>
      </div>
      
      <!-- Imagem colada à direita -->
      <img src="{{ asset('img/projetos.png') }}" alt="Soluções Telecom" class="hero-image">
    </div>
  </section>


  <section id="servicos" class="espacamento bg-gray-50 py-12"> 
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <!-- Título principal destacado -->
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
          <span class="border-b-4 border-blue-500 pb-2">Nossos Serviços</span>
        </h2>
        
        <!-- Frase descritiva com maior destaque -->
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Conheça nossas <span class="font-semibold text-blue-600">soluções completas</span> em telecomunicações para sua empresa
        </p>
      </div>

      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row mb-12 g-6">

            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Consultoria CREA"
                   data-description="Ajudamos você a registrar e regularizar seus projetos de engenharia junto ao CREA, cuidando de toda a parte burocrática e técnica."
                   data-img="{{ asset('img/crea.jpeg') }}"
                   data-price="1200"> <!-- Alterado para apenas o número -->
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/crea.jpeg') }}" alt="Serviço Crea">
                  <h5 class="card-title">Consultoria CREA</h5>
                  <p class="card-text flex-grow-1">Assessoria completa para registro...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ <span class="price-value">1.200</span><small>/mês</small></h4>
                      </div>
                      <span class="badge bg-success bg-opacity-10 text-success">+ Popular</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Consultoria Anatel"
                   data-description="Guiamos seu produto ou serviço de telecomúnicações por todas as etapas de homologação na Anatel, desde a coleta de documentos até a aprovação final. Com nosso apoio, você ganha agilidade e evita retrabalhos, colocando sua solução no mercado com total segurança."
                   data-img="{{ asset('img/anatel.jpeg') }}"
                   data-price="1800">
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/anatel.jpeg') }}" alt="Serviço Anatel">
                  <h5 class="card-title">Consultoria Anatel</h5>
                  <p class="card-text flex-grow-1">Orientação especializada na homologação...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ 1.800<small>/mês</small></h4>
                      </div>
                      <span class="badge bg-info bg-opacity-10 text-info">Homologação</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Projetos de Redes Ópticas (FTTH)"
                   data-description="Desenhamos redes de fibra óptica de alta performance, entregando cobertura ponta a ponta e capacidade para crescer conforme sua demanda. Cada projeto é feito sob medida, garantindo baixíssima latência e facilidade de manutenção no futuro."
                   data-img="{{ asset('img/FTTH.jpeg') }}"
                   data-price="2500">
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/FTTH.jpeg') }}" alt="Serviço FTTH">
                  <h5 class="card-title">Projetos FTTH</h5>
                  <p class="card-text flex-grow-1">Desenvolvemos projetos de fibra óptica...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ 2.500<small>/projeto</small></h4>
                      </div>
                      <span class="badge bg-warning bg-opacity-10 text-warning">Personalizado</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Consultoria ASN"
                   data-description="Registro ASN na LACNIC|Configuração BGP|Políticas de roteamento|Treinamento técnico"
                   data-img="{{ asset('img/asn.jpeg') }}"
                   data-price="3200">
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/asn.jpeg') }}" alt="Consultoria ASN">
                  <h5 class="card-title">Consultoria ASN</h5>
                  <p class="card-text flex-grow-1">Obtenha seu próprio Sistema Autônomo (ASN)...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ 3.200<small>/mês</small></h4>
                      </div>
                      <span class="badge bg-danger bg-opacity-10 text-danger">Essencial</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Compartilhamento de Portes"
                   data-description="Projeto de rede compartilhada|Dimensionamento preciso|Documentação para Anatel|Gestão de acessos."
                   data-img="{{ asset('img/poste.jpeg') }}"
                   data-price="2800">
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/poste.jpeg') }}" alt="Compartilhamento de Portes">
                  <h5 class="card-title">Compartilhamento de Portes</h5>
                  <p class="card-text flex-grow-1">Solução econômica para compartilhamento de infraestrutura física...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ 2.800<small>/mês</small></h4>
                      </div>
                      <span class="badge bg-warning text-dark mb-2">Economia de até 40%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6 col-lg-4">
              <div class="card h-100 hover-card shadow-sm"
                   data-bs-toggle="modal" 
                   data-bs-target="#serviceModal"
                   data-title="Configuração de Equipamentos"
                   data-description="ONT/OLT|Roteadores Cisco/Mikrotik|Switches gerenciaveis|Firewalls"
                   data-img="{{ asset('img/config.jpeg') }}"
                   data-price="2200">
                   
                <div class="card-body d-flex flex-column">
                  <img class="card-img-top card-img-fixed mb-3" src="{{ asset('img/config.jpeg') }}" alt="Configuração de Equipamentos">
                  <h5 class="card-title">Configuração de Equipamentos</h5>
                  <p class="card-text flex-grow-1">Configuração profissional de equipamentos de rede...</p>
                  
                  <div class="mt-auto pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-end">
                      <div>
                        <small class="text-muted">Valor a partir de</small>
                        <h4 class="text-primary mb-0">R$ 2.200<small>/mês</small></h4>
                      </div>
                      <span class="badge bg-success bg-opacity-10 text-success">(20% off)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </section>

 <!-- Modal -->
 <div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header border-0 pb-0">
        <h3 class="modal-title fw-bold" id="modalServiceTitle"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body pt-0">
        <div class="row g-4">
          <div class="col-md-6">
            <img id="modalServiceImage" src="" class="img-fluid rounded-3" alt="">
          </div>
          
          <div class="col-md-6">
            <p id="modalServiceDescription" class="lead"></p>
            
            <div class="bg-light p-4 rounded-3 mb-4">
              <h5 class="d-flex align-items-center gap-2">
                <i class="fas fa-tag text-primary"></i>
                <span>Valores</span>
              </h5>
              
              <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                <div>
                  <h6 class="mb-0">Plano Básico</h6>
                  <small class="text-muted">Para pequenos projetos</small>
                </div>
                <span class="badge bg-primary bg-opacity-10 text-primary fs-6">R$ <span id="modalPriceValue">1.200</span>/mês</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal-footer border-0 bg-light rounded-bottom-3">
        <div class="d-flex flex-column w-100 gap-2">
          <div class="d-flex gap-2">
            <a href="https://wa.me/5511999999999?text=Gostaria%20de%20contratar%20o%20serviço" 
               class="btn btn-success flex-grow-1 py-2"
               target="_blank">
              <i class="fab fa-whatsapp me-2"></i> Contratar pelo WhatsApp
            </a>
            
            <a href="/login?service=crea" 
               class="btn btn-outline-primary flex-grow-1 py-2">
              <i class="fas fa-user-circle me-2"></i> Área do Cliente
            </a>
          </div>
          
          <button type="button" 
                  class="btn btn-link text-muted text-decoration-none" 
                  data-bs-dismiss="modal">
            <small>Ou solicite um orçamento personalizado depois</small>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

  <x-footer></x-footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome para ícones sociais -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.bundle.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.body.classList.remove('v-cloak');
    });
  </script>

</body>
</html>
>>>>>>> salvando-alteracoes
