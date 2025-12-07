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
$(document).ready(function () {
    // Show forgot password form
    $("#forgotPasswordLink").on("click", function () {
        $(".login_section").addClass("d-none");
        $(".forgotPasswordSection").removeClass("d-none");
    });

    // Back to login form
    $("#backToLogin").on("click", function () {
        $(".forgotPasswordSection").addClass("d-none");
        $(".login_section").removeClass("d-none");
    });
});

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

$("#user_login_form").on("submit", function (e) {
    e.preventDefault(); // Prevent default form submission

    $.ajax({
        url: "/login",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            if (response.status === true) {
                // Success - show SweetAlert
                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => {
                    // Redirect using Laravel's redirect
                    window.location.href = response.redirect;
                });
            } else {
                // Laravel returned status: false (invalid credentials)
                Swal.fire({
                    title: "Error!",
                    text: response.message || "Invalid credentials",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            }
        },
        error: function (xhr) {
            // For validation errors or too many attempts
            let errorMessages = "";
            if (xhr.responseJSON?.errors) {
                for (let key in xhr.responseJSON.errors) {
                    errorMessages += xhr.responseJSON.errors[key][0] + "\n";
                }
            } else if (xhr.responseJSON?.message) {
                errorMessages = xhr.responseJSON.message;
            } else {
                errorMessages = "An unexpected error occurred.";
            }

            Swal.fire({
                title: "Error!",
                text: errorMessages,
                icon: "error",
                confirmButtonText: "OK",
            });
        },
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

// Set CSRF header globally

$(document).on("click", ".cart-action-btn", function (e) {
    e.preventDefault();
    let btn = $(this);
    let url = btn.data("url");

    // If already converted to "Go To Cart", just redirect
    if (btn.hasClass("go-to-cart")) {
        window.location.href = "/shop-cart"; // use correct route name
        return;
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: url,
        type: "POST",
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: response.message || "Item added to cart!",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });

                $("#cart-count-badge").text(response.total_cartItem);

                // Change button to "Go To Cart"
                btn.html(
                    '<i class="fa-regular fa-cart-shopping"></i> Go To Cart'
                );
                btn.removeClass("add-to-cart-btn").addClass("go-to-cart");
            }
        },
        error: function (xhr) {
            if (xhr.status === 401 && xhr.responseJSON?.redirect) {
                alert(xhr.responseJSON.message);
                window.location.href = xhr.responseJSON.redirect;
            } else {
                alert("Something went wrong!");
            }
        },
    });
});

// Update cart quantity example
// $(document).on("click", ".cart-action-btn", function () {
//     let pid = $(this).data("id");
//     let url = $(this).data("url");

//     let qty = $('.cart-quantity-input[data-product-id="' + pid + '"]').val();

//     $.post(
//         url,
//         {
//             quantity: qty,
//             _token: $('meta[name="csrf-token"]').attr("content"),
//         },
//         function (response) {
//             if (response.success) {
//                 $("#cart-count").text(response.cart_count);
//             }
//         }
//     );
// });


// quantity update ajax end
// remove from cart ajax start
$(document).ready(function () {
    $(".remove-cart-form").on("submit", function (e) {
        e.preventDefault();

        let form = $(this);
        let cartId = form.data("id");
        let url = form.attr("action");

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    // Remove the table row
                    form.closest("tr").remove();

                    // update badge if you have one
                    $("#cart-count-badge").text(response.total_cartItem);

                    // If no rows left, show "Your cart is empty"
                    if ($("#datatable tbody tr").length === 1) {
                        // because last row is Grand Total
                        $("#datatable tbody").html(
                            '<tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>'
                        );
                    }

                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },

            error: function (xhr) {
                alert("Something went wrong!");
            },
        });
    });
});

// remove from cart ajax end
$(document).ready(function () {
    $(".view-product-btn").on("click", function () {
        let productId = $(this).data("id");

        $.ajax({
            url: "/product/" + productId + "/details",
            type: "GET",
            success: function (product) {
                // Update modal content dynamically
                $("#exampleModal2 .shop-details-image img").attr(
                    "src",
                    "/storage/" + product.main_image
                );
                $("#exampleModal2 .product-details-content h3").text(
                    product.title
                );
                $("#exampleModal2 .product-details-content p")
                    .first()
                    .text(product.description);
                $("#exampleModal2 .price-list h3").text(
                    product.after_discount_price + " ₹ only"
                );

                // Update other details
                $('#exampleModal2 .details-info span:contains("Height")').text(
                    "Height: " + product.height
                );
                $('#exampleModal2 .details-info span:contains("Width")').text(
                    "Width: " + product.width
                );
                $('#exampleModal2 .details-info span:contains("Handle")').text(
                    "Handle: " + product.handle
                );
                $('#exampleModal2 .details-info span:contains("Base")').text(
                    "Base: " + product.base
                );

                // You can also handle other images if you have a carousel
            },
        });
    });
});

// view product ajax end

document.querySelectorAll(".zoom-container").forEach((container) => {
    const img = container.querySelector(".zoom-image");

    container.addEventListener("mousemove", function (e) {
        const rect = img.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        img.style.transformOrigin = `${x}% ${y}%`;
        img.style.transform = "scale(2)"; // zoom level
    });

    container.addEventListener("mouseleave", function () {
        img.style.transform = "scale(1)";
        img.style.transformOrigin = "center center";
    });
});

$(document).on("click", "#addDonation", function () {
    Swal.fire({
        title: "Add Donation",
        text: "Would you like to add a donation to support nature?",
        icon: "question",
        input: "number",
        inputLabel: "Enter amount (in multiples of 10)",
        inputValue: 10,
        inputAttributes: {
            min: 10,
            step: 10,
        },
        showCancelButton: true,
        confirmButtonText: "Add Donation",
    }).then((result) => {
        if (result.isConfirmed) {
            let donation = parseInt(result.value) || 0;
            window.location.href = "/checkout?donation=" + donation;
        }
    });
});
