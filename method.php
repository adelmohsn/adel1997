<?php
namespace Telegram_bot{

 class method{
protected $token;
protected $url="https://api.telegram.org/bot";
public function __construct($token){
$this->token=$token;
$this->url.=$token;
}
public function deletemessage($data){ 
    return $this->delete("/deletemessage",$data);
}
protected function delete($method,$data){
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$this->url.$method);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$rec=curl_exec($ch);
    if(curl_error($ch))
    var_dump(curl_error($ch));
    else return json_decode($rec);
}
public function sendmessage($data){
   
  return  $this->send("/sendmessage",$data);
    
  
  }
  public function commands($data){
return $this->send("/setMyCommands",$data);

  } 
protected function send($method,$data){
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$this->url.$method);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$rec=curl_exec($ch);
    if(curl_error($ch))
    var_dump(curl_error($ch));
    else return json_decode($rec);
}
public function getme(){
return $this->get("/"."getme");

}
public function editmessage($data){

return $this->editmsg("/editMessageText",$date);



}
protected function editmsg($method,$data){

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$this->url.$method);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$rec=curl_exec($ch);
    if(curl_error($ch))
    var_dump(curl_error($ch));
    else return json_decode($rec);
}

public function getcount($chat_id){
return $this->get("/"."getChatMemberCount?chat_id={$chat_id}");


}
public function test($chat_id,$user_id){
    return $this->get("/"."getChatMember?chat_id={$chat_id}&user_id={$user_id}");


    
}
public function createlink($chat_id){
    
    return $this->get("/"."exportChatInviteLink?chat_id={$chat_id}");
   


}
public function getchat($chat_id){
    return $this->get("/"."getchat?chat_id={$chat_id}");
    
    }
protected function get($method){
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$this->url.$method);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$rec=curl_exec($ch);
    if(curl_error($ch))
    var_dump(curl_error($ch));
    else return json_decode($rec);
}


}






}




?>