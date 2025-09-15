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
console.log("Form submitted"); // Debugging line to check if the event is triggered
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


// favrorites cart ajax start
$(document).on("click", ".move-to-cart-btn", function (e) {
    e.preventDefault();

    let button = $(this);
    let url = button.data("url");
    let row = button.closest("tr");

    $.ajax({
        url: url,
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr("content") },
        success: function (res) {
            // ✅ Toast
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: res.message,
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                customClass: { container: "swal-toast-container" },
            });

            // ✅ Update cart badge
            $("#cart-count-badge")
                .text(res.cart_count)
                .toggle(res.cart_count > 0);

            // ✅ Update favorites badge
            $("#favorites-count")
                .text(res.favorites_count)
                .toggle(res.favorites_count > 0);

            // ✅ Remove row from favorites table
            row.remove();
            if (res.favorites_count === 0) {
                $("tbody").html(
                    '<tr><td colspan="4" class="text-center">No favorites added yet.</td></tr>'
                );
            }

            // ✅ Update cart dropdown items
            var cartItemsList = $("#cart-items-list");
            cartItemsList.empty();

            if (Object.keys(res.cart).length > 0) {
                $.each(res.cart, function (id, item) {
                    cartItemsList.append(`
                        <li>
                            <img src="${item.image}" alt="${item.name}" width="50">
                            <div class="cart-product">
                                <a href="#">${item.name}</a>
                                <span>₹${item.price} x ${item.quantity}</span>
                            </div>
                        </li>
                    `);
                });

                // ✅ Update total section
                var totalSection = `
                    <div class="shopping-items">
                        <span>Total :</span>
                        <span>₹${res.cart_total}</span>
                    </div>
                    <div class="cart-button mb-4">
                        <a href="/shop-cart" class="theme-btn">View Cart</a>
                    </div>
                `;
                $("#cart-total-section").html(totalSection);
            } else {
                cartItemsList.append(
                    '<li class="border-none text-center"><p>Your cart is empty</p></li>'
                );
                $("#cart-total-section").html("");
            }
        },
        error: function () {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Something went wrong!",
                showConfirmButton: false,
                timer: 1500,
            });
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".remove-favorite-form").forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            let row = this.closest("tr");
            let url = this.getAttribute("action");

            fetch(url, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": this.querySelector("[name=_token]").value,
                    Accept: "application/json",
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log("Response from server:", data);

                    if (data.success) {
                        // Remove row
                        row.remove();

                        // Update favorites count
                        const favCountEl =
                            document.getElementById("favorites-count");
                        if (favCountEl) {
                            favCountEl.textContent = data.favorites_count ?? 0;
                        }

                        // If no favorites left
                        if (
                            document.querySelectorAll("tbody tr").length === 0
                        ) {
                            document.querySelector("tbody").innerHTML = `
                <tr>
                    <td colspan="4" class="text-center">No favorites added yet.</td>
                </tr>`;
                        }

                        // Toast
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Removed from favorites",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                });
        });
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".add-to-favorites-btn").click(function (e) {
        e.preventDefault();

        var button = $(this);
        var productId = button.data("id");

        $.ajax({
            url: "/favorites/toggle/" + productId, // Route to handle favorite toggle
            type: "POST",
            success: function (res) {
                // Show toast
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: res.added ? "success" : "info",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });

                // Update header count
                $("#favorites-count").text(res.favorites_count);

                // Optional: change heart color
                if (res.added) {
                    button
                        .find("i")
                        .addClass("fa-solid")
                        .removeClass("fa-regular");
                } else {
                    button
                        .find("i")
                        .addClass("fa-regular")
                        .removeClass("fa-solid");
                }
            },
            error: function () {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: "Something went wrong!",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
            },
        });
    });
});
// favorites cart ajax end


