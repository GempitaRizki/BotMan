<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\BotMan;

class BotManController extends Controller
{
    public function handle ()
    {
        $botman = app('botman');

        $botman->hears('{$message}', function ($botman, $message){

            if($message === 'hi'){
                $this->askName($botman);
            } else{
                $botman->replay("write 'hi' for testing...");
            }
        });
        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Hallo! Siapa namamu ?", function(Answer $answer){
            $name = $answer->getText();
        });
    }
}
