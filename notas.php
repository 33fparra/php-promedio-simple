<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Promedio</title>
</head>
<body>
    <h2>Notas Promedio</h2>

    <form action="notas.php" method="post">
        Nombre de la Materia: <input type="text" name="nombre_materia"> <br> 
        Nota maxima (por defecto 70): <input type="number" name="nota_maxima" value="70"> <br> 
        Notas (separadas por comas): <input type="text" name="notas"> <br><br>
        <input type="submit" value="Calcular promedio simple">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $nombreMateria = $_POST['nombre_materia'];
        $notaMaxima = $_POST['nota_maxima']??70; //70 por defecto
        $notas = array_map('floatval', explode(',', $_POST['notas']));

        if (count($notas)>0) {
            $sumaNotas = array_sum($notas);
            $numeroNotas = count($notas);
            $promedio = $sumaNotas / $numeroNotas;
            

            echo "<p>El promedio de $nombreMateria es : $promedio</p>";
        } else{
            echo "<p>Por favor ingrese las notas para calcular el promedio</p>";
        }    
    }
    echo "El array con el que estoy trabajando es el siguiente:<br>";
    echo "<pre>";
    print_r($notas);
    echo "<pre>";
    ?>
</body>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        margin: 20px;
    }
    input[type=text],input[type=number]{
        margin: 10px 0;
    }
    input[type=submit]{
        margin-top: 10px;
    }
</style>
</html>