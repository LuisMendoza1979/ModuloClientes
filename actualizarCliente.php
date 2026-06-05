<?php
    // Incluimos la conexión a la base de datos
    include 'connectionBd.php';

    // Recibimos todos los datos enviados por método POST desde el formulario
    $id = $_POST['id']; // El ID oculto/bloqueado que cargamos al consultar para que no sea manipulado por el usuario
    $tipo_persona = $_POST['tipoPersona'];
    $rut = $_POST['rut'];
    $tipo_identificacion = $_POST['tipoIdentificacion'];
    $numero_identificacion = $_POST['numeroIdentificacion'];
    $fecha_nacimiento = $_POST['fecha'];
    $genero = $_POST['genero'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $razon_social = $_POST['razonSocial'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];

    // Construimos la consulta SQL de actualización empleando la estructura UPDATE
    $sql = "UPDATE cliente SET 
                tipo_persona = '$tipo_persona',
                rut = '$rut',
                tipo_identificacion = '$tipo_identificacion',
                numero_identificacion = '$numero_identificacion',
                fecha_nacimiento = '$fecha_nacimiento',
                genero = '$genero',
                nombres = '$nombres',
                apellidos = '$apellidos',
                razon_social = '$razon_social',
                direccion = '$direccion',
                correo = '$correo',
                telefono = '$telefono',
                edad = '$edad' 
            WHERE id_cliente = $id"; // Condición crítica para no alterar a todos los clientes

    // Ejecutamos la consulta en el servidor de base de datos
    $conn->query($sql);

    //Redireccionamos al usuario de vuelta a la pantalla principal
    header("location:index.php");
?>