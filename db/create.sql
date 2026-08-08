CREATE database cscs2;
use cscs2;

CREATE TABLE Personnel (
    personnel_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    ssn CHAR(9) NOT NULL UNIQUE,
    medicare_number VARCHAR(30) UNIQUE,
    date_of_birth DATE NOT NULL,
    address VARCHAR(200),
    city VARCHAR(100),
    province VARCHAR(50),
    postal_code VARCHAR(12),
    phone_number VARCHAR(20),
    email VARCHAR(100),
    personnel_role ENUM('Administrator','Captain','Coach','Assistant Coach','Other') NOT NULL,
    mandate ENUM('Volunteer','Salaried') NOT NULL
);

CREATE TABLE Location (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(100) NOT NULL,
    location_type ENUM('Head','Branch') NOT NULL,
    address VARCHAR(200),
    city VARCHAR(100),
    province VARCHAR(50),
    postal_code VARCHAR(12),
    web_address VARCHAR(255),
    max_capacity INT

);

CREATE TABLE LocationPhone(
    location_id INT,
    phone_number VARCHAR(20),
    PRIMARY KEY(location_id, phone_number),
    FOREIGN KEY(location_id) REFERENCES Location(location_id)
);

CREATE TABLE FamilyMember(
    family_member_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    ssn CHAR(9) NOT NULL UNIQUE,
    medicare_number VARCHAR(30) UNIQUE,
    date_of_birth DATE NOT NULL,
    address VARCHAR(200),
    city VARCHAR(100),
    province VARCHAR(50),
    postal_code VARCHAR(12),
    phone_number VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE ClubMember(
    membership_number INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    ssn CHAR(9) UNIQUE,
    medicare_number VARCHAR(30) UNIQUE,
    date_of_birth DATE NOT NULL,
    address VARCHAR(200),
    city VARCHAR(100),
    province VARCHAR(50),
    postal_code VARCHAR(12),
    phone_number VARCHAR(20),
    email VARCHAR(100),
    height_cm DECIMAL(5,2),
    weight_kg DECIMAL(5,2),
    gender ENUM('Boy','Girl') NOT NULL
);

CREATE TABLE Major(
    membership_number INT PRIMARY KEY,
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number)
);

CREATE TABLE Minor(
    membership_number INT PRIMARY KEY,
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number)
);

DELIMITER //

CREATE TRIGGER trg_classify_member_age
AFTER INSERT ON ClubMember
FOR EACH ROW
BEGIN
    DECLARE member_age INT;
    
    -- Calculate age based on today's date
    SET member_age = TIMESTAMPDIFF(YEAR, NEW.date_of_birth, CURDATE());
    
    -- Route to Minor or Major table
    IF member_age BETWEEN 4 AND 17 THEN
        INSERT INTO Minor (membership_number) 
        VALUES (NEW.membership_number);
    ELSEIF member_age >= 18 THEN
        INSERT INTO Major (membership_number) 
        VALUES (NEW.membership_number);
    END IF;
END//

DELIMITER ;

-- STEP 3: Configure and create the background event
SET GLOBAL event_scheduler = ON;

DELIMITER //

CREATE EVENT ev_graduate_minors_to_majors
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
    -- 1. Copy the 18+ year olds into the Major table
    INSERT INTO Major (membership_number)
    SELECT m.membership_number 
    FROM Minor m
    JOIN ClubMember c ON m.membership_number = c.membership_number
    WHERE TIMESTAMPDIFF(YEAR, c.date_of_birth, CURDATE()) >= 18;

    -- 2. Delete those same 18+ year olds from the Minor table
    DELETE m FROM Minor m
    JOIN ClubMember c ON m.membership_number = c.membership_number
    WHERE TIMESTAMPDIFF(YEAR, c.date_of_birth, CURDATE()) >= 18;
END//

DELIMITER ;

CREATE TABLE MemberLocation(
	membership_number INT,
    location_id INT,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(membership_number,location_id,start_date),
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number),
    FOREIGN KEY(location_id) REFERENCES Location(location_id),
    CHECK(end_date IS NULL OR end_date>=start_date)
    );

CREATE TABLE Team(
    team_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    gender_category ENUM('Boy','Girl') NOT NULL
);

CREATE TABLE PlaysAt(
    team_id INT PRIMARY KEY,
    location_id INT NOT NULL,
    FOREIGN KEY(team_id) REFERENCES Team(team_id),
    FOREIGN KEY(location_id) REFERENCES Location(location_id)
);

