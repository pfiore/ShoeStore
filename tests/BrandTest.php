<?php

  /**
  * @backupGlobals disabled
  * @backupStaticAttributes disabled
  */

  require_once "src/Brand.php";

  $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

  class BrandTest extends PHPUnit_Framework_TestCase
  {
    // protected function tearDown()
    // {
    //   Store::deleteAll();
    //   Brand::deleteAll();
    // }


    //GETTERS
    function test_getName()
    {
      //ARRANGE
      $name = "Blundstone";
      $test_brand = new Brand($name);

      //ACT
      $result = $test_brand->getName();

      //ASSERT
      $this->assertEquals($name, $result);
    }

    function test_getId()
    {
      //ARRANGE
      $name = "Blundstone";
      $id = 8;
      $test_brand = new Brand($name, $id);

      //ACT
      $result = $test_brand->getId();

      //ASSERT
      $this->assertEquals(8, $result);
    }


    function test_setName()
    {
        //ARRANGE
        $name = "Blundstone";
        $test_brand = new Brand($name);

        $new_name = "Danner";

        //ACT
        $test_brand->setName($new_name);

        //ASSERT
        $this->assertEquals($new_name, $test_brand->getName());
    }


  }




?>
