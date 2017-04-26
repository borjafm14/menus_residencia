#sudo mysql -u root -p < crearDB.sql
#sudo mysql -u root -p < basededatos.sql

drop database if exists menus_residencia;
create database menus_residencia;
GRANT ALL ON menus_residencia.* TO 'menus_residencia'@localhost IDENTIFIED BY '891995';