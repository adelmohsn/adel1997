
 <?php

require "lib.php";
use Telegram_bot\Telegram;
$API_KEY="789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY";
$A=new Telegram($API_KEY);
$message= $A->update['message']; 
$chat=$message['chat'];
$chat_id=$chat['id'];
$text=$message['text'];
$quary=$A->update['callback_query'];
$data=$quary['data'];
if($text){
   
    $status= $A->method->test('-1001891350246',$message['from']['id']);
     if($status->result->status=='left'and $status->result->status!='creator'){
 $link= $A->method->getchat('-1001891350246');
  
  
    $A->method->sendmessage(['chat_id'=>$chat_id,'text'=>( "يحب عليك الأشتراك في القناة أولا \n\n\n\n".$link->result->invite_link) ]);
   }



  else
  { 
    if($text=='/start'){$A->method->sendmessage(['chat_id'=>$chat_id,'text'=>"Hi MR{$message['from']['first_name']}"]);
    }
else if($text=='/getchat'){
$A->method->sendmessage(['chat_id'=>$chat_id,'text'=>json_encode( $A->method->getchat($chat_id))]);
}else if($text=='/getcount'){
    $count= $A->method->getcount($chat_id);
    $A->method->sendmessage(['chat_id'=>$chat_id,'text'=> $count->result]);

}
else if($text=='/getme'){

    $A->method->sendmessage(['chat_id'=>$chat_id,'text'=> json_encode( $A->method->getme($chat_id))]);

}

else if($text=='/test'){
    $status= $A->method->test('-1001747655443',$message['from']['id']);
 if($status->result->status=='member')
    $A->method->sendmessage(['chat_id'=>$chat_id,'text'=>'true' ]);
else  if($status->result->status=='left')
$A->method->sendmessage(['chat_id'=>$chat_id,'text'=>'false' ]);

}
  }



  }
?> 
