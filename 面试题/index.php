<?php
header('Content-Type:text/html;charset=utf8');

//1.
function substr_utf8($str, $start, $length = null){
    return join("",array_slice(preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY),$start,$length));
}

$str = "这是测试";
echo substr_utf8($str,1,3);
echo '<br>'.'<hr>';

//2.
echo $_SERVER['DOCUMENT_ROOT']."<br>";  //当前运行文档的根目录
echo $_SERVER['HTTP_HOST']."<br>";      //当前请求头中 Host: 项的内容，如果存在的话
echo $_SERVER['REMOTE_ADDR']."<br>";    //浏览当前页面的用户的 IP 地址
echo $_SERVER['HTTP_REFERER']."<br>";   //当前页面前一个URL的地址
echo $_SERVER['SERVER_NAME']."<br>";    //当前运行脚本所在的服务器的主机名
echo '<br>'.'<hr>';
/*3.
include 就是包含，如果包含的文件不存在的话，那么会提示一个错误，但程序会继续执行下去
require 意思就是需要，如果被包含的文件不存在或者无法打开，则会提示错误，并且会终止程序的执行
include_once 和 require_once 表示只包含一次，避免重复包含
*/

//4.   将1234657890  转换为  1,234,657,890
$str = '1234657890';
function str($str){
    $str = strrev($str);
    $str = chunk_split($str, 3, ',');
    $str = strrev($str);
    $str = ltrim($str, ',');
    return $str;
}
echo str($str);
echo '<br>'.'<hr>';

//5.array_reverse — 返回一个单元顺序相反的数组 
//反转utf8字符串
function sub_strrev($str){
    return implode('', array_reverse(preg_split('//u', $str)));
}
$str = '这是我的测试页面';
echo sub_strrev($str);
echo '<br>'.'<hr>';

//6.  将www.baidu.com 转换成 moc.udiab.
$str3 = 'www.baidu.com';
echo strrev(str_replace('www', '', $str3));
echo '<br>'.'<hr>';

//7.  输出文件路径
echo $_SERVER['SCRIPT_FILENAME'];
echo '<br>'.'<hr>';

//8.
echo 8%(-2);
echo '<br>'.'<hr>';

//9.
echo count('abc');
echo '<br>'.'<hr>';

//10.  5种方法获取文件后缀名
$path = str_replace('\\', '/', __FILE__);
//strrchr — 查找指定字符在字符串中的最后一次出现
function ext_name1($path){
    return strrchr($path, '.');
}

function ext_name2($path){
    return substr($path, strrpos($path, '.'));
}

function ext_name3($path){
    $ext_name = pathinfo($path);
    return $ext_name['extension'];
}

function ext_name4($path){
    $ext_name = explode('.', $path);
    return $ext_name[count($ext_name)-1];
}
var_dump(ext_name4($path));
echo '<br>'.'<hr>';

//11.
$arr = ['One', 'Two', 'Three'];
echo $arr[0];
echo implode(',', $arr);
echo '<br>'.'<hr>';

//12.
$a = in_array('01', array('1')) == var_dump('01' == 1);
echo '<br>'.'<hr>';

//13.
$str = 'open_door';

function change_str($str){
    $arr = explode('_', $str);
    $arr = array_map('ucfirst', $arr);
    $str = implode('', $arr);
    return $str;
}
echo change_str($str);


//14.
$fp = fopen('lock.txt', 'w+');
if (flock($fp, LOCK_EX)) {
    //获得写锁，写数据
    fwrite($fp, 'write  somthing');
    flock($fp, LOCK_UN);
}else{
    echo 'file is locking';
}
fclose($fp);
echo '<br>'.'<hr>';


//15.
$url = 'http://www.sina.com.cn/abc/de/fg.php?id=1';
function getExt($url){
    $arr = parse_url($url);
    $file = basename($arr['path']);
    $ext = explode('.', $file);
    return $ext[count($ext)-1];
}
echo getExt($url);

//16.
//遍历目录下所有文件
function my_scandir($dir){
    $files = array();
    if (is_dir($dir)) {
        if ($handel = opendir($dir)) {
            while (($file = readdir($handel)) !== false) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($dir.'/'.$file)) {
                        $files[$file] = my_scandir($dir.'/'.$file);
                    }else{
                        $files[] = $dir.'/'.$file;
                    }
                }
            }
            closedir($handel);
            return $files;
        }
    }else{
        return '不是目录';
    }
}
echo '<pre>';
var_dump(my_scandir('HTML5'));
echo '<br>'.'<hr>';

