@include('partials._header')

    <!-- ==================================== Registration/Login Section ====================================  -->
    <section class="bb-register-login">
        <div class="bb-container">
            <div class="bb-re-login-inner">
                <h2>Registration form</h2>
                <form action="/register" method="post">
                    @csrf
                    <div class="bb-input">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" autocomplete="off" value="{{old('fname')}}" >
                        @error('fname')
                            <p class="bb-input-error">First Name is required</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" autocomplete="off" value="{{old('lname')}}" >
                        @error('fname')
                            <p class="bb-input-error">Last Name is required</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="email">Email:</label>
                        <input type="text" name="email" autocomplete="off" value="{{old('email')}}" >
                        @error('email')
                            <p class="bb-input-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="password">Password:</label>
                        <input type="password" name="password" autocomplete="off" >
                        @error('password')
                            <p class="bb-input-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="password">Confirm Password:</label>
                        <input type="password" name="password_confirmation" autocomplete="off" >
                        @error('password')
                            <p class="bb-input-error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="bb-input">
                        <input type="submit" name="submit" value="Sign Up" >
                        <p>Already have an account? <a href="login">Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

@include('partials._footer')