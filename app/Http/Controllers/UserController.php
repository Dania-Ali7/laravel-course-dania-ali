<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(): Factory|View
    {
        $users = DB::table('users')->get();
        return view(view: 'users', data: compact('users'));
    }

    public function create(): RedirectResponse
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = bcrypt('123456');

        DB::table(table: 'users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password
        ]);

        return redirect()->back();
    }


    public function destroy($id): RedirectResponse
    {
        DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->delete();

        return redirect()->back();
    }

    public function edit($id): Factory|View
    {
        $user = DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->first();
        $users = DB::table(table: 'users')->get();

        return view('users', compact('user', 'users'));
    }

    public function update(): RedirectResponse
    {
        $id = $_POST['id'];

        DB::table(table: 'users')->where(column: 'id', operator: '=', value: $id)->update(values: [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]);

        return redirect(to: 'users');
    }
}
