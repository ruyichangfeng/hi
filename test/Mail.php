<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/25
 * Time: 上午9:59
 */

namespace Test\My;


use Nette\InvalidArgumentException;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class Mail extends Message
{

    public    $config;

    protected $from;

    protected $to;

    protected $title;

    protected $body;

    function __construct($to)
    {
        $config       = require_once BASE_PATH.'/config/config.php';
        $this->config = $config['mail'];
        $this->setFrom($this->config['username']);
        if(is_array($to)){
            foreach($to as $email){
                $this->addTo($email);
            }
        }else{
            $this->addTo($to);
        }
    }

    public function from($from = null){
        if(!$from){
            throw new InvalidArgumentException('邮件发送地址不能为空!');
        }
        $this->setFrom($from);

        return $this;
    }

    public function to($to = null){
        if(!$to){
            throw new InvalidArgumentException('邮件接收地址不能为空!');
        }
        $this->to($to);
        return $this;
    }

    public function content($content = null){
        if(!$content){
            throw new InvalidArgumentException('邮件内容不能为空');
        }
        $this->setHtmlBody($content);
        return $this;
    }

    public function title($title = null){
        if(!$title){
            throw new InvalidArgumentException('邮件标题不能为空!');
        }
        $this->setSubject($title);
    }

    public function send(){
        $mailer = new SmtpMailer($this->config);
        $mailer->send($this);
    }
}