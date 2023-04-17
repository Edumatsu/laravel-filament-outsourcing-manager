# Outsoursing Manager With Laravel and Filament
Laravel 9 Docker with PHP 8.1.6, nginx, Postgres SQL 14.4, Filament 2.0 and Redis.

## Getting Started
### Prerequisites
- Using UNIX-based system.
- Download and Install [Docker](https://docs.docker.com/engine/install/).

### Installation
#### 0. Clone this project

#### 1. Create `.env` file from `.env.example` in root directory
The given configuration will be used by Docker to build the containers.  

#### 2. Create `.env` file from `.env.example` in `src` directory
The given configuration will be used by Laravel.  

#### 3. Run command `make build` on your terminal
This command will build Docker Compose containers.

#### 4. Run command `make up` on your terminal
This command will run Docker Compose containers.

#### 5. Run command `make ex` on your terminal
This command will run Docker Compose containers.

#### 6. Run command `composer install`
This command will install all packages.  

#### 7. Run command `php artisan make:filament-user`
This command will show you fields to fill in to create "Filament" User.  

#### 8. Go to [http://localhost:8000/admin](http://localhost:8000/admin) 
This command will open PHP container terminal.  
