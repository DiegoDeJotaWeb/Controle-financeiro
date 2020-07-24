create database financa;
-- drop database financa;
use financa;

create table lancamento(
  idL int primary key auto_increment,
  tituloL varchar(255),
  valorL Decimal(10,2),
  categoriaL varchar(50),
  dataL  date
 );
  insert into lancamento(
  tituloL,  valorL,  categoriaL,  dataL)values('Conta de luz', 3000010, '1', now());
  
  
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

insert into lancamento (tituloL, valorL,categoriaL,dataL)VALUES('Sal1',1111111,'0',now());

UPDATE lancamento SET tituloL = 'Sal35454', categoriaL = '0', valorL = 1, dataL = '2020-07-23' where idL = 3;

UPDATE lancamento SET tituloL = 'teste', categoriaL = '1', valorL = 1.23456, dataL = '2020-07-23' where idL = 5;

UPDATE lancamento SET tituloL = 'Conta de luz', categoriaL = '1', valorL = 1111111.11, dataL = '2020-07-23' where idL = 1;