<?php
  
//$_GET["username"] = ($_GET["username"])?$_GET["username"]:"username".time();
require __DIR__ . '/vendor/autoload.php';
  
use Ejabberd\Rest\Client;  
//$host = "sgzone.chatsauce.com";
$host = "box1sg.chatsauce.com";


///49412_5a2aa217e9433fec14000010@muc.chatqb.chatsauce.com

/*
21911205-49412@chatqb.chatsauce.com/android_00000000-23d3-12f0-03ab-0ea775aa2bc5
21911205-49412@chatqb.chatsauce.com/1309178824-quickblox-54072
21910930-49412@chatqb.chatsauce.com/android_00000000-7f15-fcd4-f4a3-42ec071acbeb


<presence to="21910930-49412@chatqb.chatsauce.com/android_00000000-7f15-fcd4-f4a3-42ec071acbeb" id="YM4TM-14461" from="49412_59fbfafd0ae099b743000001@muc.chatqb.chatsauce.com/21911205" xmlns="jabber:client"><x xmlns="http://jabber.org/protocol/muc#user"><item nick="21911205" jid="21911205-49412@chatqb.chatsauce.com/1309178824-quickblox-54072" affiliation="admin" role="moderator"/><item nick="21911205" jid="21911205-49412@chatqb.chatsauce.com/android_00000000-23d3-12f0-03ab-0ea775aa2bc5" affiliation="admin" role="moderator"/></x></presence>

<presence id="59081743-04d4-40d5-8a99-2b6237fc7287:join" to="21910930-49412@chatqb.chatsauce.com/android_00000000-7f15-fcd4-f4a3-42ec071acbeb" from="49412_59fbfafd0ae099b743000001@muc.chatqb.chatsauce.com/21911189" xmlns="jabber:client"><x xmlns="http://jabber.org/protocol/muc#user"><item nick="21911189" jid="21911189-49412@chatqb.chatsauce.com/1309178824-quickblox-54051" affiliation="admin" role="moderator"/></x></presence>

<presence to="21910930-49412@chatqb.chatsauce.com/android_00000000-7f15-fcd4-f4a3-42ec071acbeb" id="NFWd5-8156" from="49412_5a44fc52e9433fc51500001f@muc.chatqb.chatsauce.com/21911040" xmlns="jabber:client"><x xmlns="http://jabber.org/protocol/muc#user"><item nick="21911040" jid="21911040-49412@chatqb.chatsauce.com/android_00000000-5e31-25cf-0017-1acb506dc789" affiliation="admin" role="moderator"/></x></presence>


<message to='21980716-49412@chatqb.chatsauce.com' id='5a6168060502be8f08349793' type='chat'><body>xxvx</body><markable xmlns='urn:xmpp:chat-markers:0'/><extraParams xmlns='jabber:client'><message_sqlid>47</message_sqlid><dialog_id>5a17b5b1532d451091000006</dialog_id><send_to_chat>1</send_to_chat><senderId>21910930</senderId><date_sent>1516333062</date_sent><save_to_history>1</save_to_history></extraParams></message>
*/

// 21910930-49412@chatqb.chatsauce.com/android_00000000-7f15-fcd4-f4a3-42ec071acbeb
//_createRoomWithOpts("etc","",["title"=>"ACXXX"]);
//_sendMessage();
//_createAccount();
_archiveGet();

//nano vendor/gylraj/ejabberd/src/Client.php 

function _archiveGet($username = "user", $pass = "pass"){
	//echo $GLOBALS['host'];
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	try{
		echo $client->archiveGet($username, $pass);
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _createAccount($username = "user", $pass = "pass"){
	//echo $GLOBALS['host'];
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	try{
		echo $client->createAccount($username, $pass);
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _sendMessage($type = "", $from= "", $to= "", $subject= "", $body= ""){
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	//$type = 'groupchat';
	$type = 'chat';
	$from = 'b@'.$GLOBALS['host'];
	$to = 'a@'.$GLOBALS['host'];
	//$to = 'ccc123@room.sgzone.chatsauce.com';
	$subject = 'Subject123';
	$body = 'Body123';
	try{
		echo $client->sendMessage($type, $from, $to, $subject, $body);
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _createRoom($name="", $service=""){
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	
	$name = $name."_".time();
	$service = "room.".$GLOBALS['host'];
	try{
		echo $client->createRoom($name, $service);
	}catch(Exception $e){
		$x = $e->getMessage();
		var_dump($x);
		die();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _createRoomWithOpts($name="", $service="", $options = []){
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	
	$name = $name."_".time();
	$service = "room.".$GLOBALS['host'];
	$options = $options;
	try{
		echo $client->createRoom($name, $service, $options);
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _numResources($user = ""){
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	
	$user = "a";
	echo $user;
	try{
		var_dump($client->numResources($user));
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}

function _numActiveUsers($day = 30){
	$client = new Client([
	'apiUrl' => 'http://'.$GLOBALS['host'].':5285/api/',
	'host' => $GLOBALS['host']
	]);
	
	$day = 30;
	try{
		echo $client->numActiveUsers($day);
	}catch(Exception $e){
		$x = $e->getMessage();
		$pattern = '/\{(?:[^{}]|(?R))*\}/x';
		preg_match_all($pattern, $x, $matches);
		$ccc =json_decode( $matches[0][0],true);
		var_dump($ccc);
	}
}





































