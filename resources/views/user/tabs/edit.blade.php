<div class="bb-profile-bottom-details">
    <form action="/profile/edit" method="POST" >
        @csrf
        @method('PUT')
        <div class="bb-input">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" autocomplete="off" value="{{auth()->user()->fname}}" >
            @error('fname')
                <p class="bb-input-error">First name should be at leat 3 charactor</p>
            @enderror
        </div>
        <div class="bb-input">
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" autocomplete="off" value="{{auth()->user()->lname}}" >
            @error('lname')
                <p class="bb-input-error">Last name should be at leat 3 charactor</p>
            @enderror
        </div>
        <div class="bb-input">
            <label for="email">Email:</label>
            <input type="text" name="email" autocomplete="off" value="{{auth()->user()->email}}" disabled >
            <p class="bb-input-error">You can't change email</p>
        </div>
        <div class="bb-input">
            <label for="ff_id">Free Fire ID:</label>
            <input type="nubmer" name="ff_id" autocomplete="off" value="{{auth()->user()->ff_id}}" >
            @error('ff_id')
                <p class="bb-input-error">Inter your Free Fire ID</p>
            @enderror
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