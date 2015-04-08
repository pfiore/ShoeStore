<?php

  /**
  * @backupGlobals disabled
  * @backupStaticAttributes disabled
  */

  // require_once "src/Store.php";
  require_once "src/Brand.php";

  $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

  class BrandTest extends PHPUnit_Framework_TestCase
  {
    protected function tearDown()
    {
      // Store::deleteAll();
      Brand::deleteAll();

    }


    //GETTERS----------------------------
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

    //SETTERS-------------------------------
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

    function test_setId()
    {
      //ARRANGE
      $name = "Blundstone";
      $id = 8;
      $test_brand = new Brand($name, $id);

      //ACT
      $test_brand->setId(6);

      //ASSERT
      $result = $test_brand->getId();
      $this->assertEquals(6, $result);
    }

    function test_save()
    {
      //ARRANGE
      $name = "Blundstone";
      $id = 1;
      $test_brand = new Brand($name, $id);

      //ACT
      $test_brand->save();

      //ASSERT
      $result = Brand::getAll();
      $this->assertEquals([$test_brand], $result);

    }

    function test_deleteAll()
    {
    //ARRANGE
    $name = "Blundstone";
    $id = 1;
    $test_brand = new Brand($name, $id);
    $test_brand->save();
    //ACT
    Brand::deleteAll();
    //ASSERT
    $result = Brand::getAll();
    $this->assertEquals([], $result);
    }


    function test_getAll()
    {
      //ASSERT
      $name = "Blundstone";
      $id = 1;
      $test_brand = new Brand($name, $id);
      $test_brand->save();

      $name2 = "Airwalks";
      $id2 = 2;
      $test_brand2 = new Brand($name2, $id2);
      $test_brand2->save();

      //ACT
      $result = Brand::getALL();

      //ASSERT
      $this->assertEquals([$test_brand, $test_brand2], $result);
    }

    function test_find()
    {
      //ARRANGE
      $name = "Blundstone";
      $test_brand = new Brand($name);
      $test_brand->save();

      $name2 = "Airwalk";
      $test_brand2 = new Brand($name2);
      $test_brand2->save();

      //ACT
      $result = Brand::find($test_brand->getId());

      //ASSERT
      $this->assertEquals($test_brand, $result);
    }

    function test_addStore()
    {
      //ARRANGE
      $name = "Blundstone";
      $test_brand = new Brand($name);
      $test_brand->save();

      // $name1 = "Blundstone Store";
      // $test_store = new Store($name1);
      // $test_store->save();

      //ACT
      $test_brand->addStore($test_store);

      //ASSERT
      $result = $test_brand->getStores();
      $this->assertEquals([$test_store], $result);
    }





  }
?>
