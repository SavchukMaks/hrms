<form  method="POST" action="{{ route('client_create') }}">
    {{ csrf_field() }}
    <div class="candidate-main-info">

        <h3>Client info</h3>
        <div class="row main-info-row">

            <div class="col-md-10">

                <div class="col-md-4">

                    <div class="add-photo-candidate">
                        <img src="{{ asset('img/icons/users.svg') }}" alt="Default image" id="photo" >
                    </div>

                    <input type="file" name="photoCandidate" id="photoCandidate" class="inputfile" />
                    <label class="btnAddPhoto" for="photoCandidate"><span>Add Photo</span></label>

                </div>

                <div class="col-md-8">


                    <div class="col-md-6 candidate-base-inputs">

                        <p><input type="text" name="firstname" placeholder="First Name" required></p>

                        <p><input type="text" name="lastname" placeholder="Last Name" required></p>

                        <p><input id="email" type="text" placeholder="Email" name="email" required ></p>

                        <input id="password" type="password" placeholder="Password" name="password" required>


                        <div class="add-candidate-buttons">
                            <button class="save-btn">Create</button>
                            <button type="reset" class="reset-btn">Reset</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>