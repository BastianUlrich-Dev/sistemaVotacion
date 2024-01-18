<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.7.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>FORMULARIO DE VOTACIÓN</h2>
    <section class="form-container">
    <form class="form-row" action="submitVotacion.php" method="post">
        <section class="row">
            <label for="NombreApellido">Nombre y Apellido</label>
            <input type="text" name="nombreApellido" id="nombreApellido" require>
        </section>
        <section class="row">
            <label for="alias">Alias</label>
            <input type="text" name="alias" id="alias" require>
        </section>
        <section class="row">
            <label for="rut">RUT</label>
            <input type="text" name="rut" id="rut" require>
        </section>
        <section class="row">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" require>
        </section>
        <section class="row">
            <label for="region">Región:</label>
            <select name="region" id="region">
                <option value="" disabled selected>Selecciona una región</option>
            </select>
        </section>
        <section class="row">
            <label for="comuna">Comuna:</label>
            <select name="comuna" id="comuna">
                <option value="" disabled selected>Selecciona una comuna</option>
            </select>
        </section>
        <section class="row">
            <label for="candidato">Candidato</label>
            <select name="candidato">
                <option value="" disabled selected>Selecciona un candidato</option>
                <?php
                include('candidatos.php');
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                    }
                } else {
                    echo '<option value="" disabled>No hay candidatos disponibles</option>';
                }
                ?>            
            </select>
        </section>
        <section class="row--margin-0">
            <label class="label--margin-16">Como se enteró de Nosotros</label>
            <section>
                <label for="web">
                    <input type="checkbox" name="comoSeEntero[]" value="web" id="web">Web
                </label>

                <label for="tv">
                    <input type="checkbox" name="comoSeEntero[]" value="tv" id="tv">Tv
                </label>

                <label for="redesSociales">
                    <input type="checkbox" name="comoSeEntero[]" value="redesSociales" id="redesSociales">Redes Sociales
                </label>

                <label for="amigo">
                    <input type="checkbox" name="comoSeEntero[]" value="amigo" id="amigo">Amigo
                </label>
            </section>
        </section>
        <button type="submit">Votar</button>
    </form>
    </section>
    
    <script src="index.js" defer></script>
</body>
</html>
