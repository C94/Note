#PHP初级面试题2
##
1. 写出一个能创建多级目录的PHP函数
	
		function create_dir($path,$mode = 0777){
    		if(is_dir($path)){
        		echo '目录已经存在';
    		}else{
       	 		if(mkdir($path,$mode,true)){
            		echo '创建目录成功';
        		}else{
            		echo '创建目录失败';
        		}
    		}
		}

2. 打开php.ini中的safe_mode,会影响哪些函数？至少六个

	    a. 用户输入输出函数（fopen()file()require(),只能用于调用这些函数有相同脚本的拥有者）
		b. 创建新文件（限制用户只能在该用户拥有目录下创建文件）
		c. 用户调用popen()systen()exec()等脚本，只有脚本处在safe_mode_exec_dir配置指令指定的目录中才可能
		d. 加强HTTP认证，认证脚本拥有者的UID的划入认证领域范围内，此处启用安全模式下，不会设置PHP_AUTH
		e. mysql服务器所用的用户名必须与调用mysql_connect()的文件的拥有者用户名相同
		f. 受影响的函数变量以及配置命令达到40个

3. 抓取远程图片到本地，你会用什么函数？
	
		file_get_contents 或者 curl

4.PHP的垃圾回收机制是怎么样的？

		PHP可以自动进行内存管理，清除不再需要的对象。PHP使用了引用计数（reference counting）这种单纯的垃圾回收机制。每个对象都内含有一个引用计数器，每个reference连接到对象，计数器加1，当reference离开生存空间或被设置为NULL，计数器减1.当某个对象的引用计数器为零时，PHP知道你将不再需要使用这个对象，释放其所占的内存空间。

5. 写一个函数，从一个标准url里取出文件的扩展名，例如http://www.sina.com.cn/abc/de/fg.php?id=1需要取出php或者.php

		$url = "http://www.sina.com.cn/abc/de/fg.php?id=1";
		function getExt($url){
		    $url = basename($url); // fg.php?id=1
		    $pos1 = strpos($url,'.'); // 2
		    $pos2 = strpos($url,'?'); // 6
		
		    //strstr 查找字符串的首次出现,返回截取到结尾部分
		    if(strstr($url,'?')){
		        //substr 返回字符串子串
		        return substr($url,$pos1+1,$pos2-$pos1-1);
		    }else{
		        return substr($url,$pos1);
		    }
		}
		echo getExt($url);

6. mysql_fetch_row() 和 mysql_fetch_array()有什么分别

		mysql_fetch_row() 把数据库的一列存储在一个以零为基础的数组中，第一栏在数组的索引0，第二栏在索引1，以此类推

		mysql_fetch_assoc() 把数据库的一列储存在一个关联数组中，数组的索引就是字段名称，例如我的数据库查询送回"first_name","last_name","email"三个字段，数组的索引便是"first_name","last_name"和"email"。mysql_fetch_array()可以同时送回mysql_fetch_row()和mysql_fetch_assoc()的值。

7. 有一个网页地址，http://www.phpres.com/index.htm，如何获得它的内容？

		//方法1
		$readcontents = fopen("http://www.baidu.com","rb");
		$contents = stream_get_contents($readcontents);
		fclose($readcontents);
		echo $contents;
		
		//方法2
		echo file_get_contents("http://www.google.com");
	
8. PHP如何实现页面跳转
	
		方法1：
		header("location:网址"); // 直接跳转	
		header("refresh:3;url=www.google.com") // 3秒后跳转
		
		方法2：
		echo "<meta http-equiv=refresh content='0;url=www.google.com'>";

9. 如果网站用utf-8编码，为了防止乱码出现，哪些地方需要注意？
	
		a. 数据库和表都需要用utf-8编码
		b. 连接数据库时，指定数据库编码 utf-8 mysql_query("set names utf8");
		c. php文件头部指定utf-8 header("content-type:text/html;charset=utf-8");
		d. html文件指定编码utf-8 <meta http-equiv="content-type" content="text/html;charset=utf-8">