@include('partials._header')

    <!-- ==================================== Team Section ====================================  -->
    <section class="bb-team">
        <div class="bb-container">
            <div class="bb-team-inner">
                <div class="bb-single-team-top">
                    <div class="bb-team-img">
                        <img src="{{asset('img/freefire.webp')}}" alt="">
                    </div>
                    <h2>{{$team->name}} </h2>
                    <p>Total member: {{count($members)}} </p>
                    @auth
                        @if (auth()->user()->teams_id != null )
                            {{-- Current user is already a member of a team --}}
                            
                            @if ($team->id == auth()->user()->teams_id)
                                {{-- The user is a member of current team --}}
                                @if (auth()->user()->team_position == 'leader' )
                                    {{-- The user is the leader of current team --}}
                                    {{-- <form action="#" method="post">
                                        <input type="submit" value="Delete the Team">
                                    </form> --}}
                                    <a href="/teams/{{$team->id}}/edit" class="bb-first-btn">Edit Team</a>
                                @else
                                    <form action="/teams/leave" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="submit" value="Leave the Team">
                                    </form>
                                @endif
                            @endif

                        @else
                            <form action="/teams/join" method="post">
                                @method('put')
                                @csrf
                                <input type="hidden" name="teams_id" value="{{$team->id}}">
                                <input type="submit" value="Join the Team">
                            </form>
                        @endif

                    @else
                        <form action="/teams/join" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="teams_id" value="{{$team->id}}">
                            <input type="submit" value="Join This Team">
                        </form>
                    @endauth
                </div>
                <div class="bb-single-team-bottom">
                    <p>{{$team->description}}</p>

                    <h3>Team members</h3>

                    <div class="bb-team-members">
                        @unless (count($members) == 0)
                            @foreach($members as $member)
                                <div class="bb-team-member">
                                    <div class="bb-team-member-img">
                                        <img src="{{asset('img/profile.png')}}" alt="">
                                    </div>
                                    @auth 
                                        @if (auth()->user()->id == $member->id)
                                            <a href="/profile">{{$member->fname}} {{$member->lname}}</a>
                                        @else
                                            <a href="/profile?id={{$member->id}}">{{$member->fname}} {{$member->lname}}</a>
                                        @endif 
                                    @endauth
                                    <p>{{$member->team_position}}</p>

                                    @auth
                                        @if (($team->id == auth()->user()->teams_id) && (auth()->user()->team_position == 'leader') && (auth()->user()->id != $member->id) )

                                                {{-- <form action="#" method="post">
                                                    <input type="submit" value="Make SubLeader" class="bb-make-coleader">
                                                </form> --}}
                                                <form action="/teams/remove" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="user_id" value="{{$member->id}}">
                                                    <input type="hidden" name="teams_id" value="{{$team->id}}">
                                                    <input type="submit" value="Remove from team" class="bb-remove-member">
                                                </form>
                                        @endif
                                    @endauth
                                </div>
                            @endforeach
                        @else
                            <p>Team member not found</p>
                        @endunless



                    </div>
                </div>
            </div>
        </div>
    </section>


@include('partials._footer')