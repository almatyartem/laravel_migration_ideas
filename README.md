<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Description

This is a demo of web-store's backend divided on independent modules. The design of application supposes to follow the 
SOLID principles regarding on common Laravel practises. 

## Business Requirements

The application's API should implement these methods:
- return the list of products
- return the list of currencies
- update the currency sign($) by id

The application should perform in the background these methods:
- sync currencies list with third-party API
- sync products list with third-party API

## Application Architecture Requirements
- Application should be divided into Modules 
- Modules must be completely decoupled, each Module should not know anything about other ones
- all interactions between Modules must be performed via App Contracts (Contracts placed on App level)
- App DTO classes (DTO placed on app level) must be used to transfer data between Modules
- all App Contracts could know only about other App Contracts and App DTO classes
- none of the Module related parts should be placed in App level
- each Module must have one Main Service Provider extending Illuminate\Support\ServiceProvider
- Module's Main Service Provider could include the other Module's Service Providers
- [Simple, fast routing engine](https://laravel.com/docs/routing).
