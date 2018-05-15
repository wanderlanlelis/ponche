USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_painel;
DELIMITER $$
CREATE PROCEDURE sp_painel (
	usuario INT)

BEGIN

	SELECT m.usuario_id,
	SUM( CASE WHEN tipo_id = 1 THEN md.valor END ) AS 'entrada', 
	SUM( CASE WHEN tipo_id = 2 THEN md.valor END ) AS 'saida',
	SUM( CASE WHEN tipo_id = 2 THEN -1*md.valor 
		 ELSE md.valor END ) AS 'saldo' 

	FROM tb_movimento AS m
	LEFT JOIN tb_movimento_detalhe AS md ON (m.id = md.movimento_id)
    WHERE m.usuario_id = usuario
	GROUP BY m.usuario_id;

END $$
DELIMITER ;