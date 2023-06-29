<?php
 $update = json_decode(file_get_contents('php://input'),true);
 



 $message=$update['message'];
$chat=$message['chat'];
$chat_id=$chat['id'];
$query=$update['callback_query'];
$data=$query['data'];
$text=$message['text'];
$url="https://api.telegram.org/bot/789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY/sendmessage";

if (isset($update['callback_query'])) {
    sendmessage([ 'chat_id' => $update['callback_query']['from']['id'], 'text' => 'hello' ]);

 }

$button1 = array('text' => 'Button 1', 'callback_data' => '1');
$button2 = array('text' => 'Button 2', 'callback_data' => '2');
//$reply_markup = $A->replyKeyboardMarkup([ 'keyboard' => $auth_keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
//$reply_markup = array('inline_keyboard' =>  array($button1)  );
$reply_markup = array(
    'inline_keyboard' => array(
        array($button1),array($button2)
    )
);
$json_markup = json_encode($reply_markup);
if($text)
sendmessage([ 'chat_id' => $chat_id, 'text' => $text, 'reply_markup' => $json_markup ]);
else 
sendmessage([ 'chat_id' => $chat_id, 'text' => 'no', 'reply_markup' => $json_markup ]);

if($data=='1'){
sendmessage([ 'chat_id' => $query['from']['id'], 'text' =>$data  ]);
}
function sendmessage($data){
    $url="https://api.telegram.org/bot789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY/sendmessage";

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$rec=curl_exec($ch);
    if(curl_error($ch))
    var_dump(curl_error($ch));
    else return json_decode($rec,true);
}


/*

$update = json_decode(file_get_contents('php://input'), TRUE);

$botToken = "789483519:AAE8c1b3qbKnFoEGTsnDt6PskxhUbN1jHhY";
$botAPI = "https://api.telegram.org/bot" . $botToken;

// Check if callback is set
if (isset($update['callback_query'])) {

    // Reply with callback_query data
    $data = http_build_query([
        'text' => 'Selected language: ' . $update['callback_query']['data'],
        'chat_id' => $update['callback_query']['from']['id']
    ]);
    file_get_contents($botAPI . "/sendMessage?{$data}");
}

// Check for normal command
$msg = $update['message']['text'];
if ($msg === "/start") {

    // Create keyboard
    $data = http_build_query([
        'text' => 'Please select language;',
        'chat_id' => $update['message']['from']['id']
    ]);
    $keyboard = json_encode([
        "inline_keyboard" => [
            [
                [
                    "text" => "english",
                    "callback_data" => "english"
                ],
                [
                    "text" => "russian",
                    "callback_data" => "russian"
                ]
            ]
        ]
    ]);

    // Send keyboard
    file_get_contents($botAPI . "/sendMessage?{$data}&reply_markup={$keyboard}");
}*/
?>