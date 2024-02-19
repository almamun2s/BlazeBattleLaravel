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
                'teams'  => Team::get()
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
}
