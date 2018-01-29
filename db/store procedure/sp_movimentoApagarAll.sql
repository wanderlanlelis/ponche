USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_movimentoApagarAll;
DELIMITER $$
CREATE PROCEDURE sp_movimentoApagarAll ()

BEGIN

	DELETE FROM tb_movimento_detalhe WHERE id >1;
	DELETE FROM tb_movimento WHERE id >1;

END $$
DELIMITER ;