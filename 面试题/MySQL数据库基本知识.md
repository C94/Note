#MySQL基本知识

##基本操作
	1.本地连接： mysql -u 用户名 -p 密码
	2.远程连接： mysql -h 服务器地址 -u 用户名 -p 用户密码 （授权才能访问）
	3.退出： \q , exit , ctrl+c , quit
	4.注释： --单行注释 , /*多行注释*/
	5.查看数据库: show databases;
	6.创建数据库： create database `数据库名`;
	7.删除数据库： drop database `数据库名`;
	8.选库: use 库名；
	9.查看当前所在库： select database();
	10.快捷操作： 将查询后的数据立起来 \G;  例如： select * from user\G

##完整性约束
	1. PRIMARY KEY  标示该属性为该表的主键，可以唯一的标示对应的数据
	2. NOT NULL 标示该属性不能为空
	3. NULL 默认值，可以为空
	4. UNIQUE 标示该属性的值是唯一的
	5. AUTO_INCREMENT 标示该属性的值自动增加，该字符的类型必须是整型，配合primary key
	6. DEFAULT 为该属性设置默认值
	7. UNSIGNED 无符号的，只能用于数值类型
	8. ZEROFILL 零填充，只能用于数值类型，配合显示长度使用,该属性应该紧跟 int 类型，或 unsigned 属性 之后
	
##修改表
	1. 修改表名： ALTER TABLE 旧表名 RENAME [TO] 新表名
	2. 修改字段的数据类型： ALTER TABLE 表名 MODIFY 属性名 数据类型 [完整性约束]
	3. 修改字段名： ALTER TABLE 表名 CHANGE 旧属性名 新属性名 新数据类型
	4. 增加字段： ALTER TABLE 表名 ADD 属性1 数据类型 [完整性约束条件]
	5. 删除字段：ALTER TABLE 表名 DROP 属性名
	6. 修改表引擎：ALTER TABLE 表名 ENGINE=存储引擎

##设置字符集
	1. 设置服务器字符集：set character_set_server=字符集;如：set character_set_server=gbk;
	2. 设置指定数据库字符集： ALTER DATABASE 数据库名 character SET 字符集;
	3. 修改表字符集：ALTER TABLE `表名` DEFAULT CHARACTER SET 字符集;

##存储引擎
	1. ALTER TABLE 表名 ENGINE = INNODB;

##SQL语句
	1. insert: insert into 表名[(字段1,字段2,...,字段n)] values ('值1','值2',...,'值n');
	2. update: update 表名 set 字段名 = 表达式[,...][where条件]
	3. delete： delete from 表名 [where条件]
	4. select: select 字段列表 from 表名 [where条件] [order by 字段名];
	5. like: select * from 表名 where 字段 like 'a_b';   a开头b结尾，中间只有一个字符
	6. 查询结果去除重复: select distinct 字段 from 表名;
	7. 对结果去除重复： select * from 表名 order by 字段 desc;
	8. 使用集合函数查询：  concat() 字符链接，count(),计算数量,sum(),avg(),max(),min(),unix_timestamp()
	9. 分组查询： 
			1. 以指定字段分组： select * from 表名 group by 分组字段;
			2. 统计某个字段的总人数： select grade,count(*) as peoples from student group by grade;
			3. 按照指定字段分组， 查询每组的的最大值：select sex,max(age) from student group by sex;
			4. 按照指定字段分组，并计算每组数量: select age,count(*) as nums from student group by age having nums < 3;
	10. 使用Limit限制查询结果: select * from 表名 limit 10,5;
	11. 连接查询（多表联合查询）： 
		1. 内连接查询 select * from 表1，表2 where 表1.字段 = 表2.字段；
		2. 外连接查询 以左表查询： select * from 表1 left join 表2 on 表1.字段 = 表2.字段；以右表为主： select * from 表1 right join 表2 on 表1.字段 = 表2.字段
		
	12. 子查询： select * from 表名 where id in（select id from 表名 where 条件）；
	13. 比较运算中的子查询： select * from 表名 where id > (select num from 表名 where id = 1 )
		
	 