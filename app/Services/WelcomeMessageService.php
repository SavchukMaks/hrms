<?php


namespace App\Services;

use App\Models\WelcomeMessage;
use App\Models\Candidate;
use Illuminate\Http\Request;

class WelcomeMessageService
{
    public function resultByQuery($item)
    {
        $welcomeMessage = null;
        if(Candidate::all()) {

            $welcomeMessage = Candidate::where('email', 'like', '%'.$item.'%')->paginate(5);
        }

        return $welcomeMessage;
    }

    public function list()
    {
        $welcomeMessage = null;

        if(WelcomeMessage::all())
        {
            $welcomeMessage = WelcomeMessage::all();

        }
        return $welcomeMessage;
    }

    public function view($id)
    {
        $welcomeMessage = WelcomeMessage::find($id);

        return $welcomeMessage;
    }

    public function save($name,$type,$content)
    {
        $welcomeMessage = new WelcomeMessage();
        $create = $welcomeMessage->insert(['name_of_message' => $name, 'type_of_vacancy' => $type, 'content_message' => $content]);

        return $create;
    }

    public function delete($welcomeMessageId)
    {
        $welcomeMessage = null;

        if(WelcomeMessage::where('id' , $welcomeMessageId)){

            $welcomeMessage = WelcomeMessage::where('id' , $welcomeMessageId)->delete();
        }

        return $welcomeMessage;
    }

    public function update(Request $request)
    {
        $updateData = null;

        if($data = WelcomeMessage ::where('id',$request['id']))
        {
            $updateData = $data->update(['name_of_message' => $request['name_message'], 'type_of_vacancy' => $request['type_vacancy'], 'content_message' => $request['welcome-message'] ]);
        }

        return $updateData;

    }


}