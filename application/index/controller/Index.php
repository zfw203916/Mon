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
        public function  setMail ($title = null, $content = null, $to = null){

                $title = 'test';
                $content = 'This is test email';
                //$to = $_POST['Email3'];
                $to = '2407181194@qq.com';
                if($_POST){

                        Loader::import('PHPMailer\PHPMailer');
                        Loader::import('PHPMailer\SMTP');
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.163.com';
                        $mail->Port = 994;
                        $mail->SMTPSecure = "ssl";
                        $mail->From = 'zfw203916@163.com';   //发送者的邮件地址
                        $mail->FromName = 'Frank';           //发送邮件的用户昵称
                        $mail->Username = 'zfw203916';       //登录到邮箱的用户名
                        $mail->Password = "fjwnphrlehwcbeae";      //第三方登录的授权码，在邮箱里面设置
                        //编辑发送的邮件内容
                        $mail->IsHTML(true);                   //发送的内容使用html编写
                        $mail->CharSet = 'utf-8';              //设置发送内容的编码
                        $mail->Subject = $title;   //设置邮件的主题、标题
                        $mail->MsgHTML($content);              //发送的邮件内容主体

                        //告诉服务器接收人的邮件地址
                        $mail->AddAddress($to);

                        //调用send方法，执行发送
                        $result = $mail->Send();
                        var_dump($result);die;
                        //var_dump($mail);die;
                        if($result){
                                return true;
                        }else{
                                return $mail->ErrorInfo = '出错';
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
