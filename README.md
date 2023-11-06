# Feedback Tool with Laravel Breeze Authentication

## Description
This Laravel application provides a platform for users to submit feedback on products. The tool includes user authentication, feedback submission, and a commenting system. It is built using Laravel Breeze with Blade for a user-friendly interface and utilizes factories and seeders for generating sample data.

## Features

### User Authentication:
- Users can register, log in, and log out using Laravel Breeze.
- Authentication is required to submit feedback and comment on feedback.

### Feedback Submission:
- A form is provided for users to submit feedback with fields for title, description, and category.
- Server-side validation ensures all required fields are filled out before submission.

### Feedback Listing:
- Feedback items are displayed in a paginated list.
- Items show the title, category, vote count, and the submitting user's details.

### Commenting System:
- Users can comment on feedback items.
- Comments include the user's name, date, and content.
- Rich text editing and emoji support are enabled for comments.

### UX Requirements:
- The application is responsive and functional on both desktop and mobile.
- The interface is designed to be intuitive and easy to use.

## Installation Steps

1. Clone the repository from GitHub.
2. Copy `.env.example` to `.env` and configure your environment settings.
3. Run `composer update` to install dependencies.
4. Execute `php artisan migrate --seed` to set up and populate the database.
5. To serve the application, you can use `php artisan serve` or set up a virtual host pointing to the `public` directory.

## Notes
- The database seeding process uses Laravel factories and seeders to create fake data for demonstration purposes.
- Ensure that the environment is set up correctly before serving the application.

Thank you 
