USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_relatorio;
DELIMITER $$
CREATE PROCEDURE sp_relatorio (
	usuario INT,
	tipo VARCHAR(50),    
    conta VARCHAR(50),
    subcategoria VARCHAR(50),
    dependente VARCHAR(50),
    descricao varchar(50) )

BEGIN
    
	CASE tipo
		WHEN '0' THEN SET tipo = (''); 
        ELSE SET tipo = ('and tipo_id = @tipo');
	END CASE;
    
	CASE subcategoria
		WHEN '0' THEN SET subcategoria = (''); 
        ELSE SET subcategoria = (' and subcategoria_id = @subcategoria');
	END CASE;
    
	CASE conta
		WHEN '0' THEN SET conta = (''); 
        ELSE SET conta = (' and conta_id = @conta');
	END CASE;
    
    CASE descricao
		WHEN '0' THEN SET descricao = (''); 
        ELSE SET descricao = (' and descricao LIKE @descricao ');
	END CASE;
    
    SET @sql = CONCAT('select * from vw_movimento where usuario_id = @usuario ',tipo, subcategoria, conta, descricao);

	PREPARE stmt FROM @sql;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
	    
END $$
DELIMITER ;

SET @usuario = 4;
SET @tipo = '0';
SET @conta = '0';
SET @subcategoria = '0';
SET @dependente = '0';
SET @descricao = '%cas%';
CALL mydb_ponche.sp_relatorio(
@usuario, @tipo, @conta, @subcategoria, @dependente, @descricao);