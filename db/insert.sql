-- 1. Locations (At least 7)
INSERT INTO Location (location_name, location_type, address, city, province, postal_code, web_address, max_capacity) VALUES
('Olympic Stadium Field', 'Head', '4141 Pierre-de Coubertin Ave', 'Montreal', 'QC', 'H1V3N7', 'www.olympicstadium.ca', 1000),
('Saputo Stadium Branch', 'Branch', '4750 Sherbrooke St E', 'Montreal', 'QC', 'H1V3S8', 'www.saputo.ca', 500),
('Claude-Robillard Center', 'Branch', '1000 Emile-Journault Ave', 'Montreal', 'QC', 'H2M2E7', 'www.clauderobillard.ca', 400),
('Bell Sports Complex', 'Branch', '8000 Leduc Blvd', 'Brossard', 'QC', 'J4Y0E9', 'www.bellsports.ca', 450),
('Laval Multi-Sports', 'Branch', '3095 Le Carrefour Blvd', 'Laval', 'QC', 'H7T2R5', 'www.lavalsports.ca', 600),
('Westmount Rec Center', 'Branch', '4675 Saint-Catherine St W', 'Westmount', 'QC', 'H3Z1S4', 'www.westmountrec.ca', 800),
('Pierrefonds Sportsplex', 'Branch', '14700 Pierrefonds Blvd', 'Montreal', 'QC', 'H9H4Y6', 'www.sportsplex.ca', 550);

-- 2. LocationPhone
INSERT INTO LocationPhone (location_id, phone_number) VALUES
(1, '514-111-1111'), (2, '514-222-2222'), (3, '514-333-3333'), 
(4, '514-444-4444'), (5, '514-555-5555'), (6, '514-666-6666'), 
(7, '514-777-7777');

-- 3. Personnel (At least 20 real names)
-- Note: Personnel 17-20 will share SSNs with Family Members 1-4 for Q17 & Q19 overlap
INSERT INTO Personnel (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email, personnel_role, mandate) VALUES
('David', 'Wallace', '100000001', 'M101', '1965-11-05', '111 Corporate Dr', 'Montreal', 'QC', 'H1H1H1', '514-100-0001', 'd.wallace@club.com', 'Administrator', 'Salaried'),
('Charles', 'Miner', '100000002', 'M102', '1972-04-12', '222 Steel St', 'Montreal', 'QC', 'H1H1H2', '514-100-0002', 'c.miner@club.com', 'Administrator', 'Salaried'),
('Jan', 'Levinson', '100000003', 'M103', '1968-09-21', '333 Candle Ln', 'Montreal', 'QC', 'H1H1H3', '514-100-0003', 'j.levinson@club.com', 'Administrator', 'Salaried'),
('Robert', 'California', '100000004', 'M104', '1960-01-15', '444 Lizard King', 'Montreal', 'QC', 'H1H1H4', '514-100-0004', 'r.california@club.com', 'Administrator', 'Salaried'),
('Jo', 'Bennett', '100000005', 'M105', '1955-08-08', '555 Sabre Way', 'Montreal', 'QC', 'H1H1H5', '514-100-0005', 'j.bennett@club.com', 'Administrator', 'Salaried'),
('Gabe', 'Lewis', '100000006', 'M106', '1982-11-23', '666 Skeleton Park', 'Montreal', 'QC', 'H1H1H6', '514-100-0006', 'g.lewis@club.com', 'Administrator', 'Salaried'),
('Holly', 'Flax', '100000007', 'M107', '1975-02-14', '777 Nashua Rd', 'Montreal', 'QC', 'H1H1H7', '514-100-0007', 'h.flax@club.com', 'Administrator', 'Salaried'),
('Jurgen', 'Klopp', '200000008', 'M208', '1967-06-16', '888 Anfield Rd', 'Montreal', 'QC', 'H1H1H8', '514-200-0008', 'j.klopp@club.com', 'Coach', 'Volunteer'),
('Carlo', 'Ancelotti', '200000009', 'M209', '1959-06-10', '999 Madrid Ave', 'Montreal', 'QC', 'H1H1H9', '514-200-0009', 'c.ancelotti@club.com', 'Coach', 'Volunteer'),
('Zinedine', 'Zidane', '200000010', 'M210', '1972-06-23', '1010 Cannes Blvd', 'Montreal', 'QC', 'H1H1A1', '514-200-0010', 'z.zidane@club.com', 'Coach', 'Volunteer'),
('Emma', 'Hayes', '200000011', 'M211', '1976-10-18', '1111 Chelsea Pl', 'Montreal', 'QC', 'H1H1A2', '514-200-0011', 'e.hayes@club.com', 'Coach', 'Volunteer'),
('Sarina', 'Wiegman', '200000012', 'M212', '1969-10-26', '1212 Hague St', 'Montreal', 'QC', 'H1H1A3', '514-200-0012', 's.wiegman@club.com', 'Coach', 'Volunteer'),
('Jill', 'Ellis', '200000013', 'M213', '1966-09-06', '1313 Portsmouth Dr', 'Montreal', 'QC', 'H1H1A4', '514-200-0013', 'j.ellis@club.com', 'Coach', 'Volunteer'),
('Arsene', 'Wenger', '200000014', 'M214', '1949-10-22', '1414 Arsenal Way', 'Montreal', 'QC', 'H1H1A5', '514-200-0014', 'a.wenger@club.com', 'Coach', 'Volunteer'),
('Jose', 'Mourinho', '200000015', 'M215', '1963-01-26', '1515 Special One', 'Montreal', 'QC', 'H1H1A6', '514-200-0015', 'j.mourinho@club.com', 'Coach', 'Volunteer'),
('Diego', 'Simeone', '200000016', 'M216', '1970-04-28', '1616 Atletico Ave', 'Montreal', 'QC', 'H1H1A7', '514-200-0016', 'd.simeone@club.com', 'Coach', 'Volunteer'),
('Ted', 'Lasso', '999000001', 'M991', '1976-05-15', '1717 Richmond St', 'Montreal', 'QC', 'H9H1A1', '514-999-0001', 't.lasso@club.com', 'Coach', 'Volunteer'),
('Will', 'Beard', '999000002', 'M992', '1974-08-20', '1818 Pub Ln', 'Montreal', 'QC', 'H9H1A2', '514-999-0002', 'w.beard@club.com', 'Coach', 'Volunteer'),
('Roy', 'Kent', '999000003', 'M993', '1980-09-12', '1919 Anger Rd', 'Montreal', 'QC', 'H9H1A3', '514-999-0003', 'r.kent@club.com', 'Coach', 'Volunteer'),
('Nate', 'Shelley', '999000004', 'M994', '1985-11-30', '2020 West Ham Blvd', 'Montreal', 'QC', 'H9H1A4', '514-999-0004', 'n.shelley@club.com', 'Coach', 'Volunteer');

