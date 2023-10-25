# Employee Management System Project

The Employee Management System is a comprehensive web application built using PHP Laravel, designed to streamline and simplify employee management for organizations. This system provides a range of features for both administrators and employees, making it easier to manage employee data, attendance, leave, payroll, and more.

## Features

### Admin Side Features:

#### 1. User Management

-   Admin can create and manage employee accounts.
-   Secure login system for administrators with username and password authentication.
-   Assign roles and permissions to employees for effective access control.

#### 2. Employee Profile Management

-   Create and update detailed employee profiles.
-   Store and manage personal and professional information for each employee.

#### 3. Leave and Attendance Management

-   Approve or deny leave requests from employees.
-   Monitor attendance, track late arrivals, and manage absences efficiently.

#### 4. View Work Details

-   Create a dashboard section that enables administrators to access work details for each employee.
-   Search for employees, view their work schedules, projects, and tasks, and update this information as needed.

#### 5. Manage Tours

-   Implement a section for managing employee travel or tours.
-   Admins can initiate tour requests on behalf of employees or review and approve employee-initiated tour requests.

#### 6. Payroll Management

-   Create a payroll section to handle salary processing and related tasks.
-   Input and calculate employee salaries, deductions, and taxes easily.

### Employee Side Features:

#### 1. Employee Self-Service

-   Allow employees to access and update their personal information.
-   Secure login system for employees with username and password authentication.

#### 2. Time Tracking

-   Enable employees to log their start and end times for accurate timekeeping.
-   View work schedules and timesheets to stay on top of their work hours.

#### 3. Payroll Information

-   Employees can easily access and view their total hours of work.
-   Check their salary history and deductions for transparency.

#### 4. Leave Requests

-   Allow employees to submit leave requests and track their status.
-   View approved and pending leave requests for effective leave management.

#### 5. View Task Details

-   Provide employees with a dashboard to view their work details and tasks.
-   Allow employees to submit their tasks for review.

#### 6. Tour Requests

-   Enable employees to submit travel and tour requests directly from their panel.
-   Specify destination, travel dates, and purposes for the tour.
-   Track the status of their travel and tour requests.

## Getting Started

Follow the steps below to set up and run the Employee Management System on your server:

1.  **Prerequisites**: Ensure that you have PHP, Laravel, and a database system (e.g., MySQL) installed on your server.

2.  **Clone the Repository**: Clone this repository to your server or local development environment.

    ```bash
    https://github.com/akikhossain/Employee-Management-System.git

    ```

3.  **Configuration**: Configure your database connection settings in the .env file.

4.  **Install Dependencies**: Install the required PHP dependencies using Composer.

5.  **Database Migrations**: Run the database migrations to create the necessary tables.

    ```bash
      php artisan migrate

    ```

6.  **Seed Data (Optional)**: If you'd like to populate the system with sample data, run the seeders.

    ```bash

      php artisan db:seed

    ```

7.  **Start the Application**: Start the Laravel development server.

    ```bash
     php artisan serve

    ```

8.  **Access the Application**: Open your web browser and access the application at http://localhost:8000 (or the URL provided by the Laravel server).

# Usage

**Admin Panel**: Log in with your admin credentials to access the full suite of admin features.

**Employee Panel**: Employees can log in using their credentials to access their personal data, time tracking, leave requests, payroll information, task details, and tour requests.

# Contributing

If you would like to contribute to this project, please follow our contribution guidelines.

# License

This project is licensed under the MIT License.

# Support

If you encounter any issues or have questions, please contact our support team at mr.akikhossain@gmail.com

# Acknowledgments

We would like to express our gratitude to the Laravel community for providing the robust framework that made this project possible.

Thank you for considering the Employee Management System for your organization. We hope this system enhances your employee management processes and makes your workplace more efficient and organized.
