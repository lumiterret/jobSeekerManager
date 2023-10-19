<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Notifications\Telegram\FeedbackMesage;
use App\Providers\RouteServiceProvider;
use App\Services\Notification\Telegram\FeedbackTelegramBot;
use Illuminate\Http\Request;
use PHPUnit\Util\Xml\Exception;

class FeedBackController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('feed-back.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user-id' => 'required',
            'content' => 'required|string'
        ]);
        $feedback = new Feedback();
        $feedback->user_id = $validated['user-id'];
        $feedback->content = $validated['content'];
        $feedback->save();

        try {
            $message = new FeedbackMesage($feedback);
            $botNotifier = new FeedbackTelegramBot();
            $botNotifier->notify($message);
        }catch (\Throwable $exception) {
            logger()->channel('notification')->error($exception);;
        }

        return redirect()->route(RouteServiceProvider::DASHBOARD);
    }
}
