if ($('#create_av')) {

    const $name = $('input[name="name"]'),
        $button = $('#create_av button');

    $button.addEventListener('click', (e) => {
        e.preventDefault();
        if ($name.value.trim() != '') {
            setVisualHelper($name.value);
        }
    })
    
}


const setVisualHelper = (name) => {

    const formData = new FormData();
    formData.append('nombre', name);
    formData.append('validar', 'crearAv');

    fetch(`${API}`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        if (response != '') {
            
            /*const { id, nombre, slug, otp } = response
            const session = {
                id: id,
                av: nombre,
                slug: slug,
                otp: otp
            };*/
            
            window.location.href = `${URL}views/vistas.php`
        }
    })
}