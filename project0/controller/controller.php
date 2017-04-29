<?php 
  
  // get all categories from xml file
  $categories = simplexml_load_file("../model/db.xml") or die("Error: Object Creation failure");

  // filter categories by grabbing single category
  function single($page, $categories) {
    foreach ($categories as $category) {
      if ($page == $category['name']) {
        return $category;
      }
    }
  }
?>