<?php

class Functions {
    public $lang;

    public function __constructor(){
        
    }

    public function toChannel($text, $parseMode = false, $replyMarkup = null){
        global $telegram, $chatID;
        
        if ($replyMarkup == null && !$parseMode) {
            $telegram->sendMessage(['chat_id' => $chatID, 'text' => $text]);
        } else if ($replyMarkup != null && !$parseMode) {
            $telegram->sendMessage(['chat_id' => $chatID, 'text' => $text, 'reply_markup' => $replyMarkup]);
        } else if ($replyMarkup == null && $parseMode) {
            $telegram->sendMessage(['chat_id' => $chatID, 'text' => $text, 'parse_mode' => 'HTML']);
        } else {
            $telegram->sendMessage(['chat_id' => $chatID, 'text' => $text, 'reply_markup' => $replyMarkup, 'parse_mode' => 'HTML']);
        }
    }

    public function toChannelPhoto($photo, $caption, $parseMode = false, $replyMarkup = false){
        global $telegram, $chatID;

        if ($replyMarkup && !$parseMode) {
            $telegram->sendPhoto(['chat_id' => $chatID, 'photo' => $photo, 'caption' => $caption, 'reply_markup' => $replyMarkup]);
        } else if (!$replyMarkup && $parseMode) {
            $telegram->sendPhoto(['chat_id' => $chatID, 'photo' => $photo, 'caption' => $caption, 'parse_mode' => 'HTML']);
        } else if ($replyMarkup && $parseMode) {
            $telegram->sendPhoto(['chat_id' => $chatID, 'photo' => $photo, 'caption' => $caption, 'reply_markup' => $replyMarkup, 'parse_mode' => 'HTML']);
        } else {
            $telegram->sendPhoto(['chat_id' => $chatID, 'photo' => $photo, 'caption' => $caption]);
        }
    }
    
    // public function resendMessage(){
    //     global $telegram;
        
    //     $this->sendMessage(json_encode($telegram->getData(), JSON_PRETTY_PRINT));
    // }
}
?>