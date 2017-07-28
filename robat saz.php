<?php
define('API_KEY','440083216:AAGJ3NdcSePdjU8SvrPzgYo-F8H23c288rk');
$admin = 181460392;
$host_folder = 'https://ProTenVPS.elithost.ga/BotSaz';
$pvresan = "SudoShayan";
function makereq($method,$datas=[])
    {$url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch))
  {var_dump(curl_error($ch));}
    else
  {return json_decode($res);}
    }
function apiRequest($method, $parameters)
    {if (!is_string($method))
    {error_log("Method name must be a string\n");
    return false;}
    if (!$parameters) {
    $parameters = array();}
  else if (!is_array($parameters))
  {error_log("Parameters must be an array\n");
    return false;}
  foreach ($parameters as $key => &$val)
  {if (!is_numeric($val) && !is_string($val))
  {$val = json_encode($val);}
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
    }
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$chat_id = $update->message->chat->id;
$mossage_id = $update->message->message_id;
$from_id = $update->message->from->id;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$chanell = 'textloov';
$gold = file_get_contents('data/'.$from_id."/gold.txt");
function SendMessage($ChatId, $TextMsg)
{
makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
{
$myfile = fopen($filename, "w") or die("Unable to open file!");
fwrite($myfile, "$TXTdata");
fclose($myfile);
}
if (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"ظ…طھط§ط³ظپغŒظ…ًںک”\nط¯ط³طھط±ط³غŒ ط´ظ…ط§ ط¨ظ‡ ط§غŒظ† ط³ط±ظˆط± ظ…ط³ط¯ظˆط¯ ط´ط¯ظ‡ ط§ط³طھ.âڑ«ï¸ڈ");
	}
elseif(isset($update->callback_query))
{$callbackMessage = '';var_dump(makereq('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,'text'=>$callbackMessage]));
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
if (strpos($data, "del") !== false )
{$botun = str_replace("del ","",$data);
unlink("bots/".$botun."/index.php");
save("data/$chat_id/bots.txt","");
save("data/$chat_id/tedad.txt","0");
var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط­ط°ظپ ط´ط¯ !",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"ط¨ظ‡ ع©ط§ظ†ط§ظ„ ظ…ط§ ط¨ظ¾غŒظˆظ†ط¯غŒط¯",'url'=>"https://telegram.me/$chanell"]]]
                            ])
]                )
        );
}
else{var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ط®ط·ط§",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"ط¨ظ‡ ع©ط§ظ†ط§ظ„ ظ…ط§ ط¨ظ¾غŒظˆظ†ط¯غŒط¯",'url'=>"https://telegram.me/$chanell"]]]
                            ])
]                    )
             );
   }
}
elseif ($textmessage == 'ًں”™ ط¨ط±ع¯ط´طھ')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط³ظ„ط§ظ…ًںکƒًں‘‹\n\n- ط¨ظ‡ ط±ط¨ط§طھ ط³ط§ط² ط­ط±ظپظ‡ ط§غŒ طھظ„ع¯ط±ط§ظ… ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًںŒ¹\n- ط¨ظ‡ ط±ط§ط­طھغŒ ط¨ط±ط§غŒ ط®ظˆط¯ غŒع© ط±ط¨ط§طھ طھظ„ع¯ط±ط§ظ…غŒ ط±ط§غŒع¯ط§ظ† ط¨ط³ط§ط²غŒط¯ًںژ¯\n- ط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¬ط¯غŒط¯ ط¯ع©ظ…ظ‡ ط³ط§ط®طھ ط±ط¨ط§طھ ط±ط§ ط¨ط²ظ†غŒط¯ًں¤–\nًںژ— @$chanell ًںژ—",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ"],['text'=>"ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†"],['text'=>"âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ"]],
[['text'=>"ًں“‹ط±ط§ظ‡ظ†ظ…ط§"],['text'=>"ًں—‘ط­ط°ظپ ط±ط¨ط§طھ"]],
[['text'=>"ًں”°ظ‚ظˆط§ظ†غŒظ†"],['text'=>"ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±"],['text'=>"ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯"]],
[['text'=>"ًںژپع©ط¯ ظ‡ط¯غŒظ‡"],['text'=>"ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ"]],
[['text'=>" ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§"],['text'=>"ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±"],['text'=>"ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†"]],
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ًں“‹ط±ط§ظ‡ظ†ظ…ط§')
{
SendMessage($chat_id,"ط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¬ط¯غŒط¯ ط±ظˆغŒ ط¯ع©ظ…ظ‡ ًں¤– ط³ط§ط®طھ ط±ط¨ط§طھ ط¨ط²ظ†غŒط¯.\n\nط¨ط±ط§غŒ ط­ط°ظپ ط±ط¨ط§طھ ط±ظˆغŒ ط¯ع©ظ…ظ‡ â‌Œ ط­ط°ظپ ط±ط¨ط§طھ ط¨ط²ظ†غŒط¯.\n\nط¨ط±ط§غŒ ط¯غŒط¯ظ† طھط¹ط¯ط§ط¯ ط±ط¨ط§طھ ظ‡ط§ ط®ظˆط¯ ط±ظˆغŒ ط¯ع©ظ…ظ‡ ًںڑ€ ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ† ط¨ط²ظ†غŒط¯.\nًں¤– @$chanell");
}
 elseif ($textmessage == 'ًں”°ظ‚ظˆط§ظ†غŒظ†')
{
SendMessage($chat_id,"â„¹ ظ‚ظˆط§ظ†غŒظ† ط§ط³طھظپط§ط¯ظ‡ ط§ط² ط±ط¨ط§طھ:

âک¢ ظ‡ظ…ظ‡ ظ…ط·ط§ظ„ط¨ ط¨ط§غŒط¯ طھط§ط¨ط¹ ظ‚ظˆط§ظ†غŒظ† ط¬ظ…ظ‡ظˆط±غŒ ط§ط³ظ„ط§ظ…غŒ ط§غŒط±ط§ظ† ط¨ط§ط´ط¯.
âک¢ ط±ط¹ط§غŒطھ ط§ط¯ط¨ ظˆ ط§ط­طھط±ط§ظ… ط¨ظ‡ ع©ط§ط±ط¨ط±ط§ظ†.
âک¢ ط³ط§ط®طھ ظ‡ط±ع¯ظˆظ†ظ‡ ط±ط¨ط§طھ ط¯ط± ط¶ظ…غŒظ…ظ‡ +18 ط®ظ„ط§ظپ ظ‚ظˆط§ظ†غŒظ† ط±ط¨ط§طھ ظ…غŒط¨ط§ط´ط¯ ظˆ ط¯ط± طµظˆط±طھ ظ…ط´ط§ظ‡ط¯ظ‡ ط±ط¨ط§طھ ظ…ظˆط±ط¯ ظ†ط¸ط± ظ…ط³ط¯ظˆط¯ ظˆ ظ‡ظ…ع†ظ†غŒظ† ظ…ط¯غŒط± ط±ط¨ط§طھ ط§ط² ط±ط¨ط§طھ ظ…ط§ ط¨ظ„ط§ع© ظ…غŒط´ظˆط¯.
âک¢ ظ…ط³ط¦ظˆظ„غŒطھ ظ¾غŒط§ظ… ظ‡ط§غŒ ط±ط¯ ظˆ ط¨ط¯ظ„ ط´ط¯ظ‡ ط¯ط± ظ‡ط± ط±ط¨ط§طھ ط¨ط§ ظ…ط¯غŒط± ط¢ظ† ظ…غŒط¨ط§ط´ط¯ ظˆ ظ…ط§ ظ‡غŒع†ع¯ظˆظ†ظ‡ ظ…ط³ط¦ظˆظ„غŒطھغŒ ظ†ط¯ط§ط±غŒظ….
âک¢ ط¯ط± طµظˆط±طھ ظ…ط´ط§ظ‡ط¯ظ‡ ط§ط³طھظپط§ط¯ظ‡ ط§ط² ظ‚ط§ط¨ظ„غŒطھ ظ‡ط§غŒ ط±ط¨ط§طھ ط¯ط± ط¬ظ‡ط§طھ ظ…ظ†ظپغŒ ط¨ظ‡ ط´ط¯طھ ط¨ط±ط®ظˆط±ط¯ ظ…غŒط´ظˆط¯.
âک¢ ط§ع¯ط± ط¨ظ‡ ظ‡ط± ط¯ظ„غŒظ„غŒ ط¯ط±ط®ظˆط§ط³طھ ظ‡ط§غŒ ط±ط¨ط§طھ ط´ظ…ط§ ط¨ظ‡ ط³ط±ظˆط± ظ…ط§ ط¨غŒط´ ط§ط² ط­ط¯ ظ…ط¹ظ…ظˆظ„ ط¨ط§ط´ط¯ (ظˆ ط­ط³ط§ط¨ ط±ط¨ط§طھ ظˆغŒعکظ‡ ظ†ط¨ط§ط´ط¯) ع†ظ†ط¯ ط¨ط§ط±غŒ ط¨ظ‡ ط´ظ…ط§ ط§ط®ط·ط§ط± ط¯ط§ط¯ظ‡ ظ…غŒط´ظˆط¯ ط§ع¯ط± ط§غŒظ† ط§ط®ط·ط§ط± ظ‡ط§ ظ†ط§ط¯غŒط¯ظ‡ ع¯ط±ظپطھظ‡ ط´ظˆظ†ط¯ ط±ط¨ط§طھ ط´ظ…ط§ ظ…ط³ط¯ظˆط¯ ظˆ ط¨ظ‡ ظ‡غŒع† ط¹ظ†ظˆط§ظ† ط§ط² ظ…ط­ط¯ظˆط¯غŒطھ ط®ط§ط±ط¬ ظ†ظ…غŒط´ظˆط¯.

ًں†” @$chanell");
}
elseif ($textmessage == 'âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ')
{
SendMessage($chat_id,"ط§غŒظ† ط¨ط®ط´ ط¨ط²ظˆط¯غŒ ط±ط§ظ‡ ط§ظ†ط¯ط§ط²غŒ ظ…غŒط´ظˆط¯...");
}
elseif ($textmessage == 'طھظˆع©ظ† ط§غŒظ†ظپظˆâ„¹')
{
SendMessage($chat_id,"ط§ظ…ع©ط§ظ† ط³ط§ط®طھ ط§غŒظ† ط±ط¨ط§طھ ظپط¹ظ„ط§ ظˆط¬ظˆط¯ ظ†ط¯ط§ط±ط¯...");
}
elseif ($textmessage == 'طھظˆع©ظ† ط§غŒظ†ظپظˆ ظˆغŒعکظ‡â„¹')
{
SendMessage($chat_id,"ط§ظ…ع©ط§ظ† ط³ط§ط®طھ ط§غŒظ† ط±ط¨ط§طھ ظپط¹ظ„ط§ ظˆط¬ظˆط¯ ظ†ط¯ط§ط±ط¯...");
}
elseif ($textmessage == 'ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§')
{
SendMessage($chat_id,"ع©ط§ط±ط¨ط± ط¹ط²غŒط² ط¨ط±ط§غŒ ظˆط±ظˆط¯ ط¨ظ‡ ع©ط§ظ†ط§ظ„ ط±ط¨ط§طھ ط¨ظ‡ ط±ظˆغŒ ظ„غŒظ†ع© ط²غŒط± ع©ظ„غŒع© ظˆ ط³ظ¾ط³ ok ط±ط§ ط¨ط²ظ†غŒط¯ âœ”ï¸ڈ

https://telegram.me/joinchat/AAAAAEM83wxlOiKkjM9BcA");
}
elseif ($textmessage == 'ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ')
{
SendMessage($chat_id,"âک¢ ط¬ظ‡طھ ط§ط±طھط¨ط§ط· ط¨ط§ ظ…ط§ ط¨ظ‡ ط§غŒط¯غŒ ط²غŒط± ظ…ط±ط§ط¬ط¹ظ‡ ع©ظ†غŒط¯
ًں†” @$pvresan");
}
elseif ($textmessage == 'âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ ط؛غŒط±ظپط¹ط§ظ„')
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ًں”° ط¨ظ‡ ظ…ظ†ظˆغŒ ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ ط®ظˆط´ ط¢ظ…ط¯غŒط¯
ًں’¯ ظ„ط·ظپط§ غŒع© ع¯ط²غŒظ†ظ‡ ط±ط§ ط§ظ†طھط®ط§ط¨ ع©ظ†غŒط¯",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"ط¨ظ†ط± ظ…ظ†âڑœ"]
],
[
['text'=>"ع†ظ‚ط¯ط± ع©ط§ط±ط¨ط± ط¢ظˆط±ط¯ظ…â‌“"],['text'=>"ط§ط±طھظ‚ط§ ط­ط³ط§ط¨ًں†™"]
],
[
['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]
]
],
'resize_keyboard'=>true
])
]));
}
elseif ($textmessage == 'ط¨ظ†ط± ظ…ظ†âڑœ')
{
SendMessage($chat_id,"ط³ظ„ط§ظ…ًں‘‹

غŒظ‡ ط±ط¨ط§طھ ظ¾غŒط¯ط§ ع©ط±ط¯ظ… ط¨ط§ظ‡ط§ط´ ظ…غŒطھظˆظ†غŒ ط±ط¨ط§طھ ط¨ط³ط§ط²غŒًں™€ًںکچ
طھظˆط¶غŒط­ط§طھط´ :
ط±ط¨ط§طھ طھظ„ع¯ط±ط§ظ…غŒ ط®ظˆط¯ ط±ط§ ط¨ط³ط§ط²غŒط¯ ًں¤–
ط³ط§ط®طھ ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ط®طھظ„ظپ ط¨ط§ ط§ظ…ع©ط§ظ†ط§طھ ط¬ط§ظ„ط¨ ظˆ ط¹ط§ظ„غŒ ًں‘Œ
ظپظ‚ط· ط¨ط§ ع†ظ†ط¯ ع©ظ„غŒع© طµط§ط­ط¨ ط±ط¨ط§طھ طھظ„ع¯ط±ط§ظ…غŒ ط®ظˆط¯ ط´ظˆغŒط¯ â‌—ï¸ڈ
ط¨ط§ ط³ط±ط¹طھ ظˆ ع©غŒظپغŒطھ ط¨ط§ظ„ط§ ًںڑ€


https://telegram.me/BotSazTBot?start=$from_id");
}
elseif ($textmessage == 'ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†')
{
SendMessage($chat_id,"â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–
ًں‘¤ ظ†ط§ظ… = `$name`
âک¢ ط¢غŒط¯غŒ = `@$username`
ًں†” ط´ظ†ط§ط³ظ‡ = $from_id 

ًں‘¥ ظ„غŒظ†ع© ط¯ط¹ظˆطھ = 
http://telegram.me/BotSazTBot?start=$from_id
â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–
ًں†” @$chanell");
}
elseif ($textmessage == 'ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±')
{
SendMessage($chat_id,"â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–
ط§ط¨طھط¯ط§ ظˆط§ط±ط¯ @BotFather ط´ظˆغŒط¯âœ…

ط¯ط³طھظˆط± /newbot ط±ط§ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯âœ…

ط­ط§ظ„ط§ غŒظ‡ ط§ط³ظ… ط¨ط±ط§غŒ ط±ط¨ط§طھ ط¨ظپط±ط³طھغŒط¯âœ…

ظˆ ط³ظ¾ط³ ط§غŒط¯غŒ ط±ط¨ط§طھ ط±ظˆ ط§ط² ط´ظ…ط§ ظ…غŒط®ظˆط§ط¯...
ط§غŒط¯غŒ ظ…ظˆط±ط¯ ظ†ط¸ط± ط®ظˆط¯ ط±ط§ ط¨ظپط±ط³طھغŒط¯âœ…
طھظˆط¬ظ‡ ع©ظ†غŒط¯ : ط¯ط± ط¢غŒط¯غŒطŒ ط´ظ…ط§ ظپظ‚ط· ظ…غŒطھظˆط§ظ†غŒط¯ ط§ط² `_` ط¨ط±ط§غŒ ظپط§طµظ„ظ‡ ط¯ط§ط¯ظ† ط§ط³طھظپط§ط¯ظ‡ ع©ظ†غŒط¯ ظˆ ط¨ط§غŒط¯ ط¢ط®ط± ط¢غŒط¯غŒ ط±ط¨ط§طھ ع©ظ„ظ…ظ‡ Bot ط±ظˆ ط¨ط²ط§ط±غŒط¯ طھط§ ظ…ط´ع©ظ„غŒ ظ¾غŒط´ ظ†غŒط§ط¯âœ…

ظ¾غŒط§ظ…غŒ ظ†ط³ط¨طھط§ ط·ظˆظ„ط§ظ†غŒ ط¯ط±غŒط§ظپطھ ظ…غŒع©ظ†غŒط¯ ع©ظ‡ طھظˆع©ظ† ط¯ط± ط¢ظ† ظ¾غŒط§ظ… ط§ط³طھâœ…
طھظˆع©ظ† ظ…طھظ†غŒ ظ…ط§ظ†ظ†ط¯ ًں‘‡
310470471:AAEAe5CepBLswJaZd4jNy9NDYNCnTqPe5mY
ظ…غŒط¨ط§ط´ط¯.

ط­ط§ظ„ ط¨ظ‡ ط±ط¨ط§طھ ظ…ط§ ط¨ط±ع¯ط´طھظ‡ ظˆ طھظˆع©ظ† ط®ظˆط¯ ط±ط§ ط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯âœ…
â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–");
}
elseif($textmessage == 'ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯')
{
save("data/$from_id/step.txt","pishnahad");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ظ¾غŒط´ظ†ظ‡ط§ط¯ ط®ظˆط¯ ط±ط§ ط¨ط±ط§غŒ ط±ط¨ط§طھ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯ :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($step == 'pishnahad')
{
save("data/$from_id/step.txt","none");
$feed = $textmessage;
SendMessage($admin,"ظ¾غŒط´ظ†ظ‡ط§ط¯غŒ ط¬ط¯غŒط¯ ط¨ط±ط§غŒ ط±ط¨ط§طھ ط§ط² ط·ط±ظپًں‘‡

ًں‘¤ ع©ط§ط±ط¨ط± = @$username
ًں†” ط´ظ†ط§ط³ظ‡ = @$from_id

ظ…طھظ† ظ¾غŒط´ظ†ظ‡ط§ط¯ =
$textmessage");
SendMessage($chat_id,"âœŒï¸ڈ ط¨ط§ طھط´ع©ط±
ظ¾غŒط´ظ†ظ‡ط§ط¯ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¨ظ‡ ظ…ط¯غŒط± ط§ط±ط³ط§ظ„ ط´ط¯...âœ”ï¸ڈ");
}
elseif ($textmessage == '/back')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط³ظ„ط§ظ…ًںکƒًں‘‹\n\n- ط¨ظ‡ ط±ط¨ط§طھ ط³ط§ط² ط­ط±ظپظ‡ ط§غŒ طھظ„ع¯ط±ط§ظ… ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًںŒ¹\n- ط¨ظ‡ ط±ط§ط­طھغŒ ط¨ط±ط§غŒ ط®ظˆط¯ غŒع© ط±ط¨ط§طھ طھظ„ع¯ط±ط§ظ…غŒ ط±ط§غŒع¯ط§ظ† ط¨ط³ط§ط²غŒط¯ًںژ¯\n- ط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¬ط¯غŒط¯ ط¯ع©ظ…ظ‡ ط³ط§ط®طھ ط±ط¨ط§طھ ط±ط§ ط¨ط²ظ†غŒط¯ًں¤–\nًںژ— @$chanell ًںژ—",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ"],['text'=>"ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†"],['text'=>"âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ"]],
[['text'=>"ًں“‹ط±ط§ظ‡ظ†ظ…ط§"],['text'=>"ًں—‘ط­ط°ظپ ط±ط¨ط§طھ"]],
[['text'=>"ًں”°ظ‚ظˆط§ظ†غŒظ†"],['text'=>"ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±"],['text'=>"ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯"]],
[['text'=>"ًںژپع©ط¯ ظ‡ط¯غŒظ‡"],['text'=>"ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ"]],
[['text'=>" ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§"],['text'=>"ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±"],['text'=>"ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†"]],
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ط¢ظ…ط§ط±ًں“‹' && $from_id == $admin){
$number = count(scandir("bots"))-1;
$uvis = file_get_contents('data/vips.txt');
	$usercount = 1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
$avis = -1;
	$fp = fopen( "data/vips.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$avis ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"ط¢ظ…ط§ط± ط¯ظ‚غŒظ‚ ط±ط¨ط§طھ ط¯ط± ظ‡ظ…غŒظ† ط³ط§ط¹طھ âڈ°\n--------------------------------\nًں“‹طھط¹ط¯ط§ط¯ ط§ط¹ط¶ط§غŒ ط±ط¨ط§طھ : $usercount\n\nًں¤–طھط¹ط¯ط§ط¯ ط±ط¨ط§طھظ‡ط§ : $number\n\nًںڈ†طھط¹ط¯ط§ط¯ ط§ط¹ط¶ط§غŒ ظˆغŒعکظ‡ : $avis\n--------------------------------\nًںڈ†ط¢غŒط¯غŒ ظ‡ط§غŒ ظˆغŒعکظ‡ :\n$uvis");
	}
elseif($textmessage == 'ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±')
{
save("data/$from_id/step.txt","feedback");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ظ†ط¸ط± ط®ظˆط¯ ط±ط§ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($step == 'feedback')
{
save("data/$from_id/step.txt","none");
$feed = $textmessage;
SendMessage($admin,"غŒع© ظ†ط¸ط± ط¬ط¯غŒط¯ًں“œ\n\n-ع©ط§ط±ط¨ط± `$from_id`ًںچ؟\n\n-ط¢غŒط¯غŒ `@$username`ًںژ¨\n\n`ًں“‹ظ…طھظ† ظ†ط¸ط± : $textmessage`");
SendMessage($chat_id,"ط§ط±ط³ط§ظ„ ط´ط¯.");
}
elseif ($step == 'create bot11')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index10.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index10.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot37')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index37.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
])
]));
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index37.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
])
]));
}
}
}
elseif ($step == 'create bot38')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index38.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
])
]));
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index38.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
])
]));
}
}
}
elseif ($step == 'create bot10')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index9.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index9.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot9')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index8.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index8.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot8')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index7.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index7.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot7')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index6.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index6.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
$source = str_replace("[*ADMIN*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot12')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index12.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source);
save("bots/$un/step.txt","none");
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
save("bots/$un/step.txt","none");
$source = file_get_contents("bot/index12.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot13')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index13.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index13.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot14')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index14.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index14.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif (strpos($textmessage , "/delvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/delvip","",$textmessage);
      $newlist = str_replace($text,"",$vip);
      save("data/vips.txt",$newlist);
SendMessage($admin,"ًں”¹ع©ط§ط±ط¨ط±$text ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط§ط² ظ„غŒط³طھ ط§ط¹ط¶ط§غŒ ظˆغŒعکظ‡ ط­ط°ظپ ع¯ط±ط¯غŒط¯.");
SendMessage($logch,"ًں‘¤ ع©ط§ط±ط¨ط± $text ط§ط² ظ„غŒط³طھ ط§ط¹ط¶ط§غŒ ظˆغŒعکظ‡ ط­ط°ظپ ع¯ط±ط¯غŒط¯.");
}
else {
SendMessage($chat_id,"â›”ï¸ڈ ط´ظ…ط§ ط§ط¯ظ…غŒظ† ظ†غŒط³طھغŒط¯.");
}
}
elseif ($textmessage == '/creator')
{
SendMessage($chat_id,"ط§غŒظ† ط±ط¨ط§طھ طھظˆط³ط· @SudoShayan ط³ط§ط®طھظ‡ ط´ط¯ظ‡ ط§ط³طھ.");
}
elseif ($textmessage == '/Creator')
{
SendMessage($chat_id,"ط§غŒظ† ط±ط¨ط§طھ طھظˆط³ط· @SudoShayan ط³ط§ط®طھظ‡ ط´ط¯ظ‡ ط§ط³طھ.");
}
elseif ($textmessage == '/update')
{
SendMessage($chat_id,"ط±ط¨ط§طھ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¨ط±ظˆط²ط±ط³ط§ظ†غŒ ط´ط¯");
}
elseif ($textmessage == '/Update')
{
SendMessage($chat_id,"ط±ط¨ط§طھ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¨ط±ظˆط²ط±ط³ط§ظ†غŒ ط´ط¯");
}
elseif ($step == 'create bot23')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index23.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index23.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot25')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index25.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index25.php");
$source = str_replace("**TOKEN**",$token,$source);
$source = str_replace("**ADMIN**",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot15')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index15.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…\nط§ط² طھظˆغŒ @BotFather ط­ط§ظ„طھ ط§غŒظ†ظ„ط§غŒظ† ط±ط¨ط§طھطھظˆظ† `(setinline)` ط±ظˆ ظپط¹ط§ظ„ ع©ظ†غŒط¯ًںکƒ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index15.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…\nط§ط² طھظˆغŒ @BotFather ط­ط§ظ„طھ ط§غŒظ†ظ„ط§غŒظ† ط±ط¨ط§طھطھظˆظ† `(setinline)` ط±ظˆ ظپط¹ط§ظ„ ع©ظ†غŒط¯ًںکƒ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot18')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index18.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index18.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot16') {
$token = $textmessage ;

      $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
      //==================
      function objectToArrays( $object ) {
        if( !is_object( $object ) && !is_array( $object ) )
        {
        return $object;
        }
        if( is_object( $object ) )
        {
        $object = get_object_vars( $object );
        }
      return array_map( "objectToArrays", $object );
      }

  $resultb = objectToArrays($userbot);
  $un = $resultb["result"]["username"];
  $ok = $resultb["ok"];
    if($ok != 1) {
      //Token Not True
      SendMessage($chat_id,"طھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±!");
    }
    else
    {
    SendMessage($chat_id,"ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ...");
    file_put_contents("bots/$un/vip.txt","vip");
    file_put_contents("bots/$un/ad_vip.txt","hfyodlhxtod5545jg");
        file_put_contents("bots/$un/step.txt","none");
    file_put_contents("bots/$un/users.txt","");
    file_put_contents("bots/$un/token.txt","$text");
        file_put_contents("bots/$un/start.txt","ط¨ظ‡ ط±ط¨ط§طھ ط¯ظˆط² ط®ظˆط´ ط§ظˆظ…ط¯ظٹ ! â‌¤ï¸ڈâ€Œ
ط§ع¯ظ‡ ظ…ظٹط®ظˆط§ظٹ طھظˆ ع¯ط±ظˆظ‡ط§طھ ظٹط§ ظ¾غŒ ظˆغŒ ظ‡ط§طھ ط¨ط§ ط¯ظˆط³طھط§طھ ط¯ظˆط² ط¨ط§ط²غŒ ظƒظ†ظٹط¯ ظˆ ط­ظˆطµظ„طھظˆظ† ط³ط± ط±ظپطھظ‡ ط±ظˆغŒ ط´ط±ظˆط¹ ط¨ط§ط²غŒ ط¨ط²ظ† ظˆ ط¨ط§ط²غŒظˆ ط´ط±ظˆط¹ ظƒظ†ًںک‰
ظˆظ‚طھغŒ ط¨ط§ط²غŒ طھظ…ظˆظ… ط´ط¯ ظ†طھط§ظٹط¬ ط§ط¹ظ„ط§ظ… ظ…ظٹط´ظ‡ًں“ٹ");
    if (file_exists("bots/$un/index.php")) {
    $source = file_get_contents("bot/index16.php");
    $source = str_replace("**TOKEN**",$token,$source);
    $source = str_replace("**ADMIN**",$from_id,$source);
    save("bots/$un/index.php",$source);  
    file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");

var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"â™»ï¸ڈًںڑ€ ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¢ظ¾ط¯غŒطھ ط´ط¯ !",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'inline_keyboard'=>[
                [
                   ['text'=>'ط±ط¨ط§طھ ط´ظ…ط§','url'=>"https://telegram.me/$un"]
                ]
                
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }
    else {
    save("data/$from_id/tedad.txt","1");
    save("data/$from_id/step.txt","none");
    save("data/$from_id/bots.txt","$un");
    mkdir("bots/$un");
    file_put_contents("bots/$un/vip.txt","vip");
    file_put_contents("bots/$un/ad_vip.txt","hfyodlhxtod5545jg");
        file_put_contents("bots/$un/step.txt","none");
    file_put_contents("bots/$un/users.txt","");
    file_put_contents("bots/$un/token.txt","$text");
        file_put_contents("bots/$un/start.txt","ط¨ظ‡ ط±ط¨ط§طھ ط¯ظˆط² ط®ظˆط´ ط§ظˆظ…ط¯ظٹ ! â‌¤ï¸ڈâ€Œ
ط§ع¯ظ‡ ظ…ظٹط®ظˆط§ظٹ طھظˆ ع¯ط±ظˆظ‡ط§طھ ظٹط§ ظ¾غŒ ظˆغŒ ظ‡ط§طھ ط¨ط§ ط¯ظˆط³طھط§طھ ط¯ظˆط² ط¨ط§ط²غŒ ظƒظ†ظٹط¯ ظˆ ط­ظˆطµظ„طھظˆظ† ط³ط± ط±ظپطھظ‡ ط±ظˆغŒ ط´ط±ظˆط¹ ط¨ط§ط²غŒ ط¨ط²ظ† ظˆ ط¨ط§ط²غŒظˆ ط´ط±ظˆط¹ ظƒظ†ًںک‰
ظˆظ‚طھغŒ ط¨ط§ط²غŒ طھظ…ظˆظ… ط´ط¯ ظ†طھط§ظٹط¬ ط§ط¹ظ„ط§ظ… ظ…ظٹط´ظ‡ًں“ٹ");
    $source = file_get_contents("bot/index16.php");
    $source = str_replace("**TOKEN**",$token,$source);
    $source = str_replace("**ADMIN**",$from_id,$source);
    save("bots/$un/index.php",$source);  
    file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");

var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"ًںڑ€ ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ظ†طµط¨ ط´ط¯ !",    
                'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'inline_keyboard'=>[
                [
                   ['text'=>'ط±ط¨ط§طھ ط´ظ…ط§','url'=>"https://telegram.me/$un"]
                ]
                
              ],
              'resize_keyboard'=>true
           ])
        ]));
}
}
}
elseif ($step == 'create bot19')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index19.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index19.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot20')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index20.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index20.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot21')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index21.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index21.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot17')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index17.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index17.php");
$source = str_replace("**TOKEN**",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot5')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 100)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index4.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index4.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot4')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];

