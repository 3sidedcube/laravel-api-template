<p align="center">
    <a href="https://3sidedcube.com" target="_blank">
        <img src="https://3sidedcube.com/app/themes/tsc-2018/img/footer/logo-black.png" width="400" alt="3 Sided Cube">
    </a>
</p>

# :project_name

<!--delete-->
---
This repository can be used to scaffold new Laravel APIs. Follow these steps to get started: 

1. Run the following command in your terminal:
```shell
composer create-project 3sidedcube/laravel-api-template project-name
```
2. Next configure your Laravel services by running:
```shell
php artisan sail:install
```
3. Update the `bitbucket-pipelines.yml` file to use any additional services 
4. Ensure that the provisioning and deployment information is correct
5. Create a Backend API confluence page on the project space for writing helpful documentation (remember to update the README)
6. Replace any references to project_name with your project name. You will need to update the following files:
   1. `composer.json` (name)
   2. README.md (title)
   3. Environment variables (`.env`, `.env.example`, `.env.pipelines`)
   4. OpenAPI (`v1.json`)
7. Update the environment information below with the correct URLs
---
<!--/delete-->

This is where your description should go. Limit it to a paragraph or two.

## Environments

There are several environments available for this project.

### Production

[https://project-api.com](https://project-api.com)

This environment should only be used for production builds. Changes to the API should have been tested before they are
deployed to this environment.

### Staging

[https://project-api.com](https://project-api.com)

Once the API has completed internal testing, it should be deployed to this environment. This will then be used by the
client during UAT.

> Note: Please ensure that UAT always used this environment so that bug fixes and changes can be deployed to test
> whilst UAT is ongoing.

### Test

[https://project-api.com](https://project-api.com)

The test environment should be used for testing the API internally All mobile builds that are built for the testing
team should also point at this environment.

### Development

[https://project-api.com](https://project-api.com)

This environment is available for mobile developers or frontend developers to use when developing new features locally.
It is helpful to have the environment so that developers can fix any breaking changes before the API changes get
deployed to the test environment.

## Local Development

This project uses Laravel Sail for local development which uses [Docker](https://www.docker.com/get-started). You will
need to ensure that you have Docker installed and running on your machine.

### First time setup

1. Copy the example environment file:
```shell
cp .env.example .env
```

2. Install Composer dependencies:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

3. Run the following commands:
```shell
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

4. The API should now be available at [http://localhost](http://localhost).

### Stopping the project

1. To stop the project docker containers, simply run the following command:
```shell
./vendor/bin/sail down
```

### Starting the project again

1. To start the project docker containers after you've completed the first time use, simply run the following command:
```shell
./vendor/bin/sail up -d
```

### Gotchas

Here are some helpful tips if you are having issues with this project:

## Provisioning

Server provisioning is handled by [Laravel Forge](https://forge.laravel.com).

## Deployments

To deploy this project, login to [Envoyer](https://envoyer.io) and click deploy on the corresponding project.

## Documentation

All documentation can be found under the following [page]() in confluence.

## Logging

We use [Sentry](https://sentry.io) for keeping track of logs across the various environments.

## Tests

You can run the full test suite by running the following command:

```shell
make test
```
