CREATE DATABASE PizzaRestaurant;


CREATE TABLE register (
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255),
    PRIMARY KEY (username, email)
);


ALTER TABLE register
ADD userType TINYINT(1) NOT NULL DEFAULT 0
CHECK (userType IN (0,1));



CREATE TABLE contact (
    username VARCHAR(50) PRIMARY KEY,
    message TEXT
);


http://localhost/Pizza/Pizza.html