if($ok != 1)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index3.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index3.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot3')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];

if($ok != 1)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index2.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index2.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot2')
{$token = $textmessage;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];

if($ok != 1)
{SendMessage($chat_id,"â‌—ï¸ڈطھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±â‌—ï¸ڈ");}
else
save("data/$from_id/tedad.txt","1");
save("data/$from_id/bots.txt","$un");
{SendMessage($chat_id,"ًںڑ©ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ًںڑ©");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/index1.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
mkdir("bots/$un");
$source = file_get_contents("bot/index1.php");
$source = str_replace("[*BOTTOKEN*]",$token,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯âœ…",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"@".$un,'url'=>"https://telegram.me/".$un]]]
                            ])
                               ]
        )
    );
}
}
}
elseif ($step == 'create bot') {
$token = $textmessage ;

      $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
      //==================
      function objectToArrays( $object ) {
        if( !is_object( $object ) && !is_array( $object ) )
        {
        return $object;
        }
        if( is_object( $object ) )
        {
        $object = get_object_vars( $object );
        }
      return array_map( "objectToArrays", $object );
      }

  $resultb = objectToArrays($userbot);
  $un = $resultb["result"]["username"];
  $ok = $resultb["ok"];
    if($ok != 1) {
      //Token Not True
      SendMessage($chat_id,"طھظˆع©ظ† ظ†ط§ظ…ط¹طھط¨ط±!");
    }
    else
    {
    SendMessage($chat_id,"ط¯ط± ط­ط§ظ„ ط³ط§ط®طھ ط±ط¨ط§طھ ...");
    if (file_exists("bots/$un/index.php")) {
    $source = file_get_contents("bot/index.php");
    $source = str_replace("**TOKEN**",$token,$source);
    $source = str_replace("**ADMIN**",$from_id,$source);
    save("bots/$un/index.php",$source);  
    file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");

var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"â™»ï¸ڈًںڑ€ ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¢ظ¾ط¯غŒطھ ط´ط¯ !",
    'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'inline_keyboard'=>[
                [
                   ['text'=>'ط±ط¨ط§طھ ط´ظ…ط§','url'=>"https://telegram.me/$un"]
                ]
                
              ],
              'resize_keyboard'=>true
           ])
        ]));
    }
    else {
    save("data/$from_id/tedad.txt","1");
    save("data/$from_id/step.txt","none");
    save("data/$from_id/bots.txt","$un");
    
    mkdir("bots/$un");
    mkdir("bots/$un/data");
    mkdir("bots/$un/data/btn");
    mkdir("bots/$un/data/words");
    mkdir("bots/$un/data/profile");
    mkdir("bots/$un/data/setting");
    
    save("bots/$un/data/blocklist.txt","");
    save("bots/$un/data/last_word.txt","");
    save("bots/$un/data/pmsend_txt.txt","ًں“®Message Sent!");
    save("bots/$un/data/start_txt.txt","Hello Wellcome To My Robot ًںک‰ًں‘Œ
Send Me Your Message ًںŒ¹");
    save("bots/$un/data/forward_id.txt","");
    save("bots/$un/data/users.txt","$from_id\n");
    mkdir("bots/$un/data/$from_id");
    save("bots/$un/data/$from_id/type.txt","admin");
    save("bots/$un/data/$from_id/step.txt","none");
    
    save("bots/$un/data/btn/btn1_name","");
    save("bots/$un/data/btn/btn2_name","");
    save("bots/$un/data/btn/btn3_name","");
    save("bots/$un/data/btn/btn4_name","");
    
    save("bots/$un/data/btn/btn1_post","");
    save("bots/$un/data/btn/btn2_post","");
    save("bots/$un/data/btn/btn3_post","");
    save("bots/$un/data/btn/btn4_post","");
  
    save("bots/$un/data/setting/sticker.txt","âœ…");
    save("bots/$un/data/setting/video.txt","âœ…");
    save("bots/$un/data/setting/voice.txt","âœ…");
    save("bots/$un/data/setting/file.txt","âœ…");
    save("bots/$un/data/setting/photo.txt","âœ…");
    save("bots/$un/data/setting/music.txt","âœ…");
    save("bots/$un/data/setting/forward.txt","âœ…");
    save("bots/$un/data/setting/joingp.txt","âœ…");
    

    $source = file_get_contents("bot/index.php");
    $source = str_replace("**TOKEN**",$token,$source);
    $source = str_replace("**ADMIN**",$from_id,$source);
    save("bots/$un/index.php",$source);  
    file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");

var_dump(makereq('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"ًںڑ€ ط±ط¨ط§طھ ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ظ†طµط¨ ط´ط¯ !",    
                'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
              'inline_keyboard'=>[
                [
                   ['text'=>'ط±ط¨ط§طھ ط´ظ…ط§','url'=>"https://telegram.me/$un"]
                ]
                
              ],
              'resize_keyboard'=>true
           ])
        ]));
}
}
}
elseif($textmessage == 'ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†')
{$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"ط´ظ…ط§ ظ‡ظ†ظˆط² ظ‡غŒع† ط±ط¨ط§طھغŒ ظ†ط³ط§ط®طھظ‡ ط§غŒط¯ !");
return;
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ظ„غŒط³طھ ط±ط¨ط§طھ ظ‡ط§غŒ ط´ظ…ط§ :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"ًں‘‰ @".$botname,'url'=>"https://telegram.me/".$botname]]]
                            ])
                                ]
        )
    );
}
elseif($textmessage == '/start')
{
if (!file_exists("data/$from_id/step.txt"))
{mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط³ظ„ط§ظ…ًںکƒًں‘‹\n\n- ط¨ظ‡ ط±ط¨ط§طھ ط³ط§ط² ط­ط±ظپظ‡ ط§غŒ طھظ„ع¯ط±ط§ظ… ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًںŒ¹\n- ط¨ظ‡ ط±ط§ط­طھغŒ ط¨ط±ط§غŒ ط®ظˆط¯ غŒع© ط±ط¨ط§طھ طھظ„ع¯ط±ط§ظ…غŒ ط±ط§غŒع¯ط§ظ† ط¨ط³ط§ط²غŒط¯ًںژ¯\n- ط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¬ط¯غŒط¯ ط¯ع©ظ…ظ‡ ط³ط§ط®طھ ط±ط¨ط§طھ ط±ط§ ط¨ط²ظ†غŒط¯ًں¤–\nًںژ— @$chanell ًںژ—",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ"],['text'=>"ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†"],['text'=>"âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ"]],
[['text'=>"ًں“‹ط±ط§ظ‡ظ†ظ…ط§"],['text'=>"ًں—‘ط­ط°ظپ ط±ط¨ط§طھ"]],
[['text'=>"ًں”°ظ‚ظˆط§ظ†غŒظ†"],['text'=>"ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±"],['text'=>"ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯"]],
[['text'=>"ًںژپع©ط¯ ظ‡ط¯غŒظ‡"],['text'=>"ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ"]],
[['text'=>" ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§"],['text'=>"ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±"],['text'=>"ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†"]],
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ًں—‘ط­ط°ظپ ط±ط¨ط§طھ') {
if (file_exists("data/$from_id/step.txt"))
{}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"â‌—ï¸ڈط´ظ…ط§ ظ‡ظ†ظˆط² ظ‡غŒع† ط±ط¨ط§طھغŒ ظ†ط³ط§ط®طھظ‡ ط§غŒط¯â‌—ï¸ڈ");}
else
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ًں¤–ط±ط¨ط§طھ ظ…ظˆط±ط¯ ظ†ط¸ط± ط®ظˆط¯ ط±ط§ ط§ظ†طھط®ط§ط¨ ظ†ظ…ط§غŒغŒط¯ًں¤–",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"ًں‘‰ @".$botname,'callback_data'=>"del ".$botname]]]
                            ])
                               ]
        )
    );

}
}
elseif ($textmessage == '/panel')
if ($from_id == $admin)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"ط³ظ„ط§ظ… ظ‚ط±ط¨ط§ظ†ًںکƒًں‘‹\nط¨ظ‡ ظ¾ظ†ظ„ ظ…ط¯غŒط±غŒطھًں“‹ ط±ط¨ط§طھ ط®ظˆط¯ ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًںکپ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ط§ط±ط³ط§ظ„ ط¨ظ‡ ظ‡ظ…ظ‡ًں“¬"],['text'=>"ط¢ظ…ط§ط±ًں“‹"]
              ],
              [
                ['text'=>"ط¢ظ†ط¨ظ„ط§ع©âœ…"],['text'=>"ط¨ظ„ط§ع©â›”ï¸ڈ"]
              ],
              [
                ['text'=>"ظپط±ظˆط§ط±ط¯ ط¨ظ‡ ظ‡ظ…ظ‡ًںڑ€"],['text'=>"ط³ط§ط®طھ ع©ط¯ ظ‡ط¯غŒظ‡ًںژپ"]
              ],
              [
                ['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"ط¨ط±ط§ط¯ط± ط´ظ…ط§ ط§ط¯ظ…غŒظ† ط±ط¨ط§طھ ظ†غŒط³طھغŒط¯ًںکگًںک‚");
}
elseif (strpos($textmessage , "/ban") !== false && $chat_id == $admin)
{
$bban = str_replace('/ban','',$textmessage);
if ($bban != '')
{
$myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"`ع©ط§ط±ط¨ط± $bban ط¨ط§ ظ…ظˆظپظ‚غŒطھ ظ…ط³ط¯ظˆط¯ ط´ط¯ًںچƒ`");
SendMessage($chanell,"`ع©ط§ط±ط¨ط± $bban ط§ط² ط³ط±ظˆط± ط±ط¨ط§طھ ط³ط§ط² ظ…ط³ط¯ظˆط¯ ط´ط¯ًںچƒ`");
}
}
elseif (strpos($textmessage , "/unban") !== false && $chat_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","banlist.txt");
save("banlist.txt",$newlist);
SendMessage($chat_id,"`ع©ط§ط±ط¨ط± $unbban ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط§ط² ظ…ط³ط¯ظˆط¯غŒطھ ط®ط§ط±ط¬ ط´ط¯ًںچƒ`");
SendMessage($chanell,"`ع©ط§ط±ط¨ط± $unbban ط§ط² ظ…ط³ط¯ظˆط¯غŒطھ ط³ط±ظˆط± ط±ط¨ط§طھ ط³ط§ط² ط®ط§ط±ط¬ ط´ط¯ًںچƒ`");
}
}
elseif ($textmessage == 'ط§ط±ط³ط§ظ„ ط¨ظ‡ ظ‡ظ…ظ‡ًں“¬')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","sendtoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ظ¾غŒط§ظ… ط®ظˆط¯ ط±ط§ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ط§ط¯ظ…غŒظ† ظ†غŒط³طھغŒط¯.");
}
elseif ($step == 'sendtoall')
{
SendMessage($chat_id,"ظ¾غŒط§ظ… ط¯ط± ط­ط§ظ„ ط§ط±ط³ط§ظ„ ظ…غŒط¨ط§ط´ط¯...âڈ°");
save("data/$from_id/step.txt","none");
$fp = fopen( "data/users.txt", 'r');
while( !feof( $fp)) {
$ckar = fgets( $fp);
SendMessage($ckar,$textmessage);
}
SendMessage($chat_id,"ظ¾غŒط§ظ… ط´ظ…ط§ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط¨ظ‡ طھظ…ط§ظ… ع©ط§ط±ط¨ط±ط§ظ† ط§ط±ط³ط§ظ„ ط´ط¯ًں‘چ");
}
elseif ($textmessage == 'ظپط±ظˆط§ط±ط¯ ط¨ظ‡ ظ‡ظ…ظ‡ًںڑ€')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","fortoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ظ¾غŒط§ظ… ط®ظˆط¯ ط±ط§ ط§ط±ط³ط§ظ„ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ط§ط¯ظ…غŒظ† ظ†غŒط³طھغŒط¯.");
}
elseif ($step == 'fortoall')
{
save("data/$from_id/step.txt","none");
		 SendMessage($chat_id,"ط¯ط± ط­ط§ظ„ ظپط±ظˆط§ط±ط¯ ظ¾غŒط§ظ… ط´ظ…ط§...");
$forp = fopen( "data/users.txt", 'r');
while( !feof( $forp)) {
$fakar = fgets( $forp);
Forward($fakar, $chat_id,$mossage_id);
		 }
		 makereq('sendMessage',[
		 'chat_id'=>$chat_id,
		 'text'=>"ًںڑ€ظ¾غŒط§ظ… ط´ظ…ط§ ط¨ط±ط§غŒ طھظ…ط§ظ…غŒ ع©ط§ط±ط¨ط±ط§ظ† ظپط±ظˆط§ط±ط¯ ط´ط¯âœ…",
		 ]);
	 }
