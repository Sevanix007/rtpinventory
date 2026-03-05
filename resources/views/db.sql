
create database RTPINVENTORY;
use RTPINVENTORY;

CREATE TABLE Loma (
  LomaID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Nosaukums CHAR(20)  NOT NULL UNIQUE,
  PRIMARY KEY (LomaID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 

CREATE TABLE Darbinieks (
  DarbiniekaID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Vards CHAR(20) NOT NULL,
  Uzvards CHAR(20) NOT NULL,
  LietotajaVards CHAR(30) NOT NULL UNIQUE,
  Email CHAR(40) NOT NULL,
  Parole CHAR(50) NOT NULL,
  Loma SMALLINT,
  PRIMARY KEY (DarbiniekaID),
  FOREIGN KEY (Loma)
  REFERENCES Loma(LomaID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 

CREATE TABLE AuditTabula (
  AuditID INT NOT NULL UNIQUE AUTO_INCREMENT,
  DarbinieksID SMALLINT NOT NULL,
  Darbiba TEXT NOT NULL,
  TableName TEXT NOT NULL,
  VecaVertiba varchar(300) NOT NULL,
  JaunaVertiba varchar(300) NOT NULL,
  Laiks DATETIME NOT NULL,
  LauksID SMALLINT NOT NULL,
  PRIMARY KEY (AuditID),
  FOREIGN KEY (DarbinieksID)
  REFERENCES Darbinieks(DarbiniekaID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 

CREATE TABLE TehniskaisStavoklis (
  TehniskaisStavoklisID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Nosaukums CHAR(20) NOT NULL,
  PRIMARY KEY (TehniskaisStavoklisID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 


CREATE TABLE Telpa (
  TelpasID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Nosaukums CHAR(20) NOT NULL,
  Adrese CHAR(30),
  AtbildigaisID SMALLINT,
  PRIMARY KEY (TelpasID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 

CREATE TABLE Kategorija (
  KategorijasID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Nosaukums CHAR(20) NOT NULL,
  PRIMARY KEY (KategorijasID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 



CREATE TABLE Inventars (
  InventaraID SMALLINT NOT NULL UNIQUE AUTO_INCREMENT,
  Kategorija SMALLINT,
  IUIN CHAR(10) NOT NULL UNIQUE,
  Telpa SMALLINT,
  Atbildigais SMALLINT,
  TehniskaisStavoklis SMALLINT,
  attels blob,
  PRIMARY KEY (InventaraID),
  FOREIGN KEY (TehniskaisStavoklis)
      REFERENCES TehniskaisStavoklis(TehniskaisStavoklisID),
  FOREIGN KEY (Atbildigais)
      REFERENCES Darbinieks(DarbiniekaID),
  FOREIGN KEY (Telpa)
      REFERENCES Telpa(TelpasID),
  FOREIGN KEY (Kategorija)
      REFERENCES Kategorija(KategorijasID)
);