#页面静态化

##PHP静态化

1. 纯静态 （局部纯静态，全部纯静态）
2. 伪静态

>buffer：就是缓冲区，一个内存地址空间，主要用于存储数据区域

####如何开启buffer?

>  * 在php.ini文件中，output_buffering = on;（默认开启）
>  * 在php文件中，添加ob_start();

####验证是否已经开启?

> 用ob_get_contents函数去获取缓冲区中的数据来验证
> 基本方式
>>  
    file_get_contents()函数
    使用PHP内置缓冲机制output_buffering
       ob_start打开缓冲机制
       ob_get_contents返回输出缓冲区内容
       ob_clean清空缓冲区
       ob_get_clean得到当前缓冲区内容并删除当前输出缓冲区

####如何触发系统生成纯静态化页面?
> 用户请求页面-》判断页面是否过期-》是-》重新生成
-》否-》获取静态页面


    1. 通过服务器crontab定时扫描程序
    2. 局部动态化
    3. AJAX请求
    4. 服务器伪静态配置