<?php

  session_start();

  function allProducts($products) {

    $_SESSION['products'] = $products;

  }
