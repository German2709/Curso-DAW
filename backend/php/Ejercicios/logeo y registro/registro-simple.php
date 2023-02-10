<body>
    <div>
        <h1>Crear Usuario</h1>
        <form action="datosbd.php" method="post">
            <input type="text" placeholder="Usuario" name="user" required><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <input type="password" placeholder="Contraseña" name="password" required><br>

            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 'true') {
                echo "<p style='color:red; font-weight: bold;'>Usuario ya existe </p>";
                unset($_GET["error"]);
            }
            ?>


            <button type="submit" class="button-49" role="button">Enviar</button>
        </form>
    </div>
</body>