-- 4. EmployedAt (Using NULL for active end_date)
INSERT INTO EmployedAt (personnel_id, location_id, start_date, end_date) VALUES 
(1, 1, '2020-01-01', NULL), (2, 2, '2020-01-01', NULL),
(3, 3, '2020-01-01', NULL), (4, 4, '2020-01-01', NULL),
(5, 5, '2020-01-01', NULL), (6, 6, '2020-01-01', NULL),
(7, 7, '2020-01-01', NULL), (8, 1, '2020-01-01', NULL),
(9, 2, '2020-01-01', NULL), (10, 3, '2020-01-01', NULL),
(11, 4, '2020-01-01', NULL), (12, 5, '2020-01-01', NULL),
(13, 6, '2020-01-01', NULL), (14, 7, '2020-01-01', NULL),
(15, 1, '2020-01-01', NULL), (16, 2, '2020-01-01', NULL),
(17, 1, '2020-01-01', NULL), (18, 2, '2020-01-01', NULL),
(19, 3, '2020-01-01', NULL), (20, 4, '2020-01-01', NULL);

-- 5. Manages
INSERT INTO Manages (location_id, personnel_id) VALUES 
(1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7);

-- 6. FamilyMembers (At least 10, sharing 4 SSNs with personnel 17-20)
INSERT INTO FamilyMember (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email) VALUES
('Ted', 'Lasso', '999000001', 'FM991', '1976-05-15', '1717 Richmond St', 'Montreal', 'QC', 'H9H1A1', '514-999-0001', 't.lasso@fam.com'),
('Will', 'Beard', '999000002', 'FM992', '1974-08-20', '1818 Pub Ln', 'Montreal', 'QC', 'H9H1A2', '514-999-0002', 'w.beard@fam.com'),
('Roy', 'Kent', '999000003', 'FM993', '1980-09-12', '1919 Anger Rd', 'Montreal', 'QC', 'H9H1A3', '514-999-0003', 'r.kent@fam.com'),
('Nate', 'Shelley', '999000004', 'FM994', '1985-11-30', '2020 West Ham Blvd', 'Montreal', 'QC', 'H9H1A4', '514-999-0004', 'n.shelley@fam.com'),
('Homer', 'Simpson', '888000005', 'FM885', '1956-05-12', '742 Evergreen Terr', 'Montreal', 'QC', 'H8H1A5', '514-888-0005', 'h.simpson@fam.com'),
('Marge', 'Simpson', '888000006', 'FM886', '1958-10-01', '742 Evergreen Terr', 'Montreal', 'QC', 'H8H1A6', '514-888-0006', 'm.simpson@fam.com'),
('Ned', 'Flanders', '888000007', 'FM887', '1955-08-15', '744 Evergreen Terr', 'Montreal', 'QC', 'H8H1A7', '514-888-0007', 'n.flanders@fam.com'),
('Julius', 'Hibbert', '888000008', 'FM888', '1954-07-07', '123 Hospital Way', 'Montreal', 'QC', 'H8H1A8', '514-888-0008', 'j.hibbert@fam.com'),
('Clancy', 'Wiggum', '888000009', 'FM889', '1957-12-25', '456 Police Pl', 'Montreal', 'QC', 'H8H1A9', '514-888-0009', 'c.wiggum@fam.com'),
('Apu', 'Nahasapeemapetilon', '888000010', 'FM890', '1961-02-14', '789 KwikEMart Rd', 'Montreal', 'QC', 'H8H1B1', '514-888-0010', 'a.nahasapeemapetilon@fam.com');

