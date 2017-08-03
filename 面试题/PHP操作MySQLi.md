#PHP操作MySQLi
##
>     1. 连接：mysqli_connect($host,$username,$password,$dbname) or die('连接失败'.mysqli_connect_error); 
>     2.选库：mysqli_select_db(mysqli $link,string $dbname);
>     3.设置字符集： mysqli_set_charset(mysqli $link,string $charset);
>     4.发送SQL语句： mysqli_query('select * from user');
>     5.返回索引和关联的混合数组: mysqli_fetch_array($result);
>     6.返回关联数组： mysqli_fetch_assoc($result);
>     7.返回索引数组：mysqli_fetch_row($result);
>     8.返回一个对象：mysqli_fetch_object($result);
>     9.释放资源：mysqli_free_result(resource $result);
>     10.关闭连接：mysqli_close(resource $result);
>     11.取得上一步INSERT操作的产生的ID：mysqli_insert_id([ resource $link_identifier ]);
>     12.取得前一次 MySQL 操作所影响的记录行数:mysqli_affected_rows([ resource $link_identifier ] );
>     13.结果集中行的数目:mysqli_num_rows(resource $result);
>     14.取得结果集中字段的数目:mysqli_num_fields(resource $result);