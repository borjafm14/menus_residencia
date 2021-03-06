use menus_residencia;



drop table if exists USERS;
drop table if exists MENUS;
drop table if exists MENU_FORMS;
drop table if exists LOG;
drop table if exists STORES;
drop table if exists SUGGESTIONS;

CREATE TABLE USERS(
 	user VARCHAR(50) NOT NULL, #nombre de usuario unico para la aplicacion
 	pass VARCHAR(50) NOT NULL,
 	first_name VARCHAR(50) NOT NULL,
 	last_name VARCHAR(100) NOT NULL,
 	email VARCHAR(100) NULL,
 	room VARCHAR(20) NULL,
 	company VARCHAR(100) NULL, #en caso de que se puedan registrar varias empresas, se registra a cuál pertenece cada usuario
 	type INT NOT NULL, #1 para el jefe, 2 para empleados, 3 para el resto
 	id_menu INT NULL, #guardará el menú actual del usuario
 	fecha_hora DATETIME NOT NULL DEFAULT NOW(),
 	CONSTRAINT PRIMARY KEY(user)
);

ALTER TABLE USERS CHANGE last_name last_name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL;
ALTER TABLE USERS CHANGE first_name first_name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL;


CREATE TABLE MENUS(
 id INT NOT NULL AUTO_INCREMENT,
 monday_lunch VARCHAR(100) NOT NULL,
 monday_dinner VARCHAR(100) NOT NULL,
 tuesday_lunch VARCHAR(100) NOT NULL,
 tuesday_dinner VARCHAR(100) NOT NULL,
 wednesday_lunch VARCHAR(100) NOT NULL,
 wednesday_dinner VARCHAR(100) NOT NULL,
 thursday_lunch VARCHAR(100) NOT NULL,
 thursday_dinner VARCHAR(100) NOT NULL,
 friday_lunch VARCHAR(100) NOT NULL,
 friday_dinner VARCHAR(100) NOT NULL,
 saturday_lunch VARCHAR(100) NULL,
 saturday_dinner VARCHAR(100) NULL,
 sunday_lunch VARCHAR(100) NULL,
 sunday_dinner VARCHAR(100) NULL,
 fecha_hora DATETIME NOT NULL DEFAULT NOW(),
 active INT NOT NULL DEFAULT 1,
 user VARCHAR(50) NULL, #para sacar un histórico de menus que pertenecen al usuario
 CONSTRAINT PRIMARY KEY(id)
);




CREATE TABLE MENU_FORMS(
 id INT NOT NULL AUTO_INCREMENT,
 monday_lunch1 VARCHAR(100) NOT NULL,
 monday_lunch2 VARCHAR(100) NOT NULL,
 monday_dinner1 VARCHAR(100) NOT NULL,
 monday_dinner2 VARCHAR(100) NOT NULL,
 tuesday_lunch1 VARCHAR(100) NOT NULL,
 tuesday_lunch2 VARCHAR(100) NOT NULL,
 tuesday_dinner1 VARCHAR(100) NOT NULL,
 tuesday_dinner2 VARCHAR(100) NOT NULL,
 wednesday_lunch1 VARCHAR(100) NOT NULL,
 wednesday_lunch2 VARCHAR(100) NOT NULL,
 wednesday_dinner1 VARCHAR(100) NOT NULL,
 wednesday_dinner2 VARCHAR(100) NOT NULL,
 thursday_lunch1 VARCHAR(100) NOT NULL,
 thursday_lunch2 VARCHAR(100) NOT NULL,
 thursday_dinner1 VARCHAR(100) NOT NULL,
 thursday_dinner2 VARCHAR(100) NOT NULL,
 friday_lunch1 VARCHAR(100) NOT NULL,
 friday_lunch2 VARCHAR(100) NOT NULL,
 friday_dinner1 VARCHAR(100) NOT NULL,
 friday_dinner2 VARCHAR(100) NOT NULL,
 saturday_lunch1 VARCHAR(100) NULL,
 saturday_lunch2 VARCHAR(100) NULL,
 saturday_dinner1 VARCHAR(100) NULL,
 saturday_dinner2 VARCHAR(100) NULL,
 sunday_lunch1 VARCHAR(100) NULL,
 sunday_lunch2 VARCHAR(100) NULL,
 sunday_dinner1 VARCHAR(100) NULL,
 sunday_dinner2 VARCHAR(100) NULL,
 fecha_hora DATETIME NOT NULL DEFAULT NOW(),
 active INT NOT NULL DEFAULT 1,
 CONSTRAINT PRIMARY KEY(id)
);


