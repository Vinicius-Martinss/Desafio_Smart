<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-papYI9hzzsR3g9tvz9+jrHT8...==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<footer class="smart-footer">
  <div class="footer-main">
    <div class="footer-brand">
      <img src="{{ asset('img/Logo.png') }}" alt="Smart Telecom">
      <span class="brand-name">Smart Telecom</span>
    </div>
    
    <div class="footer-social">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>

    <div class="footer-contact">
      <p><i class="material-icons">email</i> smart_telecom@gmail.com</p>
      <p><i class="material-icons">phone</i> (85) 99152-7388</p>
      <p><i class="material-icons">phone</i> (85) 99220-3010</p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; {{ date('Y') }} Smart Telecom. Todos os direitos reservados.</p>
  </div>
</footer>


<style>
  :root {
    --fundo: #ebebeb;
    --detalhe: #3ab6c9;
    --cor-acento: #464646;
    --texto: #131313;
  }

  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .smart-footer {
    background: var(--texto);
    color: var(--fundo);
    padding: 20px 15px 15px;
    border-radius: 40px 40px 0 0;
    font-size: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .footer-main {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    width: 100%;
    max-width: 900px;
    margin-bottom: 15px;
  }

  /* Aqui o footer-brand empilha a imagem e o nome */
  .footer-brand {
    display: flex;
    flex-direction: column; /* empilha vertical */
    align-items: center; /* centraliza horizontal */
    font-weight: 700;
    font-size: 1.1rem;
    text-transform: capitalize;
    gap: 6px; /* espaço entre logo e texto */
  }

  .footer-brand img {
    width: 40px;
    height: 40px;
  }

  .footer-social a {
    color: var(--fundo);
    font-size: 18px;
    margin: 0 8px;
    transition: color 0.3s ease;
  }

  .footer-social a:hover {
    color: var(--detalhe);
  }

  .footer-contact p {
    margin: 5px 0;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .footer-contact i.material-icons {
    font-size: 20px;
    color: var(--detalhe);
  }

  .footer-bottom {
    border-top: 1px solid rgba(255 255 255 / 0.1);
    padding-top: 8px;
    width: 100%;
    max-width: 900px;
    text-align: center;
  }

  .footer-bottom p {
    margin: 0;
    font-size: 12px;
    color: var(--fundo);
  }

  @media (max-width: 480px) {
    .footer-main {
      flex-direction: column;
      align-items: center;
      gap: 20px;
    }

    .footer-contact p {
      font-size: 13px;
    }
  }
</style>
