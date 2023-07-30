if($('#create_av')){
    const $name =  $('input[name="name"]'),
        $button = $('#create_av button');

    $button.addEventListener('click', (e) => {
        e.preventDefault();
        if($name.value.trim() != ''){
            guardarAV( $name.value );
        }
    })
}

const guardarAV = (name) => {
    const formData = new FormData();
    formData.append('nombre', name);
    formData.append('validar', 'crearAv');
    
    fetch(`${API}`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        if(response != ''){
            window.location.href = `${URL}views/vistas.php`
        }
    })
}