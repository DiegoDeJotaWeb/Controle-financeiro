create database financa;
-- drop database financa;
use financa;

create table lancamento(
  idL int primary key auto_increment,
  tituloL varchar(255),
  valorL float(10,2),
  categoriaL varchar(50),
  dataL  date
 );
  insert into lancamento(
  tituloL,  valorL,  categoriaL,  dataL)values('Conta de luz', -200, '0', now());
  insert into lancamento(
  tituloL,  valorL,  categoriaL,  dataL)values('Conta de água', -60, '0', now());
  
  insert into lancamento(
  tituloL,  valorL,  categoriaL,  dataL)values('Salario', 999, '1', now());
  insert into lancamento(
  tituloL,  valorL,  categoriaL,  dataL)values('Job - 00145', 4000, '1', now());
  
  select * from lancamento;
  
SELECT SUM(valorL) AS total 
FROM lancamento;

SELECT SUM(valorL) AS total 
FROM lancamento where valorL > 0;