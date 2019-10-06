<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="col-12 col-md-9 pt-4 pb-3" style="border: 1px solid black;">

    <?php foreach($_SESSION['products'] as $product) : ?>

      <div class="media mb-2" style="border: 1px solid blue;">

        <img src="<?php echo PUBLICPATH . '/' . $product->image; ?>" class="align-self-start mr-3 img-thumbnail" alt="<?php echo $product->name; ?>" style="width: 120px; height: 120px">

        <div class="media-body">

          <h5 class="mt-0"><?php echo $product->name; ?></h5>
          
          <p><?php echo $product->description; ?></p>

          <p class="mb-0">AAAAAAAAAAAAAAAAAAAAAA</p>
          
        </div>

      </div>

    <?php endforeach; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>