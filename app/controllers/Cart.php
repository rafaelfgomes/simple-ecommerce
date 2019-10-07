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

    public function remove($id)
    {
      
      $removed = $this->cart->removeItem($id);

      if ($removed) {
        
        redirect('pages/index');

      } else {

        flash('error', 'Houve um problema ao excluir o item', 'alert alert-danger');

      }

    }

  }