# Name: Patrick Fiorentino
### Date:4/17/2015

Description: Assessment 4 many to many database

## SetUp and Use
In order to use this program you will need a web browser

SetUp
1. git clone https://github.com/pfiore/ShoeStore.git onto your desktop.
2. Open ShoeStore folder.
3. Set your localhost root folder to ~/ShoeStore/web/
4. Start PHP server
5. Start postgres and import shoes.sql database
6. Start test database by importing shoes_test.sql
7. Install composer and dependencies in the composer.json file
8. Start app by setting your web browser url to (http://localhost:8000)

## PSQL commands

psql

CREATE DATABASE shoes;

\c shoes;

CREATE TABLE brands (id serial PRIMARY KEY, name varchar);

CREATE TABLE stores(id serial PRIMARY KEY, name varchar);

CREATE TABLE stores_brands (id serial PRIMARY KEY, brand_id int, store_id int);

CREATE DATABASE shoes_test WITH TEMPLATE shoes;

\c shoes_test;


## Copyright (c) 2015 (Patrick Fiorentino)

## The MIT License (MIT)

## PERMISSION*
Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to
do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.

## LICENSING*
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.
