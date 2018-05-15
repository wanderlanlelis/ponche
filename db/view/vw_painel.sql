USE mydb_ponche;

CREATE OR REPLACE VIEW vw_painel AS(

SELECT 
	`m`.`usuario_id` AS `usuario_id`,
	SUM((CASE
		WHEN (`m`.`Tipo_id` = 1) THEN `md`.`valor`
	END)) AS `entrada`,
	SUM((CASE
		WHEN (`m`.`Tipo_id` = 2) THEN `md`.`valor`
	END)) AS `saida`,
	SUM((CASE
		WHEN (`m`.`Tipo_id` = 2) THEN (-(1) * `md`.`valor`)
		ELSE `md`.`valor`
	END)) AS `saldo`
FROM
	(`tb_movimento` `m`
	LEFT JOIN `tb_movimento_detalhe` `md` ON ((`m`.`id` = `md`.`movimento_id`)))
GROUP BY `m`.`usuario_id`
);