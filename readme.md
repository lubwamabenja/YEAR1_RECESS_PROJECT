<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# UNITED FRONT FOR TRANSFORMATION

The UFT member enrollment system is designed to enable the agents to register new members of the political party, the administrator to list members enrolled in a given period of time, organized by district, agent, month, to graph
displays of hierarchy,to distribute money to each of the agents in the different districts ,to display payment statements of the agent ,upgrade members to become agents and also keep track of the funds as received from the well-wishers and how the funds are distributed among the agents.

## IMPLEMENTATION
The member enrollment system is a client-server-based system that runs on both a command line and graphical user interface, the latter being web-based. Its mode of operation is based on a set of functions that manipulate string data specifically, alphabetic and numeric as instructed by the agent, who utilizes the command line interface to issue tasks. The graphical user interface is utilized by the administrator for monitoring purposes. 
- **The system is aimed at achieving optimal performance while performing the following functions. **
- Submitting a new member list for instance, the command “Addmember” inserts the member details, the command “Check-status” returns the list of members that have been registered, the command “get_statement” returns the payments of the logged-in users, the command “search” returns record from a file by name or date. 
- At the administrator’s end, he will interact with a web interface to view the members enrolled in a given period of time organized by district,agent,month as selected by the administrator;
- Display hierarchy, at the top of each is an agent head displayed by district; Display distribution of money to each of the agents in the different districts; Display graphs of variation of funding per month and per period; Displays graphs showing donations by month and well-wisher as selected by the administrator; 
- Display the total number of members; Display graph that shows variation in percentage change in enrollment figures.


## INSTALLATION

- run the following commands from terminal:
```
 git clone https://github.com/lubwamabenja/YEAR1_RECESS_PROJECT.git
 cd YEAR1_RECESS_PROJECT

```
- install The following componets
- **php
- **xammp
- **composer
- **Laravel
- **composer require "consoletvs/charts:5.*"

- create a database named **recess_political_party** and run the following commands
```
php artisan migrate
php artisan serve
```
- The UTF system was designed using laravel a php frame work and C language for the command line interface
- The system has been hosted on heroku [heroku](https://laravelrecessproject.herokuapp.com).


