document.getElementById('formulario').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);

    fetch('guardar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
        document.getElementById('formulario').reset(); 
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});
