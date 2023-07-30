if($('#vistas')){

    let $contenedor = $('.views_grid');

    if($('.thumb.add')){
        $('.thumb.add').addEventListener('click', (e)=>{
            createThumb();
            $contenedor.removeChild( $('.thumb.add') );
        })
    }


    function createThumb(){
        let div = document.createElement('A');
        div.className = 'thumb';
        div.href = 'canvas.php'
        $contenedor.appendChild(div);
    }

}