<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
@vite(['resources/js/app.js'])

<footer class="smart-footer">
    <div class="footer-container">
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
                <li><a href="#servicos">Serviços</a></li>
                <li><a href="{{ route('sobre') }}">Sobre Nós</a></li>
            </ul>
        </div>
        
        <div class="footer-links">
            <h3 class="footer-title">Nossos Serviços</h3>
            <ul>
                <li><a href="#servicos">Consultoria CREA</a></li>
                <li><a href="#servicos">Consultoria Anatel</a></li>
                <li><a href="#servicos">Projetos de Redes Ópticas (FTTH)</a></li>
                <li><a href="#servicos">Consultoria ASN</a></li>
                <li><a href="#servicos">Compartilhamento de Portes</a></li>
                <li><a href="#servicos">Configuração de Equipamentos</a></li>
            </ul>
        </div>
        
        <div class="footer-contact">
            <div class="contact-section">
                <h3 class="footer-title">Endereço</h3>
                <div class="contact-item">
                    <i class="material-icons">place</i>
                    <p>Rua Daniel Esmero, 574, Croatá II</p>
                </div>
            </div>
            <div class="contact-section">
                <h3 class="footer-title">Contato</h3>
                <div class="contact-item">
                    <i class="material-icons">email</i>
                    <p>smart_telecom@gmail.com</p>
                </div>
                <div class="contact-item">
                    <i class="material-icons">phone</i>
                    <p>(85) 99152-7388</p>
                </div>
                <div class="contact-item">
                    <i class="material-icons">phone</i>
                    <p>(85) 99220-3010</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</p>
    </div>
</footer>

@push('styles')

@endpush

@push('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush
