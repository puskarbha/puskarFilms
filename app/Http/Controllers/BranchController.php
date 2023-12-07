<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hall;
use App\Models\User;
use Database\Seeders\SeatsTableSeeder;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    protected function branchValidation(){
        return[
            'branchName' => 'required|string|max:255',
            'branchAddress' => 'required|string|max:255',
            'halls' => 'array',
            'seat_limits' => 'array',

        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->paginate(7);
        return view('admin.Branch.branchList', compact('branches'));
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
        $branchHall=$validatedData['halls'];
        $seat_limit=$validatedData['seat_limits'];

        $branch = new Branch();
        $branch->name =$branchName;
        $branch->manager_id = $userID;
        $branch->address =$branchAddress;
        $branch->save();

        $hallsCount = count($request->input('halls'));
        for($i=0;$i<$hallsCount;$i++)
        {

            $hall= new Hall();
            $hall->branch_id=$branch->id;
            $hall->hall_name = $branchHall[$i];
            $hall->save();
            $seeder = new SeatsTableSeeder();
            $seeder->createSeats($hall->id,  $seat_limit[$i]);

        }




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


        $branch->name = $branchName;
        $branch->address = $branchAddress;

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
