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
       te.tipo_email,
       t.telefone,
       tt.tipo_telefone
  from mediapost.contato c
  left outer join mediapost.email e on (e.contato_id = c.id )
  left outer join mediapost.tipos_email te on (te.id = e.tipos_email_id)
  left outer join mediapost.telefone t on (t.contato_id = c.id)
  left outer join mediapost.tipos_telefone tt on (tt.id = t.tipos_telefone_id);
