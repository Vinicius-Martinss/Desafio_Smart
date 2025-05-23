<footer class="smart-footer">
    <div class="footer-container">
        <!-- Coluna 1: Logo e sobre -->
        <div class="footer-about">
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
            </div>
            <p>Oferecendo soluções inovadoras em telecomunicações com qualidade e excelência no atendimento.</p>
            <div class="footer-social">
                <!-- Ícones atualizados (Font Awesome 6) -->
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
        </div>
        
        <!-- Coluna 2: Links rápidos -->
        <div class="footer-links">
            <h3 class="footer-title">Links Rápidos</h3>
            <ul>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('#') }}">Serviços</a></li>
                <li><a href="{{ route('#') }}">Sobre Nós</a></li>
                <li><a href="{{ route('#') }}">Blog</a></li>
                <li><a href="{{ route('#') }}">Contato</a></li>
            </ul>
        </div>
        
        <!-- Coluna 3: Serviços -->
        <div class="footer-links">
            <h3 class="footer-title">Nossos Serviços</h3>
            <ul>
                <li><a href="{{ route('services.dedicated') }}">Link Dedicado</a></li>
                <li><a href="{{ route('services.internet') }}">Internet Empresarial</a></li>
                <li><a href="{{ route('services.voip') }}">Telefonia VoIP</a></li>
                <li><a href="{{ route('services.cloud') }}">Cloud Computing</a></li>
                <li><a href="{{ route('services.security') }}">Segurança Digital</a></li>
            </ul>
        </div>
        
        <!-- Coluna 4: Contato -->
        <div class="footer-contact">
            <h3 class="footer-title">Contato</h3>
            <p><i class="material-icons">place</i> {{ config('contact.address') }}</p>
            <p><i class="material-icons">email</i> {{ config('contact.email') }}</p>
            <p><i class="material-icons">phone</i> {{ config('contact.phone') }}</p>
            <p><i class="material-icons">schedule</i> {{ config('contact.hours') }}</p>
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
    /* Estilos do footer aqui (os mesmos do código anterior) */
    .smart-footer { background: #2b2b2b; color: white; padding: 60px 0 30px; }
    .footer-container { max-width: 1400px; margin: 0 auto; padding: 0 20px; 
        display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; }
    /* ... (continuar com todos os outros estilos do footer) ... */
</style>
@endpush

@push('scripts')
<!-- Ícones -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush