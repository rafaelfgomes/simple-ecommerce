<?php

  class CartModel {

    private $db;

    public function __construct() {
      
      $this->db = new Database;
    
    }

    public function getProducts()
    {

      $cartProducts = $this->db->query("SELECT c.id, p.name, p.description, p.image, c.quantity, p.price, (p.price * c. quantity) AS 'total_price' FROM cart c INNER JOIN products p on p.id = c.product_id");
      
      $cartProducts = $this->db->all();

      return $cartProducts;
    
    }

    public function totalAmountValue()
    {
      
      $totalCartAmount = $this->db->query("SELECT SUM((p.price * c. quantity)) AS 'total_amount' FROM `simple-ecommerce`.cart c INNER JOIN `simple-ecommerce`.products p on p.id = c.product_id");

      $totalCartAmount = $this->db->get();

      return $totalCartAmount;

    }

    public function count()
    {

      $this->db->query("SELECT COUNT(*) as 'total' FROM cart");
      $count = $this->db->get();

      return $count;

    }

    public function removeItem($id)
    {

      $this->db->query("DELETE FROM cart WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);

      if ($this->db->execute()) {

        return true;
      
      }
      
      return false;
      
    }

    public function storeProduct($params)
    {

      $id = $params['product-id'];

      $this->db->query("SELECT id, quantity FROM cart WHERE product_id = $id");

      $data = $this->db->get();

      if (isset($data)) {

        $qtd = $data->quantity + 1;
        
        $this->db->query("UPDATE cart SET quantity = :quantity WHERE id = :id");
        $this->db->bind(':quantity', $qtd, PDO::PARAM_INT);
        $this->db->bind(':id', $data->id, PDO::PARAM_INT);

      } else {

        $this->db->query('INSERT INTO cart (quantity, product_id) VALUES (1, :product_id)');
        $this->db->bind(':product_id', $params['product-id'], PDO::PARAM_INT);

      }

      return ($this->db->execute()) ? true : false;

    }

  }