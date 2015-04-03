<?php

  class Brand
  {

    function __construct($name, $id = null)
    {
      $this->name = $name;
      $this->id = $id;
    }
    //Getter
    function getName()
    {
      return $this->name;
    }
    //Setter
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

  }


?>
