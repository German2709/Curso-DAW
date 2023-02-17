$(document).ready(function () {
    $('.newuser .new').on("keyup", function() {
        //cada vez que el value del input cambie, lo recogeremos
        let username = $(this).val();
        // Guardamos el div donde mostraremos los resultados en una variable
        let resultList = $(this).siblings(".display"); // Buscamos a los hermanos del input (this) con clase display.

        resultList.empty();

        if(username.length > 2){
            // Si el valor del input no esta vacio, llamos al php
            $.get("search.php", {term: username}).done(function (data) {
                resultList.html(data);

            })
            
        }


    })

});