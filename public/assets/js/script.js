function showpw() {
    var input = $($(".toggle-password").attr("toggle"));

    if (input.attr("type") == "password") {
        $("#toggle-password").removeClass("fa-eye");
        $("#toggle-password").addClass("fa-eye-slash");
        input.attr("type", "text");
    } else {
        $("#toggle-password").removeClass("fa-eye-slash");
        $("#toggle-password").addClass("fa-eye");
        input.attr("type", "password");
    }
}

function showconfirmpw() {
    var input = $($(".toggle-con-password").attr("toggle"));

    if (input.attr("type") == "password") {
        $("#toggle-con-password").removeClass("fa-eye");
        $("#toggle-con-password").addClass("fa-eye-slash");
        input.attr("type", "text");
    } else {
        $("#toggle-con-password").addClass("fa-eye");
        input.attr("type", "password");
        $("#toggle-con-password").removeClass("fa-eye-slash");
    }
}
// close password show
// const container = document.querySelector(".container");
// const registerBtn = document.querySelector(".register-btn");
// const loginBtn = document.querySelector(".login-btn");

// registerBtn.addEventListener("click", () => {
//     container.classList.add("active");
// });

// loginBtn.addEventListener("click", () => {
//     container.classList.remove("active");
// });
$("#adminUserForm").on("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "/admin/store",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        data: formData,
        contentType: false, // This is necessary for FormData to be properly sent
        processData: false, // Prevents jQuery from processing the data
        success: function (data) {
            // Assuming `data.message` contains a success message
            $("#responseMessage").text(data.message);
        },
        error: function (xhr, status, error) {
            // Check if the error contains a message from the server
            let errorMessage = "Something went wrong. Please try again later.";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                // If the server sent a specific message, display it
                errorMessage = xhr.responseJSON.message;
            } else if (error) {
                // Otherwise, show the error status text
                errorMessage = "Error: " + error;
            }

            $("#responseMessage").text(errorMessage);
        },
    });
});
    $('#adminLoginForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/admin/login', // Change this to the correct route for login
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: formData,
            contentType: false, // This is necessary for FormData to be properly sent
            processData: false, // Prevents jQuery from processing the data
            success: function (data) {
                if (data.status) {
                    // If login is successful, redirect to the dashboard
                    window.location.href = data.redirect;
                } else {
                    // Display error message
                    $('#responseMessage').text(data.message);
                }
            },
            error: function (xhr, status, error) {
                let errorMessage = 'Something went wrong. Please try again later.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $('#responseMessage').text(errorMessage);
            }
        });
    });


    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordIcon = document.querySelector("span");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.textContent = "🙈"; // Change the icon when visible
        } else {
            passwordField.type = "password";
            passwordIcon.textContent = "👁️"; // Change the icon back when hidden
        }
    }

 $('#user_login_form').on('submit', function(e) {
    e.preventDefault();  // Prevent the default form submission
    
    $.ajax({
        url: '/login',  // Your API endpoint
        type: 'POST',
        data: $(this).serialize(),  // Serialize the form data to send in the request
        success: function(response) {
            console.log(response);  // Log the response to check if it's correct
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/my-account';  // Redirect to another page after success
            });
        },
        error: function(xhr, status, error) {
            // Log the error for debugging
            console.log("Error: ", error);
            
            var errors = xhr.responseJSON.errors;  // Get errors from the response

            // Loop through errors and show them in SweetAlert
            if (errors) {
                var errorMessages = "";
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessages += errors[key][0] + "\n";  // Add each error message to the string
                    }
                }
                
                Swal.fire({
                    title: 'Error!',
                    text: errorMessages,  // Display all error messages in the alert
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                // If no specific errors, show a generic error
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
});