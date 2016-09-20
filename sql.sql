#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Creation
#------------------------------------------------------------

CREATE TABLE Creation(
        id_creation int (11) Auto_increment  NOT NULL ,
        title       Varchar (255) ,
        slug        Varchar (255) ,
        file        Varchar (255) ,
        link        Varchar (255) ,
        description Text ,
        created_at  Datetime ,
        updated_at  Datetime ,
        id_user     Int ,
        id_category Int ,
        PRIMARY KEY (id_creation ) ,
        UNIQUE (title ,slug )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user            int (11) Auto_increment  NOT NULL ,
        username           Varchar (255) ,
        username_canonical Varchar (255) ,
        password           Varchar (120) ,
        last_login         Datetime ,
        email              Varchar (255) ,
        enabled            Bool ,
        created_at         Datetime ,
        PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        id_category int (11) Auto_increment  NOT NULL ,
        title       Varchar (255) ,
        slug        Varchar (255) ,
        PRIMARY KEY (id_category )
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


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        content     Text ,
        created_at  Datetime ,
        updated_at  Datetime ,
        id_creation Int NOT NULL ,
        id_user     Int NOT NULL ,
        PRIMARY KEY (id_creation ,id_user )
)ENGINE=InnoDB;

ALTER TABLE Creation ADD CONSTRAINT FK_Creation_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE Creation ADD CONSTRAINT FK_Creation_id_category FOREIGN KEY (id_category) REFERENCES Category(id_category);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_creation FOREIGN KEY (id_creation) REFERENCES Creation(id_creation);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
ALTER TABLE comment ADD CONSTRAINT FK_comment_id_creation FOREIGN KEY (id_creation) REFERENCES Creation(id_creation);
ALTER TABLE comment ADD CONSTRAINT FK_comment_id_user FOREIGN KEY (id_user) REFERENCES User(id_user);
