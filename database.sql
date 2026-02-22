CREATE DATABASE IF NOT EXISTS oaca_db;
USE oaca_db;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    cin VARCHAR(20),
    telephone VARCHAR(20)
);

CREATE TABLE vols (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_vol VARCHAR(20),
    depart VARCHAR(50),
    arrivee VARCHAR(50),
    date_depart DATE,
    heure_depart TIME,
    prix FLOAT,
    places INT DEFAULT 20
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    vol_id INT,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    paiement VARCHAR(30) DEFAULT 'PAYE',
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (vol_id) REFERENCES vols(id)
);

-- إدراج 11 رحلة
INSERT INTO vols (numero_vol, depart, arrivee, date_depart, heure_depart, prix, places) VALUES
('SF101', 'Sfax', 'Tunis', '2025-06-10', '08:30:00', 120, 15),
('SF202', 'Sfax', 'Carthage', '2025-06-12', '12:45:00', 180, 10),
('SF303', 'Sfax', 'Djerba', '2025-06-15', '18:00:00', 150, 20),
('SF401', 'Sfax', 'Paris', '2025-07-05', '09:00:00', 450, 30),
('SF402', 'Sfax', 'Monastir', '2025-07-08', '14:30:00', 90, 20),
('SF403', 'Sfax', 'Jeddah', '2025-07-12', '22:00:00', 800, 25),
('SF404', 'Sfax', 'Paris', '2025-07-20', '10:15:00', 460, 28),
('SF405', 'Sfax', 'Istanbul', '2025-07-25', '16:45:00', 350, 22),
('SF406', 'Sfax', 'London', '2025-08-01', '07:00:00', 520, 18),
('SF407', 'Sfax', 'Dubai', '2025-08-10', '23:30:00', 750, 35),
('SF408', 'Sfax', 'Monastir', '2025-08-15', '11:20:00', 85, 15);