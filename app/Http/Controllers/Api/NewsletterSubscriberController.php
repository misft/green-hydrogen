<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use App\Traits\Response;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    use Response;

    public function store(Request $request) {
        $email = $request->get('email');

        $subscriber = NewsletterSubscriber::email($email)->first();

        if($subscriber) {
            return $this->badRequest(message: __('newsletter.already_subscribed'), errors: [
                'subscriber' => $subscriber
            ]);
        }

        $subscriber = NewsletterSubscriber::create([
            'email' => $email,
            'is_active' => 1
        ]);

        return $this->success(body: [
            'subscriber' => $subscriber
        ]);
    }
}
