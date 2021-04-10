<?php
require_once 'peliculas/estudiante.php';
require_once 'helpers/utilities.php';
require_once 'layout/layout.php';
require_once 'peliculas/serviceCookie.php';


$service = new ServiceCookies();
$utilities = new Utilities();
$layout = new Layout(true);

$estudiantes = $service->GetList();

if (!empty($estudiantes)) {

  if (isset($_GET['CarreraId'])) {

    $estudiantes = $utilities->searchProperty($estudiantes, 'CarreraId', $_GET['CarreraId']);
  }
}


?>




<?php echo $layout->printHeader() ?>




<div class="row">



  <div class="col-md-10"></div>
  <div class="col-md-2">




    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#nuevo-heroe-modal">
      Registrar

    </button>
    

  </div>
</div>





  <div class="row">

    <?php if (count($estudiantes) == 0) : ?>



      <h2>No hay estudiantes, Inserte alguno</h2>

    <?php else : ?>


      <?php foreach ($estudiantes as $key => $estudiante) : ?>

        <div class="col-md-3">

         


          <div class="card text-center">
  <div class="card-header">
    <?php echo $estudiante->Name ?> <?= $estudiante->Apellido ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $utilities->tipo[$estudiante->CarreraId] ?></h5>
   
                <p class="card-text"><?= $estudiante->Check ?></p>
                
    <p class="card-text"><?= $estudiante->Materia ?></p>
    <img src="<?php echo $estudiante -> file?>">
    
  </div>
  <div class="card-footer text-muted">
  <a href="peliculas/edit.php?id=<?= $estudiante->Id ?>" class="btn btn-primary">Editar</a>
              <a href="#" id="btn-delete" data-id="<?= $estudiante->Id ?>" class="btn btn-danger">Eliminar</a>
  </div>
</div>

        </div>
      <?php endforeach; ?>

    <?php endif; ?>





  </div>











  <div class="modal fade" id="nuevo-heroe-modal" tabindex="-1" aria-labelledby="nuevo-heroe-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body">

          <form action="peliculas/add.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input name="Name" type="text" class="form-control" id="name">

            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input name="Apellido" type="text" class="form-control" id="apellido" >
            </div>

            <div class="mb-3">
              <label for="materia" class="form-label">Materias Favoritas</label>
              <input name="Materia" type="text" class="form-control" id="materia">
            </div>


            <div class="mb-3">
              <input checked type="radio" id="activo" name="Check" id = "Check" value=" Activo" checked>
              <label for="activo">Estado</label><br>
            </div>

            <div class="mb-3">
              <label for="file" class="form-label">Foto</label>
              <input name="File" type="file" class="form-control" id="file">
            </div>

            <div class="mb-3">
              <label for="carrera" class="form-label">Carrera</label>
              <select name="CarreraId" class="form-select" id="carrera">
                <option value="">Seleccione una opcion</option>
                <?php foreach ($utilities->tipo as $value => $text) : ?>

                  <option value="<?= $value ?>"><?= $text ?></option>

                <?php endforeach; ?>
              </select>
            </div>

        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          <button type="subtmit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php echo $layout->printFooter() ?>

<script src="assets/js/index/indexJquery.js" ></script>
