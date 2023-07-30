Array.from(document.querySelectorAll('.toOpen')).forEach(o=>{
    o.addEventListener('click', (e)=>{
        e.currentTarget.parentElement.classList.toggle('active')
    })
})

const $file = document.querySelector('.drag_drop input');
$file.addEventListener('input', (e)=>{

    const formData = new FormData();
    formData.append('background', $file.files[0] )
    formData.append('validar', 'subirFondo' )

    fetch(`${API}`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        console.log(response)
    })

})