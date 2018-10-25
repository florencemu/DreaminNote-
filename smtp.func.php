
<?php

include 'smtp.class.php';

//邮件发送函数

function sendmailto($mailto, $mailsub, $mailbd, $debug=false) {

$smtpserver = "smtp.163.com";                //SMTP服务器

$smtpserverport = 25;                           //SMTP服务器端口

$smtpusermail   = "dreaminnote@163.com ";   //SMTP服务器的用户邮箱

$smtpemailto = $mailto; //收件人

$smtpuser       = "dreaminnote@163.com";           //SMTP服务器的用户帐号

$smtppass       = "2205365123awds";            //SMTP服务器的用户密码 

$mailsubject    = $mailsub;                      //邮件主题

$mailsubject    = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码

$mailbody       = $mailbd;                       //邮件内容

// $mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码

$mailtype       = "HTML";                        //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常

/***

创建stmp对象  

参数一是：SMTP服务器

参数二是：SMTP服务器端口

参数三是：SMTP服务器的用户帐号

参数四是：SMTP服务器的用户密码

参数五是：这里面的一个true是表示使用身份验证,否则不使用身份验证.

**/

$smtp           = new smtp($smtpserver, $smtpserverport, $smtpuser, $smtppass, true); //这里面的一个true是表示使用身份验证,否则不使用身份验证.

$smtp->debug    = $debug; //是否显示发送的调试信息

/***

调用stmp类里面的sendmail方法

参数一是：收件人邮箱帐号

参数二是：SMTP服务器的用户邮箱（发件人邮箱帐号）

参数三是：邮件主题（邮件标题）

参数四是：邮件内容

参数五是：邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常

***/

return $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);  

}