elseif ($textmessage == 'ط¨ظ„ط§ع©â›”ï¸ڈ'){
if ($chat_id == $admin) {
SendMessage($chat_id,"ط¨ط±ط§غŒ ط¨ظ„ط§ع©â›”ï¸ڈ ع©ط±ط¯ظ† ع©ط§ط±ط¨ط±غŒ ط¨ظ‡ طµظˆط±طھ ط²غŒط± ط¹ظ…ظ„ ع©ظ†غŒط¯.ًں‘‡\n/ban USERID\nط¨ظ‡ ط¬ط§غŒ USERID ط¢غŒط¯غŒ ط¹ط¯ط¯غŒ ع©ط§ط±ط¨ط± ظ…ظˆط±ط¯ظ†ط¸ط± ط±ط§ ط¨ع¯ط°ط§ط±غŒط¯ًںکƒ");
}else{ SendMessage($chat_id,"ط´ظ…ط§ ط§ط¯ظ…غŒظ† ظ†غŒط³طھغŒط¯.");  
}
}
elseif ($textmessage == 'ط¢ظ†ط¨ظ„ط§ع©âœ…'){
if ($chat_id == $admin) {
SendMessage($chat_id,"ط¨ط±ط§غŒ ط¢ظ†ط¨ظ„ط§ع©âœ… ع©ط±ط¯ظ† ع©ط§ط±ط¨ط±غŒ ط¨ظ‡ طµظˆط±طھ ط²غŒط± ط¹ظ…ظ„ ع©ظ†غŒط¯.ًں‘‡\n/unban USERID\nط¨ظ‡ ط¬ط§غŒ USERID ط¢غŒط¯غŒ ط¹ط¯ط¯غŒ ع©ط§ط±ط¨ط± ظ…ظˆط±ط¯ظ†ط¸ط± ط±ط§ ط¨ع¯ط°ط§ط±غŒط¯ًںکƒ");
}else{ SendMessage($chat_id,"ط´ظ…ط§ ط§ط¯ظ…غŒظ† ظ†غŒط³طھغŒط¯."); 
}
}
elseif (strpos($textmessage , "/setvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/setvip","",$textmessage);
$myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");  
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($chat_id,"ًں”¸ط¹ظ…ظ„غŒط§طھ ط§ط±طھظ‚ط§ ط­ط³ط§ط¨ ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط§ظ†ط¬ط§ظ… ط´ط¯.ًں“ƒ\nع©ط§ط±ط¨ط± $text ط¨ظ‡ ظ„غŒط³طھ ط§ط¹ط¶ط§غŒ ظˆغŒعکظ‡ًںڈ†ط§ط¶ط§ظپظ‡ ط´ط¯ًںکƒ");
}
elseif($textmessage == "ط³ط§ط®طھ ع©ط¯ ظ‡ط¯غŒظ‡ًںژپ" && $chat_id == $admin){
     save("data/$from_id/step.txt","freecode");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط§ط³ظ… ع©ط¯ ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}    
