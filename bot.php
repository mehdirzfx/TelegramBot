<?php
/*
    ~ Author : Mehdi Rezaei Far
*/

ob_start();
//--------------Token Bot--------------//

define('API_KEY','779696600:AAF3h674fSNtXCzgjoPlxLfs7oUANdKlKjg');
//--------------Token Replace-----------//
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//--------Variables--------//
$results = json_decode(file_get_contents('php://input'));
include_once('jdf.php');
date_default_timezone_set("Asia/Tehran");
$timestamp = $results->callback_query->message->edit_date;
$jalali_date = jdate("تاریخ: Y/m/d
زمان: H:i:s", $timestamp);
//---------------ADMIN-------------//
$admin = '698988367';
$admins = array (698988367,698988367);
$channel_user = '';
//-----------Variables-----------//
$update_id = $results->update_id;
$username = $results->message->from->username;
$from_id = $results->message->from->id;
$chat_id = $results->message->chat->id;
$is_bot = $results->message->from->is_bot;
$message_id = $results->message->message_id;
$text = $results->message->text;
$chat_type = $results->message->chat->type;
$forward_from_message_id = $results->message->forward_from_message_id;

$channel_post = $results->channel_post;
$ch_txt = $results->channel_post->text;
$ch_msg_id = $results->channel_post->message_id;
$first_name = $results->message->from->first_name;
$last_name = $results->message->from->last_name;

$data = $results->callback_query->data;
$from_id2 = $results->callback_query->from->id;
$chat_id2 = $results->callback_query->message->chat->id;
$message_id2 = $results->callback_query->message->message_id;
$username2 = $results->callback_query->from->username;
$callback_query_id = $results->callback_query->id;
$first_name2 = $results->callback_query->from->first_name;



$from_reply_id = $results->message->reply_to_message->from->id;
$from_reply_firstname = $results->message->reply_to_message->from->first_name;
$from_reply_lastname = $results->message->reply_to_message->from->last_name;
$sticker = $results->message->sticker;
$sticker_id = $results->message->sticker->file_id;
$photo = $results->message->photo;
$phone_number = $results->message->contact->phone_number;
$audio = $results->message->audio;
$document = $results->message->document;
$video = $results->message->video;
$voice = $results->message->voice;
$video_note = $results->message->video_note;
$location = $results->message->location;
$gif_id = $results->message->document->file_id;
$caption = $results->message->caption;
$forward_from_id = $results->message->forward_from->id;
$first_name_fwd = $results->message->forward_from->first_name;
$last_name_fwd = $results->message->forward_from->last_name;
$from_chat_id = $results->message->forward_from_chat->id;
$is_bot_fwd = $results->message->forward_from->is_bot;
$chat_type_fwd = $results->message->forward_from_chat->type;
$fwd_date = $results->message->forward_date;
$is_bot_add = $results->message->new_chat_participant->is_bot;
$user_id_add = $results->message->new_chat_participant->id;
//------------Files Bot-----------//
$start_text = file_get_contents('data/start.txt');
$Support_text = file_get_contents('data/support.txt');
$help_text = file_get_contents('data/help.txt');
$status_bot = file_get_contents("data/status.txt");
$
//-------inline--------//
$inline_query_id = $results->inline_query->id;
$query = $results->inline_query->query;
$query_from_id = $results->inline_query->from->id;
//-------Public function------//
function SendMessage($chat_id,$text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
};
function sendPhoto ($chat_id,$photo){
	bot('sendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>"hi"]);
}
function forwardMessage ($chat_id,$from_chat_id,$message_id){
	bot('forwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$from_chat_id,
'message_id'=>$message_id]);
}
function setChatTitle ($title){
	bot('setChatTitle',[
'chat_id'=>'-1001125570799',
'title'=>$title]);
}
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
function getUserProfilePhotos ($user_id,$offset) {
	$url = 'https://api.telegram.org/bot'.API_KEY.'/getUserProfilePhotos?user_id='.$user_id.'&offset='.$offset.'&limit=5';
	$update = file_get_contents($url);
	return $update;
}
function getUserProfilePhotos2 ($user_id) {
	$url = 'https://api.telegram.org/bot'.API_KEY.'/getUserProfilePhotos?user_id='.$user_id;
	$update = file_get_contents($url);
	return $update;
}
function download_file_toserver ($fileurl,$name) {
	file_put_contents($name, fopen($fileurl, 'r'));
}
function getfile ($file_id) {
	$url = 'https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$file_id;
	$updates = file_get_contents($url);
	$update = urldecode ($updates);
	$update = json_decode ($update);
	$result = $update->result;
	$filepath = $result->file_path;
	return $filepath;
}
function Delfile ($fName){
	$filehh = fopen($fName, "w")or die("Unable to open file!");
	fclose ($filehh);
	unlink ($fName);
}
function EditKeyboard($chat_id, $message_id, $keyboard){
	bot ('EditMessageReplyMarkup',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
	'reply_markup'=>$keyboard
    ]);
}

function Admin($chat_id, $from_id){
	global $admin;
	$get = bot('GetChatMember',['chat_id'=> $chat_id, 'user_id'=> $from_id]);
	$rank = $get->result->status;
	if($rank == 'creator' || $rank == 'administrator' || in_array($from_id, $admin)){
		return true;
	}
}
function deletefolder($path) {
     if ($handle=opendir($path)) {
       while (false!==($file=readdir($handle))) {
         if ($file<>"." AND $file<>"..") {
           if (is_file($path.'/'.$file))  {
             @unlink($path.'/'.$file);
             }
           if (is_dir($path.'/'.$file)) {
             deletefolder($path.'/'.$file);
             @rmdir($path.'/'.$file);
            }
          }
        }
      }
 }
function kickChatMember ($chat_id,$user_id){
bot ('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$user_id
]);
}
function deleteMessage ($chat_id,$message_id){
bot ('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
function unbanChatMember ($chat_id,$user_id){
bot ('unbanChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$user_id
]);
}
function pinChatMessage ($chat_id,$message_id){
bot ('pinChatMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
function unpinChatMessage ($chat_id){
bot ('unbanChatMember',[
'chat_id'=>$chat_id
]);
}
function getChatAdministrators ($chat_id){
bot ('getChatAdministrators',[
'chat_id'=>$chat_id
]);
}
function sendMediaGroup ($chat_id,$media){
bot ('sendMediaGroup',[
'chat_id'=>$chat_id,
'media'=>$media
]);
}
function answerCallbackQuery($callback_query_id,$text){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>true
    ]);
	}
	
function EditMessageText($chat_id, $message_id, $text, $mode = null, $keyboard = null){
   bot('editmessagetext',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>$text,
	'parse_mode'=>$mode,
	'reply_markup'=>$keyboard
    ]);
}

$getrank = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel_user&user_id=$from_id"), true);
$rank = $getrank['result']['status'];
//------------if (condition) { }----------//
if ($text == '/start' or $text == 'منوی اصلی'){
	
		sendAction($chat_id,'typing');
		bot ('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>'گذینه ها',
		'reply_markup'=>json_encode([
		'resize_keyboard'=>true,
		'keyboard'=>[
		[['text'=>'آمار ربات 📊'],['text'=>'تنظیم متن استارت 📩']],
		[['text'=>'تنظیم متن راهنما 🔹'],['text'=>'تنظیم متن پشتیبانی ✅']],
		[['text'=>'پیام همگانی 🔉'],['text'=>'فوروارد همگانی 🔉'],['text'=>'تنظیم چنل فوروارد']]

		]
		])
		]);

}
    
unlink("error_log");
