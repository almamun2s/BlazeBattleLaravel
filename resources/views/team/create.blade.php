@include('partials._header')

    <!-- ==================================== Team Create Section ====================================  -->
    <section class="bb-register-login">
        <div class="bb-container">
            <div class="bb-re-login-inner">
                <h2>Make Your Team</h2>
                <form action="#" method="post">
                    <div class="bb-input">
                        <label for="tname">Team Name:</label>
                        <input type="text" name="fname" autocomplete="off" >
                        <p class="bb-input-error">Team Name is required</p>
                    </div>
                    <div class="bb-input">
                        <label for="tname">Team Description:</label>
                        <textarea name="team_description"></textarea>
                    </div>
                    <div class="bb-input">
                        <label for="file">Upload team photo</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="bb-input">
                        <input type="submit" name="submit" value="Sign Up" >
                        <p>Already have an account? <a href="login.html">Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
    
@include('partials._footer')