create database panda_dbase;
use panda_dbase;
grant select,insert,update,delete,index,alter,create,drop
on panda_dbase.*
to bookmgr;

create table tb_registers
(
	id    	int	unsigned 	not null 	auto_increment primary key,
	username		char(50) 		not null,
	email 			char(100)		not null,
	password 		char(32)		not null,
	token				char(32)		not null,
	token_exptime int				not null,
	regtime			  int 			not null,
	status				int				not null
);

create table users
(
	id			int	unsigned 	not null 	references registers(id),
	name				char(50)			not null,
	IDnumber		char(18)			not null,
	cellPhoneNumber	char(11)	not null,
	gender			char(1),
	birthday		char(8),
	education 	char(1),
	marital			char(1),
	graduate        char(100),
	address			char(100),
	business		char(100),
	scaleOfCompany  int unsigned,
	position		char(50),
	monthlyPorfit	int unsigned,
)type=InnoDB;

