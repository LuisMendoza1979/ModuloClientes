<?php
    //Conectamos con el archivo que tiene las credenciales de la base de datos
    include 'connectionBd.php';

    //Capturamos el ID enviado a través de la URL (Método GET)
    
    $id = $_GET['id'];

    //Ejecutamos el comando de borrado físico en la tabla filtrando por ID
    $conn->query(
        "DELETE FROM cliente WHERE id_cliente=$id"
    );

    //Redireccionamos al usuario a la vista principal del formulario
    header("location:index.php");
?>