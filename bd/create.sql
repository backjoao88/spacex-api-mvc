CREATE DATABASE LAUNCHES;

USE LAUNCHES;

# DROP DATABASE LAUNCHES;

CREATE TABLE ROCKET (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ROCKET_ID VARCHAR(50) NOT NULL,
    NAME VARCHAR(50) NOT NULL,
    DESCRIPTION VARCHAR(500) NOT NULL,
    FIRST_FLIGHT DATE NOT NULL,
    HEIGHT DOUBLE NOT NULL,
    DIAMETER DOUBLE NOT NULL,
    MASS DOUBLE NOT NULL,
    IMAGE LONGBLOB NOT NULL
);

CREATE TABLE MISSION(
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    MISSION_ID VARCHAR(50) NOT NULL,
    NAME VARCHAR(50) NOT NULL,
    DESCRIPTION VARCHAR(500) NOT NULL
);

CREATE TABLE LAUNCH (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FLIGHT_NUMBER INT NOT NULL,
    DATE DATE,
    ROCKET_ID INT NOT NULL,
    MISSION_ID INT NULL,
    DESCRIPTION VARCHAR(500) NOT NULL,
    IMAGE VARCHAR(200) NOT NULL,
    CONSTRAINT FK_ROCKET_ID FOREIGN KEY (ROCKET_ID) REFERENCES ROCKET(ID),
    CONSTRAINT FK_MISSION_ID FOREIGN KEY (MISSION_ID) REFERENCES MISSION(ID)
);

SELECT * FROM ROCKET;
SELECT * FROM MISSION;
SELECT * FROM LAUNCH;


