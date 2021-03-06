<?php

    class Store
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
          $statement = $GLOBALS['DB']->query("INSERT INTO stores (name) VALUES ('{$this->getName()}') RETURNING id;");
          $result = $statement->fetch(PDO::FETCH_ASSOC);
          $this->setId($result['id']);
        }

        //Get ALL---------------------

        static function getAll()
        {
          $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
          $stores = [];
          foreach ($returned_stores as $store_name) {
            $name = $store_name['name'];
            $id = $store_name['id'];
            $new_store = new Store($name, $id);
            array_push($stores, $new_store);
          }
          return $stores;
        }

        //Delete ALL-----------------
        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM stores *;");
        }

        //find single-------------------
        static function find($search_id)
        {
          $found_store = null;
          $stores = Store::getAll();
          foreach($stores as $my_store) {
            $store_id = $my_store->getId();
            if ($store_id == $search_id) {
              $found_store = $my_store;
            }
          }
          return $found_store;
        }
        //delete one--------------------
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
        }

        //update--------------------
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}'
                                  WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        //get brands

        function getBrands()
        {
            $brands = array();
            $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
                                                      JOIN stores_brands ON (stores.id = stores_brands.store_id)
                                                      JOIN brands ON (brands.id = stores_brands.brand_id)
                                                      WHERE stores.id = {$this->getId()};");
            foreach($returned_brands as $brand) {
              $name = $brand['name'];
              $id = $brand['id'];
              $new_brand = new Brand($name, $id);
              array_push($brands, $new_brand);
            }
            return $brands;
        }


        //add brand to store DB
        function addBrand($new_brand)
        {
          $GLOBALS['DB']->exec("INSERT INTO stores_brands (brand_id, store_id) VALUES ({$this->getId()}, {$new_brand->getId()});");
        }

    }
?>
