<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Settings</h5>
          <p>Your Personal Details</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1 pt-5">
      <div class="edit_profile">
        <form role = "form">
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
              </div>
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password">
              </div>
              <div class="text-center">
                <button type="button" id="reset-button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Reset</button>
              </div>
        </form>
      </div>  
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script type="text/javascript">
    $('#reset-button').on('click', function() {
        var name = $('#name').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        
        if(password !== confirm_password) {
            alert('Password do not match!');
            return false;
        }

        $.ajax({
            url: '{{ route('profile.update') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                password: password,
            },
            success: function(response) {
                if(response.success) {
                    window.location.href = '{{ route('login') }}';
                } else {
                    alert('Failed to update profile.');
                }
            },
            error: function(error) {
                alert('Something went wrong. Please try again.');
            }
        });

    });
  </script>