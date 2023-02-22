$(document).ready(function () {
    $('.newuser .user').on("keyup", function () {
        //cada vez que el value del input cambie, lo recogeremos
        let username = $(this).val();
        // Guardamos el div donde mostraremos los resultados en una variable
        let resultList = $(this).siblings(".mnjuser"); // Buscamos a los hermanos del input (this) con clase display.

        resultList.empty();

        if (username.length > 2) {
            // Si el valor del input no esta vacio, llamos al php
            $.get("search.php", { term: username }).done(function (data) {
                // resultList.html(data);
                if (data == 'true') {
                    $('.newuser .user').css('backgroundColor', 'red');
                    resultList.html('Usuario ya existe').css('color','red');
                } else {
                    $('.newuser .user').css('backgroundColor', 'green');
                    resultList.html('Usuario disponible').css('color','green');
                }
            })
        }if (username.length < 1) {
            $('.newuser .user').css('backgroundColor', 'white');
        }
    })
    $('.newuser .email').on("keyup", function () {
        //cada vez que el value del input cambie, lo recogeremos
        let username = $(this).val();
        // Guardamos el div donde mostraremos los resultados en una variable
        let resultList = $(this).siblings(".mnjemail"); // Buscamos a los hermanos del input (this) con clase display.

        resultList.empty();

        if (username.length > 2) {
            // Si el valor del input no esta vacio, llamos al php
            $.get("search.php", { term: username }).done(function (data) {
                // resultList.html(data);
                if (data == 'true') {
                    $('.newuser .email').css('backgroundColor', 'red');
                    resultList.html('Usuario ya existe').css('color','red');
                } else {
                    $('.newuser .email').css('backgroundColor', 'green');
                    resultList.html('Usuario disponible').css('color','green');
                }
            })
        }if (username.length < 1) {
            $('.newuser .email').css('backgroundColor', 'white');
        }
    })

});