elseif($step == "freecode" && $chat_id == $admin){
save("$textmessage.txt");
SendMessage($chat_id,"ع©ط¯ ط±ط§غŒع¯ط§ظ† ط¨ط§ ظ…ظˆظپظ‚غŒطھ ط³ط§ط®طھظ‡ ط´ط¯.");
$chhhh = -1001128062732;
Sendmessage($chhhh,"ع©ط¯ ط¬ط¯غŒط¯ ط³ط§ط®طھظ‡ ط´ط¯âœ…

ًںژپ ع©ط¯ = $textmessage 

ط§ظˆظ„غŒظ† ظ†ظپط± ع©ظ‡ ع©ط¯ ط±ط§ ط¯ط± ط±ط¨ط§طھ ًں‘‡
@BotSazTBot
ظˆط§ط±ط¯ ع©ظ†ط¯ ط­ط³ط§ط¨ط´ ظˆغŒعکظ‡ ظ…غŒط´ظˆط¯...âœ”ï¸ڈ");
}
elseif($textmessage == "ًںژپع©ط¯ ظ‡ط¯غŒظ‡"){
save("data/$from_id/step.txt","codeeee");
SendMessage($chat_id,"ًںژپ ع©ط¯ ظ‡ط¯غŒظ‡ ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ :
â‌Œ ظ„ط؛ظˆ ط¨ط§ ط§ط±ط³ط§ظ„ ط¯ط³طھظˆط± 
â‌—ï¸ڈ /back â‌—ï¸ڈ");
}
elseif($step == "codeeee"){
	if(!file_exists("$textmessage.txt")){
		var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"â‌—ï¸ڈع©ط¯ ظ…ظˆط±ط¯ ظ†ط¸ط± ظˆط¬ظˆط¯ ظ†ط¯ط§ط±ط¯
â‌—ï¸ڈغŒط§ ظ‚ط¨ظ„ط§ ط§ط³طھظپط§ط¯ظ‡ ط´ط¯ظ‡ ط§ط³طھ",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ"],['text'=>"ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†"],['text'=>"âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ"]],
[['text'=>"ًں“‹ط±ط§ظ‡ظ†ظ…ط§"],['text'=>"ًں—‘ط­ط°ظپ ط±ط¨ط§طھ"]],
[['text'=>"ًں”°ظ‚ظˆط§ظ†غŒظ†"],['text'=>"ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±"],['text'=>"ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯"]],
[['text'=>"ًںژپع©ط¯ ظ‡ط¯غŒظ‡"],['text'=>"ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ"]],
[['text'=>" ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§"],['text'=>"ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±"],['text'=>"ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†"]],
],
'resize_keyboard'=>true
                            ])
    ]));

