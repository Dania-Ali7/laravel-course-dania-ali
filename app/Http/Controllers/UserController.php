<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{

    public function index(): Factory|View
    {
        //$users = DB::table('users')->get();
        $users = User::all();
        return view(view: 'users', data: compact('users'));
    }

    public function create(Request $request): RedirectResponse
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');

        /*DB::table(table: 'users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password
        ]);*/

        $user->save();

        return redirect()->back();
    }


    public function destroy($id): RedirectResponse
    {
        //DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->delete();

        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function edit($id): Factory|View
    {
        //$user = DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->first();
        //$users = DB::table(table: 'users')->get();

        $user = User::find($id);
        $users = User::all();

        return view('users', compact('user', 'users'));
    }

    public function update(Request $request): RedirectResponse
    {
        /*$id = $_POST['id'];

        DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->update(values: [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]);*/

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect(to: 'users');
    }
}
