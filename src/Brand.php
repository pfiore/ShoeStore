<?php

  class Brand
  {

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

    //Static

    static function getAll()
    {
      $returned_brands = $GLOBALS['DB']
    }
    //Save--------------------
    function save()
    {
      $statement = $GLOBALS['DB']->query("INSERT INTO brands (name) VALUES ('{$this->getName()}') RETURNING id;");
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      $this->setId($result['id']);
    }

  }


?>