save("data/$from_id/step.txt","nonde");
	}else{
unlink("$textmessage.txt");
$sss = file_get_contents("data/vips.txt");
save("data/vips.txt",$sss."$from_id\n");
		var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھط¨ط±غŒع© ع©ط§ط±ط¨ط± ط¹ط²غŒط²ًںکƒ
ط­ط³ط§ط¨ ط´ظ…ط§ ظˆغŒعکظ‡ ط´ط¯...âœ”ï¸ڈ",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ"],['text'=>"ًںژ—ط±ط¨ط§طھ ظ‡ط§غŒ ظ…ظ†"],['text'=>"âک¢ط²غŒط± ظ…ط¬ظ…ظˆط¹ظ‡ ع¯غŒط±غŒ"]],
[['text'=>"ًں“‹ط±ط§ظ‡ظ†ظ…ط§"],['text'=>"ًں—‘ط­ط°ظپ ط±ط¨ط§طھ"]],
[['text'=>"ًں”°ظ‚ظˆط§ظ†غŒظ†"],['text'=>"ًں“•ط±ط§ظ‡ظ†ظ…ط§ ط¨ط§طھ ظپط§ط¯ط±"],['text'=>"ًں“©ظ¾غŒط´ظ†ظ‡ط§ط¯ ط¬ط¯غŒط¯"]],
[['text'=>"ًںژپع©ط¯ ظ‡ط¯غŒظ‡"],['text'=>"ًں“¬ظ¾ط´طھغŒط¨ط§ظ†غŒ"]],
[['text'=>" ًں“¢ع©ط§ظ†ط§ظ„ ظ…ط§"],['text'=>"ًں“œط§ط±ط³ط§ظ„ ظ†ط¸ط±"],['text'=>"ًں‘¤ظ…ط´ط®طµط§طھ ظ…ظ†"]],
],
'resize_keyboard'=>true
                            ])

    ]));
	$chhhh = -1001128062732;
	sendMessage($chhhh,"ع©ط¯ $textmessage ط§ط³طھظپط§ط¯ظ‡ ط´ط¯âœ…

طھظˆط³ط· ع©ط§ط±ط¨ط± ط¨ط§ ظ…ط´ط®طµط§طھ :

ظ†ط§ظ… = `$name`
ط´ظ†ط§ط³ظ‡ = $from_id
ط§غŒط¯غŒ = `@$username`

طھط¨ط±غŒع©...ًںژپ");
	}
	}
