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

    public function listByCategory($category_id) {
      
      $this->db->query("SELECT p.id, p.name, p.description, p.image FROM products p INNER JOIN category_product cp ON	p.id = cp.product_id INNER JOIN categories c ON c.id = cp.category_id WHERE c.id = $category_id");
      $products = $this->db->all();

      return $products;

    }

    public function search($name)
    {
      
      $this->db->query("SELECT id, name, description, image FROM products WHERE name LIKE '%$name%'");
      $products = $this->db->all();

      return $products;

    }

    public function getDetails($id)
    {

      $this->db->query("SELECT id, name, description, image FROM products WHERE id = $id");
      $product = $this->db->get();

      return $product;
    
    }

  }
  