USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_usuarioApagarAll;
DELIMITER $$
CREATE PROCEDURE sp_usuarioApagarAll ()

BEGIN
	DELETE FROM tb_usuario WHERE id >3;
END $$
DELIMITER ;