-- 7. AssignedTo (Using NULL for active end_date)
INSERT INTO AssignedTo (family_member_id, location_id, start_date, end_date) VALUES
(1, 1, '2020-01-01', NULL), (2, 2, '2020-01-01', NULL),
(3, 3, '2020-01-01', NULL), (4, 4, '2020-01-01', NULL),
(5, 5, '2020-01-01', NULL), (6, 6, '2020-01-01', NULL),
(7, 7, '2020-01-01', NULL), (8, 1, '2020-01-01', NULL),
(9, 2, '2020-01-01', NULL), (10, 3, '2020-01-01', NULL);

-- 8. ClubMembers (At least 50 real names)
INSERT INTO ClubMember (first_name, last_name, ssn, medicare_number, date_of_birth, address, city, province, postal_code, phone_number, email, height_cm, weight_kg, gender) VALUES
('Marcus', 'Rashford', '300000001', 'CM01', '2012-10-31', '101 ManUtd Way', 'Montreal', 'QC', 'H1H1B1', '514-300-0001', 'm.rashford@cm.com', 150, 45, 'Boy'),
('Bukayo', 'Saka', '300000002', 'CM02', '2012-09-05', '102 Arsenal Dr', 'Montreal', 'QC', 'H1H1B2', '514-300-0002', 'b.saka@cm.com', 150, 45, 'Boy'),
('Phil', 'Foden', '300000003', 'CM03', '2012-05-28', '103 City Pl', 'Montreal', 'QC', 'H1H1B3', '514-300-0003', 'p.foden@cm.com', 150, 45, 'Boy'),
('Jude', 'Bellingham', '300000004', 'CM04', '2012-06-29', '104 Madrid St', 'Montreal', 'QC', 'H1H1B4', '514-300-0004', 'j.bellingham@cm.com', 150, 45, 'Boy'),
('Declan', 'Rice', '300000005', 'CM05', '2012-01-14', '105 Hammer Rd', 'Montreal', 'QC', 'H1H1B5', '514-300-0005', 'd.rice@cm.com', 150, 45, 'Boy'),
('Mason', 'Mount', '300000006', 'CM06', '2012-01-10', '106 Chelsea Blvd', 'Montreal', 'QC', 'H1H1B6', '514-300-0006', 'm.mount@cm.com', 150, 45, 'Boy'),
('Jack', 'Grealish', '300000007', 'CM07', '2012-09-10', '107 Villa Ave', 'Montreal', 'QC', 'H1H1B7', '514-300-0007', 'j.grealish@cm.com', 150, 45, 'Boy'),
('Trent', 'Alexander', '300000008', 'CM08', '2012-10-07', '108 Scouse Ln', 'Montreal', 'QC', 'H1H1B8', '514-300-0008', 't.alexander@cm.com', 150, 45, 'Boy'),
('Reece', 'James', '300000009', 'CM09', '2012-12-08', '109 Bridge St', 'Montreal', 'QC', 'H1H1B9', '514-300-0009', 'r.james@cm.com', 150, 45, 'Boy'),
('John', 'Stones', '300000010', 'CM10', '2012-05-28', '110 Etihad Way', 'Montreal', 'QC', 'H1H1C1', '514-300-0010', 'j.stones@cm.com', 150, 45, 'Boy'),
('Kyle', 'Walker', '300000011', 'CM11', '2012-05-28', '111 Pace Dr', 'Montreal', 'QC', 'H1H1C2', '514-300-0011', 'k.walker@cm.com', 150, 45, 'Boy'),
('Jordan', 'Pickford', '300000012', 'CM12', '2012-03-07', '112 Toffee Pl', 'Montreal', 'QC', 'H1H1C3', '514-300-0012', 'j.pickford@cm.com', 150, 45, 'Boy'),
('Alex', 'Morgan', '300000013', 'CM13', '2012-07-02', '113 Wave Blvd', 'Montreal', 'QC', 'H1H1C4', '514-300-0013', 'a.morgan@cm.com', 150, 45, 'Girl'),
('Megan', 'Rapinoe', '300000014', 'CM14', '2012-07-05', '114 Reign Ave', 'Montreal', 'QC', 'H1H1C5', '514-300-0014', 'm.rapinoe@cm.com', 150, 45, 'Girl'),
('Rose', 'Lavelle', '300000015', 'CM15', '2012-05-14', '115 Spirit St', 'Montreal', 'QC', 'H1H1C6', '514-300-0015', 'r.lavelle@cm.com', 150, 45, 'Girl'),
('Julie', 'Ertz', '300000016', 'CM16', '2012-04-06', '116 RedStar Ln', 'Montreal', 'QC', 'H1H1C7', '514-300-0016', 'j.ertz@cm.com', 150, 45, 'Girl'),
('Crystal', 'Dunn', '300000017', 'CM17', '2012-07-03', '117 Thorns Dr', 'Montreal', 'QC', 'H1H1C8', '514-300-0017', 'c.dunn@cm.com', 150, 45, 'Girl'),
('Kelley', 'OHara', '300000018', 'CM18', '2012-08-04', '118 Gotham Pl', 'Montreal', 'QC', 'H1H1C9', '514-300-0018', 'k.ohara@cm.com', 150, 45, 'Girl'),
('Lindsey', 'Horan', '300000019', 'CM19', '2012-05-26', '119 Lyon Ave', 'Montreal', 'QC', 'H1H1D1', '514-300-0019', 'l.horan@cm.com', 150, 45, 'Girl'),
('Sam', 'Mewis', '300000020', 'CM20', '2012-10-09', '120 Tower St', 'Montreal', 'QC', 'H1H1D2', '514-300-0020', 's.mewis@cm.com', 150, 45, 'Girl'),
('Tobin', 'Heath', '300000021', 'CM21', '2012-05-29', '121 Skill Blvd', 'Montreal', 'QC', 'H1H1D3', '514-300-0021', 't.heath@cm.com', 150, 45, 'Girl'),
('Christen', 'Press', '300000022', 'CM22', '2012-12-29', '122 AngelCity Ln', 'Montreal', 'QC', 'H1H1D4', '514-300-0022', 'c.press@cm.com', 150, 45, 'Girl'),
('Alyssa', 'Naeher', '300000023', 'CM23', '2012-04-20', '123 Chicago Dr', 'Montreal', 'QC', 'H1H1D5', '514-300-0023', 'a.naeher@cm.com', 150, 45, 'Girl'),
('Becky', 'Sauerbrunn', '300000024', 'CM24', '2012-06-06', '124 Defend Pl', 'Montreal', 'QC', 'H1H1D6', '514-300-0024', 'b.sauerbrunn@cm.com', 150, 45, 'Girl'),
('Kylian', 'Mbappe', '300000025', 'CM25', '2012-12-20', '125 Paris Ave', 'Montreal', 'QC', 'H1H1D7', '514-300-0025', 'k.mbappe@cm.com', 150, 45, 'Boy'),
('Erling', 'Haaland', '300000026', 'CM26', '2012-07-21', '126 Nordic St', 'Montreal', 'QC', 'H1H1D8', '514-300-0026', 'e.haaland@cm.com', 150, 45, 'Boy'),
('Christine', 'Sinclair', '300000027', 'CM27', '1999-06-12', '127 Burnaby Blvd', 'Montreal', 'QC', 'H1H1D9', '514-300-0027', 'c.sinclair@cm.com', 170, 65, 'Girl'),
('Marta', 'Vieira', '300000028', 'CM28', '1999-02-19', '128 Brasilia Ln', 'Montreal', 'QC', 'H1H1E1', '514-300-0028', 'm.vieira@cm.com', 170, 65, 'Girl'),
('Wayne', 'Rooney', '300000029', 'CM29', '1999-10-24', '129 Everton Dr', 'Montreal', 'QC', 'H1H1E2', '514-300-0029', 'w.rooney@cm.com', 170, 75, 'Boy'),
('Lionel', 'Messi', '300000030', 'CM30', '2012-06-24', '130 Rosario Ave', 'Montreal', 'QC', 'H1H1E3', '514-300-0030', 'l.messi@cm.com', 150, 45, 'Boy'),
('Cristiano', 'Ronaldo', '300000031', 'CM31', '2012-02-05', '131 Madeira St', 'Montreal', 'QC', 'H1H1E4', '514-300-0031', 'c.ronaldo@cm.com', 150, 45, 'Boy'),
('Neymar', 'Junior', '300000032', 'CM32', '2012-02-05', '132 Santos Blvd', 'Montreal', 'QC', 'H1H1E5', '514-300-0032', 'n.junior@cm.com', 150, 45, 'Boy'),
('Kevin', 'DeBruyne', '300000033', 'CM33', '2012-06-28', '133 Ghent Ln', 'Montreal', 'QC', 'H1H1E6', '514-300-0033', 'k.debruyne@cm.com', 150, 45, 'Boy'),
('Luka', 'Modric', '300000034', 'CM34', '2012-09-09', '134 Zadar Pl', 'Montreal', 'QC', 'H1H1E7', '514-300-0034', 'l.modric@cm.com', 150, 45, 'Boy'),
('Robert', 'Lewandowski', '300000035', 'CM35', '2012-08-21', '135 Warsaw Dr', 'Montreal', 'QC', 'H1H1E8', '514-300-0035', 'r.lewandowski@cm.com', 150, 45, 'Boy'),
('Harry', 'Kane', '300000036', 'CM36', '2012-07-28', '136 London Ave', 'Montreal', 'QC', 'H1H1E9', '514-300-0036', 'h.kane@cm.com', 150, 45, 'Boy'),
('Sophia', 'Smith', '300000037', 'CM37', '2012-08-10', '137 Portland St', 'Montreal', 'QC', 'H1H1F1', '514-300-0037', 's.smith@cm.com', 150, 45, 'Girl'),
('Trinity', 'Rodman', '300000038', 'CM38', '2012-05-20', '138 Spirit Blvd', 'Montreal', 'QC', 'H1H1F2', '514-300-0038', 't.rodman@cm.com', 150, 45, 'Girl'),
('Mallory', 'Swanson', '300000039', 'CM39', '2012-04-29', '139 Chicago Ln', 'Montreal', 'QC', 'H1H1F3', '514-300-0039', 'm.swanson@cm.com', 150, 45, 'Girl'),
('Naomi', 'Girma', '300000040', 'CM40', '2012-06-14', '140 Wave Pl', 'Montreal', 'QC', 'H1H1F4', '514-300-0040', 'n.girma@cm.com', 150, 45, 'Girl'),
('Virgil', 'VanDijk', '300000041', 'CM41', '2012-07-08', '141 Breda Dr', 'Montreal', 'QC', 'H1H1F5', '514-300-0041', 'v.vandijk@cm.com', 150, 45, 'Boy'),
('Alisson', 'Becker', '300000042', 'CM42', '2012-10-02', '142 Novo Ave', 'Montreal', 'QC', 'H1H1F6', '514-300-0042', 'a.becker@cm.com', 150, 45, 'Boy'),
('Mo', 'Salah', '300000043', 'CM43', '2012-06-15', '143 Cairo St', 'Montreal', 'QC', 'H1H1F7', '514-300-0043', 'm.salah@cm.com', 150, 45, 'Boy'),
('Sadio', 'Mane', '300000044', 'CM44', '2012-04-10', '144 Dakar Blvd', 'Montreal', 'QC', 'H1H1F8', '514-300-0044', 's.mane@cm.com', 150, 45, 'Boy'),
('Roberto', 'Firmino', '300000045', 'CM45', '2012-10-02', '145 Maceio Ln', 'Montreal', 'QC', 'H1H1F9', '514-300-0045', 'r.firmino@cm.com', 150, 45, 'Boy'),
('Thiago', 'Alcantara', '300000046', 'CM46', '2012-04-11', '146 Barca Pl', 'Montreal', 'QC', 'H1H1G1', '514-300-0046', 't.alcantara@cm.com', 150, 45, 'Boy'),
('Diogo', 'Jota', '300000047', 'CM47', '2012-12-04', '147 Porto Dr', 'Montreal', 'QC', 'H1H1G2', '514-300-0047', 'd.jota@cm.com', 150, 45, 'Boy'),
('Luis', 'Diaz', '300000048', 'CM48', '2012-01-13', '148 Barrancas Ave', 'Montreal', 'QC', 'H1H1G3', '514-300-0048', 'l.diaz@cm.com', 150, 45, 'Boy'),
('Cody', 'Gakpo', '300000049', 'CM49', '2012-05-07', '149 PSV St', 'Montreal', 'QC', 'H1H1G4', '514-300-0049', 'c.gakpo@cm.com', 150, 45, 'Boy'),
('Darwin', 'Nunez', '300000050', 'CM50', '2012-06-24', '150 Artigas Blvd', 'Montreal', 'QC', 'H1H1G5', '514-300-0050', 'd.nunez@cm.com', 150, 45, 'Boy');

