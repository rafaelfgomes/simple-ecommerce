<?php

  class Products extends Controller {

    public function all()
    {

      $categories = [ 'Eletrônicos', 'Telefonia' ];

      $products[] = [
        'name' => 'Produto 1',
        'description' => 'Descrição 1'
      ];
      
      $products[] = [
        'name' => 'Produto 2',
        'description' => 'Descrição 2'
      ];

      $products[] = [
        'name' => 'Produto 3',
        'description' => 'Descrição 3'
      ];

      $data = [
        'message' => 'MVC PHP Template',
        'categories' => $categories,
        'products' => $products
      ];

      $data['attr'] = '';
      
      $this->view('pages/products/category', $data);

    }

  }