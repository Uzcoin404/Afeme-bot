<?php
require_once('functions.php');

// $getAdvert = file_get_contents('http://ali98.uz/api/post');
// echo $_GET['post_id'] ? $_GET['post_id'] : 'No post';
// echo $getAdvert;
$postID = $_GET['post_id'];

if ($postID) {
    file_get_contents("https://api.telegram.org/bot5297964553:AAF8H_f2UB3xXI0TVWRJMKjdrGXYKoJY0mk/sendMessage?text=$postID&chat_id=829349149");
} else {
    file_get_contents("https://api.telegram.org/bot5297964553:AAF8H_f2UB3xXI0TVWRJMKjdrGXYKoJY0mk/sendMessage?text=dsgfdgdfg&chat_id=829349149");
}