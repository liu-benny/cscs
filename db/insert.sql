USE cscs2;

-- 1. Insert Locations (with max_capacity attribute)
INSERT INTO Location (location_name, location_type, address, city, province, postal_code, web_address, max_capacity) VALUES
('Downtown Field', 'Head', '100 Main St', 'Montreal', 'QC', 'H1A 1A1', 'www.head.com', 1000),
('North Branch', 'Branch', '200 North St', 'Montreal', 'QC', 'H2B 2B2', 'www.north.com', 500),
('South Branch', 'Branch', '300 South St', 'Montreal', 'QC', 'H3C 3C3', 'www.south.com', 400),
('East Branch', 'Branch', '400 East St', 'Montreal', 'QC', 'H4D 4D4', 'www.east.com', 450),
('West Branch', 'Branch', '500 West St', 'Montreal', 'QC', 'H5E 5E5', 'www.west.com', 600),
('Central Branch', 'Branch', '600 Center St', 'Montreal', 'QC', 'H6F 6F6', 'www.central.com', 800);

-- Multiple phone numbers per location
INSERT INTO LocationPhone (location_id, phone_number) VALUES
(1, '514-111-1111'), (1, '514-111-1112'), (1, '514-111-1113'),
(2, '514-222-2222'), (2, '514-222-2223'),
(3, '514-333-3333'), (3, '514-333-3334'),
(4, '514-444-4444'), (4, '514-444-4445'),
(5, '514-555-5555'), (5, '514-555-5556'),
(6, '514-666-6666'), (6, '514-666-6667');

-- 2. Insert Personnel & Manages (including email, phone number, address, city, province, postal code)
INSERT INTO Personnel (first_name, last_name, ssn, medicare_number, date_of_birth, personnel_role, mandate, email, phone_number, address, city, province, postal_code) VALUES
('Alice', 'Smith', '100000001', 'MED101', '1980-01-01', 'Administrator', 'Salaried', 'alice.smith@cscs.com', '514-701-0001', '111 Peel St', 'Montreal', 'QC', 'H3B 2T9'),
('Bob', 'Johnson', '100000002', 'MED102', '1980-01-01', 'Administrator', 'Salaried', 'bob.johnson@cscs.com', '514-702-0002', '222 Sainte-Catherine St W', 'Montreal', 'QC', 'H3B 1A2'),
('Charlie', 'Williams', '100000003', 'MED103', '1980-01-01', 'Administrator', 'Salaried', 'charlie.williams@cscs.com', '514-703-0003', '333 René-Lévesque Blvd W', 'Montreal', 'QC', 'H2Z 1X7'),
('Diana', 'Brown', '100000004', 'MED104', '1980-01-01', 'Administrator', 'Salaried', 'diana.brown@cscs.com', '514-704-0004', '444 Sherbrooke St W', 'Montreal', 'QC', 'H3A 1B9'),
('Eve', 'Jones', '100000005', 'MED105', '1980-01-01', 'Administrator', 'Salaried', 'eve.jones@cscs.com', '514-705-0005', '555 de Maisonneuve Blvd W', 'Montreal', 'QC', 'H3A 3K2'),
('Frank', 'Garcia', '100000006', 'MED106', '1980-01-01', 'Administrator', 'Salaried', 'frank.garcia@cscs.com', '514-706-0006', '666 McGill College Ave', 'Montreal', 'QC', 'H3A 3H5'),
('Grace', 'Martinez', '200000001', 'MED201', '1975-05-05', 'Coach', 'Volunteer', 'grace.martinez@cscs.com', '514-801-0001', '777 St-Laurent Blvd', 'Montreal', 'QC', 'H2X 2Y9'),
('Harry', 'Rodriguez', '200000002', 'MED202', '1976-06-06', 'Coach', 'Volunteer', 'harry.rodriguez@cscs.com', '514-802-0002', '888 Saint-Denis St', 'Montreal', 'QC', 'H2X 3J3'),
('Ivy', 'Hernandez', '200000003', 'MED203', '1977-07-07', 'Coach', 'Volunteer', 'ivy.hernandez@cscs.com', '514-803-0003', '999 Park Ave', 'Montreal', 'QC', 'H2V 4P2'),
('Jack', 'Lopez', '200000004', 'MED204', '1978-08-08', 'Coach', 'Volunteer', 'jack.lopez@cscs.com', '514-804-0004', '123 Pine Ave W', 'Montreal', 'QC', 'H2W 1S3'),
('Karen', 'Gonzalez', '200000005', 'MED205', '1979-09-09', 'Coach', 'Volunteer', 'karen.gonzalez@cscs.com', '514-805-0005', '456 Mont-Royal Ave E', 'Montreal', 'QC', 'H2J 1W8'),
('Liam', 'Wilson', '200000006', 'MED206', '1980-10-10', 'Coach', 'Volunteer', 'liam.wilson@cscs.com', '514-806-0006', '789 Rachel St E', 'Montreal', 'QC', 'H2J 2H3');

