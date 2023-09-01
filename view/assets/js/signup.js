// file input script
document.querySelectorAll('.file-upload-button').forEach(function(button) {
    button.addEventListener('click', function() {
      var input = this.parentNode.querySelector('.file-upload-input');
      input.click(); 
    });
  });

  document.querySelectorAll('.file-upload-input').forEach(function(input) {
    input.addEventListener('change', function() {
      var filename = this.value.split('\\').pop(); 
      var filenameElement = this.parentNode.querySelector('.file-upload-filename');
      filenameElement.textContent = filename; 
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const nextBtn = document.querySelector('.login-btn');
  
  });

