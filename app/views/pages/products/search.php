<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="col-12 col-md-9 pt-4 pb-3" style="border: 1px solid black;">

    <p class="h3 pt-3 pb-4">Resultado da pesquisa</p>

    <?php if(count($data['resultSearch'])) : ?>

      <?php foreach($data['resultSearch'] as $product) : ?>

        <div class="media mb-2" style="border: 1px solid blue;">

          <img src="<?php echo PUBLICPATH . '/' . $product->image; ?>" class="align-self-start mr-3 img-thumbnail" alt="<?php echo $product->name; ?>" style="width: 180px; height: 180px">

          <div class="media-body">

            <h5 class="mt-0"><?php echo $product->name; ?></h5>
            
            <p><?php echo $product->description; ?></p>

            <p class="mb-0">

              <div class="row text-center">

                <div class="col">
                  
                  <button type="button" class="btn btn-info w-75">Detalhes</button>
                
                </div>
                
                <div class="col">

                  <button type="button" class="btn btn-success w-75">Adicionar ao carrinho</button>

                </div>
              
              </div>

            </p>
            
          </div>

        </div>

      <?php endforeach; ?>

    <?php else : ?>

      <p>&nbsp;</p>

      <p class="h2 pt-4 text-center">Não foram encontrados produtos com essa pesquisa</p>

    <?php endif; ?>

  </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>