<?php

namespace App\Http\Controllers;


use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\Hall;
use App\Models\User;
use Database\Seeders\SeatsTableSeeder;
use Illuminate\Http\Request;

class BranchController extends Controller
{


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
    public function store(BranchRequest $request)
    {
        $validatedData = $request->validated();
        $user = new User([
            'name' => $validatedData['userName'],
            'email' => $validatedData['userEmail'],
            'password' => $validatedData['userPassword'],
            'role' => 2,
        ]);
        $user->save();
        $userID = $user->id;



        $branch = new Branch([
            'name'=>$validatedData['branchName'],
            'address'=>$validatedData['branchAddress'],
            'manager_id' => $userID,
        ]);
        $branch->save();

        $hallsCount = count($validatedData['halls']);
        for($i=0;$i<$hallsCount;$i++)
        {

            $hall = new Hall([
                'branch_id' => $branch->id,
                'hall_name' => $validatedData['halls'][$i],
            ]);
            $hall->save();
            $seeder = new SeatsTableSeeder();
            $seeder->createSeats($hall->id,  $validatedData['seat_limits'][$i]);

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
    public function update(BranchRequest $request, string $id)
    {
        $branch = Branch::findOrFail($id);

        $validatedData = $request->validated();
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
