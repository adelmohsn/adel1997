<?php
$te =new connect();
#$sql="INSERT INTO ok (id) VALUES ({$this->message_id});";
#$te->insert_into($sql);
# $sql="INSERT INTO te_id (id,name,type) VALUES ($chat_id,$chat->title,(SELECT id FROM type WHERE ty='{$chat->type}'));";

 #$resuilt=$te->qaury("select ty from type where ty='private' ;");
#foreach( $resuilt->fetch_assoc() as $a)
#$this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>$a]);
class connect {
 protected $API_KEY="https://api.telegram.org/bot789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY";
 
 protected $message;
 protected $chat;
 protected $chat_id;
 protected $text;
 protected $update;
protected $message_id;

 protected $conn;
 protected $status;
function  __construct(){
    $this->update= json_decode(file_get_contents('php://Input'));
    $this->conn = new mysqli("127.0.0.1", "root", "","db");
 $this->message=$this->update->channel_post;
 $this->chat=$this->message->chat;
$this->chat_id=$this->chat->id;
$this->text=$this->chat->text;
$this->message_id=$this->message->message_id;

    
if(!is_null($this->message->document)){

   $name= str_replace('_',' ',$this->message->document->file_name);
    $type=$this->message->document->mime_type;
    $size=round(($this->message->document->file_size/1048576),2);
    $file_id=(int)$this->message->document->file_ld;
   
   
   
   
/*  $this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>"name :".$name."
      
      file_id :".$file_id."
        type :".$type."
        size :".$size."MB"."
        link :".$link]);
   /*     $f= fopen("hi.txt","w");
        fwrite($f,"name :".$name."
        type :".$type."
        size :".round(($size/1048576),2)."MB"."
        link :".$link);
     */
      $this->insert_into("INSERT INTO library (id,message_id,name,type,size,link,c_link)  VALUES ({$file_id},{$this->message->message_id},'{$name}',0,{$size},2,'ss')"); 
    # $sql="INSERT INTO ok (id) VALUES ({$this->message_id});";
     
    #$this->insert_into($sql);
    // Check connection
 }
 
# $this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message_id,'text'=>'error']);  

}
public function ok($value){
   $this->conn->query("INSERT INTO ok (id,id_channel) VALUES ({$value},2)");

}
 public function insert_into($sql){
   
  
   
 if ($this->conn->connect_error){
    $status= die("Connection failed: " . $this->conn->connect_error);
    $this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>'error']);  

 }else{
   


 if ($this->conn->query($sql) === TRUE) {

 #$id=$this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>'ok'])  ;
  

   #$this->ok($id["result"]["message_id"]);  

 }
 else {
      $this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>'not insert']);  
      }
    
}
 $this->sendmessage(['chat_id'=>$this->chat_id ,'reply_to_message_id'=>$this->message->message_id,'text'=>$status]);  
 }public function qaury($sql)
{
   $ret=$this->conn->query($sql);
  if($ret->num_rows>0){
     $r= $ret->fetch_assoc();        
     
  return $r;}
  else return 'error'; 

 }


    function sendmessage($data){
      $method= "https://api.telegram.org/bot789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY/sendmessage";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$method);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $rec=curl_exec($ch);
        if(curl_error($ch))
        var_dump(curl_error($ch));
        else return json_decode( $rec,true);
    } 
}

?>