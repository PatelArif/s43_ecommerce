/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 
 $("#adminLoginForm").on("submit", function (e) {
     e.preventDefault();
     console.log("Form submitted"); // Debugging line to check if the event is triggered
     const formData = new FormData(this);
     const csrfToken = $('meta[name="csrf-token"]').attr("content");

     $.ajax({
         url: "/admin/login", // Change this to the correct route for login
         type: "POST",
         headers: {
             "X-CSRF-TOKEN": csrfToken,
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
                 $("#responseMessage").text(data.message);
             }
         },
         error: function (xhr, status, error) {
             let errorMessage = "Something went wrong. Please try again later.";
             if (xhr.responseJSON && xhr.responseJSON.message) {
                 errorMessage = xhr.responseJSON.message;
             }
             $("#responseMessage").text(errorMessage);
         },
     });
 });
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
