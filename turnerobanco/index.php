<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnero de Banco - Solicitar Turno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        h1 {
            text-align: center;
            color: #b30000;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        form {
            margin-bottom: 35px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }
        select, input[type="radio"], input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #b30000;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #990000;
        }
        .bottom-buttons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .bottom-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #b30000;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .bottom-buttons a:hover {
            background-color:  #b30000; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>welcome to ville's bank</h1>
        <form id="turnoForm">
            
            <label for="tramite">Selecciona Trámite:</label>
            <select id="tramite" required>
                <option value="Consulta">Consulta</option>
                <option value="Retiro">Retiro</option>
                <option value="Depósito">Depósito</option>
                <option value="Transacción">Transacción</option>
                <option value="Préstamo">Préstamo</option>
                <option value="Apertura de Cuenta">Apertura de Cuenta</option>
                <option value="Cambio de Datos">Cambio de Datos</option>
            </select>
            
            <label>Preferencia:</label>
            <label><input type="radio" name="preferencia" value="VIP" required> Cliente VIP</label>
            <label><input type="radio" name="preferencia" value="Normal" required> Cliente Normal</label>
            
            <label for="nombre">Nombre del Cliente:</label>
            <input type="text" id="nombre" required>
            
            <label for="telefono">Teléfono de Contacto:</label>
            <input type="text" id="telefono" required>
            
            <button type="submit">Solicitar Turno</button>
        </form>
    </div>

    <div class="bottom-buttons">
        <a href="nuevos.html">Nuevo usuario</a>
        <a href="turnos.php">Turnos en Tiempo Real</a>
        <a href="usuarios.php">Registro de Cajeros</a>
    </div>

    <script>
        const form = document.getElementById('turnoForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
           
            const tramite = document.getElementById('tramite').value;
            const preferencia = document.querySelector('input[name="preferencia"]:checked').value;
            const nombre = document.getElementById('nombre').value;
            const telefono = document.getElementById('telefono').value;

            
            const url = `turno.html?tramite=${tramite}&preferencia=${preferencia}&nombre=${nombre}&telefono=${telefono}`;
            window.location.href = url;
        });
    </script>
</body>
</html>