elseif ($textmessage == 'ًںژ¯ط³ط§ط®طھ ط±ط¨ط§طھ')
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط¨ظ‡ ظ…ظ†ظˆغŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًں‘¾\nظ„ط·ظپط§ غŒع© ط¯ع©ظ…ظ‡ ط±ط§ ط§ظ†طھط®ط§ط¨ ع©ظ†غŒط¯.ًں¤–",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ط¨ط®ط´ ظˆغŒعکظ‡ًںڈ†"]
              ],
              [
                ['text'=>"ط¨ط®ط´ ط±ط§غŒع¯ط§ظ†ًںژ¯"]
              ],
              [
                ['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]
              ]
           ],
'resize_keyboard'=>true
        ])
     ]));
 }
elseif ($textmessage == 'ًں”™ ط¨ط±ع¯ط´طھ ط¨ظ‡ ظ…ظ†ظˆ')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ط¨ظ‡ ظ…ظ†ظˆغŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط®ظˆط´ ط¢ظ…ط¯غŒط¯ًں‘¾\nظ„ط·ظپط§ غŒع© ط¯ع©ظ…ظ‡ ط±ط§ ط§ظ†طھط®ط§ط¨ ع©ظ†غŒط¯.ًں¤–",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ط¨ط®ط´ ظˆغŒعکظ‡ًںڈ†"]
              ],
              [
                ['text'=>"ط¨ط®ط´ ط±ط§غŒع¯ط§ظ†ًںژ¯"]
              ],
              [
                ['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]
              ]
           ],
