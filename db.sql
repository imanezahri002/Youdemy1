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