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
                        <h4>{{auth()->user()->fname}} {{auth()->user()->lname}}</h4>
                        <!-- <a href="team-single.html">Team Crazy</a> -->
                        <a href="/teams"><i class="fas fa-plus"></i> Join a team</a>
                        <p><i class="fas fa-gamepad"></i> Free Fire ID code: <span>{{auth()->user()->ff_id}}</span></p>
                        {{-- <p>Total games played: 25</p> --}}
                    </div>
                </div>
                <div class="bb-profile-bottom">
                    <div class="bb-profile-bottom-left">
                        <ul>
                            <li><a href="/profile/dashboard" class="@if ($tab == 'dashboard') {{'bb-active-tab'}} @endif">Dashboard</a></li>
                            <li><a href="/profile/tournament" class="@if ($tab == 'tournament') {{'bb-active-tab'}} @endif">Tournaments</a></li>
                            <li><a href="/profile/edit" class="@if ($tab == 'edit') {{'bb-active-tab'}} @endif" >Edit details</a></li>
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