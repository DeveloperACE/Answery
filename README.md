<p align="center">
    <img src="answery-logo.png">
</p>

# [Answery](https://answery.herokuapp.com)
[![Build Status](https://travis-ci.org/DeveloperACE/Answery.svg?branch=master)](https://travis-ci.org/DeveloperACE/Answery)

A simple site for people who like answering questions

## To Install Dependencies
Answery uses the PHP dependency manager [Composer](https://getcomposer.org). To "install" dependencies for this project, run `php composer.phar install` after downloading or cloning the repository and installing composer

## Question Types
Answery currently has the following question types:

 - Short answer
 - Multiple Choice
   - cat/dog pictures
   - emojis
   - regular text
 - Ranking
   - cat/dog photos
   - text (i.e. "how much do you like swimming?")


## Files
Since this repository may be a little confusing, here is a brief description of what some of the project's files here are for.

`Api.php` - This file contains the `Api()` class that handles getting information from the API's listed below for use in questions and options

`Option.php` - This file contains the `Option()` class which provides information to generate most of the options for each question

`Question.php` - This file contains the `Question()` class which stores the question being asked and the `Option`s that go with it

`data.php` - Holds the data used to present questions and options, including the list of emojis/countries available for use as answers, as well as the list of questions

`index.php` - This file is the "backend" of the web app and is responsible for the server-side processing and random selection of questions

`index.tpl` - This file is the template for the HTML pages and is filled in with the information from the backend for display on the web


## API's Used
The following are all the API's used in this web app.
- http://random.cat
- http://random.dog (https://github.com/AdenFlorian/random.dog)
- http://setgetgo.com/randomword
