<?php

class Pages extends Controller {

  public function __construct() {

    $this->category = $this->model('Category');
    $this->cart = $this->model('CartModel');
    $this->products = $this->model('ProductModel');
  
  }

  public function index() {

    allCategories($this->category->getCategories());
    allProducts($this->products->all());
    cartSession($this->cart->getProducts());
    countCartProducts($this->cart->countCartProducts());

    $data = [
      'attr' => ''
    ];

    $this->view('pages/index', $data);
    
  }

}