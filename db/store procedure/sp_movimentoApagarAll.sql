DELIMITER $$
CREATE PROCEDURE movimentoApagarAll ()

BEGIN

	DELETE FROM tb_movimento_detalhe WHERE id >1;
	DELETE FROM tb_movimento WHERE id >1;

END $$
DELIMITER ;