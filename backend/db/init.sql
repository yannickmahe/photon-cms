CREATE TABLE page (id INTEGER PRIMARY KEY, title STRING, url STRING, html TEXT);
INSERT INTO page (title, url, html) VALUES ('Home','/','Homepage');
INSERT INTO page (title, url, html) VALUES ('404','/404.html','404 Not found');
INSERT INTO page (title, url, html) VALUES ('500','/500.html','500 Not found');