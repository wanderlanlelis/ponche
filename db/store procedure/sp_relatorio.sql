use mydb_ponche;
drop procedure if exists sp_relatorio;
DELIMITER $$
create procedure sp_relatorio (
	usuario int,
	tipo varchar(50),    
    conta varchar(50),
    subcategoria varchar(50),
    dependente varchar(50) )

begin
    
	CASE tipo
		WHEN 0 then set tipo = ('and tipo_id <> @tipo'); 
        ELSE SET tipo = ('and tipo_id = @tipo');
	END CASE;
    
	CASE subcategoria
		WHEN 0 then set subcategoria = (' and subcategoria_id <> @subcategoria'); 
        ELSE SET subcategoria = (' and subcategoria_id = @subcategoria');
	END CASE;
    
	CASE conta
		WHEN 0 then set conta = (' and conta_id <> @conta'); 
        ELSE SET conta = (' and conta_id = @conta');
	END CASE;
    
    SET @sql = CONCAT('select * from vw_movimento where usuario_id = @usuario ',tipo, subcategoria, conta);

	PREPARE stmt FROM @sql;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
	    
end $$
DELIMITER ;

set @usuario = 4;
set @tipo = '2';
set @conta = '0';
set @subcategoria = '16';
set @dependente = '0';
call mydb_ponche.sp_relatorio(
@usuario, @tipo, @conta, @subcategoria, @dependente);