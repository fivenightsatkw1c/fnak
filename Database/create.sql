/*
Author:     Jeffrey Kuijpers
Date:       4-12-2023
Subject:    EscapeRoom reserveringssysteem Database
*/

-- Database creation

-- Five
-- Nights
-- At
-- KW1C
-- DROP DATABASE IF EXISTS Fnak;

-- Create the database
CREATE DATABASE IF NOT EXISTS Fnak;

-- Use the created database
USE Fnak;

/*
Create tables
*/
-- Table 'Groep'
CREATE TABLE IF NOT EXISTS Groep
(
    GroepId             INT             AUTO_INCREMENT PRIMARY KEY, -- Primary key
    Groepnaam           VARCHAR(30)     NOT NULL,                 -- Unique key
    Email               VARCHAR(50)     NOT NULL,                 -- Unique key
    reserveerDatumTijd  DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, -- Unique key with default value
    EscapeTijd          TIME
);

-- Table 'Student'
CREATE TABLE IF NOT EXISTS Student
(
    StudentId           INT             AUTO_INCREMENT PRIMARY KEY, -- Primary key
    GroepId             INT             NOT NULL,                 -- Foreign key
    StudentNaam         VARCHAR(40)     NOT NULL
);

/*
Add keys
*/

-- Unique
ALTER TABLE Groep
ADD CONSTRAINT AK_Groep_GroepNaam
UNIQUE (Groepnaam);

ALTER TABLE Groep
ADD CONSTRAINT AK_Groep_Email
UNIQUE (Email);

ALTER TABLE Groep
ADD CONSTRAINT AK_Groep_reserveerDatumTijd
UNIQUE (reserveerDatumTijd);

-- Foreign
ALTER TABLE Student
ADD CONSTRAINT FK_GroepId
FOREIGN KEY (GroepId)
REFERENCES Groep(GroepId)
ON DELETE CASCADE;
