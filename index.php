
<?php
include 'connectionBd.php';

// Inicializamos todas las variables en vacío
$id = ""; $tipo_p = ""; $rut = ""; $tipo_id = ""; $num_id = ""; $fecha = ""; 
$nombres = ""; $apellidos = ""; $razon = ""; $dir = ""; $correo = ""; $tel = ""; $edad = ""; $genero = "";

// Solo si el usuario ejecutó una consulta, llenamos las variables con datos reales
if (isset($_GET['consultar_id']) && !empty($_GET['consultar_id'])) {
    $id_buscar = $_GET['consultar_id'];
    
    // Aquí usamos el nombre real de la columna (por ejemplo, id_cliente)
    $resultado = $conn->query("SELECT * FROM cliente WHERE id_cliente = $id_buscar");
    
    if ($resultado && $resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
        
        // Guardamos los datos de la fila en las variables independientes
        $id = $cliente['id_cliente']; 
        $tipo_p = $cliente['tipo_persona'];
        $rut = $cliente['rut'];
        $tipo_id = $cliente['tipo_identificacion'];
        $num_id = $cliente['numero_identificacion'];
        $fecha = $cliente['fecha_nacimiento'];
        $genero = $cliente['genero'];
        $nombres = $cliente['nombres'];
        $apellidos = $cliente['apellidos'];
        $razon = $cliente['razon_social'];
        $dir = $cliente['direccion'];
        $correo = $cliente['correo'];
        $tel = $cliente['telefono'];
        $edad = $cliente['edad'];
    } else {
        echo "<script>alert('Cliente no encontrado');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet"   href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

<header>
  <a href="#cerrar_sesion">Cerrar Sesión <i class="fa-solid fa-window-restore"></i></a>
  
</header>

<main>

<section class="logo-section">

    <div class="clientes">
        <h2>Clientes</h2>      
    </div>
    
    <div class="logo">    
            <div class="img">
                <img src="imagenes/logo.png"  alt="imagen logo">
            </div>
            <div class="div-btn">
                <button type="button" id="btn-consultar" class="btn_crud">Consultar</button>
                <button type="button" id="btn-actualizar" class="btn_crud">Actualizar</button>
                <button type="button" id="btn-eliminar" class="btn_crud">Eliminar</button>
            </div>
    </div>

</section>
    
<section>
    <form action="insertarCliente.php" method="POST" id="formulario-cliente" class="formulario">
   <div class="datos">
    <h2 class="encabezado-formulario">Datos Cliente</h2>
   </div>
   <div class="id">
    <label for="" class="id">Id Cliente</label>
    <input type="number" name="id" id="id-cliente" class="input-corto" placeholder="Id-cliente" value="<?php echo $id; ?>" readonly>
   </div>
   <div class="tipoPersona">
    <label for="">Tipo Persona</label>   
        <select name="tipoPersona" id="tipoPersonas">
            <option value="" disabled selected hidden <?php if($tipo_p == "") echo "selected"; ?>>Tipo Persona</option>
            <option value="Natural" <?php if($tipo_p == "Natural") echo "selected"; ?>>Natural</option>
            <option value="Jurídica" <?php if($tipo_p == "Jurídica") echo "selected"; ?>>Jurídica</option>
        </select>
   </div>
   <div class="rut">
    <label for="">RUT</label>
        <input type="text" name="rut" class="input-largo" placeholder="RUT" value="<?php echo $rut; ?>">
    </div>
   <div class="tipoIdentificacion">
    <label for="">Tipo Identificación</label>
        <select id="tipoId" name="tipoIdentificacion" required>
            <option value="" disabled selected hidden <?php if($tipo_id == "") echo "selected"; ?>>Tipo Identificación</option>
            <option value="Cédula Ciudadanía" <?php if($tipo_id == "Cédula Ciudadanía") echo "selected"; ?>>Cédula Ciudadanía</option>
            <option value="Nit" <?php if($tipo_id == "Nit") echo "selected"; ?>>Nit</option>
            <option value="Cédula Extranjería" <?php if($tipo_id == "Cédula Extranjería") echo "selected"; ?>>Cédula Extranjería</option>
        </select>
   </div>
   <div class="numeroIdentificacion">
    <label for="">Número Identificación</label>
        <input type="number" name="numeroIdentificacion" class="input-mediano" placeholder="Número Identificación" value="<?php echo $num_id; ?>" required>
   </div>
   <div class="fechaNacimiento">
    <label for="">Fecha Nacimiento</label>
        <input type="date" name="fecha" id="fecha" class="input-corto" value="<?php echo $fecha; ?>">
   </div>
   <div class="nombres">
    <label for="">Nombres</label>
        <input type="text" name="nombres" class="input-largo" placeholder="Nombre" value="<?php echo $nombres; ?>" required>
   </div>
   <div class="apellidos">
    <label for="">Apellidos</label>
        <input type="text" name="apellidos" class="input-largo" placeholder="Apellidos" value="<?php echo $apellidos; ?>" required>
   </div>
   <div class="razonSocial">
    <label for="">Razón Social</label>
        <input type="text" name="razonSocial" class="input-largo" placeholder="Razón Social" value="<?php echo $razon; ?>">
   </div>
   <div class="direccion">
    <label for="">Dirección</label>
        <input type="text" name="direccion" class="input-largo" placeholder="Dirección" value="<?php echo $dir; ?>" required>
   </div>
   <div class="correo">
    <label for="">Correo Electrónico</label>
        <input type="email" id="correo" name="correo"  class="input-largo" placeholder="Correo Electrónico" value="<?php echo $correo; ?>" required>
   </div>
   <div class="edad">
    <label for="">Edad</label>
        <input type="number" name="edad" class="input-corto" placeholder="Edad" value="<?php echo $edad; ?>" required>
   </div>
   <div class="telefono">
    <label for="">Teléfono</label>
        <input type="tel" name="telefono" class="input-mediano" placeholder="Teléfono" value="<?php echo $tel; ?>" required>
    </div>
    <div class="genero">
        <label for="">Género</label>
        <select id="genero" name="genero">
            <option value="" disabled selected hidden <?php if($genero == "") echo "selected"; ?>>Género</option>
            <option value="Masculino" <?php if($genero == "Masculino") echo "selected"; ?>>Masculino</option>
            <option value="Femenino" <?php if($genero == "Femenino") echo "selected"; ?>>Femenino</option>
            <option value="Otro" <?php if($genero == "Otro") echo "selected"; ?>>Otro</option>
        </select> 
        </div>
</form>
    <div class="div-btn-form">
        <button type="submit" form="formulario-cliente" id="btn-guardar" class="btn_vinotinto">Guardar</button>
        <button type="button" id="btn-nuevo" class="btn_crud">Nuevo</button>
    </div>

</section>


</main>

<footer>
    <h5>Desarrollado por Luis Alejandro Mendoza Mendoza</h5>
    <h5>Versión: 2.0</h5>
</footer>

<script>
    // CAPTURA EXACTA POR ID ÚNICO 
    const btnConsultar = document.getElementById('btn-consultar'); 
    const btnActualizar = document.getElementById('btn-actualizar'); 
    const btnEliminar = document.getElementById('btn-eliminar'); 
    const formulario = document.getElementById('formulario-cliente');
    const inputId = document.getElementById('id-cliente'); 

    // FUNCIÓN CONSULTAR
    btnConsultar.addEventListener('click', () => {
        const idBuscar = prompt("Ingrese el ID del cliente que desea consultar:");
        if (idBuscar) {
            window.location.href = `index.php?consultar_id=${idBuscar}`;
        }
    });

    // FUNCIÓN ACTUALIZAR
    btnActualizar.addEventListener('click', () => {
        // Validamos que el input ya tenga un ID cargado mediante la consulta
        if (inputId.value === "") {
            alert("Primero debe consultar un cliente para poder actualizarlo.");
            return;
        }
        formulario.action = "actualizarCliente.php";
        formulario.submit(); 
    });

    // FUNCIÓN ELIMINAR
    btnEliminar.addEventListener('click', () => {
        if (inputId.value === "") {
            alert("Primero debe consultar un cliente para conocer su ID y poder eliminarlo.");
            return;
        }
        
        if (confirm(`¿Está seguro de que desea eliminar al cliente con ID ${inputId.value}?`)) {
            window.location.href = `delete.php?id=${inputId.value}`;
        }
    });
</script>

</body>

</html>