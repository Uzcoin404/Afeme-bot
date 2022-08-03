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

var_dump($postID);
echo "Welcome to Afeme bot";

$data = $postID ? json_decode(file_get_contents("http://ali98.uz/api/post/$postID"))->data : null;

if ($data && $postID) {
    $images = count($data->image) > 0 ? $data->image[0]->url : 'https://archello.s3.eu-central-1.amazonaws.com/images/2018/10/11/Contemporary-Modern-House-Design-6.1539270983.8601.jpg';
    $advertID = $data->id;
    $saleNameUZ = $data->sale_id->id == 5 ? "Ijaraga beriladi" : "Sotiladi";
    $priceSum = number_format($data->price_som, 2, '.' , ' ') . " so'm";
    $priceUsd = "$". number_format($data->price_usd, 2, '.' , ',');
    $room = $data->room;
    $htypeNameUZ = $data->htype_id->name_uz;
    $htypeNameRU = $data->htype_id->name_ru;
    $regionUZ = $data->region_id->name_uz;
    $regionRU = $data->region_id->name_ru;
    $city = $data->city_id->name_uz;
    $street = $data->street;
    $description = substr($data->description, 0, 250) . '...';
    $userID = $data->user_id;

    $textUz =  "🏠 <b>$room</b> xonali <b>$htypeNameUZ</b> $saleNameUZ 📢

💰 <b>$priceUsd</b>
📃$description
$regionUZ viloyati $city $street ko'chasi

📎 <a href='uzcoin404.github.io/Afeme/advert/$advertID'>Batafsil ko'rish</a>       <a href='uzcoin404.github.io/Afeme/user/$userID'>E'lon beruvchi</a>";


    $advertTitleRU = $data->sale_id->id == 5 ? 
    "<b>$room</b> комнатная <b>$htypeNameRU</b> в аренду" : 
    "Продается <b>$room</b> комнатная <b>$htypeNameRU</b>";

    $textRu =  "🏠 $advertTitleRU 📢

💰 <b>$priceUsd</b>
📃$description
$regionRU область $city, $street улица

📎 <a href='uzcoin404.github.io/Afeme/advert/$advertID'>Узнать больше</a>    <a href='uzcoin404.github.io/Afeme/user/$userID'>Рекламодатель</a>";

    var_dump($textUz, $textRu);
    $func->toChannel($images);
    $func->toChannel($images);

}
print("<pre>" . print_r($data, true) . "</pre>");
?>