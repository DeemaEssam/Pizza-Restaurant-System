# 🍕 Pizza Restaurant System

## 📌 Project Description

**Pizza Restaurant System** is a web application for managing a pizza restaurant. It allows users to view the pizza menu, read messages and reviews from other users, and interact with the restaurant system.
The project is built using **PHP** and **MySQL**, and it implements full **CRUD operations**.



## ✨ Features

* 📖 View the **pizza menu**
* 💬 Read user messages and reviews
* 👤 User authentication:

  * Register a new account
  * Login with an existing account
* ✍️ User actions:

  * Add a new message (after logging in)
  * Read messages
  * Edit their own messages
* 🛡️ Permissions using `userType`:

  * `userType = 1` → **Admin**

    * Can see **Delete** buttons for messages
  * `userType = 0` → **User**

    * Cannot delete messages
* 🔐 Page protection using **Sessions**



## 🧩 Supported CRUD Operations

The system implements all **SQL CRUD commands**:

* **Create**

  * Register a new account
  * Add a new message

* **Read**

  * Display pizza menu
  * Show all user messages

* **Update**

  * Edit a user’s own message

* **Delete**

  * Delete a message (**Admin only**)



## 🗂️ Database Structure (Simplified)

* **register**

  * `username`
  * `email`
  * `password`
  * `userType`

* **contact**

  * `username`
  * `message`



## 🛠️ Technologies Used

* PHP
* MySQL
* HTML / CSS
* XAMPP
* Sessions



## 🚀 How to Run

1. Start **Apache** and **MySQL** via XAMPP
2. Place the project in:

   ```
   C:\xampp\htdocs\
   ```
3. Create the database and tables
4. Open the site in your browser:

   ```
   http://localhost/ProjectFolderName
   ```



## 🔒 Security Notes

* Users can **only add messages after logging in**
* Pages are **protected with sessions**
* Only **Admins can delete messages**



## 👨‍💻 Summary

This project is a complete system for managing a pizza restaurant, demonstrating practical use of:

* Authentication
* Authorization
* CRUD operations
* Session management
