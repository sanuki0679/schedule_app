<?php

namespace App\Console\Commands;

use App\Mail\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scheduled email sending';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // usersテーブルの最初のレコードを取得
        //$user = User::first();
        // テキストメールで短文の場合
        //Mail::raw('本文です', function ($message) use ($user) {
        //    $message->to($user->email)
        //        ->subject('タイトルです');
        //});
        // メール用クラスのMailableを利用する場合
        //Mail::to($user->email)
        //
        //    ->send(new Schedule($user));
        $users = User::whereHas('events', function ($query) {
            // 日付で絞り込み
            $tomorrow = Carbon::now()->addDay(1);
            $query->whereDate('start', $tomorrow);
        //})->get();
        })->with(['events' => function ($query) {
            // 日付で絞り込み
            $tomorrow = Carbon::now()->addDay(1);
            $query->whereDate('start', $tomorrow);
        }])->get();
        foreach ($users as $user) {
            Mail::to($user->email)
                ->send(new Schedule($user));
        }
    }
}
