<?php

  class ProductModel {

    private $db;

    public function __construct() {
      
      $this->db = new Database;
    
    }

    public function all() {
      
      $this->db->query("SELECT * FROM products");
      $products = $this->db->all();

      return $products;

    }

  }
  