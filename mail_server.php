<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 16/7/25
 * Time: 下午1:17
 */
if(!defined('BASE_PATH')){
    define('BASE_PATH',realpath('.'));
}
require_once './vendor/autoload.php';
new \Test\My\MailServer();