INSERT INTO Manages (location_id, personnel_id) VALUES 
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6);

-- EmployedAt: Linking each personnel to a location of employment
INSERT INTO EmployedAt (location_id, personnel_id, start_date) VALUES 
(1, 1, '2020-01-15'), 
(2, 2, '2019-05-10'), 
(3, 3, '2021-03-01'), 
(4, 4, '2018-11-20'), 
(5, 5, '2022-07-05'), 
(6, 6, '2017-09-12'),
(1, 7, '2023-02-10'), 
(2, 8, '2023-04-15'), 
(3, 9, '2022-08-20'), 
(4, 10, '2021-06-11'), 
(5, 11, '2020-10-01'), 
(6, 12, '2024-01-05');

-- 3. Insert Family Members (including email, phone number, address, city, province, postal code)
INSERT INTO FamilyMember (first_name, last_name, ssn, medicare_number, date_of_birth, email, phone_number, address, city, province, postal_code) VALUES
('Grace', 'Martinez', '200000001', 'F_MED201', '1975-05-05', 'grace.martinez@family.com', '514-801-0001', '777 St-Laurent Blvd', 'Montreal', 'QC', 'H2X 2Y9'),
('Harry', 'Rodriguez', '200000002', 'F_MED202', '1976-06-06', 'harry.rodriguez@family.com', '514-802-0002', '888 Saint-Denis St', 'Montreal', 'QC', 'H2X 3J3'),
('Ivy', 'Hernandez', '200000003', 'F_MED203', '1977-07-07', 'ivy.hernandez@family.com', '514-803-0003', '999 Park Ave', 'Montreal', 'QC', 'H2V 4P2'),
('Jack', 'Lopez', '200000004', 'F_MED204', '1978-08-08', 'jack.lopez@family.com', '514-804-0004', '123 Pine Ave W', 'Montreal', 'QC', 'H2W 1S3'),
('Karen', 'Gonzalez', '200000005', 'F_MED205', '1979-09-09', 'karen.gonzalez@family.com', '514-805-0005', '456 Mont-Royal Ave E', 'Montreal', 'QC', 'H2J 1W8'),
('Liam', 'Wilson', '200000006', 'F_MED206', '1980-10-10', 'liam.wilson@family.com', '514-806-0006', '789 Rachel St E', 'Montreal', 'QC', 'H2J 2H3');

