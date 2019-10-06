<?php

  class CartModel {

    private $db;

    public function __construct() {
      
      $this->db = new Database;
    
    }

    public function getProducts()
    {

      $cartProducts = $this->db->query("SELECT p.name, p.description, p.image, c.quantity, p.price, (p.price * c. quantity) AS 'total_price' FROM cart c INNER JOIN products p on p.id = c.product_id");
      
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

  }