<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/persona.php';



include_once '../templates/navbar.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['ran_nombre'] = htmlspecialchars( $_GET['ran_nombre']);
        $_GET['ran_menu'] = htmlspecialchars( $_GET['ran_menu']);
        $_GET['ran_fechayhora'] = filter_var( $_GET['ran_fechayhora'] , FILTER_VALIDATE_FLOAT) ;
        $_GET['ran_tiempo'] = filter_var( $_GET['ran_tiempo']) ;
        $_GET['ran_nombresirvio'] = htmlspecialchars( $_GET['ran_nombresirvio']);

        $objRancho = new Rancho($_GET);
        $ranchos = $objRancho->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $Ranchos,
            'codigo' => 1
        ];
        // var_dump($clientes);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/personas/index.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE CONTROL DE RANCHO</a>
        </div>
    </div>
    <h1 class="text-center">LISTADO DE PERSONAS QUE PASAN A RANCHO</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NNOMBRE</th>
                        <th>MENU QUE LE SIRVIO</th>
                        <th>FECHA Y HORA</th>
                        <th>TIEMPO DE COMIDA</th>
                        <th>NOMBRE DE QUIEN SIRVIO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($personas) > 0) : ?>
                        <?php foreach ($personas as $key => $persona) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $persona['ran_nombre'] ?></td>
                                <td><?= $persona['ran_menu'] ?></td>
                                <td><?= $persona['ran_fechayhora'] ?></td>
                                <td><?= $persona['ran_tiempo'] ?></td>
                                <td><?= $persona['ran_nombresirvio'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay personas registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>