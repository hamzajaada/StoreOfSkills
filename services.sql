DROP TABLE IF EXISTS User ; 
CREATE TABLE User (
	id BIGINT AUTO_INCREMENT NOT NULL, 
	nom VARCHAR(255), 
	prenom VARCHAR(255), 
	location VARCHAR(255), 	
	image VARCHAR(255), 
	email VARCHAR(255), 
	password VARCHAR(255), 
	PRIMARY KEY (id_User)
) ;  
DROP TABLE IF EXISTS Offre ; 
CREATE TABLE Offre (
	id BIGINT AUTO_INCREMENT NOT NULL, 
	type VARCHAR(255), 
	categorie VARCHAR(255), 
	offre VARCHAR(255), 
	image_offre VARCHAR(255), 
	id_User BIGINT NOT NULL, 
	PRIMARY KEY (id)
) ;  
DROP TABLE IF EXISTS consulter ; 
CREATE TABLE consulter (
	id_User BIGINT NOT NULL, 
	id_offre BIGINT NOT NULL, 
	PRIMARY KEY (id_User,  id_offre)
);  
ALTER TABLE Offre ADD CONSTRAINT FK_Offre_id_User FOREIGN KEY (id_User) REFERENCES User (id); 
ALTER TABLE consulter ADD CONSTRAINT FK_consulter_id_User FOREIGN KEY (id_User) REFERENCES User (id); 
ALTER TABLE consulter ADD CONSTRAINT FK_consulter_id_offre_Offre FOREIGN KEY (id_offre) REFERENCES Offre (id);
