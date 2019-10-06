<!DOCTYPE html>

<html lang="pt-br">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Files -->
    <?php require APPROOT . '/views/partials/_styles.php'; ?>
    
    <title><?=SITENAME ?></title>
  
  </head>

  <body>

    <?php require APPROOT . '/views/partials/_navbar.php'; ?>

    <div class="container-fluid">

      <div class="row main-row">

        <div class="col-12 col-md-3 pt-2 pb-3" style="border: 1px solid black;">
          
          <aside class="categories-list-aside">

            <p class="h4 text-center pt-2 pb-2">Categorias</p>

            <ul class="list-group">

              <a class="btn btn-link text-decoration-none <?php echo $data['attr']; ?>" href="<?php echo URLROOT; ?>">
                <li class="list-group-item">Todos os produtos</li>
              </a>

              <?php foreach($_SESSION['categories'] as $key => $category) : ?>

                <a class="btn btn-link text-decoration-none <?php echo $data['attr']; ?>" href="<?php echo URLROOT; ?>/products/list">
                  <li class="list-group-item" ><?php echo $category->name; ?></li>
                </a>

              <?php endforeach; ?>

            </ul>
          
          </aside>

        </div>

