use cscs2;

INSERT INTO Location (location_name, location_type, address, city, province, postal_code, web_address, max_capacity) VALUES
('Montreal Central Hub', 'Head', '1250 Rue Sainte-Catherine', 'Montreal', 'Quebec', 'H3B 1Y8', 'www.mtlcentral.ca', 500),
('Laval Sports Complex', 'Branch', '3200 Boulevard Saint-Martin', 'Laval', 'Quebec', 'H7T 2H6', 'www.lavalsports.ca', 300),
('Longueuil Center', 'Branch', '1500 Boulevard de Rome', 'Longueuil', 'Quebec', 'J4K 2T3', 'www.longueuilcenter.ca', 250),
('Quebec City Arena', 'Branch', '250 Grande Allee Ouest', 'Quebec City', 'Quebec', 'G1R 2H8', 'www.qcarena.ca', 400),
('Gatineau Athletic Club', 'Branch', '450 Boulevard de la Gappe', 'Gatineau', 'Quebec', 'J8T 7X9', 'www.gatineauathletics.ca', 200),
('Sherbrooke Soccer Dome', 'Branch', '850 Rue Belvedere Sud', 'Sherbrooke', 'Quebec', 'J1H 4C1', 'www.sherbrookedome.ca', 180),
('Ottawa East Center', 'Branch', '1200 St Laurent Boulevard', 'Ottawa', 'Ontario', 'K1K 3B8', 'www.ottawaeast.ca', 350),
('Toronto Metro Arena', 'Branch', '500 Yonge Street', 'Toronto', 'Ontario', 'M4Y 1W9', 'www.torontometro.ca', 600),
('Brossard Sports Complex', 'Branch', '7800 Boulevard Taschereau', 'Brossard', 'Quebec', 'J4X 1C2', 'www.brossardsports.ca', 220),
('West Island Dome', 'Branch', '1800 Boulevard Saint-Jean', 'Pointe-Claire', 'Quebec', 'H9R 3K2', 'www.westislanddome.ca', 280);

INSERT INTO LocationPhone (location_id, phone_number) VALUES
(1, '514-555-0101'), 
(1, '514-555-0111'),
(1, '514-555-0121'),
(2, '450-555-0102'), 
(2, '450-555-0112'),
(3, '450-555-0103'), 
(3, '450-555-0113'),
(4, '418-555-0104'), 
(5, '819-555-0105'),
(6, '819-555-0106'), 
(7, '613-555-0107'), 
(8, '416-555-0108'), 
(9, '450-555-0109'), 
(10, '514-555-0110');

