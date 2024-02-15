CREATE TABLE IF NOT EXISTS internautes (
    email varchar(40) NOT NULL,
    mdp varchar(10) NOT NULL DEFAULT '1234567890',
    nom varchar(15) NOT NULL DEFAULT 'NA',
    prenom varchar(15) NOT NULL DEFAULT 'NA',
    phone INTEGER(10) NOT NULL ,
    CONSTRAINT internautes_pk PRIMARY KEY (email)
)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS trajets (
    idTrajet INT NOT NULL AUTO_INCREMENT,
    Vdep varchar(15) NOT NULL, 
    Varv varchar(15) NOT NULL,
    price integer(2) NOT NULL,

    CONSTRAINT trajets_pk PRIMARY KEY (idTrajet)
)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS covoiturages (
    idCovo INT NOT NULL AUTO_INCREMENT,
    idTrajet INT ,    
    email varchar(20) NOT NULL,
    datecovo date ,
    nbPlaces INTEGER(1) NOT NULL DEFAULT 1,
    CONSTRAINT covoiturages_pk PRIMARY KEY (idCovo),
    CONSTRAINT covoiturages_fk1 FOREIGN KEY (idTrajet)
        REFERENCES trajets (idTrajet),
    CONSTRAINT FK_mailu FOREIGN KEY (email)
        REFERENCES internautes (email)
)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS Transports (
    idTransport INTEGER(6) NOT NULL AUTO_INCREMENT,
    idCovo  int(6) NOT NULL  ,
    email varchar(20) NOT NULL ,
    CONSTRAINT Transports_pk PRIMARY KEY (idTransport),
    CONSTRAINT Transports_fk FOREIGN KEY (idCovo)
        REFERENCES covoiturages (idCovo),
    CONSTRAINT Transports_fk2 FOREIGN KEY (email)
        REFERENCES internautes (email)
)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


