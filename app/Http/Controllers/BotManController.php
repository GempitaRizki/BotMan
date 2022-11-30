<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}',function($botman,$message){

            if ($message == 'Hallo') {
                $this->askName($botman);
            }else{
                $botman->reply("Katakan 'Hallo' untuk melanjutkan percakapan");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Hallo! Siapa namamu?",function(Answer $answer){
            $name = $answer->getText();

            $this->say('Senang berkenalan denganmu '.$name);
        });
    }
}