INSERT INTO Personnel (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email, personnel_role, mandate) VALUES
('Marc', 'Tremblay', '100000001', 'TREM10000001', '1980-05-12', '12 Rue Saint-Denis', 'Montreal', 'Quebec', 'H2X 3K4', '514-555-1001', 'm.tremblay@club.ca', 'Coach', 'Volunteer'),
('Sophie', 'Roy', '100000002', 'ROYS10000002', '1985-08-22', '45 Rue Victoria', 'Laval', 'Quebec', 'H7N 1A2', '450-555-1002', 's.roy@club.ca', 'Coach', 'Volunteer'),
('Jean', 'Gagnon', '100000003', 'GAGJ10000003', '1978-03-15', '88 Rue Saint-Charles', 'Longueuil', 'Quebec', 'J4H 1M3', '450-555-1003', 'j.gagnon@club.ca', 'Coach', 'Salaried'),
('Claire', 'Bouchard', '100000004', 'BOUC10000004', '1982-11-30', '120 Rue Saint-Jean', 'Quebec City', 'Quebec', 'G1R 1N5', '418-555-1004', 'c.bouchard@club.ca', 'Coach', 'Salaried'),
('Luc', 'Cote', '100000005', 'COTL10000005', '1975-01-19', '33 Boulevard Greber', 'Gatineau', 'Quebec', 'J8T 3R1', '819-555-1005', 'l.cote@club.ca', 'Coach', 'Salaried'),
('Isabelle', 'Fortin', '100000006', 'FORT10000006', '1988-07-04', '77 Rue King Ouest', 'Sherbrooke', 'Quebec', 'J1H 1P4', '819-555-1006', 'i.fortin@club.ca', 'Coach', 'Salaried'),
('Antoine', 'Morin', '100000007', 'MORA10000007', '1981-09-14', '210 Bank Street', 'Ottawa', 'Ontario', 'K2P 1X2', '613-555-1007', 'a.morin@club.ca', 'Coach', 'Salaried'),
('Helene', 'Gauthier', '100000008', 'GAUH10000008', '1983-12-05', '90 Bay Street', 'Toronto', 'Ontario', 'M5J 2R8', '416-555-1008', 'h.gauthier@club.ca', 'Coach', 'Salaried'),
('Francois', 'Lavoie', '100000009', 'LAVF10000009', '1979-06-25', '500 Rue Saint-Laurent', 'Brossard', 'Quebec', 'J4X 2T5', '450-555-1009', 'f.lavoie@club.ca', 'Coach', 'Salaried'),
('Nathalie', 'Belanger', '100000010', 'BELN10000010', '1984-04-18', '310 Hymus', 'Pointe-Claire', 'Quebec', 'H9R 1E8', '514-555-1010', 'n.belanger@club.ca', 'Coach', 'Salaried'),
('Etienne', 'Lefebvre', '100000011', 'LEFE10000011', '1990-02-11', '150 Mont-Royal', 'Montreal', 'Quebec', 'H2T 1P1', '514-555-1011', 'e.lefebvre@club.ca', 'Coach', 'Salaried'),
('Catherine', 'Caron', '100000012', 'CARC10000012', '1987-10-29', '60 Boulevard des Laurentides', 'Laval', 'Quebec', 'H7G 2T1', '450-555-1012', 'c.caron@club.ca', 'Coach', 'Salaried'),
('Mathieu', 'Ouellet', '100000013', 'OUEM10000013', '1986-05-08', '900 Rue Saint-Vallier', 'Quebec City', 'Quebec', 'G1K 3P7', '418-555-1013', 'm.ouellet@club.ca', 'Coach', 'Salaried'),
('Genevieve', 'Pelletier', '100000014', 'PELG10000014', '1982-08-17', '405 Rideau Street', 'Ottawa', 'Ontario', 'K1N 5Y6', '613-555-1014', 'g.pelletier@club.ca', 'Coach', 'Salaried'),
('Guillaume', 'Girard', '100000015', 'GIRG10000015', '1989-12-01', '420 Saint-Malo', 'Montreal', 'Quebec', 'H4B 1V3', '514-555-1015', 'g.girard@club.ca', 'Coach', 'Salaried'),
('Paul', 'Admin', '100000016', 'ADMP10000016', '1970-01-01', 'Admin St', 'Montreal', 'Quebec', 'H1H 1H1', '514-000-0001', 'p.admin@club.ca', 'Administrator', 'Salaried'),
('Rita', 'Admin', '100000017', 'ADMR10000017', '1970-01-01', 'Admin St', 'Laval', 'Quebec', 'H1H 1H2', '514-000-0002', 'r.admin@club.ca', 'Administrator', 'Salaried'),
('Tom', 'Admin', '100000018', 'ADMT10000018', '1970-01-01', 'Admin St', 'Longueuil', 'Quebec', 'H1H 1H3', '514-000-0003', 't.admin@club.ca', 'Administrator', 'Salaried'),
('Sue', 'Admin', '100000019', 'ADMS10000019', '1970-01-01', 'Admin St', 'Quebec City', 'Quebec', 'H1H 1H4', '514-000-0004', 's.admin@club.ca', 'Administrator', 'Salaried'),
('Bob', 'Admin', '100000020', 'ADMB10000020', '1970-01-01', 'Admin St', 'Gatineau', 'Quebec', 'H1H 1H5', '514-000-0005', 'b.admin@club.ca', 'Administrator', 'Salaried'),
('Kim', 'Admin', '100000021', 'ADMK10000021', '1970-01-01', 'Admin St', 'Sherbrooke', 'Quebec', 'H1H 1H6', '514-000-0006', 'k.admin@club.ca', 'Administrator', 'Salaried'),
('Dan', 'Admin', '100000022', 'ADMD10000022', '1970-01-01', 'Admin St', 'Ottawa', 'Ontario', 'H1H 1H7', '514-000-0007', 'd.admin@club.ca', 'Administrator', 'Salaried'),
('Amy', 'Admin', '100000023', 'ADMA10000023', '1970-01-01', 'Admin St', 'Toronto', 'Ontario', 'H1H 1H8', '514-000-0008', 'a.admin@club.ca', 'Administrator', 'Salaried'),
('Jon', 'Admin', '100000024', 'ADMJ10000024', '1970-01-01', 'Admin St', 'Brossard', 'Quebec', 'H1H 1H9', '514-000-0009', 'j.admin@club.ca', 'Administrator', 'Salaried'),
('Leo', 'Admin', '100000025', 'ADML10000025', '1970-01-01', 'Admin St', 'Pointe-Claire', 'Quebec', 'H1H 1H0', '514-000-0010', 'l.admin@club.ca', 'Administrator', 'Salaried');

