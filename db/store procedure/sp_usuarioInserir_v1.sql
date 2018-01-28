USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_usuarioInserir;
DELIMITER $$
CREATE PROCEDURE sp_usuarioInserir (
	nome 	VARCHAR(100),
    email 	VARCHAR(1000),
    senha 	VARCHAR(100),
    perfil 	int)

BEGIN

	INSERT INTO tb_usuario (nome, email, senha, perfil_id)
	VALUES (@nome, @email, @senha,@perfil);
    
END $$
DELIMITER ;