# MYTHERESA Pre-Interview Task
- <h3><i> To make the task interesting, I prefered Not To Use DB and assumed that  I have multiple stores ( ex: MYTHERESA ) that provide external APIs to call and list products </i></h3>
-  I've used Laravel to implement an API endpoint that returns a JSON response contains a list of products filtered by multiple filters like category, lessThan and hasDiscount
 

# Installation Using Docker ( Linux )

## Perquisite
- `Docker`
- `docker-compose`
- `Makefile`

## Dev-Ops Description :
- Docker & docker-compose.
- register services  ``php-fpm ``, ``nginx``
- Link each service to service registry .
- use ``make`` command to automate operations

## Install
- extract the .zip file or download using `git clone https://github.com/khaledsabbah/MyTheresa.git MyTheresa`
- `cd MyTheresa` <small> ( go to task location )</small>
- `cp -rf .env.example .env`
- `make init`
- `make install permission`
- You should see the following image
  ![alt text](https://raw.githubusercontent.com/khaledsabbah/MyTheresa/main/images/server.png)

- To Open docker container use the following command

        docker exec -it phpfpm /bin/bash
## Server Up
  `make up`
# Normal Installation ( Manual )

* Run ``git clone https://github.com/khaledsabbah/MyTheresa.git MyTheresa``
* Go to `MyTheresa` Folder
* copy .env.example content in a new file named as `.env`

Run the following commands inside terminal:
    
  ```
      composer install
      chmod 755 -R storage/logs/
      chmod 777 -R storage/framework/sessions/
      chmod 777 -R storage/framework/views/
      chmod 777 -R storage/framework/cache/
      chmod 777 -R bootstrap/cache/
      php artisan optimize:clear
      php artisan serve --port=8089  
  ```

#Running
*        Base Url :   http://localhost:8089

- ``page`` Is The Page Number
- ``limit`` Number Of Products Per Page

###### Get Products With Category `boots`  :
*       http://localhost:8089/products?category=boots&page=1&limit=1  

###### Get Products With priceLessThan `71000` : 
*       http://localhost:8089/products?priceLessThan=71000&page=1&limit=1  

###### Get Products That Has Discount :
*       http://localhost:8089/products?hasDiscount=1&page=1&limit=1

###### Get Products That Doesn't Has Any Discount :
*       http://localhost:8089/products?hasDiscount=0&page=1&limit=1  

###### Get Products With All Filters Together :
*       http://localhost:8089/products?category=boots&priceLessThan=71000&hasDiscount=1&page=1&limit=1  

- Then, you'll see result like this: ![alt text](https://raw.githubusercontent.com/khaledsabbah/MyTheresa/main/images/products.png)

# Test Cases:

- Run   `make test` OR  ` ./vendor/phpunit/phpunit/phpunit `
- Then, you'll see result like this: ![alt text](https://raw.githubusercontent.com/khaledsabbah/MyTheresa/main/images/tests.png)

## Code Desgin and Architect
I tried to apply S.O.L.I.D principles & use some design pattern and Hydrate everything into object as possible.

#### Patterns used:
- ``Service Oriented architecture``  Calling services and repositories if any, retrieving data and aggregate multiple processes.
- ``Factory Pattern``   Create an Advertiser object on the fly .
- ``Hydrator | Entity Pattern``  Hydrate inputs ( eg. data ) into entities .
- ``Composite Entity Pattern``  Applying composition and relations between Entities.
- ``Filter Pattern``   Filter data and return only what meet the implemented criteria
- ``Transformer Pattern``  Transform response object to and JSONable type like Array .


# WorkFlow
- `Controller` calls `Service` Method to fetch data
- `Hydrators` used to hydrate data using `Entities`.
- `Fitlers` used do our logic remove repeated rooms and sort hydrated objects
- `Transformers` used to transform the result in the JSON Output.
