<?php
date_default_timezone_set('Asia/Tashkent');
$siteUrl = 'https://63b3-84-54-74-228.ngrok.io/Afeme/';

require_once('library/Telegram.php');
require_once('functions.php');
require_once('user.php');

$telegram = new Telegram("5297964553:AAF8H_f2UB3xXI0TVWRJMKjdrGXYKoJY0mk", true);
$chatID = "-1001760618618";
$func = new Functions();
$Admin = "829349149";
$postID = $_GET['post'];

// $telegram->setWebhook($siteUrl);

$message = isset($telegram->getData()['message']) ? $telegram->getData()['message'] : '';
$messageID = $telegram->MessageID();
$text = $telegram->Text();
$firstName = $telegram->FirstName();
$lastName = $telegram->LastName();
$fullName = $firstName . ' ' . $lastName;

$data = json_decode(file_get_contents("http://ali98.uz/api/post/$postID"))->data;

if ($data) {
    $images = count($data->image) > 0 ? $data->image[0]->url : 'https://archello.s3.eu-central-1.amazonaws.com/images/2018/10/11/Contemporary-Modern-House-Design-6.1539270983.8601.jpg';
    $advertID = $data->id;
    $saleName = $data->sale_id->name_uz;
    $priceSum = number_format($data->price_som, 2, '.' , ' ') . " so'm";
    $priceUsd = "$". number_format($data->price_usd, 2, '.' , ',');
    $room = $data->room;
    $htypeName = $data->htype_id->name_uz;
    $region = $data->region_id->name_uz;
    $city = $data->city_id->name_uz;
    $street = $data->street;
    $description = substr($data->description, 0, 250) . '...';
    $userID = $data->user_id;

    
    $text =  "🏠 $saleName" . "ga <b>$room</b> xonali <b>$htypeName</b> sotiladi 📢

💰 <b>$priceUsd</b>
📃$description
$region viloyati $city $street ko'chasi

📎 <a href='uzcoin404.github.io/Afeme/advert/$advertID'>Batafsil ko'rish</a>       <a href='uzcoin404.github.io/Afeme/user/$userID'>E'lon beruvchi</a>";

    $func->toChannelPhoto('https://archello.s3.eu-central-1.amazonaws.com/images/2018/10/11/Contemporary-Modern-House-Design-6.1539270983.8601.jpg', $text, true);

    // print("<pre>" . print_r($data->sale_id->name_uz, true) . "</pre>");
}
?>