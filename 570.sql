--script to create the tables

CREATE TABLE users(
	id number(10) PRIMARY KEY AUTO_INCREMENT
	fname varchar2(255) NOT NULL
	lname varchar2(255) NOT NULL
	age number(2) NOT NULL
	quote varchar2(255)
);

CREATE TABLE collections(
	id number(10) PRIMARY KEY AUTO_INCREMENT
	u_id number(10) FOREIGN KEY REFERENCES users (id)
	c_name varchar2(255) NOT NULL
	c_desc varchar2(255)	
	adult boolean NOT NULL
);

CREATE TABLE books(
	id number(10) PRIMARY KEY
	title varchar2(255) NOT NULL
	auth varchar2(255) NOT NULL
	isbn varchar2(255)
	adult boolean NOT NULL
);

CREATE TABLE coll_book(
	id number(10) PRIMARY KEY
	book_id FOREIGN KEY REFERENCES books (id)
	c_id FOREIGN KEY REFERENCES collections (id)
);

CREATE TABLE movies(
	id number(10) PRIMARY KEY
	title varchar2(255) NOT NULL
	rating varchar(5) NOT NULL
	format varchar2(255) NOT NULL
	sumry varchar2(255)
	adult boolean NOT NULL
);

CREATE TABLE coll_movie(
	id number(10) PRIMARY KEY
	m_id FOREIGN KEY REFERENCES movies (id)
	c_id FOREIGN KEY REFERENCES collections (id)
);

CREATE TABLE cds(
	id number(10) PRIMARY KEY
	title varchar2(255) NOT NULL
	artist varchar2(255) NOT NULL
	genre varchar2(255)
	adult boolean NOT NULL
);

CREATE TABLE coll_cd(
	id number(10) PRIMARY KEY
	cd_id FOREIGN KEY REFERENCES cds (id)
	c_id FOREIGN KEY REFERENCES collections (id)
);


