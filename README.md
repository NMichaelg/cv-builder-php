# CV Builder

A PHP and MySQL web application for creating, storing, and viewing CVs (curriculum vitae). The project provides a simple web interface where users can register or log in, enter their personal and professional information, and generate a CV from the submitted data.

The application was developed as a web programming project and uses a basic MVC-style structure to separate routing, database operations, and presentation.

## Features

* 👤 User registration and login
* 🔐 User authentication
* 📝 Create a new CV
* 📄 View CV information
* 💾 Store CV information in MySQL
* 📋 Collect personal, education, skills, and work-experience details
* 📞 Contact page
* 🧩 Controller / Model / View project structure
* 📱 Bootstrap-based user interface

## Tech Stack

| Technology     | Purpose                              |
| -------------- | ------------------------------------ |
| **PHP**        | Backend and server-side logic        |
| **MySQL**      | Database and data storage            |
| **HTML5**      | Page structure                       |
| **CSS3**       | Custom styling                       |
| **Bootstrap**  | User interface and responsive layout |
| **JavaScript** | Client-side functionality            |

## Project Structure

```text
cv-builder-php/
│
├── controllers/
│   └── RouteController.php       # Application routing
│
├── models/
│   ├── database.php              # Database connection/setup
│   └── get_cv_info.php           # CV data retrieval
│
├── views/
│   ├── cv_form/                  # CV creation form
│   ├── login_reg/                # Login and registration
│   ├── show_cv/                  # CV display
│   ├── contact_us.php            # Contact page
│   └── home.php                  # Home page
│
├── ultis/                        # Utility/helper files
│
├── index.php                     # Main application entry point
├── style.css                     # Custom styles
├── README.md                     # Project documentation
└── LICENSE                       # Project license
```

## How It Works

The application uses `index.php` as its main entry point. Requests are passed to `RouteController.php`, which determines which view should be displayed.

The general flow is:

```text
Browser
   │
   ▼
index.php
   │
   ▼
RouteController
   │
   ├── Home
   ├── Login / Registration
   ├── CV Form
   ├── View CV
   └── Contact
           │
           ▼
        Models
           │
           ▼
        MySQL
```

This separation keeps routing, database operations, and page presentation in different parts of the application.

## CV Information

The application stores information related to a user's CV, including:

### Personal Information

* Name
* Gender
* Phone number
* Email
* Address
* City
* Country

### Education

* Degree
* School
* Major

### Skills

* Skill name
* Years of experience

### Work Experience

* Company name
* Position

This information is stored in the application's MySQL database and can later be retrieved and displayed as a CV.

## Database

The project uses **MySQL** for persistent data storage.

A central `cv` table is used to store CV information, including personal details, education, skills, and work experience.

Before running the application, create the required database and configure the database connection in:

```text
models/database.php
```

> Do not commit production database credentials or passwords to the repository.

## Requirements

To run the project locally, you will need:

* PHP 7.x or newer
* MySQL or MariaDB
* Apache or another PHP-compatible web server
* A modern web browser

For an easy local development environment, you can use:

* XAMPP
* WAMP
* MAMP
* Laragon

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/NMichaelg/Web_assignment.git
cd Web_assignment
```

### 2. Configure the database

Create a MySQL database for the application.

Then configure the database connection in:

```text
models/database.php
```

Update the connection settings to match your local MySQL environment.

### 3. Start the web server

If you are using XAMPP, place the project inside:

```text
C:\xampp\htdocs\
```

Then start:

* Apache
* MySQL

### 4. Open the application

Navigate to:

```text
http://localhost/Web_assignment/
```

The application should load through `index.php`.

## Application Routes

The application uses a page-based routing system.

The available sections include:

```text
?page=home
?page=login
?page=register
?page=cv
?page=contact
```

The exact route names are handled by `controllers/RouteController.php`.

## Development Architecture

The project follows a lightweight MVC-style architecture.

### Controllers

The `controllers/` directory contains application routing logic.

`RouteController.php` determines which part of the application should handle the incoming request.

### Models

The `models/` directory contains database-related functionality.

The models are responsible for interacting with the MySQL database and retrieving CV information.

### Views

The `views/` directory contains the user-facing pages and forms.

This includes:

* Home page
* Login and registration
* CV creation form
* CV display
* Contact page

Separating these responsibilities makes the project easier to understand and maintain compared with putting all application logic into a single PHP file.

## Screenshots

Screenshots can be added here to demonstrate the application.

For example:

```markdown
### Home Page

![Home Page](images/home.png)

### CV Form

![CV Form](images/cv-form.png)

### Generated CV

![CV](images/cv.png)
```

## Possible Improvements

The project could be extended with features such as:

* Multiple CVs per user
* CV editing and deletion
* PDF CV export
* Profile pictures
* Multiple CV templates
* Improved form validation
* Password hashing and stronger authentication
* User-specific authorization
* Better database normalization
* Search and filtering
* Responsive design improvements
* Environment-based database configuration
* Automated testing

## Security Considerations

This project is intended primarily for educational purposes.

For production use, additional security measures should be implemented, including:

* Password hashing with `password_hash()`
* Password verification with `password_verify()`
* Prepared SQL statements
* Server-side input validation
* Output escaping
* CSRF protection
* Session security
* Authorization checks
* Secure handling of database credentials

## License

See the [`LICENSE`](LICENSE) file for license information.

## Author

**Michael Ng**

GitHub: [@NMichaelg](https://github.com/NMichaelg)

