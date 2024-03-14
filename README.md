# Travel Agency Api
<p align="center">
</p>

---

<li> Welcome to my Travel Agency Api , here admin can create user accounts , travels , tours for the travels and edit travels , editor can only edit travels and users can only view tours and travels and filter tours by some paramters.</li>

##  📝Table of content

---
- [Built Using](#built).
- [Features](#features).
- [Requirements](#requirements).
- [Installation Steps](#installation).
- [Api documentation](#api).
- [concepts and patterns used](#concepts).
- [Acknowledgements](#acknowledgements).


## ⛏️ Built Using <a name = "built"></a>

---
- [MySQL](https://www.mongodb.com/) - Database
- [PHP](https://www.php.net/) - Programming Language
- [Laravel](https://laravel.com/) - Web Framework

## 🧐Features <a name = "features"></a>

---
- private admin endpoint to create users
- private admin endpoint to create new travels
- private admin endpoint to create new tours for a travel
- private editor endpoint to update a travel
- public (no auth) endpoint to get a list of paginated public travels
- A public (no auth) endpoint to get a list of paginated tours by the travel slug. users can filter (search) the results by priceFrom, priceTo, dateFrom (from that startingDate) and dateTo (until that startingDate). User can sort the list by price asc and desc. They will always be sorted, after every additional user-provided filter, by startingDate asc.


## 🔧Requirements <a name = "requirements"></a>

---
- PHP => 8
- Laravel => 10
- composer
- MySQL

## 🚀 Installation Steps <a name = "installation"></a>

---

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/VlixAli/Travel-Agency-Api.git
composer install
cp .env.example .env
```
add your Database credentials to your .env file and run this command to generate the app key, create and seed the database

```
php artisan key:generate
php artisan migrate --seed
```

run the project using the following command
```
php artisan serve
```


### Admin credentials
- Email = test@example.com
- password = password

## ✍️ Api documentation <a name = "api"></a>

---
For how to use the travel agency api and create access token view this link
[Travel Agency Api Documentation](https://documenter.getpostman.com/view/23171948/2sA2xk2Bpt)

## 🎈 concepts and patterns used <a name = "concepts"></a>




## 🎉 Acknowledgements <a name = "acknowledgements"></a>

---
this project was created based on the LaravelDaily [Mentorship api](https://laraveldaily.com/lesson/travel-api/client-specification-into-plan-of-action)
but with my own style . It's a real life interview task according to LaravelDaily
