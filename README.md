Built with Blade + Livewire & Tailwind CSS

# Development Setup

## Setup
- `composer install`
- `npm install`
- `npm build`
- Change the `.env` file to `mysql` and set the credentials accordingly
- `php artisan storage:link`
- `php artisan migrate`

## Running
- `npm run dev`
- `php artisan serve`

# Deployment with Docker
- Pull the `steven4565/` image from docker
- Copy the `docker-compose.yml` file
- `docker compose up -d`
- Migrate the database for first time setup with `docker exec -it <container-id> php artisan migrate` 