CREATE TABLE STORE(
 ingredient VARCHAR(100) NOT NULL,
 quantity FLOAT(7,3) NOT NULL, #litros/kilos hasta con cuatro decimales
 CONSTRAINT PRIMARY KEY(ingredient)
);


CREATE TABLE LOG(
 id INT NOT NULL AUTO_INCREMENT,
 log TEXT NOT NULL,
 nombre_usuario VARCHAR(50) NOT NULL,
 fecha_movimiento DATETIME NOT NULL DEFAULT NOW(),
 tipo_movimiento VARCHAR(30) NOT NULL,
 tipo_usuario VARCHAR(20) NOT NULL,
 CONSTRAINT PRIMARY KEY(id)
);


CREATE TABLE SUGGESTIONS(
 id INT NOT NULL AUTO_INCREMENT,
 sugerencia TEXT NOT NULL,
 nom_usuario VARCHAR(50) NOT NULL,
 CONSTRAINT PRIMARY KEY(id)
);

#################### USER PROCEDURES ########################


DELIMITER //
CREATE PROCEDURE deleteUser
	(IN user VARCHAR(50))

BEGIN

	DELETE FROM USERS WHERE user = user;
	
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE checkUser
	(IN user VARCHAR(50),
	INOUT existent INT) #devuelvo un 0 si no existe y un 1 (o más) si está repetido

BEGIN

	SET existent = (SELECT COUNT(*) FROM USERS WHERE user = user);
	
END //
DELIMITER ;

##########################################################################



##################### INGREDIENT PROCEDURES ##############################

DELIMITER //
CREATE PROCEDURE addIngredient
	(IN ingredientIn VARCHAR(100),
	IN quantityIn FLOAT(7,3))

BEGIN
	DECLARE currentQuantity FLOAT(7,3);

	IF((SELECT COUNT(*) FROM STORE WHERE ingredient = ingredientIn) = 0)
	THEN 
		INSERT INTO STORE(ingredient, quantity) VALUES(ingredientIn, quantityIn);
	ELSE
	 	SET currentQuantity = (SELECT quantity FROM STORE WHERE ingredient = ingredientIn); 
	 	UPDATE STORE SET quantity = (currentQuantity + quantityIn) WHERE ingredient = ingredientIn;
	END IF;
	
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE removeIngredient
	(IN ingredientIn VARCHAR(100),
	IN quantityIn FLOAT(7,3))

BEGIN

	DECLARE currentQuantity FLOAT(7,3);

	IF((SELECT COUNT(*) FROM STORE WHERE ingredient = ingredientIn) > 0)
	THEN 

	 	SET currentQuantity = (SELECT quantity FROM STORE WHERE ingredient = ingredientIn); 

	 	IF((currentQuantity - quantityIn) < 0)
	 	THEN 
	 		UPDATE STORE SET quantity = 0 WHERE ingredient = ingredientIn;
	 	ELSE
	 		UPDATE STORE SET quantity = (currentQuantity + quantityIn) WHERE ingredient = ingredientIn;
	 	END IF;

	END IF;
	
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getIngredients()
BEGIN

	SELECT * FROM STORE;
	
END //
DELIMITER ;

################################################################################


######################### MENU PROCEDURES ######################################

DELIMITER //
CREATE PROCEDURE getCurrentMenu
	(IN user VARCHAR(50))

BEGIN

	SELECT * FROM MENUS WHERE user = user AND active = 1;
	
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getCurrentMenu_form()

BEGIN

	SELECT * FROM MENU_FORMS WHERE active = 1;
	
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE addMenu
	(IN userIn VARCHAR(50),
	IN monday_lunch VARCHAR(100),
	IN monday_dinner VARCHAR(100),
	IN tuesday_lunch VARCHAR(100),
	IN tuesday_dinner VARCHAR(100),
	IN wednesday_lunch VARCHAR(100),
	IN wednesday_dinner VARCHAR(100),
	IN thursday_lunch VARCHAR(100),
	IN thursday_dinner VARCHAR(100),
	IN friday_lunch VARCHAR(100),
	IN friday_dinner VARCHAR(100),
	IN saturday_lunch VARCHAR(100),
	IN saturday_dinner VARCHAR(100),
	IN sunday_lunch VARCHAR(100),
	IN sunday_dinner VARCHAR(100))

