if ($('#vistas')) {

    const buttonAddView = $('.views_Add');

    buttonAddView.addEventListener('click', (e) => {
        let nro = 1;
        if ($('.thumb')) {
            nro = document.querySelectorAll('.thumb').length + 1;
        }
        crearPagina(nro);
    })

    function crearPagina(n) {
        const formData = new FormData();
        formData.append('slug', $('#slug').value.toString() )
        formData.append('term', $('#term').value.toString() )
        formData.append('id_av', parseInt($('#id_av').value) );
        formData.append('pagina', n);
        formData.append('validar', 'crearPagina');

        fetch(`${API}`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(response => {
            if(response){
                window.location.href = `${URL}views/canvas.php`
            }
        })
    }

}