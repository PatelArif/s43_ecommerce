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
    document.querySelectorAll(".remove-favorite-form").forEach(form => {
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

        $.ajax({
            url: url,
            type: "POST",
            success: function (res) {
                // SweetAlert2 toast
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

                // Update header cart count badge
                var cartBadge = $("#cart-count-badge");
                if (res.cart_count > 0) {
                    cartBadge.text(res.cart_count).show();
                } else {
                    cartBadge.hide();
                }

                // Update cart-box items
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

                    // Update total section
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
                    $("#cart-total-section").html(""); // remove total section
                }

                // Change button to Go to Cart
                button.html(
                    '<i class="fa-regular fa-cart-shopping"></i> Go to Cart'
                );
                button.removeClass("add-to-cart-btn");
                button.off("click");
                button.click(function () {
                    window.location.href = "/shop-cart";
                });
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
            },
        });
    });
});


let donation = 10; // initial donation
const donationStep = 10; // step for donation

function getCartTotal() {
    let cartTotal = 0;
    $('.price-usd[id^="subtotal-"]')
        .not("#subtotal-donation")
        .each(function () {
            let val = parseFloat($(this).text().replace("₹", ""));
            console.log("Cart item subtotal:", val);
            cartTotal += val;
        });
    console.log("Total cart subtotal:", cartTotal);
    return cartTotal;
}

function updateGrandTotal() {
    let cartTotal = getCartTotal();
    $("#subtotal-donation").text("₹" + donation); // update donation subtotal
    let grandTotal = cartTotal + donation;
    console.log("Donation:", donation, "Grand Total:", grandTotal);
    $("#grandTotal").text("₹" + grandTotal.toFixed(2));
    $("#donationAmount").text(donation); // update donation display
}

// Donation increment
$(".donation-increment").click(function () {
    donation += donationStep;
    console.log("Donation incremented to:", donation);
    updateGrandTotal();
});

// Donation decrement (minimum 10)
$(".donation-decrement").click(function () {
    if (donation > 10) {
        donation -= donationStep;
        console.log("Donation decremented to:", donation);
        updateGrandTotal();
    } else {
        console.log("Donation already at minimum:", donation);
    }
});

// Quantity increment/decrement buttons (for products)
$(".btn-action").click(function () {
    let id = $(this).data("id");
    let action = $(this).data("action");
    if (!id) return; // skip if no product id (avoid donation row)

    let quantityInput = $(this).siblings(".quantityValue");
    let currentQty = parseInt(quantityInput.val());
    console.log(
        "Clicked",
        action,
        "for product ID:",
        id,
        "Current quantity:",
        currentQty
    );

    if (action === "increment") {
        quantityInput.val(currentQty + 1);
    } else if (action === "decrement") {
        quantityInput.val(Math.max(0, currentQty - 1));
    }

    // Update subtotal
    let price =
        parseFloat(
            $(this)
                .closest("tr")
                .find(".price-usd")
                .first()
                .text()
                .replace("₹", "")
        ) / currentQty;
    let newQty = parseInt(quantityInput.val());
    let newSubtotal = price * newQty;
    $("#subtotal-" + id).text("₹" + newSubtotal.toFixed(2));
    console.log("Updated subtotal for ID", id, ":", newSubtotal);

    // Update grand total
    updateGrandTotal();
});

// Initial call to set totals correctly on page load
updateGrandTotal();

