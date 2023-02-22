<div class="conten">
    <form action="">
        <input type="text" name="users" onkeyup="showUser(this.value)">
    </form>

    <div id="display"></div>
</div>
<script>
    function showUser(text) {
        let display = document.getElementById('display');

        //Si el input esta vacio el DIV tambien se vacia
        if (text == ''){
            text = '@';
        }  
       
        let ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    display.innerHTML = this.responseText;
                }
            };
            ajax.open('GET', 'filtro-paneluser.php?q=' + text, true);
            ajax.send();
    }
    // Si llamamos a la funcion. La tabla se cargará completa por defecto al cargar la pagina
    showUser('@','filtro-paneluser.php');
</script>