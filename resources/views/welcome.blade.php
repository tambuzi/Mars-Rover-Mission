<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MarsRover</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        /* $(document).on("submit", "#form", function(e) {
                $.noConflict();
                console.log("entra");
                e.preventDefault();
                const data = $("#form").serialize();
                $.ajax({
                    type: "POST",
                    url: "http://localhost/MarsRoverLaravelController/",
                    data: data,
                }).done(function(result) {
                    const data = JSON.parse(result);
                    console.log(data);
                });
            });*/
    </script>
    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 2em;
        }

    </style>
</head>

<body class="antialiased">
    <div>
        <h3>Mars Rover Mission</h3>
    </div>
    <div>
        <form id="form" action="http://localhost/MarsRoverLaravelController" method="POST">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Posición inicial X:</span>
                </div>
                <input type="text" id="roverPositionX" class="form-control" name="roverPositionX" value=""
                    placeholder="Posición inicial X" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Posición inicial Y:</span>
                </div>
                <input type="text" id="roverPositionY" class="form-control" name="roverPositionY" value=""
                    placeholder="Posición inicial Y" required>
            </div>
            <div class="form-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Orientación:</span>
                </div>
                <select class="form-control" id="direction" name="direction" required>
                    <option value="N">Norte</option>
                    <option value="S">Sur</option>
                    <option value="E">Este</option>
                    <option value="O">Oeste</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Movimientos (F, L, R):</span>
                </div>
                <input type="text" id="movements" class="form-control" name="movements"
                    placeholder="Inserte los movimientos que debe hacer la nave" required>
            </div>
            <button type="submit" class="btn btn-primary">Ejecutar misión</button>
        </form>
    </div>
</body>

</html>
