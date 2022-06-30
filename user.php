<?php 
    class UserData {
        public $chatID;

        public function setData($path, $data){
            file_put_contents("users/$path/$this->chatID.txt", $data);
        }

        public function getData($path){
            return file_get_contents("users/$path/$this->chatID.txt");
        }
    }
?>