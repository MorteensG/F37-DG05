-- Users Table for storing patient and doctor login credentials
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Store hashed passwords, not plain text
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM('patient', 'doctor') NOT NULL DEFAULT 'patient' -- Default role as patient
);

-- The `UNIQUE` constraint on the email field ensures that no two users can register with the same email address.
-- The password should be hashed by the application before being inserted into the database for security reasons.


-- Doctors Profile Table for storing doctor profiles
CREATE TABLE doctor_profiles (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    full_name VARCHAR(100) NOT NULL,
    specialty VARCHAR(100) NOT NULL,
    education TEXT NOT NULL,
    profile_picture_url VARCHAR(255), -- Store the URL or path to the profile picture
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Appointments Table for storing appointment details
CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    reason TEXT,
    status ENUM('scheduled', 'completed', 'cancelled') NOT NULL DEFAULT 'scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(user_id),
    FOREIGN KEY (doctor_id) REFERENCES doctor_profiles(doctor_id)
);

-- Availability Table for managing doctor availability
CREATE TABLE availability (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,
    day_of_week ENUM('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    is_available BOOLEAN NOT NULL DEFAULT TRUE, -- TRUE for available, FALSE for not available
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (doctor_id) REFERENCES doctor_profiles(doctor_id)
);

-- Implementing CRUD functions and data analytics will be done through PHP scripts that execute SQL queries on these tables.

-- Additional note: Indexes, constraints, and specific data types might need to be refined based on the project's specific needs.
