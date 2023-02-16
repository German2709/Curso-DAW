$(document).ready(function () {
    $('.login input[type="text"]').on("keyup input", function() {
        //cada vez que el value del input cambie, lo recogeremos
        let text = $(this).val();
        // Guardamos el div donde mostraremos los resultados en una variable
        let resultList = $(this).siblings(".display"); // Buscamos a los hermanos del input (this) con clase display.

        if(text.length > 3){
            // Si el valor del input no esta vacio, llamos al php
            $.get("page_welcome.php", {term: text}).done(function (data) {
                resultList.html(data);
            })
            
        }else{
            //Se vacia la lista
            resultList.empty();
        }
    })
    
});