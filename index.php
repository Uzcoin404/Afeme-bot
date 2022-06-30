<?php
date_default_timezone_set('Asia/Tashkent');
$siteUrl = 'https://63b3-84-54-74-228.ngrok.io/Afeme/';

require_once('library/Telegram.php');
require_once('components/db.php');
require_once('functions.php');
require_once('user.php');
include_once('components/products.php');
include_once('components/brands.php');
include_once('components/items.php');
include_once('components/basket.php');

$telegram = new Telegram("5297964553:AAF8H_f2UB3xXI0TVWRJMKjdrGXYKoJY0mk", true);
$chatID = "-1001760618618";
$func = new Functions();
$Admin = "829349149";
$postID = $_GET['post_id'];

// $telegram->setWebhook($siteUrl);

$message = isset($telegram->getData()['message']) ? $telegram->getData()['message'] : '';
$messageID = $telegram->MessageID();
$text = $telegram->Text();
$firstName = $telegram->FirstName();
$lastName = $telegram->LastName();
$fullName = $firstName . ' ' . $lastName;

$data = json_decode(file_get_contents("http://ali98.uz/api/post"));

if (is_array($data) && !empty($data)) {
    
    $images = $data[0]->image;
    $advertID = $data[0]->id;
    $saleName = $data[0]->sale_id->name_uz;
    $priceSum = $data[0]->price_som;
    $priceUsd = $data[0]->price_usd;
    $room = $data[0]->room;
    $htypeName = $data[0]->htype_id->name_uz;
    $region = $data[0]->region_id->name_uz;
    $city = $data[0]->city_id->name_uz;
    $street = $data[0]->street;

    if (!empty($images)) {
        // for ($i = 0; $i < count($images); $i++) {
            
        // }
        $func->toChannelPhoto($images[0]->url, $saleName . "ga $room xonali $htypeName sotiladi
$priceSum so'm  $priceUsd$
$region viloyati $city $street ko'chasi
[Batafsil ko'rish](http://ali98.uz/api/post/$advertID)");
    }
    print("<pre>" . print_r($data[0]->sale_id->name_uz, true) . "</pre>");
}
?>