<?php
namespace app\index\controller;
use think\Loader;

class Index extends Base
{

        public function index(){
                return view('setmail');
        }

        /**
         * @return \think\response\View
         * @return bool
         * @author Frank
         */
        public function  setMail ($title = null, $desc_content = null, $to = null){

                $title = 'test';
                $desc_content = 'This is test email';
                //$to = $_POST['Email3'];
                $desc_url = 'www.163.com';
                $to = '2407181194@qq.com';
                if($_POST){

                        /*
                        Loader::import('PHPMailer\PHPMailer');
                        Loader::import('PHPMailer\SMTP');
                        $mail = new \PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.163.com';
                        $mail->Port = 994;
                        $mail->SMTPSecure = "ssl";
                        $mail->From = 'franktest@163.com';   //发送者的邮件地址
                        $mail->FromName = 'franktest';           //发送邮件的用户昵称
                        $mail->Username = 'franktest';       //登录到邮箱的用户名
                        $mail->Password = "frank203916";      //第三方登录的授权码，在邮箱里面设置
                        //编辑发送的邮件内容
                        $mail->IsHTML(true);                   //发送的内容使用html编写
                        $mail->CharSet = 'utf-8';              //设置发送内容的编码
                        $mail->Subject = $title;   //设置邮件的主题、标题
                        $mail->MsgHTML($content);              //发送的邮件内容主体

                        //告诉服务器接收人的邮件地址
                        $mail->AddAddress($to);

                        //调用send方法，执行发送
                        $result = $mail->Send();
                        var_dump($mail);die;
                        //var_dump($mail);die;
                        */
                        Loader::import('PHPMailer\PHPMailer');
                        Loader::import('PHPMailer\SMTP');
                        $mail = new \PHPMailer();
                        $mail->IsSMTP();// 使用SMTP服务
                        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
                        $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址
                        $mail->SMTPAuth = true;// 是否使用身份验证
                        $mail->Username = "franktest@163.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
                        $mail->Password = "frank203916";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
                        $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
                        $mail->Port = 994;// 163邮箱的ssl协议方式端口号是465/994
                        $mail->setFrom("franktest@163.com","franktest");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
                        $mail->addAddress($to,'11回复消息');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
                        $mail->addReplyTo("franktest@163.com","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
                        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
                        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
                        //$mail->addAttachment("bug0.jpg");// 添加附件
                        $mail->Subject = "邮件标题";// 邮件标题
                        $mail->Body = "以下是回复你的内容:".$desc_content."点击可以查看文章地址:".$desc_url;// 邮件正文
                        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

                        var_dump($mail->isSMTP());die;
                        if(!$mail->send()){// 发送邮件
                                return $mail->ErrorInfo;
                                // echo "Message could not be sent.";
                                // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
                        }else{
                                return 1;
                        }


                }else{
                        $this->error('参数出错','err');
                }

        }

        /**
         * @return \think\response\View
         * error
         */
        public function err(){
                return view('setmail');
        }


}
