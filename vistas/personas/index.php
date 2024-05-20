<?php


include_once '../templates/header.php'?>

<?php

include_once '../templates/navbar.php'?>

<h1 class="text-center">CONTROL DE RANCHO</h1>
<div class="row justify-content-center">
    <form action="/controladores/personas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="ran_nombre">NOMBRE DE LA PERSONA QUE SE LE SIRVIO COMIDA</label>
                <input type="text" name="ran_nombre" id="ran_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ran_menu">MENU QUE SE LE SIRVIO</label>
                <input type="text" name="ran_menu" id="ran_menu" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ran_fechayhora">FECHA Y HORA EN QUE SE SIRVIO</label>
                <input type="datetime-local" name="ran_fechayhora" id="ran_fechayhora" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ran_tiempo">TIEMPO DE COMIDA QUE SE SIRVIO</label>
                <select class="form-control" name="ran_tiempo" id="ran_tiempo" required>
                    <option value="" disabled selected>Seleccione el tiempo de comida</option>
                    <option value="desayuno">DESAYUNO</option>
                    <option value="almuerzo">ALMUERZO</option>
                    <option value="cena">CENA</option>
                    <option value="refaccion">REFACCION</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ran_nombresirvio">NOMBRE DE LA PERSONA QUE SIRVIO COMIDA</label>
                <input type="text" name="ran_nombresirvio" id="ran_nombresirvio" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-secondary w-100">GUARDAR</button>
            </div>
        </div>
        
    </form>
</div>

<?php include_once '../templates/footer.php'?>