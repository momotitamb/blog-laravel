<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendVacanciesNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $context = stream_context_create(['http' => ['header' => 'User-Agent: Mozilla/5.0']]);

        $json = file_get_contents('https://api.hh.ru/vacancies?text=PHP+developer&area=1146', false, $context);
        $data = json_decode($json, true);
        $items = $data['items'];

        $message = '';
        foreach ($items as $item) {
            $message .= $item['name'] . PHP_EOL . $item['employer']['name'] . PHP_EOL . 
                ($item['salary']['from'] ?? null) . PHP_EOL . ($item['salary']['to'] ?? null) . PHP_EOL;
        }

        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        $response = curl_exec($ch);
        \Log::info('Telegram response: ' . $response);
        \Log::info('cURL error: ' . curl_error($ch));

        // $telegramContext = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
        // file_get_contents('https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chatId . '&text=' . urlencode($message), false, $telegramContext);

    }
}
