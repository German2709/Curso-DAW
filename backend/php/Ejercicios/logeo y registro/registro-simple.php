<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="validate.js"></script>
<body class="cuerpo">
        <h1 class="titulo">Crear Usuario</h1>
        <form class="newuser" action="datosbd.php" method="post">
            <input class="user" type="text" placeholder="Usuario" name="user" autocomplete="off" required pattern="[A-Za-z0-9]" title="Letras y/o números.">
            <div class="mnjuser"></div>
            <input class="email" type="email" placeholder="Email" name="email" autocomplete="off" required>
            <div class="mnjemail"></div>
            <input class="pass" type="password" placeholder="Contraseña" name="password" minlength="8" required><br>
            <input class="pass" type="password" placeholder="Confirmar Contraseña" name="confirm" minlength="8" required><br>

            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 'true') {
                echo "<p style='color:red; font-weight: bold;'>Usuario ya existe </p>";
                unset($_GET["error"]);
            }
            ?>


            <button type="submit" class="button-49" role="button">Enviar</button>
        </form>
</body>