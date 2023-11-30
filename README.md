# BA3102: Group 2 
LOGILIBRARY: A QR-Based Log-In and Log-Out System for BSU TNEU Lipa Campus Library

## Members: 
- Evangelista, Jhon Matthew, E.
- Punzalan, Jhonathan T.
- Ebrado, Jed Enrique
- Magbojos, Zam Matthew
- Mamiit, John Victor

# Overview

This project implements a QR-based login and logout system for the Batangas State University (BSU) - Technological and Natural Sciences (TNEU) Lipa Campus. The system utilizes VB.NET for the application logic and XAMPP for the database management. Users can log in and out by scanning QR codes generated for each user.

## Features

- **QR Code Generation:** Unique QR codes are generated for each user to facilitate login and logout.
- **Login and Logout:** Users can easily scan their QR code to log in and log out of the system.
- **Database Management:** XAMPP is used to manage the underlying MySQL database for user information.

## Requirements

- Visual Studio (compatible with VB.NET)
- XAMPP server with MySQL

## Getting Started

1. Clone the repository:

    ```bash
    git clone https://github.com/NinaAguila/BA3102/tree/Group2.git
    ```

2. Open the project in Visual Studio.
3. Configure the database connection in the code to point to your XAMPP MySQL server.
4. Run the application.

## Database Setup

1. Install XAMPP and start the Apache and MySQL services.
2. Create a new database named `db_ba3102`.
3. Import the provided SQL script (`db_ba3102.sql`) into the database to create the necessary tables.

## Usage

1. Launch the application.
2. Users should present their unique QR code to the scanner for login or logout.
3. The system will validate the QR code and perform the corresponding action.

## Installation

Follow these steps to set up and run the QR-Based Login and Logout System for BSU TNEU Lipa Campus:

1. Browse to the `LogiLibrarySetup` folder in the project directory and locate the `LogiLibrarySetup.exe` file.
2. Run the setup file and follow the on-screen instructions to install the LogiLibrary required for QR code generation.
3. Open XAMPP and start the Apache and MySQL services.
4. Run the application.

## Contact

For any inquiries or issues, please contact MateoDuke21 at [mattdncr15@gmail.com](mailto:mattdncr15@gmail.com).

