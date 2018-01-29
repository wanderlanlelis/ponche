
USE mydb_ponche;
CALL sp_movimentoApagarAll();

CALL sp_movimentoInserir(
	@descricao  	= 'Apartamento',
	@valor 			= 300.30,
	@subcategoria 	= 1,
	@usuario 		= 3,
	@dependente 	= NULL,
    @recorrencia	= 'M',
	@parcela 		= 5,
    @conta 			= 1,
    @tipo 			= 2,
    @vencimento 	= '2018-01-31');

SELECT * FROM vw_movimento;