CREATE TABLE TeamSession(
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    session_type ENUM('Training','Game') NOT NULL,
    date DATE NOT NULL,
    start_time TIME NOT NULL,
    address VARCHAR(200) NOT NULL
);

CREATE TABLE Hobby(
    hobby_id INT AUTO_INCREMENT PRIMARY KEY,
    hobby_name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Payment(
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    membership_number INT NOT NULL,
    payment_date DATE NOT NULL,
    amount DECIMAL(8,2) NOT NULL CHECK(amount>=0),
    payment_method ENUM('Cash','Debit','Credit Card') NOT NULL,
    payment_year_target YEAR NOT NULL,
    installment_number TINYINT NOT NULL CHECK(installment_number BETWEEN 1 AND 4),
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number)
);

CREATE TABLE EmailLog(
    email_log_id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    date DATETIME NOT NULL,
    receiver_email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    body VARCHAR(100) NOT NULL,
    FOREIGN KEY(location_id) REFERENCES Location(location_id)
);

CREATE TABLE EmployedAt(
    personnel_id INT,
    location_id INT,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(personnel_id,location_id,start_date),
    FOREIGN KEY(personnel_id) REFERENCES Personnel(personnel_id),
    FOREIGN KEY(location_id) REFERENCES Location(location_id),
    CHECK(end_date IS NULL OR end_date>=start_date)
);

CREATE TABLE AssignedTo(
    family_member_id INT,
    location_id INT,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(family_member_id,location_id,start_date),
    FOREIGN KEY(family_member_id) REFERENCES FamilyMember(family_member_id),
    FOREIGN KEY(location_id) REFERENCES Location(location_id),
    CHECK(end_date IS NULL OR end_date>=start_date)
);

CREATE TABLE Manages(
    location_id INT PRIMARY KEY,
    personnel_id INT NOT NULL,
    FOREIGN KEY(location_id) REFERENCES Location(location_id),
    FOREIGN KEY(personnel_id) REFERENCES Personnel(personnel_id)
);

CREATE TABLE RelatedTo(
    family_member_id INT,
    membership_number INT,
    relationship_type ENUM('Father','Mother','Grandfather','Grandmother','Tutor','Partner','Friend','Other') NOT NULL,
    PRIMARY KEY(family_member_id,membership_number),
    FOREIGN KEY(family_member_id) REFERENCES FamilyMember(family_member_id),
    FOREIGN KEY(membership_number) REFERENCES Minor(membership_number)
);

CREATE TABLE Likes(
    membership_number INT,
    hobby_id INT,
    PRIMARY KEY(membership_number,hobby_id),
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number),
    FOREIGN KEY(hobby_id) REFERENCES Hobby(hobby_id)
);

CREATE TABLE TeamFormation(
    team_id INT,
    session_id INT,
    coach_id INT NOT NULL,
    score INT DEFAULT 0,
    PRIMARY KEY(team_id,session_id),
    FOREIGN KEY(team_id) REFERENCES Team(team_id),
    FOREIGN KEY(session_id) REFERENCES TeamSession(session_id),
    FOREIGN KEY(coach_id) REFERENCES Personnel(personnel_id)
);

CREATE TABLE TeamPlayer(
    team_id INT,
    session_id INT,
    membership_number INT,
    position ENUM('Goalkeeper','Right Fullback','Left Fullback','Center Back','Sweeper','Holding Midfielder','Right Winger','Central Midfielder','Striker','Attacking Midfielder','Left Winger') NOT NULL,
    PRIMARY KEY(team_id,session_id,membership_number),
    FOREIGN KEY(team_id,session_id) REFERENCES TeamFormation(team_id,session_id),
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number)
);

CREATE TABLE FifaGame(
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    location VARCHAR(200) NOT NULL,
    score VARCHAR(20) NOT NULL
);

CREATE TABLE ParticipatedIn(
    membership_number INT,
    game_id INT,
    team_name VARCHAR(100) NOT NULL,
    opponent VARCHAR(100) NOT NULL,
    PRIMARY KEY(membership_number,game_id),
    FOREIGN KEY(membership_number) REFERENCES ClubMember(membership_number),
    FOREIGN KEY(game_id) REFERENCES FifaGame(game_id)
);
