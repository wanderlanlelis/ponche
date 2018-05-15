USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_relatorio;
DELIMITER $$
CREATE PROCEDURE sp_relatorio (
	usuario VARCHAR(5),
	tipo VARCHAR(50),    
    conta VARCHAR(50),
    subcategoria VARCHAR(50),
    dependente VARCHAR(50),
    descricao varchar(50) )

BEGIN
    
	CASE tipo
		WHEN '0' || '' THEN SET tipo = (''); 
        ELSE SET tipo = ('and tipo_id = @tipo');
	END CASE;
    
	CASE subcategoria
		WHEN '0' || '' THEN SET subcategoria = (''); 
        ELSE SET subcategoria = (' and subcategoria_id = @subcategoria');
	END CASE;
    
	CASE conta
		WHEN '0' || '' THEN SET conta = (''); 
        ELSE SET conta = (' and conta_id = @conta');
	END CASE;
    
    CASE descricao
		WHEN '0' || '' THEN SET descricao = (''); 
        ELSE SET descricao = (' and descricao LIKE @descricao ');
	END CASE;
    
    CASE usuario
		WHEN '0' || '' THEN SET usuario = (' where usuario_id > 0'); 
        ELSE SET descricao = (' where usuario_id = @usuario ');
	END CASE;
    
    SET @sql = CONCAT('select * from vw_movimento ', usuario,tipo, subcategoria, conta, descricao);

	PREPARE stmt FROM @sql;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
	    
END $$
DELIMITER ;



