<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About Project
    There is an application for a teacher to assign students to groups for a project.

Functionality:

    On firs visit a teacher can see all created projects and ability to create a new project by providing a title of the project and a number of groups that will participate in the project and a maximum number of students per group. Groups are automatically initialized when a project is created.
    A teacher can add students to a exact project using the “Add new student” button. Each student must have a unique full name.
    All students added to a project are visible on a list.
    Teacher can delete a student. In such a case, the student should be removed from the project.
    Teacher can unsign a student. In such a case, the student should be removed from the group.
    Teacher can assign a student to any of the groups. Any student can only be assigned to a single group. In case the group is full, information text should be visible to a teacher.
    
## Instalation


This project was made on Laravel 8 version:

Alternative installation is possible without local dependencies relying on Docker.

Clone the repository:

    git clone https://github.com/NRimantas/project_assistant.git

Switch to the repo folder:

    cd project_assistant

Install all the dependencies using composer:

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (Make sure that have database named "project_assistant"):

    php artisan migrate

Start the local development server

php artisan serve You can now access the server at http://localhost:8000

TL;DR command list:

    git clone https://github.com/NRimantas/project_assistant.git
    cd cd students_projects
    composer install
    Make sure you set the correct database connection information before running the migrations Environment variables
    php artisan migrate
    php artisan serve