-- 4. Insert Club Members (including email, phone number, address, city, province, postal code)
INSERT INTO ClubMember (first_name, last_name, ssn, medicare_number, date_of_birth, gender, email, phone_number, address, city, province, postal_code) VALUES
('Oliver', 'Martinez', '300000001', 'CM01', '2015-01-01', 'Boy', 'oliver.martinez@club.com', '514-901-0001', '777 St-Laurent Blvd', 'Montreal', 'QC', 'H2X 2Y9'),
('Emma', 'Martinez', '300000002', 'CM02', '2016-01-01', 'Girl', 'emma.martinez@club.com', '514-901-0002', '777 St-Laurent Blvd', 'Montreal', 'QC', 'H2X 2Y9'),
('Noah', 'Rodriguez', '300000003', 'CM03', '2015-02-01', 'Boy', 'noah.rodriguez@club.com', '514-902-0001', '888 Saint-Denis St', 'Montreal', 'QC', 'H2X 3J3'),
('Olivia', 'Rodriguez', '300000004', 'CM04', '2016-02-01', 'Girl', 'olivia.rodriguez@club.com', '514-902-0002', '888 Saint-Denis St', 'Montreal', 'QC', 'H2X 3J3'),
('Liam', 'Hernandez', '300000005', 'CM05', '2015-03-01', 'Boy', 'liam.hernandez@club.com', '514-903-0001', '999 Park Ave', 'Montreal', 'QC', 'H2V 4P2'),
('Ava', 'Hernandez', '300000006', 'CM06', '2016-03-01', 'Girl', 'ava.hernandez@club.com', '514-903-0002', '999 Park Ave', 'Montreal', 'QC', 'H2V 4P2'),
('Ethan', 'Lopez', '300000007', 'CM07', '2015-04-01', 'Boy', 'ethan.lopez@club.com', '514-904-0001', '123 Pine Ave W', 'Montreal', 'QC', 'H2W 1S3'),
('Sophia', 'Lopez', '300000008', 'CM08', '2016-04-01', 'Girl', 'sophia.lopez@club.com', '514-904-0002', '123 Pine Ave W', 'Montreal', 'QC', 'H2W 1S3'),
('Mason', 'Gonzalez', '300000009', 'CM09', '2015-05-01', 'Boy', 'mason.gonzalez@club.com', '514-905-0001', '456 Mont-Royal Ave E', 'Montreal', 'QC', 'H2J 1W8'),
('Isabella', 'Gonzalez', '300000010', 'CM10', '2016-05-01', 'Girl', 'isabella.gonzalez@club.com', '514-905-0002', '456 Mont-Royal Ave E', 'Montreal', 'QC', 'H2J 1W8'),
('William', 'Wilson', '300000011', 'CM11', '2015-06-01', 'Boy', 'william.wilson@club.com', '514-906-0001', '789 Rachel St E', 'Montreal', 'QC', 'H2J 2H3'),
('Mia', 'Wilson', '300000012', 'CM12', '2016-06-01', 'Girl', 'mia.wilson@club.com', '514-906-0002', '789 Rachel St E', 'Montreal', 'QC', 'H2J 2H3'),
('James', 'Taylor', '300000013', 'CM13', '1995-01-01', 'Boy', 'james.taylor@club.com', '514-913-0001', '10 Major St', 'Montreal', 'QC', 'H3G 1M8'),
('Charlotte', 'Moore', '300000014', 'CM14', '1996-01-01', 'Girl', 'charlotte.moore@club.com', '514-914-0001', '20 Major St', 'Montreal', 'QC', 'H3G 1M9'),
('Benjamin', 'Jackson', '300000015', 'CM15', '1997-01-01', 'Boy', 'benjamin.jackson@club.com', '514-915-0001', '30 Major St', 'Montreal', 'QC', 'H3G 2N1'),
('Amelia', 'Martin', '300000016', 'CM16', '1998-01-01', 'Girl', 'amelia.martin@club.com', '514-916-0001', '40 Major St', 'Montreal', 'QC', 'H3G 2N2'),
('Lucas', 'Lee', '300000017', 'CM17', '1999-01-01', 'Boy', 'lucas.lee@club.com', '514-917-0001', '50 Major St', 'Montreal', 'QC', 'H3G 2N3'),
('Harper', 'Perez', '300000018', 'CM18', '2000-01-01', 'Girl', 'harper.perez@club.com', '514-918-0001', '60 Major St', 'Montreal', 'QC', 'H3G 2N4'),
('Henry', 'Thompson', '300000019', 'CM19', '2005-01-01', 'Boy', 'henry.thompson@club.com', '514-919-0001', '70 Youth St', 'Montreal', 'QC', 'H4H 1K1'),
('Evelyn', 'White', '300000020', 'CM20', '2005-02-01', 'Girl', 'evelyn.white@club.com', '514-920-0001', '80 Youth St', 'Montreal', 'QC', 'H4H 1K2'),
('Alexander', 'Harris', '300000021', 'CM21', '2005-03-01', 'Boy', 'alexander.harris@club.com', '514-921-0001', '90 Youth St', 'Montreal', 'QC', 'H4H 1K3'),
('Abigail', 'Sanchez', '300000022', 'CM22', '2005-04-01', 'Girl', 'abigail.sanchez@club.com', '514-922-0001', '100 Youth St', 'Montreal', 'QC', 'H4H 1K4'),
('Sebastian', 'Clark', '300000023', 'CM23', '2005-05-01', 'Boy', 'sebastian.clark@club.com', '514-923-0001', '110 Youth St', 'Montreal', 'QC', 'H4H 1K5'),
('Emily', 'Ramirez', '300000024', 'CM24', '2005-06-01', 'Girl', 'emily.ramirez@club.com', '514-924-0001', '120 Youth St', 'Montreal', 'QC', 'H4H 1K6'),
('Michael', 'Lewis', '300000025', 'CM25', '2006-01-01', 'Boy', 'michael.lewis@club.com', '514-925-0001', '130 Youth St', 'Montreal', 'QC', 'H4H 1K7'),
('Elizabeth', 'Robinson', '300000026', 'CM26', '2006-02-01', 'Girl', 'elizabeth.robinson@club.com', '514-926-0001', '140 Youth St', 'Montreal', 'QC', 'H4H 1K8'),
('Daniel', 'Walker', '300000027', 'CM27', '2006-03-01', 'Boy', 'daniel.walker@club.com', '514-927-0001', '150 Youth St', 'Montreal', 'QC', 'H4H 1K9'),
('Sofia', 'Young', '300000028', 'CM28', '2006-04-01', 'Girl', 'sofia.young@club.com', '514-928-0001', '160 Youth St', 'Montreal', 'QC', 'H4H 2L1'),
('Matthew', 'Allen', '300000029', 'CM29', '2006-05-01', 'Boy', 'matthew.allen@club.com', '514-929-0001', '170 Youth St', 'Montreal', 'QC', 'H4H 2L2'),
('Avery', 'King', '300000030', 'CM30', '2006-06-01', 'Girl', 'avery.king@club.com', '514-930-0001', '180 Youth St', 'Montreal', 'QC', 'H4H 2L3'),
('Joseph', 'Wright', '300000031', 'CM31', '2007-01-01', 'Boy', 'joseph.wright@club.com', '514-931-0001', '190 Youth St', 'Montreal', 'QC', 'H4H 2L4'),
('Ella', 'Scott', '300000032', 'CM32', '2007-02-01', 'Girl', 'ella.scott@club.com', '514-932-0001', '200 Youth St', 'Montreal', 'QC', 'H4H 2L5'),
('Samuel', 'Torres', '300000033', 'CM33', '2007-03-01', 'Boy', 'samuel.torres@club.com', '514-933-0001', '210 Youth St', 'Montreal', 'QC', 'H4H 2L6'),
('Scarlett', 'Nguyen', '300000034', 'CM34', '2007-04-01', 'Girl', 'scarlett.nguyen@club.com', '514-934-0001', '220 Youth St', 'Montreal', 'QC', 'H4H 2L7'),
('David', 'Hill', '300000035', 'CM35', '2007-05-01', 'Boy', 'david.hill@club.com', '514-935-0001', '230 Youth St', 'Montreal', 'QC', 'H4H 2L8'),
('Grace', 'Flores', '300000036', 'CM36', '2007-06-01', 'Girl', 'grace.flores@club.com', '514-936-0001', '240 Youth St', 'Montreal', 'QC', 'H4H 2L9'),
('Carter', 'Green', '300000037', 'CM37', '2008-01-01', 'Boy', 'carter.green@club.com', '514-937-0001', '250 Youth St', 'Montreal', 'QC', 'H4H 3M1'),
('Chloe', 'Adams', '300000038', 'CM38', '2008-02-01', 'Girl', 'chloe.adams@club.com', '514-938-0001', '260 Youth St', 'Montreal', 'QC', 'H4H 3M2'),
('Wyatt', 'Nelson', '300000039', 'CM39', '2008-03-01', 'Boy', 'wyatt.nelson@club.com', '514-939-0001', '270 Youth St', 'Montreal', 'QC', 'H4H 3M3'),
('Victoria', 'Baker', '300000040', 'CM40', '2008-04-01', 'Girl', 'victoria.baker@club.com', '514-940-0001', '280 Youth St', 'Montreal', 'QC', 'H4H 3M4'),
('Jayden', 'Hall', '300000041', 'CM41', '2008-05-01', 'Boy', 'jayden.hall@club.com', '514-941-0001', '290 Youth St', 'Montreal', 'QC', 'H4H 3M5'),
('Madison', 'Rivera', '300000042', 'CM42', '2008-06-01', 'Girl', 'madison.rivera@club.com', '514-942-0001', '300 Youth St', 'Montreal', 'QC', 'H4H 3M6');

