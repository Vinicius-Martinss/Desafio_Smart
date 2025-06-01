document.addEventListener('DOMContentLoaded', function() {
  // Verificar se o modal de serviços existe na página
  const serviceModal = document.getElementById('serviceModal');
  
  if (serviceModal) {
      serviceModal.addEventListener('show.bs.modal', function(event) {
          const card = event.relatedTarget;
          
          // Preenche conteúdo básico
          setContent('modalServiceTitle', card.getAttribute('data-title'));
          setContent('modalServiceDescription', card.getAttribute('data-description'));
          
          const imgElement = document.getElementById('modalServiceImage');
          if (imgElement) {
              imgElement.src = card.getAttribute('data-img') || '';
          }
          
          // Preenche valores
          const price = card.getAttribute('data-price') || '0.00';
          setContent('modalPriceValue', price);
          
          // Atualiza link do WhatsApp
          const whatsappBtn = document.querySelector('#serviceModal .btn-success');
          if (whatsappBtn) {
              const serviceName = encodeURIComponent(card.getAttribute('data-title') || 'Serviço');
              whatsappBtn.href = `https://wa.me/5511999999999?text=Gostaria%20de%20saber%20mais%20sobre%20${serviceName}`;
          }
      });
  }

  // Função auxiliar para definir conteúdo
  function setContent(id, content) {
      const element = document.getElementById(id);
      if (element) element.textContent = content || '';
  }

  // Remover classe de carregamento
  if (document.body.classList.contains('v-cloak')) {
      document.body.classList.remove('v-cloak');
  }
});