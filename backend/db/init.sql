CREATE TABLE page (id INTEGER PRIMARY KEY, title STRING, url STRING, body_html TEXT);
INSERT INTO page (title, url, body_html) VALUES ('Home','/','Homepage');
INSERT INTO page (title, url, body_html) VALUES ('404','/404.html','404 Not found');
INSERT INTO page (title, url, body_html) VALUES ('500','/500.html','500 Not found');