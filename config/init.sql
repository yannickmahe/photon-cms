CREATE TABLE page (id INTEGER PRIMARY KEY, title STRING, url STRING, head_html TEXT, body_html TEXT);
	INSERT INTO page (title, url, head_html, body_html) VALUES ('Home','/','','Homepage');
	INSERT INTO page (title, url, head_html, body_html) VALUES ('Error 404','/404.html','','<h1>404 Not found</h1>');
	INSERT INTO page (title, url, head_html, body_html) VALUES ('Error 500','/500.html','','<h1>500 Not found</h1>');

CREATE TABLE layout_item (id INTEGER PRIMARY KEY, name STRING, theme STRING, html TEXT);

CREATE TABLE config (id INTEGER PRIMARY KEY, name STRING, value STRING);
	INSERT INTO config (name, value) VALUES ('theme','bootstrap');

CREATE TABLE user (id INTEGER PRIMARY KEY, login STRING, password STRING);
	INSERT INTO user (login, password) VALUES ('admin', '$2a$15$8/FBM.kff0NpKgpowVcgWOXAiEfj6sLhdb2wBzDeeFJIa.G8tUxce');