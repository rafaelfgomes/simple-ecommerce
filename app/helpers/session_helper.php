<?php

  session_start();

  function allCategories($categories) {

    $_SESSION['categories'] = $categories;

  }

  function cartSession($cartProducts) {

    $_SESSION['cart'] = $cartProducts;
    
  }

  function countCartProducts($count){

    $_SESSION['cartProductsCount'] = $count;

  }

  function allProducts($products) {

    $_SESSION['products'] = $products;

  }

  function flash($name = '', $message = '', $class = 'alert alert-success') {

    if (!empty($name)) {
      
      if (!empty($message) && empty($_SESSION[$name])) {

        if (!empty($_SESSION[$name])) {
          
          unset($_SESSION[$name]);

        }

        if (!empty($_SESSION[$name . '_class'])) {
          
          unset($_SESSION[$name . '_class']);

        }
        
        $_SESSION[$name] = $message;
        $_SESSION[$name . '_class'] = $class;

      } elseif (empty($message) && !empty($_SESSION[$name])) {

        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';

        echo '"<div class="'. $class .'" id="flash-message">' . $_SESSION[$name] . '</div>"';

        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);

      }

    }

  }