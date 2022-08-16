<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function webhook(){

        $requestBody	= file_get_contents("php://input");
        $dataContent	= json_decode($requestBody, true);

        $chatId  = $dataContent["message"]["chat"]["id"];
        $message = $dataContent["message"]["text"];

        if($message == "/test"){
            // file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Ada yg bisa saya bantu?");
            $this->sendMessage($chatId, "Ada yg bisa saya bantu?");
        }else if($message == "/checkfile"){
            $this->checkFileIndicator($chatId);
        }else{
            $this->sendMessage($chatId, "Terimakasih udh mampir ;)");
        }
    }
    
    public function checkFileIndicator($chatId){
        $path_indicator = storage_path('app/public/files/');
        if ($files = glob($path_indicator . "/*")) {
            $this->sendMessage($chatId, "Ada file");
        }else{
            $this->sendMessage($chatId, "Tidak Ada file");
        }
    }

    public function sendMessage($chatId, $message){ 
        $path = "https://api.telegram.org/bot".env('API_KEY', 'default');

        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message);
    }

    public function test(){
        $path_indicator = storage_path('app/public/indicator/');

        print_r($path_indicator);
    }

    public function caraMembuatChatbotTelegram(){
        /*
            1. membuat bot telegram dengan BotFather (@BotFather).
            2. masukan perintah /newbot untuk membuat bot baru dan ikuti sampai selesai
            3. nanti kalau sudah selesai ia akan memberikan apiKey, dan apiKey tersebut harus kita simpan karena digunakan untuk integrasi dengan apps kita
            4. membuat dan mendaptarkan webhook, berikut linknya : https://api.telegram.org/bot<yourtoken>/setwebhook?url=https://yourdomain.com/yourbot.php
            5. method untuk webhook harus post dan menerima json
            6. selanjutkan tinggal membuat logika yg diharapkan dari chatbot yg kita buat
        */
    }
}
