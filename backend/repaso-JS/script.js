$(document).ready(function () {
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
             alert('Las contraseñas no coinciden');
            }
        }
    })
});