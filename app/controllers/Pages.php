<?php

class Pages extends Controller {

  public function __construct()
  {
    
  }

  public function index()
  {

    $data = [
      'message' => 'MVC PHP Template'
    ];

    $this->view('pages/index', $data);
    
  }

}