# Product Management System

This repository contains a PHP-based product management system with user authentication, built with HTML, CSS, and JavaScript. The application provides a straightforward way for users to log in, sign up, and perform CRUD (Create, Read, Update, Delete) operations on products.

## Table of Contents

- [Features](#features)
- [Folder Structure](#folder-structure)
- [Technologies Used](#technologies-used)
- [Getting Started](#getting-started)
- [Screenshots](#screenshots)
- [License](#license)

## Features

- **User Authentication**: Secure login and signup functionality.
- **Product Management**: Users can create, view, update, and delete products.
- **Session Management**: Users remain logged in until they sign out.
- **Error Handling**: Proper feedback and error messages for authentication and form validation.
- **Responsive Design**: The interface is responsive and suitable for various device sizes.

## Folder Structure

```
├── Classes/
│   ├── db.classes.php                  # Database connection class
│   ├── login-controler.classes.php     # Handles login operations
│   ├── login.classes.php               # User login class
│   ├── product-controler.classes.php   # Handles product operations
│   ├── product.classes.php             # Product data management class
│   ├── signup-controler.classes.php    # Handles signup operations
│   ├── signup.classes.php              # User signup class
│
├── Includes/
│   ├── config.inc.php                  # Configuration settings
│   ├── login.inc.php                   # Login processing script
│   ├── product.inc.php                 # Product handling script
│   ├── signout.inc.php                 # User sign-out script
│   ├── signup.inc.php                  # Signup processing script
│
├── favicon_io/                         # Favicon files for different devices
├── logo/                               # Project logo
│
├── app.php                             # Main app entry point
├── create a product.php                # Page to create a new product
├── delete a product.php                # Page to delete a product
├── get a product.php                   # Page to view a product's details
├── index.php                           # Homepage with login/signup options
├── signup.php                          # Signup page
├── update a product.php                # Page to update an existing product
│
├── forgot-password.css                 # Styling for password reset
├── productHandling.css                 # Styling for product handling
├── style.css                           # Global styles
├── styles.app.css                      # Main app-specific styles
└── site.webmanifest                    # Web manifest for favicon
```

## Technologies Used

- **PHP**: Backend logic and database interaction
- **HTML/CSS**: Markup and styling for the frontend
- **JavaScript**: Interactive features on the frontend
- **MySQL**: Database management for storing user and product information

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (e.g., Apache)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/product-management-system.git
   cd product-management-system
   ```

2. Set up the database:
   - Create a MySQL database for the project.
   - manually create tables for `users` and `products`.

3. Update the configuration:
   - Open `Includes/config.inc.php` and set your database credentials.

4. Run the application:
   - Start your local server and navigate to `http://localhost/product-management-system` in your browser.

### Usage

- Go to the homepage (`index.php`) to log in or sign up.
- Once logged in, use the navigation to create, view, update, or delete products.
