document.addEventListener('DOMContentLoaded', () => {
  const menu = document.getElementById('layout-menu');
  const btn   = document.getElementById('menu-toggle-btn');
  const icon  = btn.querySelector('i');

  // abre ao passar o mouse, fecha quando sai
  menu.addEventListener('mouseenter', () => {
    menu.classList.remove('collapsed');
    menu.classList.add('expanded');
    icon.classList.replace('bx-chevrons-right', 'bx-chevrons-left');
  });
  menu.addEventListener('mouseleave', () => {
    menu.classList.remove('expanded');
    menu.classList.add('collapsed');
    icon.classList.replace('bx-chevrons-left', 'bx-chevrons-right');
  });

  // se quiser toggle fixo ao clicar:
  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    if (menu.classList.contains('collapsed')) {
      menu.dispatchEvent(new Event('mouseenter'));
    } else {
      menu.dispatchEvent(new Event('mouseleave'));
    }
  });
});
