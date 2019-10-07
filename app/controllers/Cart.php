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

    public function store()
    {

      $savedOrUpdated = $this->cart->storeProduct($_POST);

      if ($savedOrUpdated) {
        
        flash('success', 'Produto adicionado ao carrinho');
        redirect('cart');

      } else {

        flash('error', 'Erro ao adicionar o produto');
        redirect('/');

      }

    }

    public function remove()
    {

      $id = $_POST['cart-id'];
      
      $removed = $this->cart->removeItem($id);
      
      if ($removed) {

        flash('success', 'Item excluído com sucesso');
        redirect('pages/index');       

      } else {

        flash('error', 'Houve um problema ao excluir o item', 'alert alert-danger');
        redirect('cart');
        
      }

    }

  }