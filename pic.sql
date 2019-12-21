CREATE DATABASE pic;
USE pic;


CREATE TABLE IF NOT EXISTS users(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(1024) NOT NULL
);

CREATE TABLE IF NOT EXISTS pictures(
	pic_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	message VARCHAR(1000) NOT NULL,
	password VARCHAR(100) NOT NULL,
	pic LONGBLOB NOT NULL,
	user_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS history(
	pic_id INTEGER not null,
	datum DATE not null,
	user_id INTEGER,
	FOREIGN KEY(user_id) REFERENCES users(id),
	FOREIGN KEY(pic_id) REFERENCES pictures(pic_id)
);
