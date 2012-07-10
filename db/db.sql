use newchina;
drop table if exists account;
create table account(
	username varchar(20) primary key,
	password varchar(15),
	create_time varchar(12)
);