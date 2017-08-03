#PHP初级面试题
##
1. XHTML和HTML最显著的区别

		1.XHTML必须强制指定文档类型DocType，HTML不需要
		2.XHTML所有标签必须闭合，HTML比较随意
		3.XHTML严格区分大小写，所有标签的元素和属性名字都必须使用小写
		4.XHTML要求所有的标记都必须要有一个相应的结束标记
		5.XHTML规定所有属性都必须有一个值，没有值的就重复本身
2. strlen()与mb_strlen()的作用分别是？

		strlen 和 mb_strlen 都是用于截取字符串的，其中strlen只针对单字节编码字符，如果是多字节编码，如gbk 和 utf8,使用strlen会出现乱码。此时，可使用mb_strlen,专用于处理多字节编码的截取。

3. 用最少的代码写一个求3值最大的函数

		function maxNum($a,$b,$c){
        	return $a > $b ? ($a > $c ? $a : $c) : ($b > $c ? $b : $c) ;
    	}
    	echo maxNum(2,5,0);

4. PHP访问数据库有几步？

		a. 连接数据库服务器：mysql_connect('localhost','user','password');
		b. 连接数据库： mysql_select_db('数据库名');
		c. 设置从数据库提取数据的字符集： mysql_query('set names utf8');
		d. 执行sql语句： mysql_query('select * from test');
		e. 处理结果集
		f. 关闭结果集，释放资源:mysql_free_result($result);
		g. 关闭与数据库服务器的连接: mysql_close($link);