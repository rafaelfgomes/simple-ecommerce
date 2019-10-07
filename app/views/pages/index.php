<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="col-12 col-md-9 pt-4 pb-3" style="border: 1px solid black;">

    <?php foreach($_SESSION['products'] as $product) : ?>

      <div class="media mb-2" style="border: 1px solid blue;">

        <img src="<?php echo PUBLICPATH . '/' . $product->image; ?>" class="align-self-start mr-3 img-thumbnail img-responsive" alt="<?php echo $product->name; ?>" style="width: 140px; height: 140px">

        <div class="media-body">

          <h5 class="mt-0 pb-4"><?php echo $product->name; ?></h5>
          
          <p class="mb-0">

            <div class="row text-center">

              <div class="col-md-6 col-12 pb-2">
                
                <button type="button" class="btn btn-info w-75" data-toggle="modal" data-target="#product-detail-modal" data-id="<?php echo $product->id; ?>" data-name="<?php echo $product->name; ?>" data-description="<?php echo $product->description ?>" data-price="<?php echo 'R$ ' . number_format($product->price, 2, ',', '.'); ?>">Detalhes</button>
              
              </div>
              
              <div class="col-md-6 col-12">

                <form action="<?php echo URLROOT ?>/cart/store" method="POST">

                  <input type="hidden" name="product-id" value="<?php echo $product->id; ?>">
                  <button type="submit" class="btn btn-success w-75">Add ao carrinho</button>

                </form>

              </div>
            
            </div>            

          </p>
          
        </div>

      </div>

    <?php endforeach; ?>

    <?php require APPROOT . '/views/components/details.php'; ?>    

<?php require APPROOT . '/views/includes/footer.php'; ?>