'resize_keyboard'=>true
        ])
     ]));
 }
elseif ($textmessage == 'ط¨ط®ط´ ظˆغŒعکظ‡ًںڈ†')
if (strpos($uvip , "$from_id") !== false  ) {
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"ظ†ظˆط¹ ط±ط¨ط§طھ ط±ط§ ط§ظ†طھط®ط§ط¨ ع©ظ†غŒط¯.ًںکƒ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ظ¾غŒط§ظ… ط±ط³ط§ظ† ظˆغŒعکظ‡ًں“¬"]
              ],
              [
         ['text'=>"غŒظˆط²ط± ط§غŒظ†ظپظˆ ظˆغŒعکظ‡â„¹ï¸ڈ"]
              ],
	      [
['text'=>"ظ…ط§ط´غŒظ† ط­ط³ط§ط¨ ظˆغŒعکظ‡ًں–Œ"]
],
[
['text'=>"ط¯ط³طھغŒط§ط± ظ…طھظ† ظˆغŒعکظ‡ًں“‹"]
],
[
['text'=>"ًں…¾ط§غŒع©ط³ ط§ظˆ ظˆغŒعکظ‡â‌ژ"]
],
[
['text'=>"ط¢ظ¾ظ„ظˆط¯ط± ظˆغŒعکظ‡ًں“¤"]
],
[
['text'=>"طھظˆع©ظ† ط§غŒظ†ظپظˆ ظˆغŒعکظ‡â„¹"]
],
[
['text'=>"ظˆغŒظˆ ع¯غŒط± ظˆغŒعکظ‡ًں‘پ"]
],
[
	        ['text'=>"ًں”™ ط¨ط±ع¯ط´طھ ط¨ظ‡ ظ…ظ†ظˆ"]
	      ]
            ]
        ])
    ]));
 }
else
{
$textvip = 'âڑœï¸ڈ ظ…طھط§ط³ظپط§ظ†ظ‡ ط­ط³ط§ط¨ ط´ظ…ط§ ط±ط§غŒع¯ط§ظ† ط§ط³طھ.
â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–â‍–
ًں”¸ظ…ط²ط§غŒط§ ط§ع©ط§ظ†طھ ظˆغŒعکظ‡ :

1âƒ£ ط³ط§ط®طھ ط±ط¨ط§طھ PHP ط¨ط¯ظˆظ† طھط¨ظ„غŒط؛ط§طھ
ط³ط§ط®طھ ط±ط¨ط§طھ ظ‡ط§غŒًں¤– :
1-ظ¾غŒط§ظ…ط±ط³ط§ظ† ظˆغŒعکظ‡ًںژ—
3-ط§غŒع©ط³ ط§ظˆ ظˆغŒعکظ‡ًںژھ
4-ظ…ط§ط´غŒظ† ط­ط³ط§ط¨ ظˆغŒعکظ‡ًںڈµ
5-غŒظˆط²ط± ط§غŒظ†ظپظˆ ظˆغŒعکظ‡ًں“œ
6-ط¯ط³طھغŒط§ط± ظ…طھظ† ظˆغŒعکظ‡ًں“‌
9-ط¢ظ¾ظ„ظˆط¯ط± ظˆغŒعکظ‡ًں“¤
10-ظˆغŒظˆ ع¯غŒط± ظˆغŒعکظ‡ (ط¨ط²ظˆط¯غŒ...)
2âƒ£ ظ¾ط§ط³ط®ع¯ظˆغŒغŒ ط³ط±غŒط¹طھط± ط¯ط± ظ¾ط´طھغŒط¨ط§ظ†غŒ
3âƒ£ ط¯ط± ط§ظˆظ„ظˆغŒطھ ط¨ظˆط¯ظ† ط¢ظ¾ط¯غŒطھ ظ‡ط§ ط¨ط±ط§غŒ ط§ع©ط§ظ†طھ ظ‡ط§غŒ ظˆغŒعکظ‡
âƒ£4 ط§ظپط²ط§غŒط´ ظ…ط­ط¯ظˆط¯غŒطھ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨ظ‡ 7

ًں’° ظ‚غŒظ…طھ ظˆغŒعکظ‡ ط´ط¯ظ† ط§ع©ط§ظ†طھ ط´ظ…ط§ ط¯ط± ط±ط¨ط§طھ ظپظ‚ط· ظˆ ظپظ‚ط· 2000 طھظˆظ…ط§ظ† ظ…غŒط¨ط§ط´ط¯.

ًں“، ظ¾ط±ط¯ط§ط®طھ ط¨طµظˆط±طھ ط¯ط±ع¯ط§ظ‡ ط§غŒظ†طھط±ظ†طھغŒ :
ًںŒگ payping.ir/shayantg/2000
â†©ï¸ڈ ظ¾ط³ ط§ط² ظ¾ط±ط¯ط§ط®طھ ط¹ع©ط³ ط§ط² طµظپط­ظ‡ ط¨ع¯غŒط±غŒط¯ ظˆ ط¨ظ‡ ط§غŒط¯غŒ ط²غŒط± ط¨ط¯ظ‡غŒط¯ :
ًں†” `@master_shayan_bot`';
SendMessage($chat_id,$textvip);
}
elseif ($textmessage == 'ط¨ط®ط´ ط±ط§غŒع¯ط§ظ†ًںژ¯')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"ظ†ظˆط¹ ط±ط¨ط§طھ ط±ط§ ط§ظ†طھط®ط§ط¨ ع©ظ†غŒط¯.ًںکƒ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ًں…¾ط§غŒع©ط³ ط§ظˆâ‌ژ"],['text'=>"ًں“؟طµظ„ظˆط§طھ ط´ظ…ط§ط±"]
              ],
       [
                ['text'=>"غŒظˆط²ط± ط§غŒظ†ظپظˆâ„¹ï¸ڈ"],['text'=>"ظ…ط§ط´غŒظ† ط­ط³ط§ط¨ًں–Œ"]
              ],
              [
         ['text'=>"ط²ظ…ط§ظ†âڈ°"],['text'=>"ط¯ط³طھغŒط§ط± ظ…طھظ†ًں–ٹ"]
              ],
