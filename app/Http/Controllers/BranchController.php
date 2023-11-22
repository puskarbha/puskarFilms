<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function branchList(): mixed
    {
        $branches = Branch::all();
        $users = User::select('id', 'name')->get();
        return view('admin.branchList', compact('branches','users'));

    }

    public function pushBranch(Request $request)
    {
        $user = new User();
        $user->name = $request->input('userName');
        $user->email = $request->input('userEmail');
        $user->password = $request->input('userPassword');
        $user->role = 2;
        $user->save();

        $userID = $user->id;

        $branch = new Branch();
        $branch->name = $request->input('branchName');
        $branch->manager_id = $userID;
        $branch->address = $request->input('branchAddress');
        $branch->save();
        return redirect('/manage-branch')->with('message', '');
    }

    public function deleteBranch($id)
    {
        Branch::find($id)->delete();
        return redirect('/manage-branch')->with('message', '');
    }

    public function editBranch($id){
        $branch=Branch::find($id);
        return view('admin.updateBranch',compact('branch'));
    }

public function updateBranch(Request $request,$id){
    $branch=Branch::findOrFail($id);

}
}