INSERT INTO EmployedAt (personnel_id, location_id, start_date, end_date) VALUES 
(1, 1, '2020-01-01', NULL), (2, 1, '2020-01-01', NULL), (3, 2, '2020-01-01', NULL), (4, 3, '2020-01-01', NULL),
(5, 4, '2020-01-01', NULL), (6, 5, '2020-01-01', NULL), (7, 6, '2020-01-01', NULL), (8, 7, '2020-01-01', NULL),
(9, 8, '2020-01-01', NULL), (10, 9, '2020-01-01', NULL), (11, 10, '2020-01-01', NULL), (12, 1, '2020-01-01', NULL),
(13, 2, '2020-01-01', NULL), (14, 3, '2020-01-01', NULL), (15, 4, '2020-01-01', NULL);

INSERT INTO Manages (location_id, personnel_id) VALUES 
(1, 16), (2, 17), (3, 18), (4, 19), (5, 20), (6, 21), (7, 22), (8, 23), (9, 24), (10, 25);

INSERT INTO FamilyMember (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email) VALUES
('Marc', 'Tremblay', '100000001', 'TREM10000001', '1980-05-12', '12 Rue Saint-Denis', 'Montreal', 'Quebec', 'H2X 3K4', '514-555-1001', 'm.tremblay@club.ca'),
('Sophie', 'Roy', '100000002', 'ROYS10000002', '1985-08-22', '45 Rue Victoria', 'Laval', 'Quebec', 'H7N 1A2', '450-555-1002', 's.roy@club.ca'),
('Pierre', 'Dupont', '200000003', 'DUPP20000003', '1976-04-10', '100 Rue Sherbrooke', 'Montreal', 'Quebec', 'H3A 1B1', '514-555-2001', 'p.dupont@mail.ca'),
('Monique', 'Simard', '200000004', 'SIMM20000004', '1978-09-19', '200 Boulevard Samson', 'Laval', 'Quebec', 'H7X 2A3', '450-555-2002', 'm.simard@mail.ca'),
('Robert', 'Boucher', '200000005', 'BOUR20000005', '1980-01-22', '300 Rue Laurier', 'Quebec City', 'Quebec', 'G1R 2K8', '418-555-2003', 'r.boucher@mail.ca');

INSERT INTO AssignedTo (family_member_id, location_id, start_date, end_date) VALUES
(1, 1, '2020-01-01', NULL), (2, 1, '2020-01-01', NULL), (3, 1, '2020-01-01', NULL), (4, 2, '2020-01-01', NULL), (5, 4, '2020-01-01', NULL);

