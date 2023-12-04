<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    protected function branchValidation(){
        return[
            'branchName' => 'required|string|max:255',
            'branchAddress' => 'required|string|max:255',
            'hall' => 'array',

        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->paginate(7);
        $users = User::select('id', 'name')->get();
        return view('admin.Branch.branchList', compact('branches', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Branch.addBranch');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $user = new User();
        $user->name = $request->input('userName');
        $user->email = $request->input('userEmail');
        $user->password = $request->input('userPassword');
        $user->role = 2;
        $user->save();

        $userID = $user->id;


        $validatedData = $request->validate($this->branchValidation());
        $branchName = $validatedData['branchName'];
        $branchAddress = $validatedData['branchAddress'];
        $branchHall=$validatedData['hall'];
       
        $branch = new Branch();
        $branch->name =$branchName;
        $branch->manager_id = $userID;
        $branch->address =$branchAddress;
        $branch->halls=json_encode($branchHall);
        $branch->save();
        return redirect()->route('branches.index')->with('message', 'Branch added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::find($id);
        return view('admin.Branch.updateBranch', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::findOrFail($id);

        $validatedData = $request->validate($this->branchValidation());
        $branchName = $validatedData['branchName'];
        $branchAddress = $validatedData['branchAddress'];
        $branchHall=$validatedData['hall'];

        $branch->name = $branchName;
        $branch->address = $branchAddress;
        $branch->halls=json_encode($branchHall);
        $branch->save();
        return redirect()->route('branches.index')->with('message', 'Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::find($id)->delete();
        return redirect()->route('branches.index')->with('message', ' Branch deleted successfully ');
    }
}