-- 5. Subtype Tables (Minor / Major)
INSERT INTO Minor (membership_number) VALUES 
(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),
(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),
(31),(32),(33),(34),(35),(36),(37),(38),(39),(40),(41),(42);

INSERT INTO Major (membership_number) VALUES 
(13),(14),(15),(16),(17),(18);

-- 6. RelatedTo
INSERT INTO RelatedTo (family_member_id, membership_number, relationship_type) VALUES
(1, 1, 'Mother'), (1, 2, 'Mother'),
(2, 3, 'Father'), (2, 4, 'Father'),
(3, 5, 'Mother'), (3, 6, 'Mother'),
(4, 7, 'Father'), (4, 8, 'Father'),
(5, 9, 'Mother'), (5, 10, 'Mother'),
(6, 11, 'Father'), (6, 12, 'Father');

-- 7. Payment for Major history
INSERT INTO Payment (membership_number, payment_date, amount, payment_method, payment_year_target, installment_number) VALUES
(13, '2010-01-01', 100, 'Cash', 2010, 1),
(14, '2010-01-01', 100, 'Cash', 2010, 1),
(15, '2010-01-01', 100, 'Cash', 2010, 1),
(16, '2010-01-01', 100, 'Cash', 2010, 1),
(17, '2010-01-01', 100, 'Cash', 2010, 1),
(18, '2010-01-01', 100, 'Cash', 2010, 1);

