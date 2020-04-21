CREATE TABLE users(
	id int PRIMARY KEY AUTO_INCREMENT,
	username varchar(20) NOT NULL,
	password varchar(20) NOT NULL
);
CREATE TABLE messages(
	id int,
	messages varchar(200),
	time TIMESTAMP,
	FOREIGN KEY (id) REFERENCES users(id)
);
INSERT INTO users(id,username,password) VALUES(1,'user1','user1');
INSERT INTO users(id,username,password) VALUES(2,'user2','user2');