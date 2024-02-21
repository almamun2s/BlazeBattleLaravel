@include('partials._header')

    <!-- ==================================== Profile Section ====================================  -->
    <section class="bb-profile">
        <div class="bb-container">
            <div class="bb-profile-inner">
                <div class="bb-profile-top">
                    <div class="bb-profile-top-img">
                        <img src="{{asset('img/profile.png')}}" alt="">
                    </div>
                    <div class="bb-profile-details">
                        <h4>{{$user->fname}} {{$user->lname}}</h4>

                        @if ($user->teams_id != null)
                            <a href="/teams/{{$team->id}}">{{$team->name}}</a>
                        @else
                            <p>Did not joined any team yet.</p>
                            {{-- <a href="/teams"><i class="fas fa-plus"></i> Join a Team </a> --}}
                        @endif

                        <p><i class="fas fa-gamepad"></i> Free Fire ID code: <span>{{$user->ff_id}}</span></p>
                        {{-- <p>Total games played: 25</p> --}}
                    </div>
                </div>
                <div class="bb-profile-bottom">
                    <div class="bb-profile-bottom-left">
                        <ul>
                            <li><a href="/profile/tournament?id={{$user->id}}" class="@if ($tab == 'tournament') {{'bb-active-tab'}} @endif">Tournaments</a></li>
                        </ul>
                    </div>
                    <div class="bb-profile-bottom-right">
                        @includeIf('user.tabs.'.$tab)
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('partials._footer')