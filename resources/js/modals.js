document.addEventListener('DOMContentLoaded', function() {
    const serviceModal = document.getElementById('serviceModal');
    
    serviceModal.addEventListener('show.bs.modal', function(event) {
      const card = event.relatedTarget;
      
      // Preenche conteúdo básico
      document.getElementById('modalServiceTitle').textContent = card.getAttribute('data-title');
      document.getElementById('modalServiceDescription').textContent = card.getAttribute('data-description');
      document.getElementById('modalServiceImage').src = card.getAttribute('data-img');
      
      // Preenche valores
      const price = card.getAttribute('data-price');
      document.getElementById('modalPriceValue').textContent = price;
      
      // Atualiza link do WhatsApp com o serviço selecionado
      const whatsappBtn = document.querySelector('#serviceModal .btn-success');
      const serviceName = encodeURIComponent(card.getAttribute('data-title'));
      whatsappBtn.href = `https://wa.me/5511999999999?text=Gostaria%20de%20saber%20mais%20sobre%20${serviceName}`;
    });
  });

// Inicializa quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initializeServiceModals();
    document.body.classList.remove('v-cloak');
});