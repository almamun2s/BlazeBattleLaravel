@include('partials._header')

    <!-- ==================================== Team Create Section ====================================  -->
    <section class="bb-register-login">
        <div class="bb-container">
            <div class="bb-re-login-inner">
                <h2>Make Your Team</h2>
                <form action="/teams/create" method="post">
                    @csrf
                    <div class="bb-input">
                        <label for="name">Team Name:</label>
                        <input type="text" name="name" autocomplete="off" value="{{old('name')}}" >
                        @error('name')
                            <p class="bb-input-error">Team Name is required</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="description">Team Description:</label>
                        <textarea name="description">{{old('description')}}</textarea>
                        @error('description')
                            <p class="bb-input-error">Team Description is required</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="file">Upload team photo</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="bb-input">
                        <input type="submit" name="submit" value="Make Team" >
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

@include('partials._footer')