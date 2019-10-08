<?php

  class CartModel {

    private $db;

    public function __construct() {
      
      $this->db = new Database;
    
    }

    public function getProducts()
    {

      $cartProducts = $this->db->query("SELECT c.id, p.name, p.image, c.quantity, p.price, (p.price * c. quantity) AS 'total_price' FROM cart c INNER JOIN products p on p.id = c.product_id");
      
      $cartProducts = $this->db->all();

      return $cartProducts;
    
    }

    public function totalAmountValue()
    {

      $totalCartAmount = 0;

      if (count($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $key => $product) {
          
          $totalCartAmount += $product->price;

        }
        
      }
  
      return $totalCartAmount;

    }

    public function countCartProducts()
    {

      return count($_SESSION['cart']);

    }

    public function removeItem($id)
    {

      $this->db->query("DELETE FROM cart WHERE id = :id");
      $this->db->bind(':id', $id);

      if ($this->db->execute()) {

        return true;
      
      }
      
      return false;
      
    }

    public function saveProduct($params)
    {

      if (count($_SESSION['cart'])) {
        
        $result = array_search($params['product-id'], $_SESSION['cart']['product_id']);
      
        if (count($result)) {

          $_SESSION['cart']['quantity']++;

        } else {

          $_SESSION['cart']['cart_id']++;
          $_SESSION['cart']['quantity'] = 1;
        
        }

      }

      $this->db->query("SELECT id, name, image, price FROM products WHERE id = :id");
      $this->db->bind(':id', $params['product-id']);
      $product = $this->db->get();

      $this->db->stmtNull();

      //die(var_dump($cart));

      if ($product) {

        $_SESSION['cart'] = [

          'cart_id' => $cart->id,
          'product_id' => $product->id,
          'name' => $product->name,
          'image' => $product->image,
          'price' => $product->price
  
        ];
  
        return true;

      }

      return false;

    }

  }