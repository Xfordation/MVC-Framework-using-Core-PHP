# **ROSEŚSO (v 0.0.1)**

### It is a Small PHP framework that works with the concept of MVC. It stands for **Model-View-Contoller**. The main aim of MVC is to seperate the **Buisness Logic** & **Application Data** from the **User Interface**. The main advantage of Architecture is Reusability, Security and Increasing the performance of Application. It Divides our Application into 3 Interconnected Parts.

> ### **1. Model:** The Model component corresponds to all the data-related logic that the user works with. This can represent either the data that is being transferred between the View and Controller components or any other business logic-related data.

> ### **2. View:** The View component is used for all the UI logic of the application. For example, the Customer view will include all the UI components such as text boxes, dropdowns, etc. that the final user interacts with.

> ### **3. Controller:** Controllers act as an interface between Model and View components to process all the business logic and incoming requests, manipulate data using the Model component and interact with the Views to render the final output.

#### _This framework can be used to develop a simple blog site to a complex Web Application._

---

## **Software Requirements**

---

### **1. XAMPP**

### **2. Web Browser** (Chrome / Safari / Firefox / Microsoft Edge)

### **3. Code Editor** (VScode /PHPStorm / Atom / Sublime Text / Notepad++)

### **4. PHP version 7.2 or Better**

---

## **Technologies Used**

---

### **1. HTML**

### **2. CSS**

### **3. SCSS/SASS**

### **4. Bootstrap** (optional to use)

### **5. JavaScript**

### **6. PHP**

### **7. SQL**

### **8. PDO**

### **9. PHPMailer**

---

## **Getting Started**

---

### Before getting started with our framework there are a few configurations that are need to be done.

### 1. Open `Public>htaccess` and make the following changes :

```htaccess
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /_FILENAME_/Public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    ReWriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

### `RewriteBase /_FILENAME_/Public` instead of `_FILENAME_` enter the path to pubic folder.

### 2. Open `App>Config>config.php` and Enter the following Details :

- **DB_HOST:** Your Host Name.
- **DB_PASSWORD:** Passsword if there is any inorder to access the database.
- **DB_USER:** User of your DataBase.
- **DB_NAME:** Name of your Database.
- **APPLICATION_ROOT:** Sets automatically to the parent directory of the parent directory.
- **URL_ROOT:** URL of your Site.
- **SITE_NAME:** Name of your Site.

```php
<?php
define("DB_HOST", "localhost"); // Default if using localhost
define("DB_PASSWORD", "ENTER YOUR PASSWORD");
define("DB_USER", "root"); //Default value if using a localhost
define("DB_NAME", "DATABASE_NAME");
define("APPLICATION_ROOT", dirname(dirname(__FILE__)));
define("URL_ROOT", "SITE_URL");
define("SITE_NAME", "NAME OF THE SITE");
define("SMTP_PORT_NO", "ENTER YOUR SMTP PORT NUMBER FOR MAILING POURPOSE");
?>
```

### After these steps now you are completely set up to use our framework so lets get started on how to use it.

### **1: Creating View:**

- ### Create a folder name `Pages`, inside `Pages` folder create a file name `index.php`. This file will contain all the `html` that is need to be displayed to the user.
- ### Open the `Controller` folder create a new php file name it same as the folder created in view in this case it is `Pages.php` (remember controllers are always starts with a capital letter and are prural).
- ### Now, make a class with similar name as the file and it **must extend the base Controller Class**. After declaring the class define a function that should be have similar name as the file inside `View>Pages` in this case it will be `index`.
- ### To display our content we will call our member function that is defined in our base controller class named `View()` which takes in the path of the view we want to display. It is by default set to our View folder so we will only need to specify the sub-folder and the file in it. In this case it will be `$this->View("Pages/index");`

### **2: Creating a Model:**

- ### Inorder to create a **Model**, open `Model` folder create a new file, so lets take our example from above and create a Model for our Pages controller. So, we will create a new file with the name of `Page.php` (remember all Models should be Singular and must start with a Capital letter it is a good programming practice).
- ### Inside of our `Page.php` create a class with same name as the file. After this, create a constructor so and **initialize our the base Database class inorder to be able to access the database and methods to make Query to the DataBase**.
- ### To access the model inside of our controller we can do it in one of many methods that is, we can initialize it inside of a data member declared in our constuctor and call our model. To call a model we will use `model()` method which is pre-defined fucntion in our Base Controller class that helps us loading the Model.
- ### We just need to specify the name of the model we want to load and we can use it where ever we want in our program.

---

## Developed By

---

### **Xfordation**

#### © 2021 **ROSEŚSO**,Inc. All Rights Reserved.