-- 9. Major and Minor
-- INSERT INTO Minor (membership_number) VALUES 
-- (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(30),(31),(32),(33),(34),(35),(36),(37),(38),(39),(40),(41),(42),(43),(44),(45),(46),(47),(48),(49),(50);

-- INSERT INTO Major (membership_number) VALUES (27), (28), (29);

-- 10. MemberLocation (Using NULL for active end_date)
INSERT INTO MemberLocation (membership_number, location_id, start_date, end_date) VALUES 
(1, 1, '2024-01-01', NULL), (2, 1, '2024-01-01', NULL),
(3, 1, '2024-01-01', NULL), (4, 1, '2024-01-01', NULL),
(5, 1, '2024-01-01', NULL), (6, 1, '2024-01-01', NULL),
(7, 1, '2024-01-01', NULL), (8, 1, '2024-01-01', NULL),
(9, 1, '2024-01-01', NULL), (10, 1, '2024-01-01', NULL),
(11, 1, '2024-01-01', NULL), (12, 1, '2024-01-01', NULL),
(13, 2, '2024-01-01', NULL), (14, 2, '2024-01-01', NULL),
(15, 2, '2024-01-01', NULL), (16, 2, '2024-01-01', NULL),
(17, 2, '2024-01-01', NULL), (18, 2, '2024-01-01', NULL),
(19, 2, '2024-01-01', NULL), (20, 2, '2024-01-01', NULL),
(21, 2, '2024-01-01', NULL), (22, 2, '2024-01-01', NULL),
(23, 2, '2024-01-01', NULL), (24, 2, '2024-01-01', NULL),
(25, 1, '2024-01-01', NULL), (26, 1, '2024-01-01', NULL),
(27, 1, '2010-01-01', NULL), (28, 1, '2024-01-01', NULL),
(29, 1, '2024-01-01', NULL), (30, 1, '2024-01-01', NULL),
(31, 1, '2024-01-01', NULL), (32, 2, '2024-01-01', NULL),
(33, 2, '2024-01-01', NULL), (34, 3, '2024-01-01', NULL),
(35, 3, '2024-01-01', NULL), (36, 1, '2024-01-01', NULL),
(37, 3, '2024-01-01', NULL), (38, 3, '2024-01-01', NULL), 
(39, 4, '2024-01-01', NULL), (40, 4, '2024-01-01', NULL), 
(41, 4, '2024-01-01', NULL), (42, 5, '2024-01-01', NULL),
(43, 5, '2024-01-01', NULL), (44, 5, '2024-01-01', NULL), 
(45, 6, '2024-01-01', NULL), (46, 6, '2024-01-01', NULL), 
(47, 6, '2024-01-01', NULL), (48, 7, '2024-01-01', NULL),
(49, 7, '2024-01-01', NULL), (50, 7, '2024-01-01', NULL);

-- 11. RelatedTo
INSERT INTO RelatedTo (family_member_id, membership_number, relationship_type) VALUES
(1, 30, 'Father'), (1, 31, 'Father'), 
(2, 32, 'Mother'), (2, 33, 'Mother'), 
(3, 34, 'Father'), (3, 35, 'Father'), 
(4, 1, 'Mother'),  (5, 2, 'Father');

-- 12. Teams and PlaysAt
INSERT INTO Team (name, gender_category) VALUES
('Red Devils', 'Boy'), ('Gunners', 'Boy'),
('Thorns', 'Girl'), ('Spirit', 'Girl');

INSERT INTO PlaysAt (team_id, location_id) VALUES
(1, 1), (2, 1), (3, 2), (4, 2);

-- 13. Team Sessions
INSERT INTO TeamSession (session_type, date, start_time, address) VALUES
('Game', '2025-02-01', '10:00:00', '4141 Pierre-de Coubertin Ave'), 
('Game', '2025-02-08', '10:00:00', '4141 Pierre-de Coubertin Ave'), 
('Game', '2025-02-15', '10:00:00', '4141 Pierre-de Coubertin Ave'), 
('Game', '2025-02-22', '10:00:00', '4141 Pierre-de Coubertin Ave'), 
('Game', '2025-03-01', '10:00:00', '4141 Pierre-de Coubertin Ave'), 
('Game', '2025-02-01', '14:00:00', '4750 Sherbrooke St E'), 
('Game', '2025-02-08', '14:00:00', '4750 Sherbrooke St E'), 
('Game', '2025-02-15', '14:00:00', '4750 Sherbrooke St E'), 
('Game', '2025-02-22', '14:00:00', '4750 Sherbrooke St E'); 

-- 14. Team Formation
INSERT INTO TeamFormation (team_id, session_id, coach_id, score) VALUES
(1, 1, 17, 3), (2, 1, 8,  0),
(1, 2, 17, 2), (2, 2, 8,  1), 
(1, 3, 17, 1), (2, 3, 8,  0),
(1, 4, 17, 4), (2, 4, 8,  2),
(1, 5, 17, 2), (2, 5, 8,  0),
(3, 6, 18, 2), (4, 6, 9,  1),
(3, 7, 18, 3), (4, 7, 9,  1),
(3, 8, 18, 1), (4, 8, 9,  0),
(3, 9, 18, 2), (4, 9, 9,  1);

-- 15. Team Player
INSERT INTO TeamPlayer (team_id, session_id, membership_number, position) VALUES
(1,1,1,'Goalkeeper'), (1,1,2,'Right Fullback'), (1,1,3,'Center Back'), (1,1,4,'Sweeper'), (1,1,5,'Striker'), (1,1,6,'Left Winger'),
(2,1,7,'Goalkeeper'), (2,1,8,'Right Fullback'), (2,1,9,'Center Back'), (2,1,10,'Sweeper'),(2,1,11,'Striker'),(2,1,12,'Left Winger'),
(1,2,1,'Goalkeeper'), (1,2,2,'Right Fullback'), (1,2,3,'Center Back'), (1,2,4,'Sweeper'), (1,2,5,'Striker'), (1,2,6,'Left Winger'),
(2,2,7,'Goalkeeper'), (2,2,8,'Right Fullback'), (2,2,9,'Center Back'), (2,2,10,'Sweeper'),(2,2,11,'Striker'),(2,2,36,'Left Winger'), 
(1,3,1,'Goalkeeper'), (1,3,2,'Right Fullback'), (1,3,3,'Center Back'), (1,3,4,'Sweeper'), (1,3,5,'Striker'), (1,3,6,'Left Winger'),
(2,3,7,'Goalkeeper'), (2,3,8,'Right Fullback'), (2,3,9,'Center Back'), (2,3,10,'Sweeper'),(2,3,11,'Striker'),(2,3,36,'Left Winger'), 
(1,4,1,'Goalkeeper'), (1,4,2,'Right Fullback'), (1,4,3,'Center Back'), (1,4,4,'Sweeper'), (1,4,5,'Striker'), (1,4,6,'Left Winger'),
(2,4,7,'Goalkeeper'), (2,4,8,'Right Fullback'), (2,4,9,'Center Back'), (2,4,10,'Sweeper'),(2,4,11,'Striker'),(2,4,36,'Left Winger'),
(1,5,1,'Goalkeeper'), (1,5,2,'Right Fullback'), (1,5,3,'Center Back'), (1,5,4,'Sweeper'), (1,5,5,'Striker'), (1,5,6,'Left Winger'),
(2,5,7,'Goalkeeper'), (2,5,8,'Right Fullback'), (2,5,9,'Center Back'), (2,5,10,'Sweeper'),(2,5,11,'Striker'),(2,5,36,'Left Winger'),
(3,6,28,'Goalkeeper'), (3,6,14,'Right Fullback'),(3,6,15,'Center Back'),(3,6,16,'Sweeper'),(3,6,17,'Striker'),(3,6,18,'Left Winger'), 
(4,6,19,'Goalkeeper'), (4,6,20,'Right Fullback'),(4,6,21,'Center Back'),(4,6,22,'Sweeper'),(4,6,23,'Striker'),(4,6,24,'Left Winger'),
(3,7,28,'Goalkeeper'), (3,7,14,'Right Fullback'),(3,7,15,'Center Back'),(3,7,16,'Sweeper'),(3,7,17,'Striker'),(3,7,18,'Left Winger'),
(4,7,19,'Goalkeeper'), (4,7,20,'Right Fullback'),(4,7,21,'Center Back'),(4,7,22,'Sweeper'),(4,7,23,'Striker'),(4,7,24,'Left Winger'),
(3,8,28,'Goalkeeper'), (3,8,14,'Right Fullback'),(3,8,15,'Center Back'),(3,8,16,'Sweeper'),(3,8,17,'Striker'),(3,8,18,'Left Winger'),
(4,8,19,'Goalkeeper'), (4,8,20,'Right Fullback'),(4,8,21,'Center Back'),(4,8,22,'Sweeper'),(4,8,23,'Striker'),(4,8,24,'Left Winger'),
(3,9,28,'Goalkeeper'), (3,9,14,'Right Fullback'),(3,9,15,'Center Back'),(3,9,16,'Sweeper'),(3,9,17,'Striker'),(3,9,18,'Left Winger'),
(4,9,19,'Goalkeeper'), (4,9,20,'Right Fullback'),(4,9,21,'Center Back'),(4,9,22,'Sweeper'),(4,9,23,'Striker'),(4,9,24,'Left Winger');

-- Cycle CM29 to satisfy Q16
UPDATE TeamPlayer SET membership_number = 29 WHERE team_id=1 AND session_id=1 AND position='Goalkeeper';
UPDATE TeamPlayer SET membership_number = 29 WHERE team_id=1 AND session_id=2 AND position='Right Fullback';
UPDATE TeamPlayer SET membership_number = 29 WHERE team_id=1 AND session_id=3 AND position='Sweeper';
UPDATE TeamPlayer SET membership_number = 29 WHERE team_id=1 AND session_id=4 AND position='Center Back';
UPDATE TeamPlayer SET membership_number = 29 WHERE team_id=1 AND session_id=5 AND position='Striker';

-- 16. FIFA Games & ParticipatedIn
INSERT INTO FifaGame (date, location, score) VALUES
('2023-01-01', 'Wembley Stadium', '1-0'), ('2023-02-01', 'Camp Nou', '2-0'),
('2024-03-01', 'Anfield', '1-1'), ('2024-04-01', 'Old Trafford', '3-0'),
('2025-05-01', 'Santiago Bernabeu', '0-0');

INSERT INTO ParticipatedIn (membership_number, game_id, team_name, opponent) VALUES
(25, 1, 'Real Madrid', 'Barcelona'), (25, 2, 'Real Madrid', 'Barcelona'), (25, 3, 'Real Madrid', 'Barcelona'), (25, 4, 'Real Madrid', 'Barcelona'), (25, 5, 'Real Madrid', 'Barcelona'),
(26, 1, 'Real Madrid', 'Barcelona'), 
(30, 1, 'Real Madrid', 'Barcelona'), (31, 1, 'Real Madrid', 'Barcelona'), 
(32, 2, 'Real Madrid', 'Barcelona'), (33, 2, 'Real Madrid', 'Barcelona'), 
(34, 3, 'Real Madrid', 'Barcelona'), (35, 3, 'Real Madrid', 'Barcelona');

-- 17. Fill out non-null Ancillary Tables
INSERT INTO Hobby (hobby_name) VALUES ('Video Games'), ('Reading'), ('Cycling');
INSERT INTO Likes (membership_number, hobby_id) VALUES (1, 1), (2, 2), (3, 3);
INSERT INTO Payment (membership_number, payment_date, amount, payment_method, payment_year_target, installment_number) VALUES
(1, '2026-01-01', 100.00, 'Cash', 2026, 1), (2, '2026-01-01', 100.00, 'Cash', 2026, 1);