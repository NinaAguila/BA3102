# BA3102: Group 2 
Members: 
Evangelista, Jhon Matthew, E.
Punzalan, Jhonathan T.
Ebrado, Jed Enrique
Magbojos, Zam Matthew
Mamiit, John Victor

LOGILIBRARY: A QR-Based Log-In and Log-Out System for BSU TNEU Lipa Campus Library

Overview
This project implements a QR-based login and logout system for the Batangas State University (BSU) - Technological and Natural Sciences (TNEU) Lipa Campus. 
The system utilizes VB.NET for the application logic and XAMPP for the database management. Users can log in and out by scanning QR codes generated for each user.

Features
-QR Code Generation: Unique QR codes are generated for each user to facilitate login and logout.
-Login and Logout: Users can easily scan their QR code to log in and log out of the system.
-Database Management: XAMPP is used to manage the underlying MySQL database for user information.

Requirements
-Visual Studio (compatible with VB.NET)
-XAMPP server with MySQL

Getting Started
Clone the repository:
-bash: git clone https://github.com/NinaAguila/BA3102/tree/Group2.git
-Open the project in Visual Studio.
-Configure the database connection in the code to point to your XAMPP MySQL server.
-Run the application.

Database Setup
-Install XAMPP and start the Apache and MySQL services.
-Create a new database named db_ba3102.
-Import the provided SQL script (db_ba3102.sql) into the database to create the necessary tables.

Usage
-Launch the application.
-Users should present their unique QR code to the scanner for login or logout.
-The system will validate the QR code and perform the corresponding action.
