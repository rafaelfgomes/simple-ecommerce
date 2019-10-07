<nav class="navbar navbar-expand-md navbar-dark bg-dark">

  <a class="navbar-brand" href="<?php echo URLROOT ?>">

    <img src="<?php echo PUBLICPATH; ?>/images/logo.png" width="30" height="30" alt="Logo Simple E-commerce">&nbsp;Simple E-commerce
  
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/cart"><i class="fas fa-cart-arrow-down fa-2x"></i></i>&nbsp;<span class="badge badge-secondary"><?php echo $_SESSION['productsCount']->total; ?></span></a>
      </li>

    </ul>
    
    <form method="POST" action="<?php echo URLROOT; ?>/products/search" class="form-inline my-2 my-lg-0">

      <div class="input-group">
        
        <input type="text" class="form-control" required placeholder="Pesquisar no site" aria-label="Pesquisar no site" name="value" aria-describedby="basic-addon2">
        
        <div class="input-group-append">
          
          <button class="btn btn-outline-success" type="submit">
            <i class="fas fa-search"></i>
          </button>
        
        </div>
      
      </div>
    
    </form>
  
  </div>

</nav>