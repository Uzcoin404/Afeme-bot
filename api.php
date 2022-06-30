<?php
require_once('functions.php');

$id = $_GET['id'];

if ($id) {
    file_get_contents("https://api.telegram.org/bot5297964553:AAF8H_f2UB3xXI0TVWRJMKjdrGXYKoJY0mk/sendMessage?text=Salom&chat_id=$id");
}
?>