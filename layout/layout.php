<?php

class Layout
{

  private $IsRoot;

  public function __construct($isRoot = false)
  {
    $this->IsRoot = $isRoot;
  }

  public function printHeader()
  {
    $directory = ($this->IsRoot) ? "" : "../";

    $header = <<<EOF

    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RegistrarEstudiantes</title>
  <link rel="stylesheet" href="{$directory}assets\css\bootstrap\bootstrap.min.css">
  <link rel="stylesheet" href="{$directory}assets\css\style.css">
  
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{$directory}index.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-9">
      <h2>Filtro</h2>
    
        <div class="btn-group mov">
    
          <a href="index.php" class="btn btn-dark">Todos</a>
          <a href="index.php?CarreraId=1" class="btn btn-dark">Software</a>
          <a href="index.php?CarreraId=2" class="btn btn-dark">Redes</a>
          <a href="index.php?CarreraId=3" class="btn btn-dark">Multimedia</a>
          <a href="index.php?CarreraId=4" class="btn btn-dark">Mecatronica</a>
          <a href="index.php?CarreraId=5" class="btn btn-dark">Seguridad Informatica</a>
    
        </div>
    
    
      </div>
    </div>
  </nav>
  <main class="margen-top-8">

EOF;

    echo $header;
  }

  public function printFooter()
  {
    $directory = ($this->IsRoot) ? "" : "../";
    $footer = <<<EOF

    </main>
  <script src="{$directory}assets/js/jquery/jquery-3.5.1.min.js"></script>
  <script src="{$directory}assets/js/bootstrap/bootstrap.min.js"></script>
  
</body>

</html>

EOF;

    echo $footer;
  }
}
