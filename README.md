## Overview
* Used Framework : `Laravel 9.x`
* Database : `MySql`

## Features

| Task                | Priority | Status  | Desciption                                                                                   |
|---------------------|:--------:|:-------:|:---------------------------------------------------------------------------------------------|
| Login               |   High   |    ✅    |                                                                                              |
| Create task         |   High   |    ✅    | Create new task for a project (if not exists, new project will be created with the given id) |
| List projects       |   High   |    ✅    | List all projects for the user                                                               |
| List project tasks  |   High   |    ✅    | List tasks for a given project                                                               |
| Queue file process  |  Medium  |    ✅    | Queue file counting process that might taks time                                             |
| Process large files |   Low    | `Pending` | Chunk and process large files that might cause exceed memory usage limit                     |

## Requirements
```
php: "^8.0.2"
```

## Build & Test
1. Clone repo
```
git clone https://github.com/AiMirage/task-runner-web-api.git
```
2. Install dependencies
```
composer install
```
3. Create mysql database and add credentials to `.env` file
4. Change queue connection to database in `.env` file 
```
QUEUE_CONNECTION=database 
```
5. Migrate & Seed (to create a user for testing)
```
php artisan migrate:fresh --seed
```
6. Run server
```
php artisan serve
```
7. Test (using Swagger | Postman | Frontend)
```
email: admin@admin.com
password: 123456
```
#### Postman Collection : [Download](https://www.getpostman.com/collections/728d0e66a8c22ae19f79)

## Final Words
Your comments are really appreciated and if anything wasn't that clear in the code or faced any trouble in the setup or tests gives unwanted results, please don't hesitate to contact me.
