#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: DZOPD_users
#------------------------------------------------------------

CREATE TABLE DZOPD_users(
        id             Int NOT NULL ,
        password       Varchar NOT NULL ,
        name           Varchar NOT NULL ,
        mail           Varchar NOT NULL ,
        age            Int NOT NULL ,
        gender         Varchar (50) NOT NULL ,
        forgetPassword Char (13) NOT NULL ,
        role           Int NOT NULL ,
        id_ODKLM_books Int NOT NULL ,
        id_Favorites   Int
	,CONSTRAINT DZOPD_users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ODKLM_books
#------------------------------------------------------------

CREATE TABLE ODKLM_books(
        id                 Int NOT NULL ,
        name               Varchar NOT NULL ,
        cover              Varchar NOT NULL ,
        date               Datetime NOT NULL ,
        ISBN               Int NOT NULL ,
        resume             Varchar NOT NULL ,
        id_UEOIO_comments  Int NOT NULL ,
        id_KMIPOO_notation Int NOT NULL
	,CONSTRAINT ODKLM_books_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VNBIOPS_typeofbooks
#------------------------------------------------------------

CREATE TABLE VNBIOPS_typeofbooks(
        id               Int NOT NULL ,
        name             Varchar NOT NULL ,
        id_KMIFKM_author Int NOT NULL
	,CONSTRAINT VNBIOPS_typeofbooks_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KMIFKM_author
#------------------------------------------------------------

CREATE TABLE KMIFKM_author(
        id             Int NOT NULL ,
        lastname       Varchar NOT NULL ,
        firstname      Varchar (50) NOT NULL ,
        dateOfBirth    Date NOT NULL ,
        dateOfDeath    Date NOT NULL ,
        id_ODKLM_books Int NOT NULL
	,CONSTRAINT KMIFKM_author_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: QZOFK_Literary movement
#------------------------------------------------------------

CREATE TABLE QZOFK_Literary_movement(
        id             Int NOT NULL ,
        name           Varchar NOT NULL ,
        id_ODKLM_books Int NOT NULL
	,CONSTRAINT QZOFK_Literary_movement_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UEOIO_comments
#------------------------------------------------------------

CREATE TABLE UEOIO_comments(
        id             Int NOT NULL ,
        hour           Time NOT NULL ,
        date           Datetime NOT NULL ,
        message        Text NOT NULL ,
        idComments     Int NOT NULL ,
        id_DZOPD_users Int NOT NULL
	,CONSTRAINT UEOIO_comments_AK UNIQUE (idComments)
	,CONSTRAINT UEOIO_comments_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KMIPOO_notation
#------------------------------------------------------------

CREATE TABLE KMIPOO_notation(
        id             Int NOT NULL ,
        notation       Int NOT NULL ,
        id_DZOPD_users Int NOT NULL
	,CONSTRAINT KMIPOO_notation_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Favorites
#------------------------------------------------------------

CREATE TABLE Favorites(
        id             Int NOT NULL ,
        id_ODKLM_books Int NOT NULL
	,CONSTRAINT Favorites_PK PRIMARY KEY (id)
)ENGINE=InnoDB;




ALTER TABLE DZOPD_users
	ADD CONSTRAINT DZOPD_users_ODKLM_books0_FK
	FOREIGN KEY (id_ODKLM_books)
	REFERENCES ODKLM_books(id);

ALTER TABLE DZOPD_users
	ADD CONSTRAINT DZOPD_users_Favorites1_FK
	FOREIGN KEY (id_Favorites)
	REFERENCES Favorites(id);

ALTER TABLE ODKLM_books
	ADD CONSTRAINT ODKLM_books_UEOIO_comments0_FK
	FOREIGN KEY (id_UEOIO_comments)
	REFERENCES UEOIO_comments(id);

ALTER TABLE ODKLM_books
	ADD CONSTRAINT ODKLM_books_KMIPOO_notation1_FK
	FOREIGN KEY (id_KMIPOO_notation)
	REFERENCES KMIPOO_notation(id);

ALTER TABLE VNBIOPS_typeofbooks
	ADD CONSTRAINT VNBIOPS_typeofbooks_KMIFKM_author0_FK
	FOREIGN KEY (id_KMIFKM_author)
	REFERENCES KMIFKM_author(id);

ALTER TABLE KMIFKM_author
	ADD CONSTRAINT KMIFKM_author_ODKLM_books0_FK
	FOREIGN KEY (id_ODKLM_books)
	REFERENCES ODKLM_books(id);

ALTER TABLE QZOFK_Literary_movement
	ADD CONSTRAINT QZOFK_Literary_movement_ODKLM_books0_FK
	FOREIGN KEY (id_ODKLM_books)
	REFERENCES ODKLM_books(id);

ALTER TABLE UEOIO_comments
	ADD CONSTRAINT UEOIO_comments_DZOPD_users0_FK
	FOREIGN KEY (id_DZOPD_users)
	REFERENCES DZOPD_users(id);

ALTER TABLE KMIPOO_notation
	ADD CONSTRAINT KMIPOO_notation_DZOPD_users0_FK
	FOREIGN KEY (id_DZOPD_users)
	REFERENCES DZOPD_users(id);

ALTER TABLE Favorites
	ADD CONSTRAINT Favorites_ODKLM_books0_FK
	FOREIGN KEY (id_ODKLM_books)
	REFERENCES ODKLM_books(id);
