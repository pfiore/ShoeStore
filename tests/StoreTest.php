<?php

  /**
  * @backupGlobals disabled
  * @backupStaticAttributes disabled
  */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    class StoreTest extends PHPUnit_Framework_TestCase
    {
      protected function tearDown()
      {
        Store::deleteAll();
        Brand::deleteAll();

      }

      //GETTERS----------------------------
      function test_getName()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);

        //ACT
        $result = $test_store->getName();

        //ASSERT
        $this->assertEquals($name, $result);
      }

      function test_getId()
      {
        //ARRANGE
        $name = "Blundstone store";
        $id = 8;
        $test_store = new Store($name, $id);

        //ACT
        $result = $test_store->getId();

        //ASSERT
        $this->assertEquals(8, $result);
      }

      //SETTERS-------------------------------
      function test_setName()
      {
          //ARRANGE
          $name = "Blundstone Store";
          $test_store = new Store($name);

          $new_name = "Danner Store";

          //ACT
          $test_store->setName($new_name);

          //ASSERT
          $this->assertEquals($new_name, $test_store->getName());
      }

      function test_setId()
      {
        //ARRANGE
        $name = "Blundstone Store";
        $id = 8;
        $test_store = new Store($name);

        //ACT
        $test_store->setId(6);

        //ASSERT
        $result = $test_store->getId();
        $this->assertEquals(6, $result);
      }
      //SAVE
      function test_save()
      {
        //ARRANGE
        $name = "Blundstone Store";
        $test_store = new Store($name);

        //ACT
        $test_store->save();

        //ASSERT
        $result = Store::getAll();
        $this->assertEquals([$test_store], $result);

      }
      //Get ALL----------------------
      function test_getAll()
      {
        //ASSERT
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name2 = "Airwalks store";
        $test_store2 = new Store($name2);
        $test_store2->save();

        //ACT
        $result = Store::getALL();

        //ASSERT
        $this->assertEquals([$test_store, $test_store2], $result);
      }
      //Delete ALL---------------------------
      function test_deleteAll()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name2 = "Airwalks store";
        $test_store2 = new Store($name2);
        $test_store2->save();

        //ACT
        Store::deleteAll();

        //ASSERT
        $result = Store::getAll();
        $this->assertEquals([], $result);
      }

      //find one---------------------------
      function test_find()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name2 = "Airwalks store";
        $test_store2 = new Store($name2);
        $test_store2->save();

        //ACT
        $result = Store::find($test_store->getId());

        //ASSERT
        $this->assertEquals($test_store, $result);

      }

      //delete one---------------------------
      function test_delete()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name2 = "Airwalks store";
        $test_store2 = new Store($name2);
        $test_store2->save();

        //ACT
        $test_store->delete();

        //ASSERT
        $result = Store::getAll();
        $this->assertEquals([$test_store2], $result);
      }

      //update---------------------------
      function test_update()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $new_name = "Danner";

        //ACT
        $test_store->update($new_name);

        //ASSERT
        $this->assertEquals($new_name, $test_store->getName());
      }

      //get brands------------------------
      function test_getBrands()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name1 = "Blundstone";
        $test_brand = new Brand($name1);
        $test_brand->save();

        $name2 = "Airwalk";
        $test_brand2= new Brand($name2);
        $test_brand2->save();

        $test_store->addBrand($test_brand);
        $test_store->addBrand($test_brand2);

        //ACT
        $result = $test_store->getBrands();

        //ASSERT
        $this->assertEquals([$test_brand, $test_brand2], $result);
      }

      //add brand----------------------------
      function test_addBrand()
      {
        //ARRANGE
        $name = "Blundstone store";
        $test_store = new Store($name);
        $test_store->save();

        $name1 = "Blundstone";
        $test_brand = new Brand($name1);
        $test_brand->save();

        //ACT
        $test_store->addBrand($test_brand);

        //ASSERT
        $result = $test_store->getBrands();
        $this->assertEquals([$test_brand], $result);
      }









    }
?>
