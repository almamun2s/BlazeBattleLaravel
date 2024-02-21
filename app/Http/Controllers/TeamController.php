<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    // Showing Team page
    public function teams(){
        return view(
            'team.team',
            [
                'teams'  => Team::latest()->filter(request(['search']))->paginate(10)
                // 'teams' => Team::get() // It will work but can't be searched 
            ]
        );
    }

    // Showing Team Single page
    public function single(Team $team){
        return view(
            'team.single',
            [
                'team'      => $team,
                'members'   => User::where('teams_id', $team->id)->get()
                // 'members'   => $team
            ]
        );
    }

    // Team creation page
    public function create(){
        if (auth()->user()->teams_id == null) {
            return view('team.create');
        }
        abort(401);
    }

    // Creating Team
    public function create_team(Request $request){
        if (auth()->user()->teams_id == null) {
            $formField = $request->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);
            $formField['user_id'] = auth()->id();

            $team = Team::create($formField);
            return redirect("/teams/$team->id");
        }
        abort(401);
    }

    public function teams_join(Request $request){
        if (auth()->user()->teams_id != null) {
            return redirect('/profile')->with('message', 'You are already a member of a team');
        }

        $formField = $request->validate([
            'teams_id'  => 'required'
        ]);
        $formField['team_position'] = 'member';

        User::where('id', auth()->id())->update($formField);

        return redirect('/profile')->with('message', 'Congratulation to join a team');
    }

    public function teams_leave(){
        $formField = [
            'teams_id'  => null,
            'team_position' => null
        ];
        User::where('id', auth()->id())->update($formField);
        return redirect('/profile')->with('message', 'Successfully leaved from the team');
    }
}
