## Cara Membuat Chatbot
1. membuat bot telegram dengan BotFather (@BotFather).
2. masukan perintah /newbot untuk membuat bot baru dan ikuti sampai selesai
3. nanti kalau sudah selesai ia akan memberikan apiKey, dan apiKey tersebut harus kita simpan karena digunakan untuk integrasi dengan apps kita
4. membuat dan mendaptarkan webhook, berikut linknya : https://api.telegram.org/bot<yourtoken>/setwebhook?url=https://yourdomain.com/yourbot.php
5. method untuk webhook harus post dan menerima json
6. selanjutkan tinggal membuat logika yg diharapkan dari chatbot yg kita buat