-- 8. Teams and PlaysAt
INSERT INTO Team (name, gender_category) VALUES
('Montreal Meteors', 'Boy'), ('Laval Lightning', 'Boy'),
('Westmount Phoenix', 'Girl'), ('Brossard Blazers', 'Girl'),
('Dorval Defenders', 'Boy'), ('Kirkland Kickers', 'Boy'),
('Pointe-Claire Pumas', 'Girl'), ('Verdun Vipers', 'Girl'),
('Lasalle Lions', 'Boy'), ('Outremont Owls', 'Boy'),
('Lachine Leopards', 'Girl'), ('Anjou Arrows', 'Girl');

INSERT INTO PlaysAt (team_id, location_id) VALUES
(1, 1), (2, 1), (3, 2), (4, 2), (5, 3), (6, 3),
(7, 4), (8, 4), (9, 5), (10, 5), (11, 6), (12, 6);

-- 9. Team Sessions
INSERT INTO TeamSession (session_type, date, start_time, address) VALUES
('Game', '2026-02-01', '10:00:00', '100 Main St'), ('Game', '2026-02-08', '10:00:00', '100 Main St'),
('Game', '2026-02-15', '10:00:00', '100 Main St'), ('Game', '2026-02-22', '10:00:00', '100 Main St'), ('Game', '2026-03-01', '10:00:00', '100 Main St'),
('Game', '2026-02-01', '11:00:00', '200 North St'), ('Game', '2026-02-08', '11:00:00', '200 North St'),
('Game', '2026-02-15', '11:00:00', '200 North St'), ('Game', '2026-02-22', '11:00:00', '200 North St'), ('Game', '2026-03-01', '11:00:00', '200 North St'),
('Game', '2026-02-01', '12:00:00', '300 South St'), ('Game', '2026-02-08', '12:00:00', '300 South St'),
('Game', '2026-02-15', '12:00:00', '300 South St'), ('Game', '2026-02-22', '12:00:00', '300 South St'), ('Game', '2026-03-01', '12:00:00', '300 South St'),
('Game', '2026-02-01', '13:00:00', '400 East St'), ('Game', '2026-02-08', '13:00:00', '400 East St'),
('Game', '2026-02-15', '13:00:00', '400 East St'), ('Game', '2026-02-22', '13:00:00', '400 East St'), ('Game', '2026-03-01', '13:00:00', '400 East St'),
('Game', '2026-02-01', '14:00:00', '500 West St'), ('Game', '2026-02-08', '14:00:00', '500 West St'),
('Game', '2026-02-15', '14:00:00', '500 West St'), ('Game', '2026-02-22', '14:00:00', '500 West St'), ('Game', '2026-03-01', '14:00:00', '500 West St'),
('Game', '2026-02-01', '15:00:00', '600 Center St'), ('Game', '2026-02-08', '15:00:00', '600 Center St'),
('Game', '2026-02-15', '15:00:00', '600 Center St'), ('Game', '2026-02-22', '15:00:00', '600 Center St'), ('Game', '2026-03-01', '15:00:00', '600 Center St');

