# mimikkoUI-sign
auto-sign
这个为php一键自动签到和兑换能量值
需要自行抓取登陆包，修改第一个登陆数值，
修改id和password
以及	'Content-Length: '头文件长度
修改后放入服务器
加入crontab任务
即可实现自动签到
//请修改第9,10,26行内容，需要自行抓取登陆包，抓取登陆包后填入以后便可实现自动获取token;
//若没有抓包基础可手动获取token之后填入，44行填入token，去掉注释符，不能修改密码，否则会失效;
//每次执行后会在php目录下生成日志文件，可对日志进行查看以及BUG排查
//QQ：1556092275；
