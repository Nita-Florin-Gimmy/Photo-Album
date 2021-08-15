# HOW TO START USING THIS WEBSITE
<br />

## 1. `Create database "`**users**`"` 

<br />

> - ### Create table "**users**"

> ```php
>create table users (
>    Id int(11) not null PRIMARY KEY AUTO_INCREMENT,
>    Username varchar(150) not null,
>    Email varchar(200) not null,
>    Pass varchar(250) not null,
>    Roles varchar(15) not null,
>    Logo varchar(200) not null,
>    Hidden_password varchar(250) not null,
>    Last_login bigint(20) not null,
>    Verification int(20) not null,
>    Ban varchar(200) not null
>);
>```

<br />

> - ### Create table "**about**"

>```php
>create table about (
>    Id int(11) not null AUTO_INCREMENT,
>    User int(11) not null,
>    Txt text(200) not null,
>    PRIMARY KEY (`Id`) 
>);
>```

<br />

 ## 2. `Create database "`**photos**`"`

 <br />

> - ### Create table "**photos**"

>```php
>create table photos (
>    Id int(11) not null AUTO_INCREMENT,
>    Img varchar(200) not null,
>    User int(11) not null,
>    Clock varchar(50) not null,
>    PRIMARY KEY (`Id`)
>);
>```

 <br />

> - ### Create table "**likes**"

>```php
>create table likes (
>    Id int(11) not null AUTO_INCREMENT,
>    User int(11) not null,
>    Photo int(200) not null,
>    Like_val varchar(200) not null,
>    PRIMARY KEY (`Id`)
>);
>```

 <br />

> - ### Create table "**comments**"

>```php
>create table comments (
>   Id int(11) not null AUTO_INCREMENT,
>   User int(11) not null,
>   Photo int(200) not null,
>   Txt text(200) not null,
>   User_role varchar(200) not null,
>   Username varchar(200) not null,
>   PRIMARY KEY (`Id`)
>);
>```

<br />

 ## 3. `Create a new account`

 <br />

 ## 4. `Modify "`**users**`" table, fill the "`**Roles**`" field with "`**administrator**`"`

 <br />

 <img src="https://i.imgur.com/G2qjsuc.png">

 <br />
 <br />

 # Now you can access the admin panel just by clicking on your logo **(you can find it on the main page)**
 <br />

## Info: 

 <br />

This website is a kind of photo album. The people can give likes or write comments but they cannot post photos. The people with "moderator' role can delete any comment. The people with "administrator" role have acces to post photos, ban users and delete comments.

 <br />
 <br />

 ### © Nita Florin Gimmy 2021  ***all rights are reserved***.
