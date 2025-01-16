# MVC Play

Simple MVC project.

## Project Description

This project, named `mvc-play`, is a simple implementation of the Model-View-Controller (MVC) architectural pattern. It
is designed to help understand the basics of MVC and how to structure a PHP project using this pattern.

## Requirements

- PHP 8.3 or higher
- PDO extension for database interactions

## Installation

1. Clone the repository:

```bash
git clone https://github.com/MarjovanLier/MVCPlay.git mvc-play
```

### Navigate into the project directory:

```bash
cd mvc-play
```

### Install the dependencies using Composer:

```bash
composer install
```

### Database Initialization

To initialize the database, run the following command:

```bash
composer db:init
```

### Running Tests

To run the tests with Pest, execute:

```bash
composer tests
```

Copy

Apply

### Static Analysis

To perform static analysis using PHPStan, run:

```bash
composer phpstan
```

### Project Structure

core/: Contains the core components of the MVC framework.
src/: Contains the application-specific code.

### Authors

Marjo van Lier - marjo.vanlier@gmail.com

### License

This project is licensed under the MIT License - see the LICENSE file for details.

### Explanation

- **Project Description**: Provides a brief overview of what the project is about.
- **Requirements**: Lists the necessary software and extensions needed to run the project.
- **Installation**: Guides users on how to set up the project on their local machine.
- **Usage**: Explains how to initialize the database, run tests, and perform static analysis.
- **Project Structure**: Describes the directory structure to help users navigate the codebase.
- **Authors**: Credits the author of the project.
- **License**: Mentions the licensing information, which is a common practice for open-source projects.
