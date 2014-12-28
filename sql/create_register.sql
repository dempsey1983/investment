create database panda_dbase;
use panda_dbase;
grant select,insert,update,delete,index,alter,create,drop
on panda_dbase.*
to bookmgr;

create table tb_registers
(
	id    			int	unsigned 	not null 	auto_increment primary key,
	username		char(50) 		not null,
	email 			char(100)		not null,
	password 		char(32)		not null,
	token				char(32)		not null,
	token_exptime int				not null,
	regtime			  int 			not null,
	status				int				not null
);

create table tb_users
(
	id					int	unsigned 		not null 	references registers(id),
	name				char(50)				not null,
	credit_rating	int unsigned 	not null,
	IDnumber		char(18)				not null,
	cellPhoneNumber	char(11)		not null,
	gender			char(1),
	birthday		char(8),
	education 	char(1),
	marital			char(1),
	graduate        char(100),
	address			char(100),
	business		char(100),
	scaleOfCompany  int unsigned,
	position		char(50),
	monthlyPorfit	int unsigned	
);
insert into tb_users (id, name, credit_rating) values
('1', '�Դ�', '1'),
('2', 'Ǯ��', '1'),
('3', '����', '1'),
('4', '����', '1'),
('5', '����', '1'),
('6', '����', '1'),
('7', '֣��', '1'),
('8', '����', '1');
insert into tb_users (id, name, credit_rating) values
('9',  '��1', '1'),
('10', 'Ǯ2', '2'),
('11', '��3', '3'),
('12', '��4', '4'),
('13', '��5', '5'),
('14', '��6', '6'),
('15', '֣7', '7'),
('16', '��8', '8');
/*schedule: 
0, ����
1, ��׼
2��Ͷ��
3������
4�����ˣ�������
5���������*/
/*type:
1��������֤
2��ʵ����֤
3����������
4���������*/
create table tb_borrow
(
	id 			int 				unsigned not null references registers(id),
	type		int					not null,
	title 	text				not null,
	rate		double			not null,
	amount	int unsigned not null,
	term		int	unsigned not null,
	schedule	int unsigned not null,
	amount_in int unsigned not null,
	amount_out int unsigned not null
);



insert into tb_borrow values
('1', '2', '�ʽ���ת', 	'0.10', 	'78500', '6', '2', '28500', '0'),
('2', '1', 'װ��', 			'0.08', 	'32700', '7', '2', '12700', '0'),
('3', '3', '��������', 	'0.132', '20000', '5', '2', '15000', '0'),
('4', '1', '��', 			'0.114', '30000', '8', '3', '30000', '0'),
('5', '1', '��', 			'0.126', '40500', '12', '3', '40500', '0'),
('6', '2', '����Ӫ', 	'0.126', '77800', '13', '3', '77800', '0'),
('7', '2', '�ʽ���ת', 	'0.114', '55400', '15', '4', '55400', '0'),
('8', '1', '����', 			'0.125', '53600', '20', '5', '53600', '0'),
('9', '1', '�ճ���������', '0.110', '54400', '24', '5', '54400', '0'),
('10', '1', '����ﱸ', 	'0.105', '67000', '25', '4', '67000', '0'),
('11', '1', '����֧��', 	'0.1', '107200', '26', '3', '107200', '0'),
('12', '3', '������', 		'0.1', '27800', '9', '3', '27800', '0'),
('13', '3', '��ҵ', 			'0.1', '68000', '15', '4', '68000', '0'),
('14', '1', '��ױ���', 	'0.1', '20000', '18', '2', '20000', '0'),
('15', '3', '����ҵ��', 	'0.1', '50000', '30', '3', '50000', '0'),
('16', '2', '�ʽ���ת', 	'0.1', '100000', '36', '4', '100000', '0');



