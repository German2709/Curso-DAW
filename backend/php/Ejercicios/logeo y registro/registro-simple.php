<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="validate.js"></script>
<body>
        <h1>Crear Usuario</h1>
        <form class="newuser" action="datosbd.php" method="post">
            <input class="new" type="text" placeholder="Usuario" name="user" required>
            <div class="display"></div>
            <input class="new" type="email" placeholder="Email" name="email" required><br>
            <input type="password" placeholder="Contraseña" name="password" required><br>

            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 'true') {
                echo "<p style='color:red; font-weight: bold;'>Usuario ya existe </p>";
                unset($_GET["error"]);
            }
            ?>


            <button type="submit" class="button-49" role="button">Enviar</button>
        </form>
</body>