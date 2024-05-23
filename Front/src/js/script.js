document.addEventListener('DOMContentLoaded', function() {
    function validateForm() {
        // Obtener los valores de los campos del formulario
        const nombre = document.getElementById('Nombre').value.trim();
        const apellido = document.getElementById('Apellido').value.trim();
        const correo = document.getElementById('Correo').value.trim();
        const servicio = document.getElementById('Servicios').value;
        const mensaje = document.getElementById('Mensaje').value.trim();
        const simulateResponse = document.getElementById('simulateResponse').checked;
        const agreeTerms = document.getElementById('agreeTerms').checked;

        // Expresión regular para validar el correo electrónico
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validar que el nombre no esté vacío
        if (!nombre) {
            alert('Por favor, ingrese su nombre.');
            return false;
        }

        // Validar que el apellido no esté vacío
        if (!apellido) {
            alert('Por favor, ingrese su apellido.');
            return false;
        }

        // Validar que el correo no esté vacío y tenga un formato válido
        if (!correo || !emailRegex.test(correo)) {
            alert('Por favor, ingrese un correo electrónico válido.');
            return false;
        }

        // Validar que se haya seleccionado un servicio
        if (!servicio) {
            alert('Por favor, seleccione un servicio.');
            return false;
        }

        // Validar que el mensaje no esté vacío y tenga al menos 10 caracteres
        if (!mensaje || mensaje.length < 10) {
            alert('Por favor, ingrese un mensaje con al menos 10 caracteres.');
            return false;
        }

        // Validar que se haya marcado el checkbox de términos
        if (!agreeTerms) {
            alert('Debe estar de acuerdo con los términos.');
            return false;
        }

        // Simular la respuesta deseada
        if (simulateResponse) {
            alert('Mensaje enviado exitosamente.');
        } else {
            alert('Error al enviar el mensaje.');
        }

        // Si todas las validaciones pasan, enviar el formulario
        if (simulateResponse) {
            document.getElementById('contactForm').submit();
        }
    }

    // Asignar la función validateForm al evento click del botón Enviar
    document.querySelector('.btn-outline-success').addEventListener('click', validateForm);
});

$(window).scroll(function(){
    // El botón se mostrara cuando el usuario aya bajado 501px a más.
    if($(this).scrollTop() > 500){
      $(".fa-solid").show(); //fadeIn
    }else{
      $(".fa-solid").fadeOut(); //fadeOut
    }
  });
  $(".fa-solid i").on('click', function (e) {
    e.preventDefault();
      $("body,html").animate({
      scrollTop: 0
    },700);
    return false;
  });