-- 10. Team Formation
INSERT INTO TeamFormation (team_id, session_id, coach_id, score) VALUES
(1, 1, 7, 3), (2, 1, 7, 0), (1, 2, 7, 3), (2, 2, 7, 0), (1, 3, 7, 3), (2, 3, 7, 0), (1, 4, 7, 3), (2, 4, 7, 0), (1, 5, 7, 3), (2, 5, 7, 0),
(3, 6, 8, 3), (4, 6, 8, 0), (3, 7, 8, 3), (4, 7, 8, 0), (3, 8, 8, 3), (4, 8, 8, 0), (3, 9, 8, 3), (4, 9, 8, 0), (3, 10, 8, 3), (4, 10, 8, 0),
(5, 11, 9, 3), (6, 11, 9, 0), (5, 12, 9, 3), (6, 12, 9, 0), (5, 13, 9, 3), (6, 13, 9, 0), (5, 14, 9, 3), (6, 14, 9, 0), (5, 15, 9, 3), (6, 15, 9, 0),
(7, 16, 10, 3), (8, 16, 10, 0), (7, 17, 10, 3), (8, 17, 10, 0), (7, 18, 10, 3), (8, 18, 10, 0), (7, 19, 10, 3), (8, 19, 10, 0), (7, 20, 10, 3), (8, 20, 10, 0),
(9, 21, 11, 3), (10, 21, 11, 0), (9, 22, 11, 3), (10, 22, 11, 0), (9, 23, 11, 3), (10, 23, 11, 0), (9, 24, 11, 3), (10, 24, 11, 0), (9, 25, 11, 3), (10, 25, 11, 0),
(11, 26, 12, 3), (12, 26, 12, 0), (11, 27, 12, 3), (12, 27, 12, 0), (11, 28, 12, 3), (12, 28, 12, 0), (11, 29, 12, 3), (12, 29, 12, 0), (11, 30, 12, 3), (12, 30, 12, 0);

-- 11. TeamPlayer
INSERT INTO TeamPlayer (team_id, session_id, membership_number, position) VALUES
(1, 1, 25, 'Goalkeeper'), (1, 2, 25, 'Goalkeeper'), (3, 6, 26, 'Goalkeeper'), (3, 7, 26, 'Goalkeeper'),
(5, 11, 27, 'Goalkeeper'), (5, 12, 27, 'Goalkeeper'), (7, 16, 28, 'Goalkeeper'), (7, 17, 28, 'Goalkeeper'),
(9, 21, 29, 'Goalkeeper'), (9, 22, 29, 'Goalkeeper'), (11, 26, 30, 'Goalkeeper'), (11, 27, 30, 'Goalkeeper'),
(1, 1, 31, 'Goalkeeper'), (1, 2, 31, 'Right Fullback'), (1, 3, 31, 'Sweeper'), (1, 4, 31, 'Center Back'), (1, 5, 31, 'Striker'),
(3, 6, 32, 'Goalkeeper'), (3, 7, 32, 'Right Fullback'), (3, 8, 32, 'Sweeper'), (3, 9, 32, 'Center Back'), (3, 10, 32, 'Striker'),
(5, 11, 33, 'Goalkeeper'), (5, 12, 33, 'Right Fullback'), (5, 13, 33, 'Sweeper'), (5, 14, 33, 'Center Back'), (5, 15, 33, 'Striker'),
(7, 16, 34, 'Goalkeeper'), (7, 17, 34, 'Right Fullback'), (7, 18, 34, 'Sweeper'), (7, 19, 34, 'Center Back'), (7, 20, 34, 'Striker'),
(9, 21, 35, 'Goalkeeper'), (9, 22, 35, 'Right Fullback'), (9, 23, 35, 'Sweeper'), (9, 24, 35, 'Center Back'), (9, 25, 35, 'Striker'),
(11, 26, 36, 'Goalkeeper'), (11, 27, 36, 'Right Fullback'), (11, 28, 36, 'Sweeper'), (11, 29, 36, 'Center Back'), (11, 30, 36, 'Striker'),
(2, 1, 37, 'Striker'), (2, 2, 37, 'Striker'), (4, 6, 38, 'Striker'), (4, 7, 38, 'Striker'),
(6, 11, 39, 'Striker'), (6, 12, 39, 'Striker'), (8, 16, 40, 'Striker'), (8, 17, 40, 'Striker'),
(10, 21, 41, 'Striker'), (10, 22, 41, 'Striker'), (12, 26, 42, 'Striker'), (12, 27, 42, 'Striker');

