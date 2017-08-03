#Linux基本知识
##目录
	1. 创建目录 mkdir 目录名
	2. 递归创建 mkdir -p /tmp/test
	3. 一次性创建多个 mkdir a b c
	4. rm -r 目录1 目录2 目录3
	5. 修改目录名 mv 源目录名 新目录名
	6. 移动目录 mv 目录名 /tmp/
	7. 复制目录 cp -a(-p 复制时候连带属性要一起复制过去) 源目录 目标位置
	8. 查看目录 ls -l（-d 查看目录的信息） 文件名/目录
	9. 查看IP ifconfig
	
##快捷键
	1. 强制终止  	ctrl +ｃ
	2. 清屏		reboot
	3. 关机		init 0
	4. 查看当前位于哪个目录		pwd
	5. 切换目录		cd 目录名
	6. ~	用户的家目录
	7. 查看硬盘使用情况	df -h
	8. 查看所有已经启动的服务		ps -aux

##挂载
	1. 在Linux中，所有U盘，硬盘都需要挂载才可以使用。一个硬盘如果不挂载，内容根本没有办法看。
	2. 一般挂载目录都在/mnt/cdrom
		  1.  如果/mnt/没有cdrom目录，就自己创建。如果有了就不同建
		      mkdir /mnt/cdrom
		  2.  进行挂载（ 硬盘一般叫做磁盘 ）
		      mount  /dev/sr0  /mnt/cdrom
	3.umount /mnt/cdrom

##文件操作
	1. 新建文件  touch 文件名1 文件名2
	2. 删除文件  rm -rf 文件名1 文件名2 
	3. 复制文件  cp 源文件	 目标文件
	4. 剪切文件并重命名为1024 mv /av.php /tmp/1024.php
	5. 编辑文件内容	vim	文件名
	6. 查看文件内容	cat 文件名
	7. 查看文件的头2行	head -n 2 文件名 
	8. 查看文件尾2行		tail -n 2 文件名
	9. more 文件名，enter 下一行，空格 下一页，b 上一页
	10.  grep查找文件是否有某些内容	找av.php文件是否有word这个内容  grep -i "word" av.php
	11.  命令手册	man 命令 例如： man cp
	
##用户
	1. 添加用户	useradd  用户名
	2. 添加一个rose用户，并且设置rose附加组为root组  useradd -G root rose
	3. 设置密码	passwd	用户名
	4. 切换用户	su - 用户名
	5. 删除用户 userdel -r(连带家目录一起删除) 用户名

##组命令
	1. 添加组	groupadd 组名
	2. 删除组	groupdel 组名
	3. 给组添加用户	新建一个php组，再添加用户phper用户进去 useradd -G php phper
	
##压缩
	1. gz
		1. 压缩： tar -zcvf 压缩后的文件名 需要被压缩的文件名1 文件名2 
		2. 解压： tar -zxvf 解压后的文件名
	2. bz2
		1. 压缩： tar -jcvf 压缩后的文件名 需要被压缩文件1 被压缩文件2 
		2. 解压： tar -jxvf 解压文件名

##服务
	1. 源码包启动方式： /usr/local/apache/bin/apachectl start
	2. 二进制包的启动方式： service 服务名 start