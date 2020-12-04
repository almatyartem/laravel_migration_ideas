<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Description

This is a demo of web-store's backend divided on independent modules. The design of application supposes to follow the 
SOLID principles regarding on common Laravel practises. 

## Business Requirements

The application's API should implement these methods:
- return the list of products
- return the list of currencies
- update the currency sign($) by id

The application should perform in the background these actions:
- sync currencies with third-party API
- sync products with third-party API
- notify web store administrator about new products and currencies added while sync

## Application Architecture Requirements

- Application should be divided into Modules 
- Modules must be completely decoupled, each Module should not know anything about other ones
- all interactions between Modules must be performed via App Contracts (Contracts placed on App level)
- App DTO classes (DTO placed on app level) must be used to transfer data between Modules
- App Contracts could know only about other App Contracts and App DTO classes
- App DTO classes could know only about the other App DTO Classes
- none of the Module related parts should be placed in the App level
- each Module must have one Main Service Provider extending Illuminate\Support\ServiceProvider
- Module's Main Service Provider could include the other Module's Service Providers

## Step-by-step implementation

###Define Modules
- [Storage](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Modules/Storage)
> Encapsulates all the logic related to data retrieving/persisting. Default implementation using Eloquent may be 
>replaced by another one
- [WebStore](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Modules/WebStore) 
> Implements api/Store Endpoint and sync products with third-party API     
- [MultiCurrencies](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Modules/MultiCurrencies)
> Implements api/MultiCurrencies Endpoint and sync currencies with third-party API   
- [AdminNotificator](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Modules/AdminNotificator)
> One place to send different notifications to store administrator 

###Create a database structure using migrations
- [products table creating migration](https://github.com/almatyartem/laravel_migration_ideas/blob/master/database/migrations/2020_11_27_084858_create_products_table.php)
- [currencies table creating migration](https://github.com/almatyartem/laravel_migration_ideas/blob/master/database/migrations/2020_11_27_083250_create_currencies_table.php)
- [exchange_rates table creating migration](https://github.com/almatyartem/laravel_migration_ideas/blob/master/database/migrations/2020_11_27_083611_create_exchange_rates_table.php)

###Create DTO Classes
- [CurrencyDTO](https://github.com/almatyartem/laravel_migration_ideas/blob/master/app/Models/DTO/CurrencyDTO.php)
- [ExchangeRateDTO](https://github.com/almatyartem/laravel_migration_ideas/blob/master/app/Models/DTO/ExchangeRateDTO.php)
- [ProductDTO](https://github.com/almatyartem/laravel_migration_ideas/blob/master/app/Models/DTO/ProductDTO.php)

###Module Storage
Architecture overview:

####[DataProviders](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Modules/Storage/DataProviders)
1. DataProvider can be considered as API (entry point) for one DB table 
2. DataProviders 


###Contracts
[All contracts](https://github.com/almatyartem/laravel_migration_ideas/tree/master/app/Contracts)
>Here we 