[
['text'=>"ع†ع© ع©ظ†ظ†ط¯ظ‡ ع©ط¯ظ‡ط§غŒ phpًں”چ"],['text'=>"ظˆغŒظˆ ع¯غŒط±ًں‘پ"]
],
[
['text'=>"طھظˆع©ظ† ط§غŒظ†ظپظˆâ„¹ï¸ڈ"],['text'=>"ظ¾غŒط§ظ…ط±ط³ط§ظ†ًں’¬"]
],
[
         ['text'=>"ًں”™ ط¨ط±ع¯ط´طھ ط¨ظ‡ ظ…ظ†ظˆ"]
       ]
            ]
        ])
    ]));
 }
elseif ($textmessage == 'ظ¾غŒط§ظ…ط±ط³ط§ظ†ًں’¬')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot23");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ظ¾غŒط§ظ… ط±ط³ط§ظ† ظˆغŒعکظ‡ًں“¬')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 7 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ‡ظپطھ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ع©ظˆطھط§ظ‡ ع©ظ†ظ†ط¯ظ‡ ظ„غŒظ†ع© ظˆغŒعکظ‡ًں”—')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot12");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'غŒظˆط²ط± ط§غŒظ†ظپظˆ ظˆغŒعکظ‡â„¹ï¸ڈ')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 7 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ‡ظپطھ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot13");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]));
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ظ…ط§ط´غŒظ† ط­ط³ط§ط¨ ظˆغŒعکظ‡ًں–Œ')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 7 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ‡ظپطھ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot14");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ط¯ط³طھغŒط§ط± ظ…طھظ† ظˆغŒعکظ‡ًں“‹')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 7 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ‡ظپطھ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot15");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ًں…¾ط§غŒع©ط³ ط§ظˆ ظˆغŒعکظ‡â‌ژ')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 7 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ‡ظپطھ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot16");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ط§غŒظ…غŒظ„ ط¬ط¹ظ„غŒ ظˆغŒعکظ‡ًں“§')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot17");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ظ…ط®ظپغŒ ط³ط§ط² ظ…طھظ† ظˆغŒعکظ‡ًں”چ')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot18");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ط¢ظ¾ظ„ظˆط¯ط± ظˆغŒعکظ‡ًں“¤')
{
SendMessage($chat_id,"ط¯ط±ط­ط§ظ„ طھط¹ظ…غŒط±...ًں”©");
}
elseif ($textmessage == 'wuehe8wjw8')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot19");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ظپط§ظ„ ط­ط§ظپط¸ ظˆغŒعکظ‡ًں“œ')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot20");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ظپط§ظ„ ط­ط§ظپط¸ًں“œ')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot21");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'طھظˆع©ظ† ط§غŒظ†ظپظˆ طھط³طھغŒâ„¹ï¸ڈ')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot38");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
])
]));
}
elseif ($textmessage == 'طھظˆع©ظ† ط§غŒظ†ظپظˆ ظˆغŒعکظ‡ طھط³طھغŒâ„¹ï¸ڈ')
if (strpos($uvip , "$from_id") !== falseآ  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot37");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
])
]));
}
else
{
SendMessage($chat_id,"ط´ظ…ط§ ع©ط§ط±ط¨ط± ظˆغŒعکظ‡ًںڈ†ظ†غŒط³طھغŒط¯âک¹ï¸ڈ");
}
elseif ($textmessage == 'ظˆغŒظˆ ع¯غŒط±ًں‘پ')
{
SendMessage($chat_id,"ط§ظ…ع©ط§ظ† ط³ط§ط®طھ ط§غŒظ† ط±ط¨ط§طھ ظپط¹ظ„ط§ ظˆط¬ظˆط¯ ظ†ط¯ط§ط±ط¯...");
}
elseif ($textmessage == 'ظˆغŒظˆ ع¯غŒط± ظˆغŒعکظ‡ًں‘پ')
{
SendMessage($chat_id,"ط§ظ…ع©ط§ظ† ط³ط§ط®طھ ط§غŒظ† ط±ط¨ط§طھ ظپط¹ظ„ط§ ظˆط¬ظˆط¯ ظ†ط¯ط§ط±ط¯...");
}
elseif ($textmessage == 'ًں…¾ط§غŒع©ط³ ط§ظˆâ‌ژ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot2");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'غŒظˆط²ط± ط§غŒظ†ظپظˆâ„¹ï¸ڈ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot3");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ظ…ط§ط´غŒظ† ط­ط³ط§ط¨ًں–Œ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot4");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ط²ظ…ط§ظ†âڈ°')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot5");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ًں“؟طµظ„ظˆط§طھ ط´ظ…ط§ط±')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot8");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ظ…طھظ† ط¹ط§ط´ظ‚ط§ظ†ظ‡ًں’‌')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot9");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ط¯ط³طھغŒط§ط± ظ…طھظ†ًں–ٹ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot10");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ع†ع© ع©ظ†ظ†ط¯ظ‡ ع©ط¯ظ‡ط§غŒ phpًں”چ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 5 && $from_id != '96493162')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ ظ¾ظ†ط¬ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @$pvresan ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot11");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ع©ظˆطھط§ظ‡ ع©ظ†ظ†ط¯ظ‡ ظ„غŒظ†ع©ًںŒ€')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot7");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'ًں¤–طھظپط±غŒط­غŒ')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"ًںڑ«ظ‡ط± ظ†ظپط± طھظ†ظ‡ط§ ظ‚ط§ط¯ط± ط¨ظ‡ ط³ط§ط®طھ طµط¯ ط±ط¨ط§طھ ط§ط³طھًںڑ«\nط¨ط±ط§غŒ ط³ط§ط®طھ ط±ط¨ط§طھ ط¨غŒط´طھط± ط¨ط§ @3 ظ…ع©ط§طھط¨ظ‡ ع©ظ†غŒط¯.");
return;
}
save("data/$from_id/step.txt","create bot25");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"طھظˆع©ظ† ط±ط§ ظˆط§ط±ط¯ ع©ظ†غŒط¯ : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"ًں”™ ط¨ط±ع¯ط´طھ"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{SendMessage($chat_id,"â‌—ï¸ڈط¯ط³طھظˆط± ط§ط´طھط¨ط§ظ‡ ط§ط³طھâ‌—ï¸ڈ");}
$txxt = file_get_contents('data/users.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('data/users.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('data/users.txt',$aaddd);
    }
?>
