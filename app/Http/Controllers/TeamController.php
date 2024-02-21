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

            $team = Team::create($formField); // Creating the Team 

            $formFieldUser = [
                'teams_id'  => $team->id,
                'team_position' => 'leader'
            ];
            User::where('id', auth()->id())->update($formFieldUser); // Join the Team as leader

            return redirect("/teams/$team->id")->with('message', 'Congratulation for Creating a Team');
        }
        abort(401);
    }

    // Join member to the Team
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

    // Leave member from the Team
    public function teams_leave(){
        $formField = [
            'teams_id'  => null,
            'team_position' => null
        ];
        User::where('id', auth()->id())->update($formField);
        return redirect('/profile')->with('message', 'Successfully leaved from the team');
    }

    // Remove member from the Team by Leader
    public function remove_member(Request $request){
        $teamsId = $request['teams_id'];
        $userId = $request['user_id'];
        
        $leader = User::find(auth()->user()->id);

        if (($teamsId == $leader->teams_id) && ($leader->team_position == 'leader') && (auth()->user()->id != $userId)) {
            $member = User::find($userId);
            if ($member->teams_id == $teamsId) {

                $formField = [
                    'teams_id'  => null,
                    'team_position' => null
                ];
                User::where('id', $userId)->update($formField);
                return back()->with('message', "Successfully removed $member->fname");
            }
        }
        abort(403);
    }

    // Showing Team edit form
    public function edit($team){
        if ((auth()->user()->teams_id == $team ) && (auth()->user()->team_position == 'leader') ) {
            // dd($team);
            return view(
                'team.edit',
                [
                    'teams'  => Team::find($team)
                ]
            );
        }
        abort(401);
    }

    // Update Team
    public function edit_team($team, Request $request){
        if ((auth()->user()->teams_id == $team ) && (auth()->user()->team_position == 'leader') ) {
            $formField = $request->validate([
                'name'          => 'required',
                'description'   => 'required'
            ]);
            Team::where('id', $team)->update($formField);
            return redirect("/teams/$team")->with('message', 'Team Updated Successfully');
        }
        abort(401);
    }
}