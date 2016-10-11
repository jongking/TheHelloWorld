项目展示平台

linux配置(LNMP一键安装包在CentOS 5-7、RHEL 6-7、Fedora 21-23、Debian 7-8、Ubuntu 10.04-16.04的32位和64位系统上测试通过)

1.下载并安装LNMP一键安装包：

您可以选择使用下载版(推荐国外或者美国VPS使用)或者完整版(推荐国内VPS使用)，两者没什么区别，只是完整版把一些需要的源码文件预先放到安装包里。

安装LNMP执行：wget -c http://soft.vpser.net/lnmp/lnmp1.3-full.tar.gz && tar zxf lnmp1.3-full.tar.gz && cd lnmp1.3-full && ./install.sh lnmp
默认安装lnmp可不写，如需要安装LNMPA或LAMP，将./install.sh 后面的参数替换为lnmpa或lamp即可。

2.添加网站的代码到主机上

切换到你想放置的目录下面，执行

git clone https://github.com/jongking/TheHelloWorld/ XXXX

3.添加网站(虚拟主机)

执行：lnmp vhost add

添加拟主机

项目主页:http://thw.jongking.com