
USE mydb_ponche;
CALL sp_usuarioApagarAll();

SET 
	@nome  	= 'Wanderlan Lelis',
	@email  = 'wanderlanlelis2@gmail.com',
	@senha  = '12345678',
    @perfil = 3;
CALL sp_usuarioInserir(
	@nome, @email,@senha, @perfil);

SELECT * FROM tb_usuario order by id desc;