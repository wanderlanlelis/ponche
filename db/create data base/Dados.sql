#insert
use mydb_ponche;
insert into tb_perfil (nome) values ('Administrador'), ('Analista tecnico'), ('Usuario');

insert into tb_usuario (nome, email, senha, perfil_id) values 
	('Administrador','admin@sistemaponche.com.br','admin',1),
    ('Analista tecnico','analista@sistemaponche.com.br','analista',2),
	('Usuario','usuario@sistemaponche.com.br','usuario',3);
    
insert into tb_dependente (nome, usuario_id) values ('João Paulo',3);    
insert into tb_conta (nome, descricao, usuario_id) values ('Carteira','Carteira',3);
insert into tb_tipo (nome, usuario_id) values ('Entrada','1'),('Saida','1'),('Transferencia','1');

insert into tb_meta (usuario_id, titulo, descricao, valortotal, inicio, fim) values (
	3,'Viagem de ferias','Viagem de ferias',900.00,'2018-12-01','2018-01-01');    

insert into tb_meta_detalhe (meta_id, valor) values (1,300.00);

insert into tb_categoria (nome, descricao ,usuario_id) values 
	('Moradia','Moradia','1'),('Alimentação','Alimentação','1'),('Saúde','Saúde','1'),
    ('Educação','Educação','1'),('Transporte','Transporte','1');
    
insert into tb_subcategoria (nome, categoria_id ,usuario_id) values 
	('Prestação',1, 1), ('Aluguel',1, 1), ('Fatura de água',1, 1),('Fatura de luz',1, 1), ('Fatura de telefone/internet',1, 1),
	('Supermercado',2, 1),('Restaurante',2, 1),('Açougue',2, 1),    
    ('Médico',3, 1),('Dentista',3, 1),('Farmacia',3, 1),    
    ('Faculdade',4, 1),('Livro',4, 1),('Curso',4, 1),    
    ('Combustível',5, 1),('Corrida',5, 1),('Manutenção',5, 1);

insert into tb_movimento (
	descricao, valor, Conta_id, Tipo_id, subCategoria_id, usuario_id, Dependente_id) values (
	'Conta de água', 49.99, 1, 2, 1, 3, null);
    
insert into tb_movimento_detalhe (
	movimento_id, valor,pagamento,vencimento, quitado) values (
    1,49.99,'2018-01-01','2018-12-31','1');
