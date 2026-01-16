# Pizza-Restaurant-System

|english | عربي |
|-|-|
|تمام! إليك **نسخة README باللغة الإنجليزية** جاهزة:

---

# 🍕 Pizza Restaurant System

## 📌 Project Description

**Pizza Restaurant System** is a web application for managing a pizza restaurant. It allows users to view the pizza menu, read messages and reviews from other users, and interact with the restaurant system.
The project is built using **PHP** and **MySQL**, and it implements full **CRUD operations**.

---

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

---

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

---

## 🗂️ Database Structure (Simplified)

* **register**

  * `username`
  * `email`
  * `password`
  * `userType`

* **contact**

  * `username`
  * `message`

---

## 🛠️ Technologies Used

* PHP
* MySQL
* HTML / CSS
* XAMPP
* Sessions

---

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

---

## 🔒 Security Notes

* Users can **only add messages after logging in**
* Pages are **protected with sessions**
* Only **Admins can delete messages**

---

## 👨‍💻 Summary

This project is a complete system for managing a pizza restaurant, demonstrating practical use of:

* Authentication
* Authorization
* CRUD operations
* Session management

 |أكيد 👍
هذا **README.md** جاهز ومنسق، تقدر تنسخه مباشرة وتحطه في مشروعك:

---

# 🍕 Pizza Restaurant System

## 📌 وصف المشروع

**Pizza Restaurant System** هو موقع ويب لإدارة مطعم بيتزا، يتيح عرض منيو البيتزا والتفاعل مع تعليقات وآراء المستخدمين حول المطعم.
المشروع مبني باستخدام **PHP** و **MySQL** ويطبّق عمليات **CRUD** بشكل كامل.

---

## ✨ المميزات

* 📖 عرض **منيو البيتزا**
* 💬 عرض رسائل وتعليقات المستخدمين
* 👤 نظام **تسجيل حساب / تسجيل دخول**
* ✍️ المستخدم يستطيع:

  * إضافة رسالة (بعد تسجيل الدخول)
  * قراءة الرسائل
  * تعديل رسالته إذا كان قد كتبها مسبقًا
* 🛡️ نظام صلاحيات باستخدام `userType`:

  * `userType = 1` → **Admin**

    * يظهر له زر **حذف الرسائل**
  * `userType = 0` → **User**

    * لا يظهر له زر الحذف
* 🔐 حماية الصفحات باستخدام **Sessions**

---

## 🧩 العمليات المدعومة (CRUD)

المشروع يطبق أوامر **SQL CRUD**:

* **Create**

  * إنشاء حساب جديد
  * إضافة رسالة جديدة

* **Read**

  * عرض منيو البيتزا
  * عرض رسائل وتعليقات المستخدمين

* **Update**

  * تعديل رسالة المستخدم إذا كانت موجودة

* **Delete**

  * حذف رسالة (للمسؤول Admin فقط)

---

## 🗂️ هيكل قاعدة البيانات (مختصر)

* **register**

  * username
  * email
  * password
  * userType

* **contact**

  * username
  * message

---

## 🛠️ التقنيات المستخدمة

* PHP
* MySQL
* HTML / CSS
* XAMPP
* Sessions

---

## 🚀 طريقة التشغيل

1. تشغيل **Apache** و **MySQL** من XAMPP
2. وضع المشروع داخل:

   ```
   C:\xampp\htdocs\
   ```
3. إنشاء قاعدة البيانات والجداول
4. فتح الموقع عبر:

   ```
   http://localhost/ProjectFolderName
   ```

---

## 🔒 ملاحظات أمنية

* لا يمكن إضافة رسالة إلا بعد تسجيل الدخول
* الصفحات محمية باستخدام Session
* حذف الرسائل محصور على المستخدمين من نوع Admin

---

## 👨‍💻 الخلاصة

هذا المشروع يمثل نظامًا متكاملًا لإدارة مطعم بيتزا مع تطبيق عملي لمفاهيم:

* Authentication
* Authorization
* CRUD
* Session Management
🎓
 |
