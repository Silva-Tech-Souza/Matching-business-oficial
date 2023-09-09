
const introText = document.getElementById('intro-text');
const startBtnWrapper = document.getElementById('start-btn-wrapper');

const text = introText.innerHTML;
introText.innerHTML = '';

let i = 0;
const speed = 35; // Velocidade de digitação em milissegundos

function typeWriter() {
  if (i < text.length) {
    introText.innerHTML += text.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  } else {
    startBtnWrapper.style.opacity = 1; // Torna o botão visível quando o efeito de digitação terminar
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const createBtn = document.querySelector('.create-btn');

  function stepExplainer() {
    alert('Welcome! Before creating your account we need to know what kind of user you are to offer you the best user experience.');

    fetch('widget/indexModal.html')
      .then(response => response.text())
      .then(html => {
        const modalWrapper = document.createElement('div');
        modalWrapper.innerHTML = html;

        document.body.appendChild(modalWrapper);

        const modalElement = modalWrapper.querySelector('.modal');
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
      })
      .catch(error => {
        console.error('Error loading modal:', error);
      });
  }

  createBtn.addEventListener('click', stepExplainer);
});

typeWriter();
