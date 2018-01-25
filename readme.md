# MicroVentures Developer Quiz

This is intended to be worked on in collaboration with the MicroVentures
programming team. It uses [Laravel 5.5](https://laravel.com/docs/5.5), including
a small amount of Laravel Mix and Vue.js. You should also use [Postman](https://getpostman.com) or some
other API testing tool to be able to send requests to routes as if you were consuming
an API.

Even though one of the goals of this exercise is to guage
your expertise when using Laravel, it is also as important to see **how** you think
about solving the problems presented. This will help give us a clearer picture of what
you would be like as a member on our team.

Please work as you normally would, using whatever resources you find valuable
(Stack Overflow, Google, your fellow developers, etc.).

As you work through the excercises and make implementation decisions, talk out
loud about your thought process.

## Schema

The database represents an extremely simplified version of the MicroVentures business model. It has the following structure:

    (All tables have `created_at` and `updated_at` timestamps.)

    `companies`
	* `id` (autoincrement)
	* `name` (string)
	* `logo` (string)

    `investors`
	* `id` (autoincrement)
	* `first_name` (string)
	* `last_name` (string)
	* `email` (string)
	* `password` (string)

    `investments`
	* `id` (autoincrement)
	* `company_id` (integer, unsigned, index)
	* `investor_id` (integer)
	* `amount` (integer)
	* `fees` (integer)

## Concepts

This simple application allows registered **investors** to make **investments**
in any **companies** that are on the platform.

#### Company

* A `company` has many `investments`
* A `company` has a **total dollar amount** raised
* The `fees` on an `investment` do **not** count toward the dollars raised

#### Investor

* An `investors` has many `investments`
* An `investor` has a **total dollar amount** invested
* The total an `investor` pays on an `investment` is the `amount + fees`.
* The total an `investor` has invested for a particular `investment` is the `amount` **not including** the `fees`.

## Instructions

NB: You may encounter various common errors along the way. Solve them as best you can.

1. Clone the repository and set up your project like you would any other Laravel project.
1. Create a feature branch to work on. As you work, commit your changes as you normally would.
1. Install frontend dependencies (using npm or yarn) and start the Laravel Mix watcher.
1. Run the migrations and seed the database.
1. Create a host for the app to run on and visit the home URL to see that it's working.
1. No Eloquent relationships have been created in any of the models. Open the `Company` model and create a relationship for the `Investment` model.
1. Would you create relationships for other models now or wait? Why?
1. Open the `CompaniesController` and follow the steps in each method. You will need to add the appropriate routes in `/routes/web.php`.

## A Feature Request Has Come In!

A business need has come up that requires us to send a daily CSV report that includes a list of companies, along with their total dollars raised. The columns in the file need to be:

    "Company ID", "Company Name", "Total Dollars Raised", "Total Fees"

1. Create a command that will retrieve the necessary data and email it to an email address specified in the command's signature.
1. First, implement this without any 3rd party dependencies.
1. Next, use [The PHP League CSV Package](https://github.com/thephpleague/csv) to write the CSV data.
1. Discuss the pros and cons of using this package.