INSERT INTO ClubMember (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email, height_cm, weight_kg, gender) VALUES
('Alexandre', 'Dupont', '300000001', 'DUPA30000001', '1998-05-10', '100 Rue Sherbrooke', 'Montreal', 'Quebec', 'H3A 1B1', '514-555-2001', 'alex@mail.ca', 180.5, 75.0, 'Boy'),
('Emilie', 'Dupont', '300000002', 'DUPE30000002', '2000-08-14', '100 Rue Sherbrooke', 'Montreal', 'Quebec', 'H3A 1B1', '514-555-2001', 'emilie@mail.ca', 165.0, 55.0, 'Girl'),
('Maxime', 'Simard', '300000003', 'SIMM30000003', '1999-02-18', '200 Boulevard Samson', 'Laval', 'Quebec', 'H7X 2A3', '450-555-2002', 'max@mail.ca', 175.0, 70.0, 'Boy'),
('Chloe', 'Simard', '300000004', 'SIMC30000004', '2001-12-01', '200 Boulevard Samson', 'Laval', 'Quebec', 'H7X 2A3', '450-555-2002', 'chloe@mail.ca', 160.0, 52.0, 'Girl'),
('Gabriel', 'Boucher', '300000005', 'BOUG30000005', '1997-07-20', '300 Rue Laurier', 'Quebec City', 'Quebec', 'G1R 2K8', '418-555-2003', 'gab@mail.ca', 182.0, 78.0, 'Boy'),
('Lea', 'Boucher', '300000006', 'BOUL30000006', '2002-10-30', '300 Rue Laurier', 'Quebec City', 'Quebec', 'G1R 2K8', '418-555-2003', 'lea@mail.ca', 168.0, 58.0, 'Girl'),
('Samuel', 'Cloutier', '300000007', 'CLOS30000007', '1996-03-12', '400 Elgin Street', 'Ottawa', 'Ontario', 'K2P 1M8', '613-555-2004', 'sam@mail.ca', 178.0, 72.0, 'Boy'),
('Florence', 'Hebert', '300000008', 'HEBF30000008', '2003-01-25', '500 Rue Saint-Jacques', 'Montreal', 'Quebec', 'H2Y 1S1', '514-555-2005', 'flo@mail.ca', 170.0, 60.0, 'Girl'),
('Nicolas', 'Roy', '300000009', 'ROYN30000009', '1995-04-15', '12 Avenue Cartier', 'Montreal', 'Quebec', 'H2K 2B3', '514-555-3001', 'nic@mail.ca', 185.0, 80.0, 'Boy'),
('Camille', 'Gagnon', '300000010', 'GAGC30000010', '2000-09-08', '45 Boulevard', 'Laval', 'Quebec', 'H7V 2S1', '450-555-3002', 'cam@mail.ca', 162.0, 54.0, 'Girl'),
('Olivier', 'Lavoie', '300000011', 'LAVO30000011', '1998-11-20', '78 Rue Saint-Jean', 'Longueuil', 'Quebec', 'J4H 2X8', '450-555-3003', 'oli@mail.ca', 177.0, 73.0, 'Boy'),
('Charlotte', 'Fortin', '300000012', 'FORC30000012', '2001-06-02', '88 Grande Allee', 'Quebec City', 'Quebec', 'G1R 2M3', '418-555-3004', 'char@mail.ca', 166.0, 57.0, 'Girl'),
('Benjamin', 'Cote', '300000013', 'COTB30000013', '1997-02-14', '14 Rue Principale', 'Gatineau', 'Quebec', 'J9H 1X1', '819-555-3005', 'ben@mail.ca', 181.0, 76.0, 'Boy'),
('Mia', 'Morin', '300000014', 'MORM30000014', '2002-12-19', '99 Rue King Est', 'Sherbrooke', 'Quebec', 'J1H 1C8', '819-555-3006', 'mia@mail.ca', 164.0, 56.0, 'Girl'),
('Lucas', 'Gauthier', '300000015', 'GAUL30000015', '1996-08-04', '150 Metcalfe Street', 'Ottawa', 'Ontario', 'K2P 1P1', '613-555-3007', 'lucas@mail.ca', 179.0, 74.0, 'Boy'),
('Emma', 'Belanger', '300000016', 'BELE30000016', '2012-03-27', '220 Bloor Street West', 'Toronto', 'Ontario', 'M5S 1T8', '416-555-3008', 'emma@mail.ca', 150.0, 45.0, 'Girl'),
('William', 'Lefebvre', '300000017', 'LEFW30000017', '2013-10-10', '310 Boulevard Matte', 'Brossard', 'Quebec', 'J4Y 2Z2', '450-555-3009', 'will@mail.ca', 155.0, 48.0, 'Boy'),
('Alice', 'Ouellet', '300000018', 'OUEA30000018', '2014-01-05', '405 Avenue Victoria', 'Pointe-Claire', 'Quebec', 'H9R 2K1', '514-555-3010', 'alice@mail.ca', 145.0, 40.0, 'Girl'),
('Jacob', 'Pelletier', '300000019', 'PELJ30000019', '2012-05-16', '123 Rue Rachel', 'Montreal', 'Quebec', 'H2W 1A3', '514-555-3011', 'jacob@mail.ca', 152.0, 46.0, 'Boy'),
('Rosalie', 'Girard', '300000020', 'GIRR30000020', '2015-09-22', '55 Rue Saint-Zotique', 'Laval', 'Quebec', 'H7N 2V5', '450-555-3012', 'rosalie@mail.ca', 140.0, 38.0, 'Girl'),
('Thomas', 'Tremblay', '300000021', 'TRET30000021', '2013-07-11', '100 Boulevard Charest', 'Quebec City', 'Quebec', 'G1K 3G2', '418-555-3013', 'thomas@mail.ca', 154.0, 47.0, 'Boy'),
('Zoe', 'Bouchard', '300000022', 'BOUZ30000022', '2014-12-03', '77 Wellington Street', 'Ottawa', 'Ontario', 'K1A 0A9', '613-555-3014', 'zoe@mail.ca', 146.0, 41.0, 'Girl'),
('Nathan', 'Roy', '300000023', 'ROYN30000023', '2012-05-29', '88 Rue Saint-Urbain', 'Montreal', 'Quebec', 'H2X 2V2', '514-555-3015', 'nathan@mail.ca', 158.0, 50.0, 'Boy'),
('Maya', 'Gagnon', '300000024', 'GAGM30000024', '2015-08-17', '120 Boulevard Concorde', 'Laval', 'Quebec', 'H7G 2C7', '450-555-3016', 'maya@mail.ca', 142.0, 39.0, 'Girl'),
('Elliot', 'Cote', '300000025', 'COTE30000025', '2013-02-14', '90 Rue Saint-Jean', 'Longueuil', 'Quebec', 'J4H 2Y1', '450-555-3017', 'elliot@mail.ca', 156.0, 49.0, 'Boy'),
('Clara', 'Fortin', '300000026', 'FORC30000026', '2014-11-11', '210 Rue Rene', 'Quebec City', 'Quebec', 'G1R 2B2', '418-555-3018', 'clara@mail.ca', 148.0, 42.0, 'Girl'),
('Logan', 'Morin', '300000027', 'MORL30000027', '2012-04-04', '300 Boulevard Cite', 'Gatineau', 'Quebec', 'J8Y 6S9', '819-555-3019', 'logan@mail.ca', 159.0, 51.0, 'Boy'),
('Eva', 'Gauthier', '300000028', 'GAUE30000028', '2015-10-25', '150 Rue Galt Ouest', 'Sherbrooke', 'Quebec', 'J1H 1Z8', '819-555-3020', 'eva@mail.ca', 141.0, 37.0, 'Girl'),
('Liam', 'Lavoie', '300000029', 'LAVL30000029', '2013-01-30', '80 Sparks Street', 'Ottawa', 'Ontario', 'K1P 5B6', '613-555-3021', 'liam@mail.ca', 157.0, 48.0, 'Boy'),
('Sophia', 'Belanger', '300000030', 'BELS30000030', '2014-06-18', '300 King Street West', 'Toronto', 'Ontario', 'M5V 1J5', '416-555-3022', 'sophia@mail.ca', 147.0, 41.0, 'Girl');

