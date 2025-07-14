

CREATE TABLE EXAM_S2_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    date_naissance DATE,
    genre VARCHAR(10),
    email VARCHAR(100),
    ville VARCHAR(50),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE TABLE EXAM_S2_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(255)
);

CREATE TABLE EXAM_S2_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES EXAM_S2_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES EXAM_S2_membre(id_membre)
);

CREATE TABLE EXAM_S2_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES EXAM_S2_objet(id_objet)
);

CREATE TABLE EXAM_S2_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES EXAM_S2_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES EXAM_S2_membre(id_membre)
);



INSERT INTO EXAM_S2_membre VALUES
(1, 'Alice Dupont', '1990-01-15', 'Femme', 'alice@gmail.com', 'Paris', 'pass1', 'alice.jpg'),
(2, 'Bob Martin', '1985-06-23', 'Homme', 'bob@gmail.com', 'Lyon', 'pass2', 'bob.jpg'),
(3, 'Carla Lopez', '1992-11-08', 'Femme', 'carla@gmail.com', 'Marseille', 'pass3', 'carla.jpg'),
(4, 'David Noël', '1988-03-12', 'Homme', 'david@gmail.com', 'Toulouse', 'pass4', 'david.jpg');

-- Données des catégories

INSERT INTO EXAM_S2_categorie_objet VALUES
(1, 'Esthétique'),
(2, 'Bricolage'),
(3, 'Mécanique'),
(4, 'Cuisine');


INSERT INTO EXAM_S2_objet VALUES
-- Objets de Alice (1)
(1, 'Sèche-cheveux', 1, 1),
(2, 'Fer à lisser', 1, 1),
(3, 'Perceuse', 2, 1),
(4, 'Tournevis', 2, 1),
(5, 'Clé à molette', 3, 1),
(6, 'Pompe à vélo', 3, 1),
(7, 'Mixeur', 4, 1),
(8, 'Blender', 4, 1),
(9, 'Batteur électrique', 4, 1),
(10, 'Pinceau maquillage', 1, 1),

-- Objets de Bob (2)
(11, 'Tondeuse', 1, 2),
(12, 'Scie sauteuse', 2, 2),
(13, 'Marteau', 2, 2),
(14, 'Clé anglaise', 3, 2),
(15, 'Compresseur', 3, 2),
(16, 'Robot pâtissier', 4, 2),
(17, 'Friteuse', 4, 2),
(18, 'Cuiseur vapeur', 4, 2),
(19, 'Tapis de coupe', 2, 2),
(20, 'Brosse barbe', 1, 2),

-- Objets de Carla (3)
(21, 'Miroir lumineux', 1, 3),
(22, 'Perceuse sans fil', 2, 3),
(23, 'Tournevis électrique', 2, 3),
(24, 'Clé dynamométrique', 3, 3),
(25, 'Pompe manuelle', 3, 3),
(26, 'Batidora', 4, 3),
(27, 'Casserole', 4, 3),
(28, 'Fouet inox', 4, 3),
(29, 'Pince épiler', 1, 3),
(30, 'Lime à ongles', 1, 3),

-- Objets de David (4)
(31, 'Trimmer', 1, 4),
(32, 'Perforateur', 2, 4),
(33, 'Marteau piqueur', 2, 4),
(34, 'Crics', 3, 4),
(35, 'Pompe électrique', 3, 4),
(36, 'Mixeur plongeant', 4, 4),
(37, 'Balance cuisine', 4, 4),
(38, 'Couteau chef', 4, 4),
(39, 'Brosse cheveux', 1, 4),
(40, 'Ciseaux coupe', 1, 4);

-- Données des emprunts 

INSERT INTO EXAM_S2_emprunt VALUES
(1, 3, 2, '2025-07-01', '2025-07-10'),
(2, 5, 3, '2025-07-02', '2025-07-12'),
(3, 11, 1, '2025-07-03', '2025-07-15'),
(4, 22, 4, '2025-07-04', '2025-07-14'),
(5, 27, 1, '2025-07-05', '2025-07-13'),
(6, 30, 2, '2025-07-06', '2025-07-16'),
(7, 35, 3, '2025-07-07', '2025-07-17'),
(8, 38, 2, '2025-07-08', '2025-07-18'),
(9, 7, 4, '2025-07-09', '2025-07-19'),
(10, 15, 1, '2025-07-10', '2025-07-20');

