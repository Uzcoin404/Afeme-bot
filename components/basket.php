<?php
    class Basket {
        public function showBasket(){
            global $telegram, $db, $userData, $func, $language, $chatID;
            $data = $db->getBasket($chatID);
            $basket = json_decode($data['basket'], true)['basket'];
            $text = '';
            $count = $basket['count'];
            $items = $basket['items'];

            foreach ($basket as $key => $value) {
                $text .= $value['name'];
            }

            if ($basket) {
                $text = "";
            } else if (empty($basket['items'])) {
                $func->sendMessage($db->getText('empty_basket', $language), true);
            } else {
                $func->sendMessage($db->getText('no_brands', $language), true);
            }
        }
    }
?>