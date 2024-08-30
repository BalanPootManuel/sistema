document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Aquí puedes agregar lógica para manejar el formulario
            alert('Formulario enviado');
        });
    });
});