-- 12. FifaGame & ParticipatedIn
INSERT INTO FifaGame (date, location, score) VALUES
('2025-01-01', 'Stadium A', '1-0'), ('2025-02-01', 'Stadium A', '2-1'),
('2025-03-01', 'Stadium B', '0-0'), ('2025-04-01', 'Stadium B', '3-2'),
('2025-05-01', 'Stadium C', '1-1'), ('2025-06-01', 'Stadium C', '4-0'),
('2025-07-01', 'Stadium D', '0-2'), ('2025-08-01', 'Stadium D', '2-2'),
('2025-09-01', 'Stadium E', '1-3'), ('2025-10-01', 'Stadium E', '5-1');

INSERT INTO ParticipatedIn (membership_number, game_id, team_name, opponent) VALUES
(1, 1, 'Real Madrid', 'FC Barcelona'), (1, 2, 'Manchester United', 'Liverpool'), (1, 3, 'Bayern Munich', 'Borussia Dortmund'), (1, 4, 'Paris Saint-Germain', 'Marseille'), (1, 5, 'Juventus', 'AC Milan'), (1, 6, 'Chelsea', 'Arsenal'),
(2, 1, 'Real Madrid', 'FC Barcelona'), (2, 2, 'Manchester United', 'Liverpool'), (2, 3, 'Bayern Munich', 'Borussia Dortmund'), (2, 4, 'Paris Saint-Germain', 'Marseille'), (2, 5, 'Juventus', 'AC Milan'), (2, 6, 'Chelsea', 'Arsenal'),
(3, 1, 'Real Madrid', 'FC Barcelona'), (3, 2, 'Manchester United', 'Liverpool'), (3, 3, 'Bayern Munich', 'Borussia Dortmund'), (3, 4, 'Paris Saint-Germain', 'Marseille'), (3, 5, 'Juventus', 'AC Milan'), (3, 6, 'Chelsea', 'Arsenal'),
(4, 1, 'Real Madrid', 'FC Barcelona'), (4, 2, 'Manchester United', 'Liverpool'), (4, 3, 'Bayern Munich', 'Borussia Dortmund'), (4, 4, 'Paris Saint-Germain', 'Marseille'), (4, 5, 'Juventus', 'AC Milan'), (4, 6, 'Chelsea', 'Arsenal'),
(5, 1, 'Real Madrid', 'FC Barcelona'), (5, 2, 'Manchester United', 'Liverpool'), (5, 3, 'Bayern Munich', 'Borussia Dortmund'), (5, 4, 'Paris Saint-Germain', 'Marseille'), (5, 5, 'Juventus', 'AC Milan'), (5, 6, 'Chelsea', 'Arsenal'),
(6, 1, 'Real Madrid', 'FC Barcelona'), (6, 2, 'Manchester United', 'Liverpool'), (6, 3, 'Bayern Munich', 'Borussia Dortmund'), (6, 4, 'Paris Saint-Germain', 'Marseille'), (6, 5, 'Juventus', 'AC Milan'), (6, 6, 'Chelsea', 'Arsenal'),
(7, 1, 'Real Madrid', 'FC Barcelona'), (7, 2, 'Manchester United', 'Liverpool'), (7, 3, 'Bayern Munich', 'Borussia Dortmund'), (7, 4, 'Paris Saint-Germain', 'Marseille'), (7, 5, 'Juventus', 'AC Milan'), (7, 6, 'Chelsea', 'Arsenal'),
(8, 1, 'Real Madrid', 'FC Barcelona'), (8, 2, 'Manchester United', 'Liverpool'), (8, 3, 'Bayern Munich', 'Borussia Dortmund'), (8, 4, 'Paris Saint-Germain', 'Marseille'), (8, 5, 'Juventus', 'AC Milan'), (8, 6, 'Chelsea', 'Arsenal'),
(9, 1, 'Real Madrid', 'FC Barcelona'), (9, 2, 'Manchester United', 'Liverpool'), (9, 3, 'Bayern Munich', 'Borussia Dortmund'), (9, 4, 'Paris Saint-Germain', 'Marseille'), (9, 5, 'Juventus', 'AC Milan'), (9, 6, 'Chelsea', 'Arsenal'),
(10, 1, 'Real Madrid', 'FC Barcelona'), (10, 2, 'Manchester United', 'Liverpool'), (10, 3, 'Bayern Munich', 'Borussia Dortmund'), (10, 4, 'Paris Saint-Germain', 'Marseille'), (10, 5, 'Juventus', 'AC Milan'), (10, 6, 'Chelsea', 'Arsenal'),
(11, 1, 'Real Madrid', 'FC Barcelona'), (11, 2, 'Manchester United', 'Liverpool'), (11, 3, 'Bayern Munich', 'Borussia Dortmund'), (11, 4, 'Paris Saint-Germain', 'Marseille'), (11, 5, 'Juventus', 'AC Milan'), (11, 6, 'Chelsea', 'Arsenal'),
(12, 1, 'Real Madrid', 'FC Barcelona'), (12, 2, 'Manchester United', 'Liverpool'), (12, 3, 'Bayern Munich', 'Borussia Dortmund'), (12, 4, 'Paris Saint-Germain', 'Marseille'), (12, 5, 'Juventus', 'AC Milan'), (12, 6, 'Chelsea', 'Arsenal'),
(19, 1, 'Real Madrid', 'FC Barcelona'), (19, 2, 'Manchester United', 'Liverpool'), (19, 3, 'Bayern Munich', 'Borussia Dortmund'), (19, 4, 'Paris Saint-Germain', 'Marseille'), (19, 5, 'Juventus', 'AC Milan'), (19, 6, 'Chelsea', 'Arsenal'),
(20, 1, 'Real Madrid', 'FC Barcelona'), (20, 2, 'Manchester United', 'Liverpool'), (20, 3, 'Bayern Munich', 'Borussia Dortmund'), (20, 4, 'Paris Saint-Germain', 'Marseille'), (20, 5, 'Juventus', 'AC Milan'), (20, 6, 'Chelsea', 'Arsenal'),
(21, 1, 'Real Madrid', 'FC Barcelona'), (21, 2, 'Manchester United', 'Liverpool'), (21, 3, 'Bayern Munich', 'Borussia Dortmund'), (21, 4, 'Paris Saint-Germain', 'Marseille'), (21, 5, 'Juventus', 'AC Milan'), (21, 6, 'Chelsea', 'Arsenal'),
(22, 1, 'Real Madrid', 'FC Barcelona'), (22, 2, 'Manchester United', 'Liverpool'), (22, 3, 'Bayern Munich', 'Borussia Dortmund'), (22, 4, 'Paris Saint-Germain', 'Marseille'), (22, 5, 'Juventus', 'AC Milan'), (22, 6, 'Chelsea', 'Arsenal'),
(23, 1, 'Real Madrid', 'FC Barcelona'), (23, 2, 'Manchester United', 'Liverpool'), (23, 3, 'Bayern Munich', 'Borussia Dortmund'), (23, 4, 'Paris Saint-Germain', 'Marseille'), (23, 5, 'Juventus', 'AC Milan'), (23, 6, 'Chelsea', 'Arsenal'),
(24, 1, 'Real Madrid', 'FC Barcelona'), (24, 2, 'Manchester United', 'Liverpool'), (24, 3, 'Bayern Munich', 'Borussia Dortmund'), (24, 4, 'Paris Saint-Germain', 'Marseille'), (24, 5, 'Juventus', 'AC Milan'), (24, 6, 'Chelsea', 'Arsenal');