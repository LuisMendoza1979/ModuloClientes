<?php

    //Conectamos con la base de datos
    include 'connectionBd.php';

    //Obtenemos los valores digitados por el usuario

    $tipo_persona= $_POST['tipoPersona'];
    $rut= $_POST['rut'];
    $tipo_identificacion= $_POST['tipoIdentificacion'];
    $numero_identificacion= $_POST['numeroIdentificacion'];
    $fecha_nacimiento= $_POST['fecha'];
    $genero= $_POST['genero'];
    $nombres= $_POST['nombres'];
    $apellidos= $_POST['apellidos'];
    $razon_social= $_POST['razonSocial'];
    $direccion= $_POST['direccion'];
    $correo= $_POST['correo'];
    $telefono= $_POST['telefono'];
    $edad= $_POST['edad'];
    
    //Insertamos los datos en la base de datos por medio de INSERT INTO

    $sql="INSERT INTO cliente(tipo_persona,rut,tipo_identificacion,numero_identificacion,fecha_nacimiento,
    genero,nombres,apellidos,razon_social,direccion,correo,telefono,edad) VALUES('$tipo_persona','$rut','$tipo_identificacion',
    '$numero_identificacion','$fecha_nacimiento','$genero','$nombres','$apellidos','$razon_social','$direccion','$correo',
    '$telefono','$edad')";

    //Ejecutamos la consulta sql

    $conn->query($sql);

    //Redireccionamos al usuario a la pantalla principal del formulario

    header("location:index.php");
?>