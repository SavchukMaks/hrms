<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 13.10.17
 * Time: 10:52
 */

namespace App\Http\Controllers\Vacancy;


use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;
use App;

class WelcomeMessageController extends Controller
{
    public function list()
    {
        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $data = $welcomeMessageService->list();

        return view('pages.welcome-message',['welcomeMessage' => $data]);

    }

}