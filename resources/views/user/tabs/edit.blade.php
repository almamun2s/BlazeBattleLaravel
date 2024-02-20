<div class="bb-profile-bottom-details">
    <form action="#" method="post">
        <div class="bb-input">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" autocomplete="off" value="{{auth()->user()->fname}}" >
        </div>
        <div class="bb-input">
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" autocomplete="off" value="{{auth()->user()->lname}}" >
        </div>
        <div class="bb-input">
            <label for="email">Email:</label>
            <input type="text" name="email" autocomplete="off" value="{{auth()->user()->email}}" >
        </div>
        <div class="bb-input">
            <label for="phone">Phone No:</label>
            <input type="nubmer" name="phone" autocomplete="off" disabled >
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
</div>