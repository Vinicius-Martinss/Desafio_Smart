<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<footer class="smart-footer">
    <div class="footer-container">
        <!-- Coluna 1: Logo e sobre -->
        <div class="footer-about">
            <div class="footer-logo" style="display: flex; align-items: center;">
                <img style="width: 50px; height: 50px" src="{{ asset('img/Logo.png') }}" alt="{{ config('app.name') }}">
                <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1" style="text-transform: capitalize"> Smart telecom</span>
            </div>
            <p class="mt-3 md:mt-0">Oferecendo soluções inovadoras em telecomunicações com qualidade e excelência no atendimento.</p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
        </div>
        
        <div class="footer-links">
            <h3 class="footer-title">Links Rápidos</h3>
            <ul>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('servicos') }}">Serviços</a></li>
                <li><a href="{{ route('about') }}">Sobre Nós</a></li>
                <li><a href="{{ route('contact') }}">Contato</a></li>
            </ul>
        </div>
        
        <div class="footer-links">
            <h3 class="footer-title">Nossos Serviços</h3>
            <ul>
                <li><a href="{{ route('servicos') }}">Consultoria CREA</a></li>
                <li><a href="{{ route('servicos') }}">Consultoria Anatel</a></li>
                <li><a href="{{ route('servicos') }}">Projetos de Redes Ópticas (FTTH)</a></li>
                <li><a href="{{ route(name: 'servicos') }}">Consultoria ASN</a></li>
                {{--Exemplo de como vai ser as rotas
                <li><a href="{{ route(name: 'services.cloud') }}">Cloud Computing</a></li>
                --}}
                <li><a href="{{ route('servicos') }}">Compartilhamento de Portes</a></li>
                <li><a href="{{ route('servicos') }}">Configuração de Equipamentos</a></li>

        </div>
        
        <div class="footer-contact">
            <h3 class="footer-title">Contato</h3>
            <p><i class="material-icons">place</i>Rua Daniel Esmero, 574, Croatá II</p>
            <p><i class="material-icons">email</i>smart_telecom@gmail.com</p>
            <p><i class="material-icons">phone</i>85991527388</p>
            <p><i class="material-icons">phone</i>85992203010</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

@push('styles')
<style>
    .smart-footer { background: #2b2b2b; color: white; padding: 60px 0 30px; }
    .footer-container { max-width: 1400px; margin: 0 auto; padding: 0 20px; 
        display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; }
</style>
@endpush

@push('scripts')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush