@include('partials._header')

    <!-- ==================================== Team Section ====================================  -->
    <section class="bb-team">
        <div class="bb-container">
            <div class="bb-team-inner">
                <div class="bb-team-search">
                    <form action="/teams"> 
                        <div class="bb-input bb-search-item">
                            <input type="search" name="search" placeholder="Search a team" autocomplete="off">
                        </div>
                        <div class="bb-input bb-search-submit">
                            <input type="submit" value="Search">
                        </div>
                    </form>
                </div>
                <h1>Teams</h1>
                <div class="bb-all-teams">
                    <div class="bb-team-creation">
                        <a href="/teams/create" class="bb-first-btn">Create team</a>
                    </div>

                    @unless (count($teams) == 0)
                        @foreach ($teams as $team)
                            <div class="bb-single-team">
                                <a href="/teams/{{$team->id}}">
                                    <div class="bb-team-left">
                                        <img src="{{asset('img/freefire.webp')}}" alt="">
                                    </div>
                                    <div class="bb-team-right">
                                        <h2>{{$team->name}} </h2>
                                        <p>Total member: 3</p>
                                    </div>
                                </a>
                            </div>                            
                        @endforeach
                    @else
                        <p>Team Not found</p>
                    @endunless

                    {{$teams->links('pagination.custom')}}
                </div>
            </div>
        </div>
    </section>

@include('partials._footer')