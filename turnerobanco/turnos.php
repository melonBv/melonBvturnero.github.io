<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos en Tiempo Real</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #b30000;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .turno-info {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fafafa;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Espere su turno...</h1>
    
    <div class="turno-info">
        <h2>Turno Actual</h2>
        <p id="currentTurn"></p>
    </div>

    <div class="turno-info">
        <h2>Siguiente Turno</h2>
        <p id="nextTurn"></p>
    </div>

    <h2>Lista de Turnos Solicitados</h2>
    <ul id="turnoList"></ul>
</div>

<script>
    async function fetchTurnos() {
        const response = await fetch('get_turnos.php');
        const turnos = await response.json();
        return turnos;
    }

    function displayTurnos(turnos) {
        const turnoList = document.getElementById('turnoList');
        turnoList.innerHTML = '';

        turnos.forEach((turno, index) => {
            const li = document.createElement('li');
            li.textContent = `Turno: ${turno.referencia}, Nombre: ${turno.nombre}, Preferencia: ${turno.preferencia}`;
            turnoList.appendChild(li);

           
            if (index === 0) {
                document.getElementById('currentTurn').textContent = `Turno: ${turno.referencia}, Ventanilla: ${turno.ventanilla}`;
            }
            if (index === 1) {
                document.getElementById('nextTurn').textContent = `Turno: ${turno.referencia}, Ventanilla: ${turno.ventanilla}`;
            }
        });
    }

    async function updateTurnos() {
        const turnos = await fetchTurnos();
        displayTurnos(turnos);
    }

   
    setInterval(updateTurnos, 5000);
    updateTurnos(); 
</script>

</body>
</html>



