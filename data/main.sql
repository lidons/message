create table if not exists student(
`id` int auto_increment primary key,
`name` varchar(255) not null default '' comment'����',
`age` tinyint unsigned not null default 0 comment'����',
`sex` tinyint unsigned not null default 10 comment'�Ա�',
`creates_at` int not null default 0 comment '����ʱ��',
`updated_at` int not null default 0 comment  '�޸�ʱ��'
)engine=InnoDB default charset=UTF8 auto_increment=1001 comment'ѧ����';