INSERT INTO Major (membership_number) VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14),(15);
INSERT INTO Minor (membership_number) VALUES (16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30);

INSERT INTO MemberLocation (membership_number, location_id, start_date, end_date) VALUES
(1, 1, '2010-01-01', NULL),
(2, 1, '2023-01-01', NULL), (3, 1, '2023-01-01', NULL), (4, 1, '2023-01-01', NULL), (5, 1, '2023-01-01', NULL),
(6, 2, '2023-01-01', NULL), (7, 2, '2023-01-01', NULL), (8, 3, '2023-01-01', NULL), (9, 4, '2023-01-01', NULL),
(10, 5, '2023-01-01', NULL), (11, 6, '2023-01-01', NULL), (12, 7, '2023-01-01', NULL), (13, 8, '2023-01-01', NULL),
(14, 9, '2023-01-01', NULL), (15, 10, '2023-01-01', NULL), (16, 1, '2023-01-01', NULL), (17, 1, '2023-01-01', NULL),
(18, 2, '2023-01-01', NULL), (19, 3, '2023-01-01', NULL), (20, 4, '2023-01-01', NULL), (21, 5, '2023-01-01', NULL),
(22, 6, '2023-01-01', NULL), (23, 7, '2023-01-01', NULL), (24, 8, '2023-01-01', NULL), (25, 9, '2023-01-01', NULL),
(26, 10, '2023-01-01', NULL), (27, 1, '2023-01-01', NULL), (28, 2, '2023-01-01', NULL), (29, 3, '2023-01-01', NULL),
(30, 4, '2023-01-01', NULL);

