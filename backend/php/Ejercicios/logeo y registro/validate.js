$(document).ready(function () {
//----------------VALIDAR SI USUARIO YA EXISTE O ESTA DISPONIBLE----------------

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

//----------------VALIDAR SI EMAIL YA EXISTE O ESTA DISPONIBLE----------------

    $('.newuser .email').on("keyup", function () {
        //cada vez que el value del input cambie, lo recogeremos
        let username = $(this).val();
        // Guardamos el div donde mostraremos los resultados en una variable
        let resultList = $(this).siblings(".mnjemail"); // Buscamos a los hermanos del input (this) con clase display.

        resultList.empty();

        if (username.length > 10) {
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

//----------------CONFIRMACION DE CONTRASEÑAS----------------

    $('input.pass').on('keyup',function () {
        // quiero comparar los valores de los dos inputs

        // recogemos el valor de los inputs
        valor1 = $('input[name="pass"]').val();
        valor2 = $('input[name="confirm"]').val();


        $('input[type="submit"]').attr('disabled',true);

        // solo se ejecutará cuando los inputs tengan la misma longitud}
        if (valor1.lenght == valor2.lenght) {
            if(valor1 == valor2){
            // Si los valores coinciden:

            // Activamos el botón de registro
            $('input[type="submit"]').removeAttr('disabled');
            }else {
             $('input[name="confirm"]').append('<p>Las contraseñas no coiciden</p>');
            }
        }
    })
});