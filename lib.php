<?php
namespace Telegram_bot {
  require "method.php";
 


class Telegram{
    public $Message;

protected $API_KEY;
public $update;
public $ss;
protected $url="https://api.telegram.org/bot";
public   $method ;
public $query ;
public function __construct($API_KEY){
$this->API_KEY=$API_KEY;
$this->url=$this->url.$API_KEY;
$this->update=json_decode(file_get_contents('php://Input'),true);
$ss=$this->update;

$this->method=new method($API_KEY);

}}}



?>