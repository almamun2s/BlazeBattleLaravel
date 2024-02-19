<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    // Showing Team page
    public function teams(){
        return view(
            'team.team',
            [
                'teams'  => Team::latest()->filter(request(['search']))->paginate(50)
                // 'teams' => Team::get() // It will work but can't be searched 
            ]
        );
    }

    // Showing Team Single page
    public function single(Team $team){
        return view(
            'team.single',
            [
                'team'  => $team
            ]
        );
    }

    // Team creation page
    public function create(){
        return view('team.create');
    }

    // Creating Team
    public function create_team(Request $request){
        $formField = $request->validate([
            'name'          => 'required',
            'description'   => 'required'
        ]);
        $formField['user_id'] = auth()->id();

        $team = Team::create($formField);
        return redirect("/teams/$team->id");
    }
}
