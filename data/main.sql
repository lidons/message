create table if not exists student(
`id` int auto_increment primary key,
`name` varchar(255) not null default '' comment'姓名',
`age` tinyint unsigned not null default 0 comment'年龄',
`sex` tinyint unsigned not null default 10 comment'性别',
`creates_at` int not null default 0 comment '新增时间',
`updated_at` int not null default 0 comment  '修改时间'
)engine=InnoDB default charset=UTF8 auto_increment=1001 comment'学生表';