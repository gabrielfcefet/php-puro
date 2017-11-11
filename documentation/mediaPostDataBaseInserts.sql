------------------------------------------------
-- Autor: Gabriel de Figueiredo Corrêa        --
-- Data: 22/10/2017                           --
-- Comentário: Script para popular as tabelas --
-- com dados para testes.                     --
------------------------------------------------

-- Inserindo o usuário padrão do sistema
-- Nome: admin
-- Senha: lalala123 (Criptgrafada com MD5)
insert into mediapost.usuario (nome, senha, status)
                       values ('admin', '24500fa6ecaeb8300905727802af3081', 1);

-- Inserindo um contato padrão para testes
insert into mediapost.contato (nome)
	               values ('GABRIEL');

-- Inserindo os tipos de e-mails
insert into mediapost.tipos_email (tipo_email)
                           values ('Pessoal');
insert into mediapost.tipos_email (tipo_email)
                           values ('Trabalho');

-- Inserindo os emails do contato 'GABRIEL'
insert into mediapost.email (email, contato_id, tipos_email_id)
                     values ('figueiredo.gabriel@gmail.com', 1, 1);
insert into mediapost.email (email, contato_id, tipos_email_id)
                     values ('figueiredo.gabriel@outlook.com', 1, 2);

-- Inserindo os tipos de telefones
insert into mediapost.tipos_telefone (tipo_telefone)
                              values ('Celular');
insert into mediapost.tipos_telefone (tipo_telefone)
                              values ('Residencial');
insert into mediapost.tipos_telefone (tipo_telefone)
                              values ('Trabalho');

-- Inserindo os telefones para do contato 'GABRIEL'
insert into mediapost.telefone (telefone, contato_id, tipos_telefone_id)
                        values ('12988052805', 1, 1);
insert into mediapost.telefone (telefone, contato_id, tipos_telefone_id)
                        values ('1239022897', 1, 2);

commit;
