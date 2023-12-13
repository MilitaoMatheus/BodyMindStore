create database dbMindStore;
use dbMindStore;

create table tbCategoria(	
CodCategoria int primary key auto_increment,
DescCategoria varchar(30) not null    
);

create table tbFabricante(	
CodFabricante int primary key auto_increment,
NomeFabricante varchar(45) not null    
);

select NomeProduto, Preco, Imagem, QtdEstoque from tbProduto;

create table tbProduto(	
    CodProduto int primary key auto_increment,
    CodCategoria int not null,
    NomeProduto varchar(70) not null,
    CodFabricante int not null,
    -- num_minutos varchar(4) not null,
    Preco decimal(6,2) not null,
    QtdEstoque int not null,
    DescInfo text not null,
    Imagem varchar(255) not null,
    Lancamento enum('S','N') not null,
    constraint fk_cat foreign key(CodCategoria) references tbCategoria(CodCategoria),
    constraint fk_prod foreign key(CodFabricante) references tbFabricante(CodFabricante)
);

insert into tbCategoria
values(default,'Pré Treino'),
(default, 'Whey Protein'),
(default, 'Creatina'),
(default, 'Suplementação'),
(default, 'Roupas'),
(default, 'Garrafas');
select * from tbCategoria;

insert into tbFabricante
values
(default, 'Body Mind Store'),
(default, 'Max Titanium'),
(default, 'Optimum Nutrition'),
(default, 'Dymatize Nutrition'),
(default, 'Dark Lab'),
(default, 'Demons Lab LLC.'),
(default, 'New Millen'),
(default, 'Power Supplements'),
(default, 'Wedy Nutrition Indústria.'),
(default, 'Wedy Nutrition Terceirizados'),
(default, '3VS Nutrition'),
(default, 'PW Darkness'),
(default, 'Growth'),
(default, 'Black Skull');
select * from tbFabricante;

select * from tbProduto;
select * from tbFabricante;
select * from tbCategoria;

insert into tbProduto 
values
(default, '1', 'Pré-Treino Venom', '5', '119.90', '10',
'<p>
Venom Frutas Vermelhas 300g Underground | Efeito Imediato | Energia e Disposição | Recuperação Muscular Importado | Pré Treino
</p>',
'Venom Pre Workout', 'S'),
(default, '2', 'Whey Protein', '2', '89.90', '2',
'<p>
100% Whey Protein Max Titanium | High Protein | Auxilio na Formação de Músculos | Alta Quantidade de Aminoácidos (Baunilha, 900g)
</p>', 'Whey Protein','S'),
(default, '5', 'Camisa Growth', '13', '45.99', '2', 
'<p>
 estampa é produzida com impressão digital (DTG) e o processo é realizado com o que há de mais moderno no mercado, em impressora específica para malharia, imprimindo a arte com qualidade de definição excepcional e textura mínima sob a malha. Malha 100% Algodão, fios penteados 30.1, acabamento reforçado na gola e nos ombros, gramatura 165 G
</p', 'CamisaGrowth', 'N');

-- Criação de uma view para ser usada na loja
select count(*) from tbProduto;
select * from tbProduto;
select nome_filme, num_minutos from tbProduto;
select * from tbl_categoria;
select * from tbl_produtora;

create view vwProduto
as select 
	tbProduto.CodProduto,
    tbProduto.CodFabricante,
    tbCategoria.CodCategoria,
    tbCategoria.DescCategoria,
    tbProduto.NomeProduto,
    tbFabricante.NomeFabricante,
    tbProduto.Preco,
    tbProduto.QtdEstoque,
	tbProduto.DescInfo,
    tbProduto.Imagem,
    tbProduto.Lancamento
from tbProduto inner join tbFabricante
on tbProduto.CodProduto= tbFabricante.CodFabricante
inner join tbCategoria
on tbProduto.CodCategoria = tbCategoria.CodCategoria;
select * from vwProduto;
select * from tbCategoria;

create table tbUsuario(
CodUsuario int primary key auto_increment,
NomeUsuario varchar(100) not null,
Email varchar(100) not null,
Senha varchar(20) not null,
StatusUsu tinyint(1) not null,
Endereco varchar(70),
Cidade varchar(30),
Cep char(9)
);
select * from tbUsuario;
insert into tbUsuario
values(default, 'José', 'José@gmail.com', '123456', '1', 'Rua batata', 'São Paulo', '12345678'),
(default, 'Matheus', 'eu@gmail.com', '111111', '0', 'Rua Cenoura', 'Santos', '12345679');
select CodUsuario, NomeUsuario, Email, Senha, StatusUsu from tbUsuario; 

use dbMindStore;
select * from tbProduto;
select * from tbCategoria;

 update tbProduto
 set CodCategoria = 5
 where CodProduto = 7;
 
 create table tbCritica(
 NomeCritica varchar(100),
 EmailCritica varchar(100),
 Critica text
 );
 select * from tbCritica;