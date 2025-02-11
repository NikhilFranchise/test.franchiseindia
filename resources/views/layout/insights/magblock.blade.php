<div class="newcontentblk">
  <div class="container">
    <div class="magblk">
      <img src="{{url('insight-new/images/the-franchising-world.png')}}" alt="Franchise india Insights" class="imgstd img-fluid">
    </div>
    <form id="magsubscribe">
      {{csrf_field()}}
      <div class="magfrm">
        <div class="haedstg">The Franchising World Magazine</div>
        <p class="magtxt">For hassle-free instant subscription, just give your number and email id and our customer care agent will get in touch with you</p>
        <ul class="maglsi">
          <li class="wid180">
            <label>Enter Email</label>
            <input type="email" name="email" id="emailId">
            <span class="text-danger" id="email-error">
           </span>
          </li>
          <li class="wid180">
            <label>Enter Mobile No. </label>
            <div class="flis">
              <select class="code"><option> + 91 </option> </select>
              <input type="text" name="tel" id="tel" class="telcode" pattern="[0-9]{10}">
              <span class="text-danger" id="tel-error"></span>
            </div>
          </li>
          <li>
            <label class="hide">&nbsp;</label>
            <input type="submit" value="Subscribe Now" class="stb">
          </li>
        </ul>
        <p class="mbtmtxt">or <a href="https://master.franchiseindia.com/magazine-subscribe/" target="_blank">Click here to Subscribe Online</a></p>
      </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
 $(document).ready(function() {
    async function doAjax(args) {
        try {
            const result = await $.ajax({
                url: '/insights/instasubsribe',
                type: 'POST',
                data: args,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            return result; // Add this line to return the result explicitly
        } catch (error) {
            // Log the error for debugging purposes
            console.error('AJAX Error:', error);
            throw error; // Re-throw the error to propagate it to the caller
        }
    }
    function validateForm() {
        // Reset previous error messages
        $(".text-danger").text("");
        var email = $("#emailId").val();
        var tel = $("#tel").val();

        if (email === "") {
            $("#email-error").text("Please enter your email.");
            $("#emailId").focus();
            return false;
        } else if (!isValidEmail(email)) {
            $("#email-error").text("Please enter a valid email address.");
            $("#emailId").focus();
            return false;
        }
        if (tel === "") {
            $("#tel-error").text("Please enter your Mobile number.");
            $("#tel").focus();
            return false;
        } else if (!isValidTel(tel)) {
            $("#tel-error").text("Please enter a valid 10-digit Mobile number.");
            $("#tel").focus();
            return false;
        }
        return true;
    }
    $('#magsubscribe').submit(function(event) {
        event.preventDefault();
        
        if (validateForm()) {
            const formData = $(this).serialize();
            // alert('hello');
            doAjax(formData).then((data) => {
                if (data.error === false) {
                    $('#magsubscribe input[type="email"]').val('');
                    $('#magsubscribe input[type="number"]').val('');
                    window.location.href = '{{ route("insights.thanks") }}';
                } else {
                    // Display error messages in span elements
                    $("#email-error").text(data.fields.email ? data.message1 : '');
                    $("#tel-error").text(data.fields.tel ? data.message2 : '');
                }
            }).catch((error) => {
    // Log the error for debugging purposes
    console.error('AJAX Error:', error);
    // Check if the error response contains a message
    if (error.response && error.response.data && error.response.data.message) {
        alert('Error: ' + error.response.data.message);
    } else {
        alert('An error occurred. Please try again.'); // Display a generic error message
    }
});
        }
    });
    function isValidEmail(email) {
        // Use a regular expression for basic email format validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    function isValidTel(tel) {
        // Validate telephone number length
        return /^\d{10}$/.test(tel);
    }
});
</script>
