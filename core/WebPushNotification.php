<?php


namespace Core;


use App\Models\Notifiables;
use ErrorException;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class WebPushNotification
{

    private WebPush $webPush;

    public function __construct()
    {
        $this->webPush = new WebPush([
            'VAPID' => [
                'subject' => _env('VAPID_SUBJECT'),
                'publicKey' => _env('VAPID_PUBLIC_KEY'),
                'privateKey' => _env('VAPID_PRIVATE_KEY')
            ]
        ]);
    }

    /**
     * @param $notifiable
     * @param array $message
     * @throws ErrorException
     */
    public function send($notifiable, array $message): void
    {
        $message = json_encode($message);
        $subscriber = Notifiables::where('notifiable_id', $notifiable->{$notifiable->getPrimaryKey()})->first();
        $subscription = Subscription::create([
            "endpoint" => $subscriber->endpoint,
            "keys" => [
                "p256dh" => $subscriber->p256dh,
                "auth" => $subscriber->auth,
            ]
        ]);
        $this->webPush->queueNotification($subscription, $message);

        foreach ($this->webPush->flush() as $report) {
            $endpoint = $report->getRequest()->getUri()->__toString();

            if($report->isSuccess()){
            } else {
                echo sprintf("message failed for %s: %s.<br>", $endpoint, $report->getReason());
            }
        }
    }
}