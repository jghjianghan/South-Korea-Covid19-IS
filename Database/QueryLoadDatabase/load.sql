// directory adalah root folder import

LOAD DATA INFILE 'D:/CovidProject/Database/csv/Time.csv'
INTO TABLE Time
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(@date,confirmed,released,deceased)
SET date = STR_TO_DATE(@date, '%Y-%m-%d');


LOAD DATA INFILE 'D:/CovidProject/Database/csv/TimeProvince.csv'
INTO TABLE TimeProvince
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(@date,province_name,confirmed,released,deceased)
SET date = STR_TO_DATE(@date, '%Y-%m-%d');