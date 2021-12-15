  <h3 align="center">Wiki Library</h3>

  <p align="center">
    Browse books based on genre and title, also able to create new books through API.
    <br />
    <br />
  </p>
</p>
<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Commands](#Commands)
<!-- ABOUT THE PROJECT -->
## About The Project

This single-page application shows the available books in the system and with search functionality, and to add new books into the table through API.
### Built With

* PHP
* HTML
* CSS
* Bootstrap

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

1. Apache Server
2. Text Editor
3. Postman

### Installation

1. Clone the repo to your local directory and save it in \xampp\htdocs
3. Import wikilibrary.sql into your phpmyadmin or create two table with name bookslist(id, name, description, genre, added_on) with Id primary key, genrelist(id, genre) with id primary key and genre unique key


### Commands
1. Post command in Postman to create book
```sh
 http://localhost/WikiLibrary/operation/create-book.php 
 ```
 
 
2. BookListing Page 
```sh
http://localhost/WikiLibrary/operation/booklisting.php
```


    





