# Laravel Role Based Task Management

This is a Laravel-based Role Based Task Management application with three user roles:
**Admin, Manager, and Employee**.

---

## 🔐 Authentication & Roles
Users can sign up and log in with the following roles:
- Admin
- Manager
- Employee

---

## 👤 Role Permissions & Features

### 1️⃣ Admin
Admin has full access to manage users and tasks.

**Features:**
- Create users with the following fields:
  - First Name
  - Last Name
  - Email
  - Password
  - Role (Admin / Manager / Employee)
- Login and redirect to dashboard
- Dashboard menu:
  - Dashboard
  - Tasks
  - Users
- View all users list
- Perform CRUD operations on users
- Create tasks with:
  - Title
  - Description
  - Due Date
  - Status
- View tasks list
- Perform CRUD operations on tasks

---

### 2️⃣ Manager
Manager can view tasks and assign them to employees.

**Features:**
- Login and redirect to dashboard
- Dashboard menu:
  - Dashboard
  - Tasks
- View all tasks list
- Assign tasks to employees
- Task assignment page:
  - Select employee name
  - Assign task

---

### 3️⃣ Employee
Employee can manage assigned tasks.

**Features:**
- View all assigned tasks
- Update task status

---

## ⚙️ Run Project

```bash
php artisan migrate:fresh --seed
php artisan serve

## For admin login
email:    admin@example.com
password: 12345678
