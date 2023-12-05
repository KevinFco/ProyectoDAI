    //Botón para subir
    const btnUp = document.querySelector('.btn-up');

    btnUp.addEventListener('click', function() {
    window.scrollTo({
    top: 0,
     behavior: 'smooth'
    });
    });
