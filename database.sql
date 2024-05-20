CREATE TABLE Rancho (

    ran_id SERIAL PRIMARY KEY, 
    ran_nombre VARCHAR(75),
    ran_menu VARCHAR (75),
    ran_fechayhora date,
    ran_tiempo VARCHAR (35),
    ran_nombresirvio VARCHAR (50),
    ran_situacion SMALLINT DEFAULT 1
);

select * from Rancho