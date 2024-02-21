@include('partials._header')
    
    <!-- ==================================== Team Create Section ====================================  -->
    <section class="bb-register-login">
        <div class="bb-container">
            <div class="bb-re-login-inner">
                <h2>Update Your Team</h2>
                <form action="/teams/{{$teams->id}}/edit" method="post">
                    @csrf
                    @method('put')
                    <div class="bb-input">
                        <label for="name">Team Name:</label>
                        <input type="text" name="name" autocomplete="off" value="@if(old('name')) {{old('name')}} @else {{$teams->name}} @endif" >
                        @error('name')
                            <p class="bb-input-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="description">Team Description:</label>
                        <textarea name="description">@if(old('description')) {{old('description')}} @else {{$teams->description}} @endif</textarea>
                        @error('description')
                            <p class="bb-input-error">Team Description is required</p>
                        @enderror
                    </div>
                    <div class="bb-input">
                        <label for="file">Upload team photo</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="bb-input">
                        <input type="submit" name="submit" value="Update Team" >
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

@include('partials._footer')