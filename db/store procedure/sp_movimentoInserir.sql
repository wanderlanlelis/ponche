DROP PROCEDURE IF EXISTS movimentoInserir;
DELIMITER $$
CREATE PROCEDURE movimentoInserir (
	descricao VARCHAR(100),
    valor DOUBLE,
    subcategoria INT, 
    usuario INT, 
    dependente INT,
    parcela INT,
    conta INT,
    tipo INT,
    recorrencia CHAR,
    vencimento DATE)

BEGIN  
    
	INSERT INTO tb_movimento (
		descricao, valor, Conta_id, Tipo_id, 
		subCategoria_id, usuario_id, Dependente_id) 
	VALUES (@descricao, @valor, @conta, @tipo, @subcategoria, @usuario, @dependente);
    SET @ultimoid = (SELECT LAST_INSERT_ID()); #RECUPERA ID DA ULTIMA INSERÇÃO               
    
	IF @parcela IS NULL OR @parcela  > 1 #DEFINE A DATA DE PAGAMENTO
		THEN SET @pagamento = NULL; 
		ELSE SET @pagamento = NOW();  
	END IF;
	
    #DEFINE O VALOR E A QUANTIDADE DE PARCELA SE HOUVER PARCELAMENTO
    SET @valor = (@valor / @parcela);
	SET	@v1 = 1; #VALOR INICIAL DO CONTADOR
	WHILE (@v1 <= @parcela) DO    
		INSERT INTO tb_movimento_detalhe (movimento_id, valor, pagamento, vencimento) VALUES (
        @ultimoid, @valor, @pagamento, @vencimento);       
		      
		SET @v1 = @v1 + 1;
		
		CASE @recorrencia #DEFINE A RECORRENCIA SE HOUVER
			WHEN 'M' THEN SET @vencimento = DATE_ADD(@vencimento, INTERVAL 1 MONTH);
			WHEN 'S' THEN SET @vencimento = DATE_ADD(@vencimento, INTERVAL 1 WEEK);
			ELSE SET @vencimento = NOW();
		END CASE;
    
	END WHILE;
    
END $$
DELIMITER ;
