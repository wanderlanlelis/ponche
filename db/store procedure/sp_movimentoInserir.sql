USE mydb_ponche;
DROP PROCEDURE IF EXISTS sp_movimentoInserir;
DELIMITER $$
CREATE PROCEDURE sp_movimentoInserir (
	descricao VARCHAR(100),
    valor DOUBLE,
    subcategoria INT, 
    usuario INT, 
    dependente INT,
    parcela INT,
    conta INT,
    tipo INT,
    recorrencia CHAR,
    vencimento DATE,
    recorrenciaTipo INT)

BEGIN  
	SET @vencimentoOriginal = @vencimento;
    
	INSERT INTO tb_movimento (
		descricao, valor, Conta_id, Tipo_id, 
		subCategoria_id, usuario_id, Dependente_id) 
	VALUES (@descricao, @valor, @conta, @tipo, @subcategoria, @usuario, @dependente);
    SET @ultimoid = (SELECT LAST_INSERT_ID()); #RECUPERA ID DA ULTIMA INSERÇÃO               
    
	IF @parcela  > 0 #OR @parcela = '' #DEFINE A DATA DE PAGAMENTO
		THEN SET @pagamento = NULL;
        ELSEIF @parcela = '' THEN SET @pagamento = NOW(); 
		ELSE SET @pagamento = NOW();  
	END IF;	
    
    IF @parcela = '' THEN SET @parcela = 1; END IF;
    
	CASE @recorrenciaTipo # 1 para recorrencia e 2 para parcelamento 
		WHEN '1' THEN SET @valor = @valor;
		WHEN '2' THEN SET @valor = (@valor / @parcela);
        ELSE SET @valor = @valor;
	END CASE; 
    
	SET	@contador = 1; #VALOR INICIAL DO CONTADOR
	WHILE (@contador <= @parcela) DO    
		INSERT INTO tb_movimento_detalhe (movimento_id, valor, pagamento, vencimento) VALUES (
        @ultimoid, @valor, @pagamento, @vencimento);
		
		CASE @recorrencia #DEFINE A RECORRENCIA SE HOUVER
			WHEN 'M' THEN SET @vencimento = DATE_ADD(@vencimentoOriginal, INTERVAL @contador MONTH);
			WHEN 'S' THEN SET @vencimento = DATE_ADD(@vencimentoOriginal, INTERVAL @contador WEEK);
			ELSE SET @vencimento = NOW();
		END CASE;    
    
    SET @contador = @contador + 1;
    
	END WHILE;
    
END $$
DELIMITER ;
