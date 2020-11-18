/* Prolog 
    CMPT221 P05 - Create & Initialize Tables
    Created by Team 18(Devin White, Oliver Wilson, and Harrison Zheng). 14 - October - 2020 
    This Script File goes hand in hand with the HTML Home Page V2. */

/* Script File V1(14-Oct-2020) - Initial Creation of Tables with initial Users, Products, and Suppliers.
               V2(18-Oct-2020) - Updated the name of all tables.
                               - "img_file" attribute was added to the Cabins table.
                               - "cruise_ID" is now also located in Cabins table - it is acting as a FK. 
               V3(13-Nov-2020) - All tables have an attribute to determine if row is active or not
               V4(17-Nov-2020) - "user_active" moved location, as well as all 'insert into' t18_users commands.
                               - */

/* Script File currently at V4. */

USE site_db;

/* Delete any of the tables this file will be creating. */
DROP TABLE IF EXISTS T18_Users;
DROP TABLE IF EXISTS T18_Cabins;
DROP TABLE IF EXISTS T18_Cruise;


/* Create table with attributes and modifiers for -Users- */
CREATE TABLE T18_Users (
    user_ID INT PRIMARY KEY auto_increment,
    user_name VARCHAR(20) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    user_email VARCHAR(30) DEFAULT "No email available",
    employee_type ENUM ("Admin", "Employee") NOT NULL,
    creation_date DATE,
    last_updated_password DATE,
    hash_type VARCHAR(20) DEFAULT("None"),
    user_active ENUM("Y", "N") NOT NULL DEFAULT "Y"
);


/* Create table with attributes and modifiers for -Products(Cabins)- */
CREATE TABLE T18_Cabins (
    cabin_ID INT(100) PRIMARY KEY auto_increment,
    cabin_type ENUM("Single", "Double", "Suite"),
    cabin_price INT,
    cabin_availability ENUM("Available", "Not Available", "On Hold") NOT NULL,
    cabin_description VARCHAR(100),
    cabin_deck ENUM("Main", "Lower", "Upper"),
    cruise_ID INT(100), /* Wouldn't this be a foreign key? */
    image_file VARCHAR(100) DEFAULT "Image File",
    cabin_active ENUM("Y", "N") NOT NULL DEFAULT "Y" /* V3 Attribute added to T18_Cabins */
);


/* Create table with attributes and modifiers for -Suppliers(Cruise)- */
CREATE TABLE T18_Cruise (
    cruise_ID INT(100) PRIMARY KEY auto_increment,
    cruise_name VARCHAR(20) NOT NULL,
    number_of_cabins INT(30),
    cruise_description VARCHAR(100) DEFAULT "No Description Available",
    cruise_capacity INT(40),
    max_speed_knotts INT(100),
    cruise_active ENUM("Y", "N") NOT NULL DEFAULT "Y"
);

EXPLAIN T18_Users;
EXPLAIN T18_Cabins;
EXPLAIN T18_Cruise;


/* Add an entry for all three team members, and identify them as ADMINs. */
INSERT INTO T18_Users (user_name, user_password, user_email, employee_type, creation_date, last_updated_password, hash_type)
    VALUES ("Devin", "devinpassword", "devin.white1@marist.edu", "Admin", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "None"),
    ("Oliver", "oliverpassword", "oliver.wilson1@marist.edu", "Admin", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "None"),
    ("Harrison", "harrisonpassword", "harrison.zheng1@marist.edu", "Admin", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "None");


/* Add a User entry for Andrew Tokash.*/
INSERT INTO T18_Users (user_name, user_password, user_active, employee_type, creation_date, last_updated_password)
    VALUES ("atokash", "ADMIN", "Y", "Admin", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


/* Add entries for two dummy users that are NOT ADMIN. */
INSERT INTO T18_Users (user_name, user_password, user_active, employee_type, creation_date, last_updated_password)
    VALUES ("John", "password", "Y", "Employee", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
    ("Alex", "password", "Y", "Employee", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


/* Add at least two different cruises(suppliers). */
INSERT INTO T18_Cruise (cruise_ID, cruise_name, number_of_cabins, cruise_capacity, max_speed_knotts, cruise_active)
    VALUES (1, "Trimaran", 12, 24, 35, "Y"),
    (2, "Sea Voyager 223", 8, 14, 20, "Y"),
    (3, "Catamaran", 4, 12, 17, "Y"),
    (4, "Sunseeker 88", 4, 8, 28, "Y"),
    (5, "Unbridled", 20, 40, 20, "Y"),
    (6, "Amarula Sun", 16, 28, 30, "Y");


/* Add at least two cabins(products) for each supplier. */
INSERT INTO T18_Cabins (cabin_ID, cabin_type, cabin_price, cabin_availability, cabin_description, cabin_deck, cruise_ID)
    VALUES (1, "Double", 4000, "Available", "Cabin for two aboard the Trimaran", "Lower", 1), 
    (2, "Suite", 6000, "Available", "Cabin for a whole family or a group of friends", "Main", 1),
    (3, "Double", 4500, "Not Available", "Perfect Cabin for couples", "Upper", 2), 
    (4, "Suite", 4500, "Not Available", "Great Cabin for the whole family", "Upper", 2),
    (5, "Single", 3000, "On Hold", "Perfect Cabin for lone travelers", "Lower", 3),
    (6, "Double", 2000, "Available", "Great cabin for a couple's getaway", "Main", 3); 


SELECT * FROM T18_Users;
SELECT * FROM T18_Cruise;
SELECT * FROM T18_Cabins;


