<?php

require '../../modelos/persona.php';

$nombre = $_POST['ran_nombre'];
$menu = $_POST['ran_menu'];
$fechayhora = $_POST['ran_fechayhora'];
$tiempo = $_POST['ran_tiempo'];
$nombresirvio = $_POST['ran_nombresirvio'];

// VALIDAR INFORMACION
$_POST['ran_nombre'] = htmlspecialchars($_POST['ran_nombre']);
$_POST['ran_menu'] = htmlspecialchars($_POST['ran_menu']);
$_POST['ran_fechayhora'] = filter_var($fechayhora, FILTER_VALIDATE_INT);
$_POST['ran_tiempo'] = htmlspecialchars($_POST ['ran_tiempo']);
$_POST['ran_nombresirvio'] = htmlspecialchars($_POST['ran_nombresirvio']);

if ($_POST['ran_nombre'] == '' || $_POST['ran_menu'] == '' || $_POST['ran_fechayhora'] < 0 || $_POST['ran_tiempo'] == '' || $_POST['ran_nombresirvio'] =='') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $ranchos = new Rancho($_POST);
        $guardar = $ranchos->guardar();
        $resultado = [
            'mensaje' => 'PERSONA INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];

?> 
<?php include_once '../../vistas/templates/navbar.php' ?>

<? include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/personas/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>