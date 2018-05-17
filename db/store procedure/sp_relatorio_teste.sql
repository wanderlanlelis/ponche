USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_relatorio_teste;
DELIMITER $$
CREATE PROCEDURE sp_relatorio_teste(
	#usuario VARCHAR(255) 
)

BEGIN

#SET @sql = 'SELECT * FROM vw_movimento ';

/*
CASE usuario
	WHEN '0' || '' THEN SET @sql = 'WHERE usuario_id > 0 '; 
	ELSE SET @sql = CONCAT(@sql,'WHERE usuario_id = ', @usuario,' ');
END CASE;
*/
#SELECT @sql;


#PREPARE stmt FROM @sql;
#EXECUTE stmt;
#DEALLOCATE PREPARE stmt;
	
    SELECT * FROM vw_movimento;
END $$
DELIMITER ;

SET @usuario = 31;
CALL sp_relatorio_teste(@usuario);