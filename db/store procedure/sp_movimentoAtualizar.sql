DROP PROCEDURE IF EXISTS sp_movimentoAtualizar;
DELIMITER $$
CREATE PROCEDURE sp_movimentoAtualizar(
    id INT,
	descricao VARCHAR(100),
    subcategoria INT, 
    usuario INT, 
    dependente INT,
    parcela INT,
    conta INT,
    tipo INT)

BEGIN  
UPDATE tb_movimento
SET 
    descricao 		= @descricao,
    subcategoria_id = @subcategoria, 
    usuario_id 		= @usuario, 
    dependente_id 	= @dependente,
    valor 			= @parcela,
    conta_id 		= @conta,
    tipo_id 		= @tipo
WHERE id = @id;

END $$
DELIMITER ;


