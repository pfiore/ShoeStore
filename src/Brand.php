<?php

  class Brand
  {

    function __construct($name, $id = null)
    {
      $this->name = $name;
      $this->id = $id;
    }
    //Getters
    function getName()
    {
      return $this->name;
    }

    function getId()
    {
      return $this->id;
    }
    //Setter
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }



  }


?>