INSERT INTO RelatedTo (family_member_id, membership_number, relationship_type) VALUES
(1, 16, 'Father'), (1, 17, 'Father'), (2, 18, 'Mother'), (3, 19, 'Father'), (4, 20, 'Mother');

INSERT INTO Payment (membership_number, payment_date, amount, payment_method, payment_year_target, installment_number) VALUES
(1, '2026-01-15', 150.00, 'Credit Card', 2026, 1),
(1, '2026-02-15', 100.00, 'Credit Card', 2026, 2),
(16, '2026-01-10', 100.00, 'Debit', 2026, 1);

INSERT INTO Team (name, gender_category) VALUES
('Montreal Strikers', 'Boy'), ('Montreal Royals', 'Girl'), ('Laval Eagles', 'Boy'), ('Laval Titans', 'Girl'),
('Longueuil Lightning', 'Boy'), ('Quebec Ramparts', 'Boy'), ('Gatineau Fusion', 'Girl'), ('Sherbrooke Phoenix', 'Boy'),
('Ottawa Capitals', 'Boy'), ('Toronto Stars', 'Boy');

INSERT INTO PlaysAt (team_id, location_id) VALUES
(1,1), (2,1), (3,2), (4,2), (5,3), (6,4), (7,5), (8,6), (9,7), (10,8);

INSERT INTO TeamSession (session_type, date, start_time, address) VALUES
('Game', '2025-02-01', '10:00:00', '1250 Rue Sainte-Catherine'),
('Game', '2025-02-15', '14:00:00', '1250 Rue Sainte-Catherine'),
('Game', '2025-03-01', '10:00:00', '1250 Rue Sainte-Catherine'),
('Game', '2025-03-15', '14:00:00', '1250 Rue Sainte-Catherine'),
('Game', '2025-04-01', '10:00:00', '1250 Rue Sainte-Catherine'),
('Game', '2025-04-15', '14:00:00', '1250 Rue Sainte-Catherine'),
('Training', '2025-05-01', '18:00:00', '1250 Rue Sainte-Catherine'),
('Training', '2025-05-15', '18:00:00', '1250 Rue Sainte-Catherine'),
('Training', '2025-05-20', '18:00:00', '1250 Rue Sainte-Catherine'),
('Training', '2025-05-25', '18:00:00', '1250 Rue Sainte-Catherine');

INSERT INTO TeamFormation (team_id, session_id, coach_id, score) VALUES
(1, 1, 1, 3), (2, 1, 2, 1),
(1, 2, 1, 2), (2, 2, 2, 0),
(1, 3, 1, 4),
(1, 4, 1, 1),
(1, 5, 1, 2),
(2, 6, 2, 0),
(1, 7, 1, 0), (1, 8, 1, 0), (1, 9, 1, 0), (1, 10, 1, 0);

