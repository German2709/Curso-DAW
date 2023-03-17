<?php
include 'union.php';
//           ------------------formularios por tipo de usuario--------------------------
if (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'usuario') {

    echo "<form action='updatebd.php' method='post'>
            <div class='formulario'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='dni' value='$dni'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='user' value='$user'>
                    <input class='data' type='text' name='password' value='$password'>
                    <input class='data' type='text' name='mac' maxlength='12' value='$mac'>
                    <input class='data' type='text' name='bio' value='$bio'>
                    <input class='data' type='text' name='foto' value='$foto'>
                    <select name='tipo_usuario' >
                        <option value='$user1' selected>$user1</option>
                        <option " . $disabled . " value='$user2'>$user2</option>
                    </select>
                    <select name='estado' >
                        <option value='$estado' selected >$estado</option>
                    </select>
            </div>
                    <input type='hidden' name='modiuser' value='$user'>
                    <button class='update' type='submit'><span>Actualizar</span></button>
                </form><br>";

  //           ------------------formularios por tipo de usuario--------------------------              
}elseif (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'colaborador') {
    echo "<form action='updatebd.php' method='post'>
                <div class='formulario'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='dni' value='$dni'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='user' value='$user'>";
                    if ($_SESSION['nombres']==$user) {
                    echo "<input class='data' type='text' name='password' value='$password'>";
                    }else{
                       echo "<input class='data' type='text' readonly onmousedown='return false;' name='password' value='$password'>";
                    }
                   echo "<input class='data estado' type='text' readonly onmousedown='return false;' name='mac' maxlength='12' value='$mac'>
                    <input class='data estado' type='text' readonly onmousedown='return false;' name='bio' value='$bio'>
                    <input class='data estado' type='text' readonly onmousedown='return false;' name='foto' value='$foto'>
                    <select name='tipo_usuario' >
                        <option value='$user1' selected>$user1</option>
                        <option " . $disabled . " value='$user2'>$user2</option>
                    </select>
                    <input type='hidden' name='modiuser' value='$user'>
                    <select name='estado' >
                        <option value='$estado' selected >$estado</option>
                        <option value='Sin Revisar'>Sin Revisar</option>
                        <option value='Completo'>Completo</option>
                        <option value='Incompleto'>Incompleto</option>
                        <option value='Vacio/Erroneo'>Vacio/Erroneo</option>
                    </select>
                </div>
                    <button class='update' type='submit'><span>Actualizar</span></button>
                </form><br>";

        //           ------------------formularios por tipo de usuario--------------------------
}elseif (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'admin') {
    echo "<form action='updatebd.php' method='post'>
                <div class='formulario'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='dni' value='$dni'>
                    <input class='data' type='text' readonly onmousedown='return false;' name='user' value='$user'>";
                    if ($_SESSION['nombres']==$user) {
                        echo "<input class='data' type='text' name='password' value='$password'>";
                        }else{
                           echo "<input class='data' type='text' readonly onmousedown='return false;' name='password' value='$password'>";
                        }
                    echo "<input class='data estado' type='text' readonly onmousedown='return false;' name='mac' maxlength='12' value='$mac'>
                    <input class='data estado' type='text' readonly onmousedown='return false;' name='bio' value='$bio'>
                    <input class='data estado' type='text' readonly onmousedown='return false;' name='foto' value='$foto'>
                    <select name='tipo_usuario'>";
                    if ($_SESSION['nombres']==$user) {
                       echo "<option value='$user3' selected>$user3</option>";
                    }else{
                     echo "<option value='$user1' selected>$user1</option>
                        <option value='$user2'>$user2</option>";
                    }
                    echo "</select>
                    <select name='estado' >
                        <option value='$estado' selected >$estado</option>
                    </select>
                    <input type='hidden' name='modiuser' value='$user'>
                </div>
                    <button class='update' type='submit'><span>Actualizar</span></button>
                </form><br>";
}
?>
