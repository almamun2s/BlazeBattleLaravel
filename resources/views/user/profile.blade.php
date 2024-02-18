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
                        <a href="team.html"><i class="fas fa-plus"></i> Join a team</a>
                        <p><i class="fas fa-gamepad"></i> Free Fire ID code: <span>{{auth()->user()->ff_id}}</span></p>
                        <!-- <p>Total games played: 25</p> -->
                    </div>
                </div>
                <div class="bb-profile-bottom">
                    <div class="bb-profile-bottom-left">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Tournaments</a></li>
                            <li><a href="#">Edit details</a></li>
                        </ul>
                    </div>
                    <div class="bb-profile-bottom-right">
                        <!-- For Tournaments -->
                        <!-- <div class="bb-profile-bottom-details">
                            <h3>Tournaments</h3>
                            <p>You have joined 3 tournaments</p>
                            <table class="bb-tournament-table">
                                <tr>
                                    <th>SL</th>
                                    <th>Tournament Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">The first tournament</a></td>
                                    <td class="bb-active-tournament">Active</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">The first tournament</a></td>
                                    <td>Finished</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">The first tournament</a></td>
                                    <td>Finished</td>
                                </tr>
                            </table>
                        </div> -->
                        <!-- For Edit profile -->
                        <!-- <div class="bb-profile-bottom-details">
                            <form action="#" method="post">
                                <div class="bb-input">
                                    <label for="fname">First Name:</label>
                                    <input type="text" name="fname" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" name="lname" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <label for="phone">Phone No:</label>
                                    <input type="nubmer" name="phone" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <input type="submit" name="submit" value="Update" >
                                </div>
                                
                            </form>
                            <form action="#" method="post" class="bb-password">
                                <div class="bb-input">
                                    <label for="old-pwd">Old Password:</label>
                                    <input type="password" name="old-pwd" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <label for="new-pwd">New Password:</label>
                                    <input type="password" name="new-pwd" autocomplete="off" >
                                </div>
                                <div class="bb-input">
                                    <label for="cnfrm-pwd">Confirm Password:</label>
                                    <input type="password" name="cnfrm-pwd" autocomplete="off" >
                                </div>

                                <div class="bb-input">
                                    <input type="submit" name="submit" value="Update Password" >
                                </div>
                                
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('partials._footer')