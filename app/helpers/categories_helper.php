<?php

  session_start();

  function allCategories($categories) {

    $_SESSION['categories'] = $categories;

  }
