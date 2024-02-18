@include('partials._header')

    <!-- ==================================== Registration/Login Section ====================================  -->
    <section class="bb-register-login">
        <div class="bb-container">
            <div class="bb-re-login-inner">
                <h2>Login form</h2>
                <form action="/login" method="post">
                    @csrf
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
                    </div>

                    <div class="bb-input">
                        <input type="submit" name="submit" value="Log in" >
                        <p>Don't have an account? <a href="register">Register</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

@include('partials._footer')