<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hall;
use App\Models\User;
use Database\Seeders\SeatsTableSeeder;
use Illuminate\Http\Request;


class HallController extends Controller
{

    protected function hallValidation(){
        return[
            'halls' => 'required|array',
            'seat_limits' => 'required|array',
            'branch_id'=>'required|array',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::latest()->paginate(7);
        return view('admin.Hall.hallList', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches=Branch::all();
        return view('admin.Hall.addHall',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate($this->hallValidation());
        $hallsCount = count($validatedData['halls']);
        $branch_ids=$validatedData['branch_id'];
        $branchHalls=$validatedData['halls'];
        $seat_limits=$validatedData['seat_limits'];

        for($i=0;$i<$hallsCount;$i++)
        {

            $hall= new Hall();
            $hall->branch_id=$branch_ids[$i];
            $hall->hall_name = $branchHalls[$i];

            $hall->save();
            $seeder = new SeatsTableSeeder();
            $seeder->createSeats($hall->id,  $seat_limits[$i]);

        }
        return redirect()->route('halls.index')->with('message', 'Halls created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hall::findOrFail($id)->delete();
        return redirect()->back();
    }
}
