CREATE DATABASE WEBS2;
Use WEBS2;

CREATE TABLE membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    date_naissance DATE,
    genre ENUM('H','F'),
    email VARCHAR(100),
    ville VARCHAR(50),
    mdp VARCHAR(255),
    image_profil VARCHAR(100)
);

CREATE TABLE categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

CREATE TABLE images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(100),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
);

CREATE TABLE emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

INSERT INTO membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Ali', '1995-03-10', 'H', 'ali@mail.com', 'Tana', 'pass1', 'ali.jpg'),
('Sara', '1998-07-21', 'F', 'sara@mail.com', 'Fianarantsoa', 'pass2', 'sara.jpg'),
('Marc', '1990-11-05', 'H', 'marc@mail.com', 'Majunga', 'pass3', 'marc.jpg'),
('Lina', '2000-02-28', 'F', 'lina@mail.com', 'Tamatave', 'pass4', 'lina.jpg');

INSERT INTO categorie_objet (nom_categorie) VALUES
('esthetique'),
('bricolage'),
('mecanique'),
('cuisine');

-- 10 objets pour Ali (id_membre = 1)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('peigne', 1, 1), ('miroir', 1, 1), ('tournevis', 2, 1), ('marteau', 2, 1),
('cle plate', 3, 1), ('cle a molette', 3, 1), ('poele', 4, 1), ('mixeur', 4, 1),
('trousse maquillage', 1, 1), ('brosse a cheveux', 1, 1);

-- 10 objets pour Sara (id_membre = 2)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('fer a lisser', 1, 2), ('lime a ongles', 1, 2), ('perceuse', 2, 2), ('clou', 2, 2),
('cric', 3, 2), ('cle dynamometrique', 3, 2), ('moule gateau', 4, 2), ('balance', 4, 2),
('palette maquillage', 1, 2), ('epilateur', 1, 2);

-- 10 objets pour Marc (id_membre = 3)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('pinceau peinture', 2, 3), ('visseuse', 2, 3), ('tournevis plat', 2, 3), ('compresseur', 3, 3),
('cle allen', 3, 3), ('poele wok', 4, 3), ('four electrique', 4, 3), ('grille pain', 4, 3),
('tondeuse', 1, 3), ('shampoing', 1, 3);

-- 10 objets pour Lina (id_membre = 4)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('rouge a levre', 1, 4), ('fard a paupieres', 1, 4), ('scie', 2, 4), ('niveau', 2, 4),
('pneu', 3, 4), ('pompe', 3, 4), ('robot cuisine', 4, 4), ('mixer', 4, 4),
('parfum', 1, 4), ('crayon yeux', 1, 4);

INSERT INTO emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-07'),
(3, 3, '2025-07-02', '2025-07-08'),
(5, 4, '2025-07-03', '2025-07-09'),
(12, 1, '2025-07-04', '2025-07-10'),
(14, 3, '2025-07-05', '2025-07-11'),
(18, 1, '2025-07-06', '2025-07-12'),
(24, 2, '2025-07-07', '2025-07-13'),
(27, 4, '2025-07-08', '2025-07-14'),
(33, 1, '2025-07-09', '2025-07-15'),
(35, 2, '2025-07-10', '2025-07-16');

