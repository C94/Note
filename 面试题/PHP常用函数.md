#常用函数
##
##数学函数
	1. 求绝对值 abs()
	2. 进一取整 ceil()
	3. 舍去取整 floor()
	4. 浮点数取余 round(小数，位数) echo round(1.95583, 2);// 1.96
	5. 求最大值 max()
	6. 求最小值 min()
	7. 更好的随机数 mt_rand(起始数，末尾数)
	8. 随机数 rand()
	
##字符串函数
	1. 返回路径中的目录部分 dirname(echo dirname("c:/testweb/home.php");)  //c:/testweb
	2. 把字符串填充为指定的长度 str_pad() $str = "Hello 	World";
		echo str_pad($str,20,".");//Hello World.........
	3. 重复使用指定字符串 str_repeat() echo str_repeat(".",13);
	4. 把字符串分割到数组中 str_split() print_r(str_split("Hello")); //Array ( [0] => H [1] => e [2] => l [3] => l [4] => o ) 
	5. 反转字符串 strrev() //!dlroW olleH
	6. 随机地打乱字符串中所有字符 str_shuffle()
	7. 字符串转为小写 strtolower()
	8. 字符串转为大写 strtoupper()
	9. 字符串首字母大写 ucfirst()
	10. 每个单词首字母转为大写 ucwords
	11. 把字符转为HTML实体 htmlentities()
	12. 从指定的ASCII值返回字符 chr(052)  // *
	13. 返回字符串第一个字符的ASCII值	ord()
	14. 使用要一个字符串为标志分隔另一个字符串 explode()
	15. 将数组值用预定义字符连接成字符串 implode()
	16. 截取字符串 substr ( string $string , int $start [, int $length ] )
	17. 寻找字符串中的某字符最先出现的位置 echo strpos("You love php, I love php too!","php"); // 9 
	18. 统计字符串长度 echo strlen("love"); // 4

##数组
	1. 生成一个数组,用一个数组的值作为键名,另一个数组值作为值 array_combine()
	2. 用给定的填充(值生成)数组 array_fill(2,3,"Dog"); // Array ( [2] => Dog [3] => Dog [4] => Dog )
	3. 把一个数组分割为新的数组块 array_chunk()("a"=>"Cat","b"=>"Dog","c"=>"Horse","d"=>"Cow");
	print_r(array_chunk($a,2)); // Array ( [0] => Array ( [0] => Cat [1] => Dog ) [1] => Array ( [0] => Horse [1] => Cow ) ) 
	4. 把两个或多个数组合并为一个数组 array_merge() 
	5. 在数组中根据条件取出一段值，并返回 array_slice($array,start,num)
	6. 返回两个数组的差集数组 array_diff()
	7. 返回两个或多个数组的交集数组 array_intersect()
	8. 在数组中查找一个值，返回一个键，没有返回返回假 array_search() 成功返回键名，失败返回false
	9. 把数组中一部分删除用其他值替代 array_splice() 
	10. 返回数组中所有值的总和 array_sum()
	11. 在数组中搜索给定的值,区分大小写 in_array() 返回true/false
	12. 判断某个数组中是否存在指定的key array_key_exists()
	13. 用数组中的元素为一组变量赋值 list() 结果变量分别匹配数组中的值
	14. 删除数组中的第一个元素，并返回被删除元素的值 array_shift()
			$a=array("a"=>"Dog","b"=>"Cat","c"=>"Horse");
			echo array_shift($a); //Dog
			print_r ($a); //Array ( [b] => Cat [c] => Horse ) 
	15. 向数组最后压入一个或多个元素 array_push  返回新的数组
	16. 删除数组中的最后一个元素 array_pop() 返回数组剩余的元素
	17. 计算数组中的单元数目或对象中的属性个数 count() 
	18. 返回一个键值反转后的数组 array_flip()
	19. 返回数组所有的键，组成一个数组 array_keys()
	20. 返回数组所有的值，组成一个数组 array_values()
	21. 统计数组中所有的值出现的次数 array_count_values()
	22. 按升序对给定数组的值排序，不保留键名 sort()
	23. 对数组逆向排序，不保留键名 rsort()
	24. 对数组排序，保持索引关系 asort()
	25. 对数组逆向排序，保持索引关系 arsort()
	26. 按键名对数组排序 ksort()
	27. 将数组按照键逆向排序 krsort()
	
##文件
	1. 打开文件或者url fopen()
	2. 关闭一个已打开的文件指针 fclose()
	3. 检查文件或者目录是否存在 file_exists()
	4. 取得文件大小 filesize()
	5. 是否可读 is_readable()
	6. 判断给定文件是否可写 is_writable()
	7. 获取文件的修改时间 filemtime()
	8. 获取文件的上次访问时间	fileatime()
	9. 获取文件的大部分属性值 stat()
	10. 将字符串写入文件 echo file_put_contents('./test.txt','bbb'); // 3 返回写入的字节数
	11. 返回路径中的文件名部分 basename()
			$file = './text.txt';
			echo basename($file,'.txt'); //text
	12. 返回路径中的目录部分 dirname()
			$file = './text.txt';
			echo dirname($file); // .
	13. 返回文件路径的信息 pathinfo()
	14. 打开目录句柄 opendir()

##时间
	1. 返回当前时间戳 time()
	2. 取得日期/时间信息 getdate()
		Array
		(
		    [seconds] => 57
		    [minutes] => 17
		    [hours] => 15
		    [mday] => 15
		    [wday] => 3
		    [mon] => 2
		    [year] => 2017
		    [yday] => 45
		    [weekday] => Wednesday
		    [month] => February
		    [0] => 1487168277
		)
	3. 格式化一个本地时间 date('Y年m月d日 H:i:s');
	4. 将任何英文文本的日期时间描述解析为 Unix 时间戳 strtotime()
			


