#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: TYPE
#------------------------------------------------------------

CREATE TABLE TYPE(
        id_type   Int  Auto_increment  NOT NULL ,
        type_name Varchar (50) NOT NULL
	,CONSTRAINT TYPE_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PERSON
#------------------------------------------------------------

CREATE TABLE PERSON(
        id_person        Int  Auto_increment  NOT NULL ,
        person_lastname  Varchar (50) NOT NULL ,
        person_firstname Varchar (50) NOT NULL ,
        gender           Varchar (50) NOT NULL ,
        dateOfBirth      Date NOT NULL
	,CONSTRAINT PERSON_PK PRIMARY KEY (id_person)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DIRECTOR
#------------------------------------------------------------

CREATE TABLE DIRECTOR(
        id_person        Int NOT NULL ,
        id_director      Int NOT NULL ,
        person_lastname  Varchar (50) NOT NULL ,
        person_firstname Varchar (50) NOT NULL ,
        gender           Varchar (50) NOT NULL ,
        dateOfBirth      Date NOT NULL
	,CONSTRAINT DIRECTOR_PK PRIMARY KEY (id_person,id_director)

	,CONSTRAINT DIRECTOR_PERSON_FK FOREIGN KEY (id_person) REFERENCES PERSON(id_person)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOVIE
#------------------------------------------------------------

CREATE TABLE MOVIE(
        id_movie    Int  Auto_increment  NOT NULL ,
        movie_title Varchar (50) NOT NULL ,
        duration    Int NOT NULL ,
        synopsis    Text NOT NULL ,
        releaseYear Int NOT NULL ,
        rating      Int NOT NULL ,
        poster      Varchar (255) NOT NULL ,
        cover       Varchar (255) NOT NULL ,
        id_person   Int NOT NULL ,
        id_director Int NOT NULL
	,CONSTRAINT MOVIE_PK PRIMARY KEY (id_movie)

	,CONSTRAINT MOVIE_DIRECTOR_FK FOREIGN KEY (id_person,id_director) REFERENCES DIRECTOR(id_person,id_director)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ACTOR
#------------------------------------------------------------

CREATE TABLE ACTOR(
        id_person        Int NOT NULL ,
        id_actor         Int NOT NULL ,
        person_lastname  Varchar (50) NOT NULL ,
        person_firstname Varchar (50) NOT NULL ,
        gender           Varchar (50) NOT NULL ,
        dateOfBirth      Date NOT NULL
	,CONSTRAINT ACTOR_PK PRIMARY KEY (id_person,id_actor)

	,CONSTRAINT ACTOR_PERSON_FK FOREIGN KEY (id_person) REFERENCES PERSON(id_person)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ROLE
#------------------------------------------------------------

CREATE TABLE ROLE(
        id_role   Int  Auto_increment  NOT NULL ,
        role_name Varchar (50) NOT NULL
	,CONSTRAINT ROLE_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: movie_type
#------------------------------------------------------------

CREATE TABLE movie_type(
        id_type  Int NOT NULL ,
        id_movie Int NOT NULL
	,CONSTRAINT movie_type_PK PRIMARY KEY (id_type,id_movie)

	,CONSTRAINT movie_type_TYPE_FK FOREIGN KEY (id_type) REFERENCES TYPE(id_type)
	,CONSTRAINT movie_type_MOVIE0_FK FOREIGN KEY (id_movie) REFERENCES MOVIE(id_movie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: casting
#------------------------------------------------------------

CREATE TABLE casting(
        id_movie  Int NOT NULL ,
        id_role   Int NOT NULL ,
        id_person Int NOT NULL ,
        id_actor  Int NOT NULL
	,CONSTRAINT casting_PK PRIMARY KEY (id_movie,id_role,id_person,id_actor)

	,CONSTRAINT casting_MOVIE_FK FOREIGN KEY (id_movie) REFERENCES MOVIE(id_movie)
	,CONSTRAINT casting_ROLE0_FK FOREIGN KEY (id_role) REFERENCES ROLE(id_role)
	,CONSTRAINT casting_ACTOR1_FK FOREIGN KEY (id_person,id_actor) REFERENCES ACTOR(id_person,id_actor)
)ENGINE=InnoDB;

