CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    pwd VARCHAR(60) NOT NULL,
    user_role ENUM('user', 'doctor', 'clerk', 'admin') NOT NULL DEFAULT 'user',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY(id)
);

-- CREATE TABLE patients (
--     id INT PRIMARY KEY,
--     disease varchar(255) DEFAULT NULL,
--     allergy varchar(255) DEFAULT NULL,
--     prescription varchar(255) DEFAULT NULL,
--     FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
-- );

CREATE TABLE appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id INT NOT NULL,
    doctor_id INT DEFAULT NULL,
    appointment_date DATE NOT NULL,
    time_slot VARCHAR(20) NOT NULL,
    reason VARCHAR(255) NOT NULL,
    notes TEXT DEFAULT NULL,
    userStatus VARCHAR(10) DEFAULT "pending",
    doctorStatus VARCHAR(10) DEFAULT NULL,
    fees DECIMAL(5) DEFAULT NULL,
    FOREIGN KEY (patient_id) REFERENCES users(id) ON DELETE CASCADE
    -- FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
);

CREATE TABLE doctors(
    id INT PRIMARY KEY,
    doctor_specialties VARCHAR(30) DEFAULT NULL,
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);