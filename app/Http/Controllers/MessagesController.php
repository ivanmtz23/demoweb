<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
		public function submit(Request $request)
		{
			$this->validate($request, [
	        'name' => 'required',
	        'email' => 'required',
	        'title' => 'required'
      		]);

      		$message = new Message;
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
	 
	            list($type, $data) = explode(';', $data);
	            list(, $data)      = explode(',', $data);
	 
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
	     	
	     	return redirect('/')->with('success', 'Message Sent');
		}

		public function getMessages()
		{
	     	$messages = Message::all();

		    return view('messages')->with('messages', $messages);
	    }

	    public function getCategories()
		{
	     	$messages = Message::all();

		    return view('category')->with('messages', $messages);
	    }

	    
}
