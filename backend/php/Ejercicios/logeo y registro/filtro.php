<div class="conten">
    <form action="">
        <input type="text" name="users" onkeyup="showUser(this.value,'user')">
        <select onchange="showUser(this.value, 'type_user')">
                <option value="" disabled selected>Tipo de usuario</option>
                <option value="admin">Mostrar administradores</option>
                <option value="user">Mostrar usuarios</option>
            </select>
    </form>

    <div id="display"></div>
</div>
<script>
    function showUser(text,filtro) {
        let display = document.getElementById('display');

        //Si el input esta vacio el DIV tambien se vacia
        if (text == ''){
            text = '@';
            filtro = 'email';
        }  
       
        let ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    display.innerHTML = this.responseText;
                }
            };
            ajax.open('GET', 'filtro-paneluser.php?value=' + text
            + '&filtro=' + filtro, true);
            ajax.send();
    }
    // Si llamamos a la funcion. La tabla se cargará completa por defecto al cargar la pagina
    showUser('@','email');
</script>