USE mydb_ponche;

CREATE OR REPLACE VIEW vw_movimento AS(
SELECT #m.*,
    md.id			AS id,
    t.nome 	 		AS tipo,
	c.nome 	 		AS conta, 
	ca.nome  		AS categoria,
	sc.nome  		AS subcategoria,
    m.usuario_id	AS usuario_id,
	u.nome 	 		AS usuario, 
    d.nome   		AS dependente,
    m.descricao		AS descricao,
	md.valor 		AS valorunidade,
    md.pagamento 	AS pagamento,
    md.vencimento 	AS vencimento,
    md.quitado 		AS quitado,
    md.status 		AS status,
    
    #usado especificamente para filtros
    m.tipo_id			AS tipo_id,
    m.conta_id			AS conta_id,
    m.subCategoria_id 	AS subcategoria_id,
    m.dependente_id 	AS dependente_id
    
FROM tb_movimento AS m
	INNER JOIN tb_conta 			AS c  ON (c.id = m.conta_id)
	INNER JOIN tb_tipo 				AS t  ON (t.id = m.tipo_id)
    INNER JOIN tb_subcategoria 		AS sc ON (sc.id = m.subcategoria_id)
    INNER JOIN tb_categoria  		AS ca ON (ca.id = sc.categoria_id)
	INNER JOIN tb_usuario 			AS u  ON (u.id = m.usuario_id)
    LEFT  JOIN tb_dependente 		AS d  ON (d.id = m.dependente_id)
	LEFT  JOIN tb_movimento_detalhe AS md ON (md.movimento_id = m.id)
ORDER BY md.id DESC);