CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

--given below are table names and above is template--
--students login--
Xllauser
Xllbuser
Xllcuser
Xlld1user
Xlld2user

--teachers student data--
xiiastud
xiibstud
xiicstud
xiid1stud
xiid2stud

--teachers login--
teachers


