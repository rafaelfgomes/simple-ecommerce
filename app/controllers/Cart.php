<?php

  class Cart extends Controller {

    public function __construct() {
      
      $this->cart = $this->model('CartModel');

    }

    public function index()
    {
      $totalAmountValue = $this->cart->totalAmountValue();

      $data = [
        'totalAmountValue' => $totalAmountValue
      ];

      $data['attr'] = 'disabled';
      
      $this->view('pages/cart/index', $data);

    }

    public function store($data)
    {

      


    }

  }