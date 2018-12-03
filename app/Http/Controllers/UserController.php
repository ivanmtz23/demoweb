<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
class UserController extends Controller
{

  public function edit($id)
  {
    $data = User::find($id);

  return view('edit')->with('data', $data);

  }

  public function update(Request $request, $id)
    {
			$this->validate($request, [
	        'name' => 'required',
	        'email' => 'required',
      		]);

      		$data = User::find($id);
      		$data->name = $request->input('name');
      		$data->email = $request->input('email');
      		$data->save();

      		return redirect('/showusers')->with('success', 'User Updated');

    }

    public function destroy($id)
    {
      $data = User::find($id);

      $data->delete();

      return redirect('/showusers')->with('success', 'User Deleted');

    }
}