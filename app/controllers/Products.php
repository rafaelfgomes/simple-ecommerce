<?php

  class Products extends Controller {

    public function __construct() {

      $this->products = $this->model('ProductModel');
    
    }

    public function list($id)
    {

      $products = $this->products->listByCategory($id);

      $data = [
        'attr' => '',
        'products' => $products
      ];
      
      $this->view('pages/products/category', $data);

    }

    public function search()
    {
      
      $products = $this->products->search($_POST['value']);

      $data = [
        'attr' => '',
        'resultSearch' => $products
      ];
      
      $this->view('pages/products/search', $data);

    }

    public function show($id) {
      
      $product = $this->products->getDetails($id);
      
      return $product;

    }

    public function delete()
    {
      # code...
    }

  }