// add to cart ajax start
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".add-to-cart-btn").click(function (e) {
        e.preventDefault();

        var button = $(this);
        var url = button.data("url");

        button.prop("disabled", true); // prevent double clicks

        $.ajax({
            url: url,
            type: "POST",
            success: function (res) {
                // Toast notification
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: { container: "swal-toast-container" },
                });

                // Update header cart count
                var cartBadge = $("#cart-count-badge");
                if (res.cart_count > 0) {
                    cartBadge.text(res.cart_count).show();
                } else {
                    cartBadge.hide();
                }

                // Update mini-cart items
                var cartItemsList = $("#cart-items-list");
                cartItemsList.empty();

                if (Object.keys(res.cart).length > 0) {
                    $.each(res.cart, function (id, item) {
                        cartItemsList.append(`
                            <li>
                                <img src="${
                                    item.image
                                }" alt="${item.name}" width="50">
                                <div class="cart-product">
                                    <a href="#">${item.name}</a>
                                    <span>₹${Number(item.price).toLocaleString(
                                        "en-IN"
                                    )} x ${item.quantity}</span>
                                </div>
                            </li>
                        `);
                    });

                    // Update total section
                    var totalSection = `
                        <div class="shopping-items">
                            <span>Total :</span>
                            <span>₹${Number(res.cart_total).toLocaleString(
                                "en-IN"
                            )}</span>
                        </div>
                        <div class="cart-button mb-4">
                            <a href="/shop-cart" class="theme-btn">View Cart</a>
                        </div>
                    `;
                    $("#cart-total-section").html(totalSection);
                } else {
                    cartItemsList.append(
                        '<li class="border-none text-center"><p>Your cart is empty</p></li>'
                    );
                    $("#cart-total-section").html("");
                }

                // Update button behavior
                button
                    .html(
                        '<i class="fa-regular fa-cart-shopping"></i> Go to Cart'
                    )
                    .removeClass("add-to-cart-btn")
                    .off("click")
                    .click(function () {
                        window.location.href = "/shop-cart";
                    });

                button.prop("disabled", false); // re-enable button
            },
            error: function (xhr) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: "Something went wrong!",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
                button.prop("disabled", false);
                console.error(xhr.responseText);
            },
        });
    });
});
// add to cart ajax end
// quantity update cart ajax start
$(document).ready(function () {
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    });

    function updateCartRow(id, quantity, price) {
        const subtotal = quantity * price;
        $(`#cart-row-${id} .quantityValue`).val(quantity);
        $(`#cart-row-${id} .price-usd`).eq(1).text(`₹${subtotal.toLocaleString('en-IN', {minimumFractionDigits:2})}`);
    }

    $('.quantityIncrement, .quantityDecrement').click(function () {
        const button = $(this);
        const id = button.data('id');
        const action = button.data('action');

        $.ajax({
            url: `/cart/update-quantity/${id}`,
            type: 'POST',
            data: { action: action },
            success: function (res) {
                if (res.success) {
                    const item = res.cart[id];
                    if (item) {
                        updateCartRow(id, item.quantity, item.price);
                    }

                    // Update grand total
                    let total = 0;
                    Object.values(res.cart).forEach(i => {
                        total += i.price * i.quantity;
                    });

                    const donation = parseFloat($('#donationAmount').text()) || 0;
                    $('#grandTotal').text(`₹${(total + donation).toLocaleString('en-IN', {minimumFractionDigits:2})}`);

                    // Update header badge
                    $('#cart-count-badge').text(res.cart_count).show();
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to update cart!');
            }
        });
    });

    // Donation step
    const donationStep = 10;

    $('.donation-increment').click(function() {
        let donation = parseInt($('#donationAmount').text()) || 0;
        donation += donationStep; // increment by 10
        $('#donationAmount').text(donation);
        $('#subtotal-donation').text(`₹${donation.toLocaleString('en-IN')}`);

        let total = 0;
        $('td.price-usd').each(function(index, td){
            if (index % 2 === 1) total += parseFloat($(td).text().replace(/[₹,]/g,'')); // subtotal columns
        });
        $('#grandTotal').text(`₹${(total + donation).toLocaleString('en-IN', {minimumFractionDigits:2})}`);
    });

    $('.donation-decrement').click(function() {
        let donation = parseInt($('#donationAmount').text()) || 0;
        if (donation > donationStep) donation -= donationStep; // decrement by 10 minimum
        $('#donationAmount').text(donation);
        $('#subtotal-donation').text(`₹${donation.toLocaleString('en-IN')}`);

        let total = 0;
        $('td.price-usd').each(function(index, td){
            if (index % 2 === 1) total += parseFloat($(td).text().replace(/[₹,]/g,'')); // subtotal columns
        });
        $('#grandTotal').text(`₹${(total + donation).toLocaleString('en-IN', {minimumFractionDigits:2})}`);
    });
});


// quantity update ajax end 
// remove from cart ajax start
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Remove product
    $(document).on("submit", ".remove-cart-form", function (e) {
        e.preventDefault();
        const form = $(this);
        const id = form.closest("tr").attr("id").replace("cart-row-", "");

        $.ajax({
            url: `/cart/remove/${id}`,
            type: "DELETE",
            success: function (res) {
                if (res.success) {
                    // Remove row from table
                    $(`#cart-row-${id}`).remove();

                    // Update grand total
                    let total = 0;
                    Object.values(res.cart).forEach((i) => {
                        total += i.price * i.quantity;
                    });
                    const donation =
                        parseFloat($("#donationAmount").text()) || 0;
                    $("#grandTotal").text(
                        `₹${(total + donation).toLocaleString("en-IN", {
                            minimumFractionDigits: 2,
                        })}`
                    );

                    // Update header badge
                    $("#cart-count-badge").text(res.cart_count).show();

                    // If cart empty
                    if (res.cart_count === 0) {
                        $("tbody").html(
                            '<tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>'
                        );
                        $("#cart-total-section").html("");
                    }

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Item removed from cart!",
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                }
            },
            error: function (xhr) {
                alert("Failed to remove item!");
            },
        });
    });
});
// remove from cart ajax end
$(document).ready(function() {
    $('.view-product-btn').on('click', function() {
        let productId = $(this).data('id');

        $.ajax({
            url: '/product/' + productId + '/details',
            type: 'GET',
            success: function(product) {
                // Update modal content dynamically
                $('#exampleModal2 .shop-details-image img').attr('src', '/storage/' + product.main_image);
                $('#exampleModal2 .product-details-content h3').text(product.title);
                $('#exampleModal2 .product-details-content p').first().text(product.description);
                $('#exampleModal2 .price-list h3').text(product.after_discount_price + ' ₹ only');

                // Update other details
                $('#exampleModal2 .details-info span:contains("Height")').text('Height: ' + product.height);
                $('#exampleModal2 .details-info span:contains("Width")').text('Width: ' + product.width);
                $('#exampleModal2 .details-info span:contains("Handle")').text('Handle: ' + product.handle);
                $('#exampleModal2 .details-info span:contains("Base")').text('Base: ' + product.base);

                // You can also handle other images if you have a carousel
            }
        });
    });
});


// view product ajax end

document.querySelectorAll('.zoom-container').forEach(container => {
    const img = container.querySelector('.zoom-image');

    container.addEventListener('mousemove', function(e){
        const rect = img.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        img.style.transformOrigin = `${x}% ${y}%`;
        img.style.transform = 'scale(2)'; // zoom level
    });

    container.addEventListener('mouseleave', function(){
        img.style.transform = 'scale(1)';
        img.style.transformOrigin = 'center center';
    });
});


