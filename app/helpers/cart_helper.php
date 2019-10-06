<?php

  session_start();

  function cartSession($products, $count) {

    $_SESSION['cart'] = $products;
    $_SESSION['productsCount'] = $count;

  }
