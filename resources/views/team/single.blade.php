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
                    <p>Total member: 3</p>
                    <form action="#" method="post">
                        <input type="submit" value="Join This Team">
                    </form>
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
                                    <a href="profile.html">{{$member->fname}}{{$member->lname}}</a>
                                    <p>{{$member->team_position}}</p>
                                    <form action="#" method="post">
                                        <input type="submit" value="Make SubLeader" class="bb-make-coleader">
                                    </form>
                                    <form action="#" method="post">
                                        <input type="submit" value="Remove from team" class="bb-remove-member">
                                    </form>
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