#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Creation
#------------------------------------------------------------

CREATE TABLE Creation(
        id_creation int (11) Auto_increment  NOT NULL ,
        title       Varchar (255) NOT NULL ,
        slug        Varchar (255) NOT NULL ,
        file        Varchar (255) NOT NULL ,
        link        Varchar (255) ,
        description Text ,
        created_at  Datetime NOT NULL ,
        updated_at  Datetime ,
        id_user     Int NOT NULL ,
        id_category Int NOT NULL ,
        PRIMARY KEY (id_creation ) ,
        UNIQUE (title ,slug ,link )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user            int (11) Auto_increment  NOT NULL ,
        username           Varchar (255) NOT NULL ,
        username_canonical Varchar (255) NOT NULL ,
        password           Varchar (120) NOT NULL ,
        last_login         Datetime ,
        email              Varchar (255) NOT NULL ,
        enabled            Bool ,
        created_at         Datetime NOT NULL ,
        PRIMARY KEY (id_user ) ,
        UNIQUE (username ,username_canonical ,email )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        id_category int (11) Auto_increment  NOT NULL ,
        title       Varchar (255) NOT NULL ,
        slug        Varchar (255) NOT NULL ,
        PRIMARY KEY (id_category ) ,
        UNIQUE (title ,slug )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

CREATE TABLE Comment(
        id_comment   int (11) Auto_increment  NOT NULL ,
        content      Text NOT NULL ,
        created_at   Datetime NOT NULL ,
        updated_at   Datetime ,
        id_user     Int NOT NULL ,
        id_creation Int NOT NULL ,
        id_response Int ,
        PRIMARY KEY (id_comment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Note
#------------------------------------------------------------

CREATE TABLE Note(
        note        Int ,
        id_creation Int NOT NULL ,
        id_user     Int NOT NULL ,
        PRIMARY KEY (id_creation ,id_user )
)ENGINE=InnoDB;

ALTER TABLE Creation ADD CONSTRAINT FK_Creation_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE Creation ADD CONSTRAINT FK_Creation_id_category FOREIGN KEY (id_category) REFERENCES Category(id_category);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_id_comment_1 FOREIGN KEY (id_response) REFERENCES Comment(id_comment);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE Comment ADD CONSTRAINT FK_Comment_id_creation FOREIGN KEY (id_creation) REFERENCES Creation(id_creation);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_creation FOREIGN KEY (id_creation) REFERENCES Creation(id_creation);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);