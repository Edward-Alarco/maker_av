const $canvas = $('.canvas_container');
const $images = $('#images');
let imagen = null;

const toggleSidebar = () => {
    $('.sidebar').classList.toggle('active')
    $('.sidebar_bg').classList.toggle('active')
}

$('.sidebar_button').addEventListener('click', toggleSidebar)
$('.sidebar_bg').addEventListener('click', toggleSidebar)

const uploadExternalImages = (e, value) => {

    if(e.target.files.length == 1){

        const formData = new FormData();
        formData.append('pagina', parseInt($('#page').value) )
        formData.append('id_av', parseInt($('#id_av').value) )
        formData.append('slug', $('#slug').value.toString() )
        formData.append('term', $('#term').value.toString() )
        formData.append('imagen', e.target.files[0] )
        formData.append('validar', `upload${value}` )

        fetch(`${API}`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(response => {
            if( response != '' ){
                toggleSidebar();

                if(value == 'Background'){
                    let img = document.createElement('IMG')
                    img.className = 'canvas_bg'
                    img.src = response;
                    setTimeout(function(){
                        $canvas.appendChild(img);
                    }, 250)
                }
                
            }
        })

    }

}

if( $('.external_images') ){
    const $contenedor = $('.external_images'),
        $background = $contenedor.querySelector('input[name="background"]'),
        $thumb = $contenedor.querySelector('input[name="thumb"]'),
        $full = $contenedor.querySelector('input[name="full"]');

    $background.addEventListener('input', (e) => {
        uploadExternalImages(e, 'Background')
    })

    $thumb.addEventListener('input', (e) => {
        uploadExternalImages(e, 'Thumb')
    })

    $full.addEventListener('input', (e) => {
        uploadExternalImages(e, 'Full')
    })
}

$canvas.addEventListener('drop', (e) => {
    e.preventDefault();
    cargarImagen(e);
})

$canvas.addEventListener('dragover', (e) => {
    e.preventDefault();
})

$images.addEventListener('change', (e) => {
    console.log('a')
    cargarImagen(e)
})

const cargarImagen = (event) => {
    const archivo = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        if (imagen !== null) {
            $canvas.removeChild(imagen);
        }
        imagen = new Image();
        imagen.src = e.target.result;
        imagen.id = 'imagen';
        imagen.draggable = true;
        imagen.style.left = '0px';
        imagen.style.top = '0px';
        imagen.addEventListener('drag', actualizarPosicion);
        $canvas.appendChild(imagen);
    };

    reader.readAsDataURL(archivo);
}

function actualizarPosicion(event) {
    const x = event.clientX;
    const y = event.clientY;
    const contenedorRect = $canvas.getBoundingClientRect();

    const left = x - contenedorRect.left - imagen.width / 2;
    const top = y - contenedorRect.top - imagen.height / 2;

    imagen.style.left = left + 'px';
    imagen.style.top = top + 'px';

    leftValue.textContent = left;
    topValue.textContent = top;
}