INSERT INTO TeamPlayer (team_id, session_id, membership_number, position) VALUES
(1, 1, 1, 'Goalkeeper'), (1, 1, 3, 'Right Fullback'), (1, 1, 5, 'Left Fullback'), (1, 1, 7, 'Center Back'), (1, 1, 9, 'Midfielder'), (1, 1, 11, 'Striker'), (1, 1, 13, 'Winger'),
(2, 1, 2, 'Goalkeeper'), (2, 1, 4, 'Right Fullback'), (2, 1, 6, 'Left Fullback'), (2, 1, 8, 'Center Back'), (2, 1, 10, 'Midfielder'), (2, 1, 12, 'Striker'), (2, 1, 14, 'Winger'),
(1, 2, 1, 'Goalkeeper'), (1, 2, 3, 'Right Fullback'), (1, 2, 5, 'Left Fullback'), (1, 2, 7, 'Center Back'), (1, 2, 9, 'Midfielder'), (1, 2, 11, 'Striker'), (1, 2, 13, 'Winger'),
(2, 2, 2, 'Goalkeeper'), (2, 2, 4, 'Right Fullback'), (2, 2, 6, 'Left Fullback'), (2, 2, 8, 'Center Back'), (2, 2, 10, 'Midfielder'), (2, 2, 12, 'Striker'), (2, 2, 14, 'Winger'),
(1, 3, 1, 'Goalkeeper'), (1, 3, 3, 'Right Fullback'), (1, 3, 5, 'Left Fullback'), (1, 3, 7, 'Center Back'), (1, 3, 9, 'Midfielder'), (1, 3, 11, 'Striker'), (1, 3, 13, 'Winger'),
(1, 4, 1, 'Goalkeeper'), (1, 4, 3, 'Right Fullback'), (1, 4, 5, 'Left Fullback'), (1, 4, 7, 'Center Back'), (1, 4, 9, 'Midfielder'), (1, 4, 11, 'Striker'), (1, 4, 13, 'Winger'),
(1, 5, 1, 'Goalkeeper'), (1, 5, 3, 'Right Fullback'), (1, 5, 5, 'Left Fullback'), (1, 5, 7, 'Center Back'), (1, 5, 9, 'Midfielder'), (1, 5, 11, 'Striker'), (1, 5, 13, 'Winger'),
(2, 6, 2, 'Goalkeeper'), (2, 6, 4, 'Right Fullback'), (2, 6, 6, 'Left Fullback'), (2, 6, 8, 'Center Back'), (2, 6, 10, 'Midfielder'), (2, 6, 12, 'Striker'), (2, 6, 14, 'Winger'),
(1, 7, 1, 'Goalkeeper'), (1, 7, 3, 'Right Fullback'), (1, 7, 5, 'Left Fullback'), (1, 7, 7, 'Center Back'), (1, 7, 9, 'Midfielder'), (1, 7, 11, 'Striker'), (1, 7, 13, 'Winger'),
(1, 8, 1, 'Goalkeeper'), (1, 8, 3, 'Right Fullback'), (1, 8, 5, 'Left Fullback'), (1, 8, 7, 'Center Back'), (1, 8, 9, 'Midfielder'), (1, 8, 11, 'Striker'), (1, 8, 13, 'Winger'),
(1, 9, 1, 'Goalkeeper'), (1, 9, 3, 'Right Fullback'), (1, 9, 5, 'Left Fullback'), (1, 9, 7, 'Center Back'), (1, 9, 9, 'Midfielder'), (1, 9, 11, 'Striker'), (1, 9, 13, 'Winger'),
(1, 10, 1, 'Goalkeeper'), (1, 10, 3, 'Right Fullback'), (1, 10, 5, 'Left Fullback'), (1, 10, 7, 'Center Back'), (1, 10, 9, 'Midfielder'), (1, 10, 11, 'Striker'), (1, 10, 13, 'Winger');

INSERT INTO FifaGame (date, location, score) VALUES
('2024-06-15', 'Montreal Central Pitch 1', '3-1'),
('2024-08-20', 'Montreal Central Pitch 2', '2-2'),
('2025-05-10', 'Montreal Stadium', '1-0'),
('2025-07-12', 'Laval Complex Main Field', '2-3'),
('2025-09-05', 'Montreal Turf Field', '4-1');

INSERT INTO ParticipatedIn (membership_number, game_id, team_name, opponent) VALUES
(1, 1, 'Montreal Strikers', 'Toronto FC'),
(1, 2, 'Montreal Strikers', 'Vancouver Whitecaps'),
(1, 3, 'Montreal Strikers', 'Ottawa United'),
(1, 4, 'Montreal Strikers', 'FC Laval'),
(1, 5, 'Montreal Strikers', 'Quebec Selects'),
(16, 1, 'Montreal Strikers', 'Toronto FC'),
(17, 1, 'Montreal Strikers', 'Toronto FC'),
(2, 1, 'Montreal Royals', 'Toronto FC');