BEGIN

	DECLARE last_id INT;

	UPDATE MENUS SET active = (active - 1) WHERE user = userIn;

	INSERT INTO MENUS(
		monday_lunch,
		monday_dinner,
		tuesday_lunch,
		tuesday_dinner,
		wednesday_lunch,
		wednesday_dinner,
		thursday_lunch,
		thursday_dinner,
		friday_lunch,
		friday_dinner,
		saturday_lunch,
		saturday_dinner,
		sunday_lunch,
		sunday_dinner,
		active,
		user
	)
	VALUES(
		monday_lunch,
		monday_dinner,
		tuesday_lunch,
		tuesday_dinner,
		wednesday_lunch,
		wednesday_dinner,
		thursday_lunch,
		thursday_dinner,
		friday_lunch,
		friday_dinner,
		saturday_lunch,
		saturday_dinner,
		sunday_lunch,
		sunday_dinner,
		1,
		userIn
	);

	SET last_id = (SELECT MAX(id) FROM MENUS);

	UPDATE USERS SET id_menu = last_id WHERE user = userIn;
	
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE addMenu_form
	(IN monday_lunch1 VARCHAR(100),
	IN monday_lunch2 VARCHAR(100),
	IN monday_dinner1 VARCHAR(100),
	IN monday_dinner2 VARCHAR(100),
	IN tuesday_lunch1 VARCHAR(100),
	IN tuesday_lunch2 VARCHAR(100),
	IN tuesday_dinner1 VARCHAR(100),
	IN tuesday_dinner2 VARCHAR(100),
	IN wednesday_lunch1 VARCHAR(100),
	IN wednesday_lunch2 VARCHAR(100),
	IN wednesday_dinner1 VARCHAR(100),
	IN wednesday_dinner2 VARCHAR(100),
	IN thursday_lunch1 VARCHAR(100),
	IN thursday_lunch2 VARCHAR(100),
	IN thursday_dinner1 VARCHAR(100),
	IN thursday_dinner2 VARCHAR(100),
	IN friday_lunch1 VARCHAR(100),
	IN friday_lunch2 VARCHAR(100),
	IN friday_dinner1 VARCHAR(100),
	IN friday_dinner2 VARCHAR(100),
	IN saturday_lunch1 VARCHAR(100),
	IN saturday_lunch2 VARCHAR(100),
	IN saturday_dinner1 VARCHAR(100),
	IN saturday_dinner2 VARCHAR(100),
	IN sunday_lunch1 VARCHAR(100),
	IN sunday_lunch2 VARCHAR(100),
	IN sunday_dinner1 VARCHAR(100),
	IN sunday_dinner2 VARCHAR(100))

BEGIN

	UPDATE MENU_FORMS SET active = (active - 1);

	UPDATE USERS SET id_menu = NULL;

	INSERT INTO MENU_FORMS(
		monday_lunch1,
		monday_lunch2,
		monday_dinner1,
		monday_dinner2,
		tuesday_lunch1,
		tuesday_lunch2,
		tuesday_dinner1,
		tuesday_dinner2,
		wednesday_lunch1,
		wednesday_lunch2,
		wednesday_dinner1,
		wednesday_dinner2,
		thursday_lunch1,
		thursday_lunch2,
		thursday_dinner1,
		thursday_dinner2,
		friday_lunch1,
		friday_lunch2,
		friday_dinner1,
		friday_dinner2,
		saturday_lunch1,
		saturday_lunch2,
		saturday_dinner1,
		saturday_dinner2,
		sunday_lunch1,
		sunday_lunch2,
		sunday_dinner1,
		sunday_dinner2,
		active
	)
	VALUES(
		monday_lunch1,
		monday_lunch2,
		monday_dinner1,
		monday_dinner2,
		tuesday_lunch1,
		tuesday_lunch2,
		tuesday_dinner1,
		tuesday_dinner2,
		wednesday_lunch1,
		wednesday_lunch2,
		wednesday_dinner1,
		wednesday_dinner2,
		thursday_lunch1,
		thursday_lunch2,
		thursday_dinner1,
		thursday_dinner2,
		friday_lunch1,
		friday_lunch2,
		friday_dinner1,
		friday_dinner2,
		saturday_lunch1,
		saturday_lunch2,
		saturday_dinner1,
		saturday_dinner2,
		sunday_lunch1,
		sunday_lunch2,
		sunday_dinner1,
		sunday_dinner2,
		1
	);
	
END //
DELIMITER ;




INSERT INTO USERS(
	user,
	pass,
	first_name,
	last_name,
	email,
	type
)
VALUES(
	'admin',
	'admin',
	'Admin',
	'Admin Admin',
	'admin@admin.es',
	1
);

INSERT INTO USERS(
	user,
	pass,
	first_name,
	last_name,
	email,
	type
)
VALUES(
	'bfernm04',
	'891995',
	'Borja',
	'Fernandez Moran',
	'borja@borja.es',
	3
);

INSERT INTO USERS(
	user,
	pass,
	first_name,
	last_name,
	email,
	type
)
VALUES(
	'empleado',
	'empleado',
	'Empleado',
	'Empleado Empleado',
	'empleado@empleado.es',
	2
);

