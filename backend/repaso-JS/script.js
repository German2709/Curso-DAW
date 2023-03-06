$(document).ready(function () {
    $('input.pass').on('keyup', function () {
        // quiero comparar los valores de los dos inputs

        // recogemos el valor de los inputs
        valor1 = $('input[name="pass"]').val();
        valor2 = $('input[name="confirm"]').val();


        $('input[type="submit"]').attr('disabled', true);

        // solo se ejecutará cuando los inputs tengan la misma longitud}
        if (valor1.lenght == valor2.lenght) {
            if (valor1 == valor2) {
                // Si los valores coinciden:

                // Activamos el botón de registro
                $('input[type="submit"]').removeAttr('disabled');
            } else {
                alerta=$('input[name="confirm"]').createElement("p");
                alerta.innerText="contraseña";
            }
        }
    })

    $('#btnShow').click(function () {
        $('.container').toggle();
    });
    $('#btnFade').click(function () {
        $('.container').fadeToggle();
    });
    $('#btnSlide').click(function () {
        $('.container').slideToggle();
    });

    let contador = 0;
    $('.cambiar').click(function () {
        if (contador < 1) {
            $('.login').slideToggle(300, function () {
                $('.signup').slideToggle(300);
            });
            contador++;

        } else {
            $('.signup').slideToggle(300, function () {
                $('.login').slideToggle(300);
            });
            contador--;
        }

    });

});