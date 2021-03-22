function validarForm() {
    if (document.getElementById('plate').value === '') {
        document.getElementById('plate').classList.add('is-invalid');
        alert('Placa é obrigatória');
    }
}