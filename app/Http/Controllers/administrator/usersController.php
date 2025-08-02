<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    public function index()
    {
        // Alert::alert('Title', 'Message', 'Type');
        $users = DB::table('users')
            ->where("deleted", false)
            ->paginate(10);

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("administrator.users.index", compact('users'));
    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                "deleted" => true,
                "deleted_at" => now(),
            ]);
        Alert::success('Successfully');
        return redirect()->back();
    }
}
