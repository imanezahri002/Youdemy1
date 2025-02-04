CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'etudiant', 'enseignant') NOT NULL
);

CREATE TABLE Cours (
    id INT AUTO_INCREMENT PRIMARY KEY,   
    titre VARCHAR(255) NOT NULL,              
    contenu TEXT NOT NULL,                     
    description TEXT,                          
    user_id INT,                               
    FOREIGN KEY (user_id) REFERENCES user(id) 
);
--table categorie
CREATE TABLE categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,        
    id_cours INT,                       
    FOREIGN KEY (id_cours) REFERENCES cours(id)  
);
--table tag
CREATE TABLE tag(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL
);
--add champ type dans table cours
ALTER TABLE cours
ADD COLUMN type ENUM('video','document');

--add table coursTag
CREATE TABLE coursTag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idcours INT,
    idtag INT,
    FOREIGN KEY (idcours) REFERENCES cours(id),
    FOREIGN KEY (idtag) REFERENCES tag(id)
);
--add column image 
ALTER TABLE cours
ADD COLUMN image VARCHAR(255) NOT NULL;
-- add champ price 
ALTER TABLE cours
ADD COLUMN prix DECIMAL(4,2) NOT NULL;
--add champ id_category 
ALTER TABLE cours
ADD CONSTRAINT fk_cours_categorie
FOREIGN KEY (category_id)
REFERENCES categorie(id);
--supprimer cours et tag 
ALTER TABLE courstag
ADD CONSTRAINT fk_cours_id
FOREIGN KEY (idcours)
REFERENCES cours(id)
ON DELETE CASCADE;

--table inscription
CREATE TABLE subscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    cours_id INT,
    FOREIGN KEY (student_id) REFERENCES user(id),
    FOREIGN KEY (cours_id) REFERENCES cours(id)
);