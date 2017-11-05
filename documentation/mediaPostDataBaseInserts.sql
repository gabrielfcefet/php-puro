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
                       values ('admin', 'f3273f898cb053626f6d94205be66dab2fe9ef7a', 1);

-- Inserindo um contato padrão para testes
insert into mediapost.contato (nome)
	               values ('GABRIEL');

-- Inserindo os emails do contato 'GABRIEL'
insert into mediapost.email (email, tipo, contato_id)
                     values ('figueiredo.gabriel@gmail.com', 'P', 1);
insert into mediapost.email (email, tipo, contato_id)
                     values ('figueiredo.gabriel@outlook.com', 'T', 1);

-- Inserindo os telefones para do contato 'GABRIEL'
insert into mediapost.telefone (telefone, tipo, contato_id)
                        values ('12988052805', 'C', 1);
insert into mediapost.telefone (telefone, tipo, contato_id)
                        values ('1239022897', 'R', 1);

commit;
