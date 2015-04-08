<?php

  class Brand
  {
    private $name;
    private $id;

    function __construct($name, $id = null)
    {
      $this->name = $name;
      $this->id = $id;
    }
    //Getters------------------------------------
    function getName()
    {
      return $this->name;
    }

    function getId()
    {
      return $this->id;
    }

    //Setter--------------------------------------
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function setId($new_id)
    {
      $this->id = (int) $new_id;
    }

    //Save--------------------
    function save()
    {
      $statement = $GLOBALS['DB']->query("INSERT INTO brands (name)
                                          VALUES ('{$this->getName()}')
                                          RETURNING id;");
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      $this->setId($result['id']);
    }

    //Get ALL---------------------

    static function getAll()
    {
      $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
      $brands = [];
      foreach ($returned_brands as $brand_name) {
        $name = $brand_name['name'];
        $id = $brand_name['id'];
        $new_brand = new Brand($name, $id);
        array_push($brands, $new_brand);
      }
      return $brands;
    }

    //Delete ALL-----------------
    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM brands *;");
    }

    //Find ---------------------
    static function find($search_id)
    {
      $found_brand = null;
      $brands = Brand::getAll();
      foreach($brands as $my_brand){
        $brand_id = $my_brand->getId();
        if ($brand_id == $search_id){
          $found_brand = $my_brand;
        }
      }
      return $found_brand;

    }

  }

?>
