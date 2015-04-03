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

    function test_setName()
    {
        //Arrange
        $name = "Doc Marten";
        $test_brand = new Brand($name);

        $new_name = "Niwell";

        //Act
        $test_brand->setName($new_name);

        //Assert
        $this->assertEquals($new_name, $test_brand->getName());
    }

  }




?>
