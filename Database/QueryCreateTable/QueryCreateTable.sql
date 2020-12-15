CREATE TABLE Admin(
	idAdmin int NOT NULL AUTO_INCREMENT,
	username varchar(20) NOT NULL,
	password varchar(20) NOT NULL,
	PRIMARY KEY(idAdmin)
);

CREATE TABLE Time(
	date DATE,
	confirmed int,
	released int,
	deceased int
);

CREATE TABLE TimeProvince(
	date DATE,
	province_name varchar(20),
	confirmed int,
	released int,
	deceased int
);
