<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;

class PostController extends Controller
{
    public function show($id)
    {
      $message = Message::find($id);
      
      $messages = array(
        'id' => $id,
        'message' => $message,
      );
      
      return view('messagesshow', $messages);
    }

    public function update(Request $request, $id)
    {
          $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'title' => 'required'
          ]);

        $message = Message::find($id);
        $message->title = $request->input('title');
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->language = $request->input('language');
        $message->category = $request->input('category');
        $detail=$request->summernoteInput;
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
 
        $images = $dom->getelementsbytagname('img');
    
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
              
            list($type, $data) = array_pad(explode(';', $data),2,null);
            list(, $data)      = array_pad(explode(',', $data),2,null);
 
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path('showarticle') .'/'. $image_name;
 
            file_put_contents($path, $data);
 
            $img->removeattribute('src');
            $img->setattribute('src', $image_name);

        }

 
        $detail = $dom->savehtml();
        $message->message = $detail;
        $message->save();

        return redirect('/article')->with('success', 'Tutorial Updated');

    }

    public function destroy($id)
    {
      $message = Message::find($id);

      $message->delete();

      return redirect('/article')->with('success', 'Tutorial Deleted');

    }  

}