//17.
$script = "<script language='javascript'>alert('abd');</script>";
echo preg_replace("/<script[^>].*?>.*?</script>/si", 'aa', $script);
echo '<br><hr>';
//18.判断是否以半角逗号的多个手机号码组成的字符串
$pattern = '/^1[358]\d{9}(,1[358]\d{9})*$/';
$subject = '13211274586,13955686529';
if (preg_match($pattern, $subject)) {
    echo 'yes';
}
echo '<br><hr>';
//19.
//冒泡排序
$arr=array(1,43,54,62,21,66,32,78,36,76,39);
function bubble_sort($arr){
    $len = count($arr);
    for ($i=1; $i<$len; $i++){
        for($k=0; $k<$len-$i; $k++){
            if ($arr[$k] > $arr[$k+1]) {
                $tmp = $arr[$k+1];
                $arr[$k+1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}

print_r(bubble_sort($arr));
echo '<br><hr>';

//20.
//快速排序
function quick_sort($arr){
    if (!is_array($arr)) return false;
    $length = count($arr);
    if ($length<=1) return $arr;
    $left = $right = array();
    for($i=1; $i<$length; $i++){
        if ($arr[$i]<$arr[0]) {
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }

    //递归调用
    $left = quick_sort($left);
    $right = quick_sort($right);
    return array_merge($left,array($arr[0]),$right);
}
print_r(quick_sort($arr));

//21.状态码
$str = "
    1. 200 - 服务器成功返回页面
    2. 404 - 请求的页面不存在
    3. 3xx - 表示要完成请求，需要进一步操作，通常。用来重定向
    4. 301 - 服务器返回此响应，请求的页面永久移动到新位置
    5. 403 - 服务器拒绝请求
    6. 404 - 服务器找不到请求的网页
    7. 5xx - 表示服务器在尝试处理请求时发生的内部错误，这些错误可能是服务器本身的错误，而不是请求出错
";

echo $str;
echo '<br><hr>';

//22.
Nosql数据库
   memcached、redis、mongodb的区别联系
   3个场景完全不同的东西。
   1.memcached：单一键值对内存缓存的，做对象缓存无可替代的分布式缓存；
   2.redis：是算法和数据结构的集合，快速的数据结构操作是他最大的特点，支持数据持久化；
   3.mongodb是bson结构、介于rdb和nosql之间的，更松散更灵活的，但是不支持事务，只用作非重要数据存储。

//23.
   error_reporting 等调试函数使用
    error_reporting() 函数能够在运行时设置php.ini中 error_reporting 指令。
    所以可以再程序中随时调节显示的错误级别。
    使用此函数时 display_errors必须是打开状态。

 23.对于大流量的网站,您采用什么样的方法来解决各页面访问量统计问题

 a.确认服务器是否能支撑当前访问量
 b.优化数据库访问
 c.禁止外部访问链接（盗链），比如图片盗链
 d.控制文件下载,上传
 e.使用不同主机分流
 f.使用浏览器统计软件，了解访问量，有针对性的进行优化

 24.问题：什么是mvc？

    回答：mvc由model（模型）, view（视图）和controller（控制器）组成，php mvc可以更高效地管理好3个不同层的php代码。
    model：数据信息存取层。
    view：view层负责将应用的数据以特定的方式展现在界面上。
    controller：通常控制器负责从视图读取数据，控制用户输入，并向模型发送数据。

25.
[!!!]1.禁用COOKIE后SEESION还能用吗?(51.com笔试题)
可以，COOKIE和SESSION都是用来实现会话机制的，由于http协议是无状态的，所以要想跟踪一个用户在同一个网站之间不同页面的状态，需要有这么一个机制----会话机制。
COOKIE：将会话信息的保存到浏览器端。
SESSION：将会话信息保存到服务器端。

SESSION默认情况下是基于COOKIE的，对于SESSION来说，每生成一个SESSIONID，都会将其发送到浏览器端，让后将其保存到cookie当中。
如果禁用了COOKIE，则基于COOKIE的SESSION不好使了，我们可以使用get，传递SID，或者直接开启透明的SID（此时需要关闭基于cookie的SESSION配置项）。

[!!!]相关题目：SESSION与COOKIE的区别?
COOKIE保存在客户端，而SESSION则保存服务器端。
从安全性的角度来讲，SESSION的安全性要高。
从保存内容的类型的角度来讲，COOKIE只保存字符串（及能够自动转换成字符串），而session则可以保存所有的数据类型。
从保存内容的大小的角度来讲，COOKIE保存的内容是有限制的，比较小，而SESSION基本上没有这个限制。
从性能的角度来讲，用SESSION的话，对服务器的压力会更大一些。

回答PHP读取文件速度快，还是读取mysql的数据快？为何？
答：一般情况下读文件》读数据库；不同情况速度也会反向，如：数据库数据量很小，而同目录文件又非常多的情况下，读数据库大于读文件
