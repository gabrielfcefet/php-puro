-- Busca todos os registros da tabela usuário
SELECT * FROM mediapost.usuario;

-- Busca todos os registros da tabela contato
SELECT * FROM mediapost.contato;

-- Busca todos os registros da tabela email
SELECT * FROM mediapost.email;

-- Busca todos os registros da tabela telefone
SELECT * FROM mediapost.telefone;

-- Busca os contatos com o seus possíveis emails e telefones
select c.nome,
       e.email,
       (case e.tipo when 'P' then 'PESSOAL' 
                    when 'T' then 'TRABALHO' end) as tipo_email,
       t.telefone,
       (case t.tipo when 'C' then 'CELULAR'
                    when 'R' then 'RESIDENCIAL'
					when 'T' then 'TRABALHO' end) as tipo_telefone
  from mediapost.contato c
  left outer join mediapost.email e on (e.contato_id = c.id )
  left outer join mediapost.telefone t on (t.contato_id = c.id)
