<footer class="footer-section footer-bg-2 fix position-relative">

    <!-- Particles background -->
    <div id="particles-footer" class="particles"></div>
    <div class="container">
        <div class="footer-widget-wrapper style-2">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="{{ url('/') }}" class="footer-logo">
                                {{-- <img src="{{config('constants.ASSETS_PATH') }}img/logo/logo4.png" alt="logo-img"style="max-width: 100px;"> --}}

                                <h3> Step For Environment</h3>

                            </a>
                        </div>
                        <div class="footer-content">
                            <div class="social-item">
                                <p>
                                    At S4E, our mission is to inspire and empower individuals to adopt a sustainable
                                    lifestyle by providing high-quality, eco-friendly, and reusable products.
                                </p>
                                <div class="social-icon style-3 d-flex align-items-center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>

                                    {{-- <a href="#"><i class="fab fa-twitter"></i></a> --}}
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    {{-- <a href="#"><i class="fa-brands fa-vimeo-v"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>My Account</h3>
                        </div>
                        <div class="footer-content">
                            <div class="social-item">

                                <ul class="list-items style-color">
                                    <li>
                                        <a href="#">Track Orders</a>
                                    </li>
                                    {{-- <li>
                                    <a href="{{ url('product-details') }}">Shipping</a>
                                    </li> --}}

                                    <li>
                                        <a href="{{ url('my-account') }}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="#">Order History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Infomation</h3>
                        </div>
                        <ul class="list-items style-color">
                            <li>
                                <a href="#">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/contact') }}">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Talk To Us</h3>
                        </div>
                        <div class="footer-content">
                            <div class="text">
                                <p>Got Questions? Call us</p>
                                <a href="tel:+91 9867970493"> 9867970493</a>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a href="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</a>
                                </li>
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    Pragati chawl, chawl no 14, opp to Modern school kamraj nagar vasant Rao naik marg
                                    Ghatkopar East Mumbai 400077.<br>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom ">
            <div class="footer-wrapper style-2">
                <p class="wow fadeInUp" data-wow-delay=".3s">
                    &copy; <span id="year"></span> Step4Environment · All rights reserved ·
                    Designed &amp; developed with sustainability in mind by
                    <a href="#" class="footer-link">Patel Company</a>.
                </p>

            </div>
        </div>
    </div>
</footer>

<!-- Newsletter Modal Area Start-->
{{-- <div class="modal fade bd-example-modal-lg common-newsletter-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1 modal-bg">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="offer-modal-img d-none d-lg-block">
                               <img src="{{ asset('assets/img/cart/common-modal.jpg') }}" alt="img">

                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div class="offer-modal-right">
                                        <h3>Subcribe to Our Newsletter</h3>
                                        <p>Subscribe to our newsletter and Save your <span>20% money</span> with
                                            discount code today.</p>
                                        <form action="#!">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter your email">
                                                <div class="input-group-append">
                                                    <button class="theme-btn style6">Subscribe</button>
                                                </div>
                                            </div>
                                            <div class="check-boxed-modal">
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                <label for="vehicle1">Do not show this window</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> --}}
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/viewport.jquery.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/wow.min.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/main.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/script.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/particles.js') }}"></script>
<script src="{{ asset(config('constants.ASSETS_PATH') . '/js/lenis.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    let url = $(this).attr('href');
    let wrapper = $('#productWrapper');

    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function () {
            wrapper.css('opacity', '0.5');
        },
        success: function (html) {
            wrapper.html(html);
            wrapper.css('opacity', '1');

            $('html, body').animate({
                scrollTop: wrapper.offset().top - 120
            }, 400);
        }
    });
});
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    let url = $(this).attr('href');

    // Detect which wrapper exists
    let wrapper = $('#categoryWrapper').length
        ? $('#categoryWrapper')
        : $('#homeCategoryWrapper');

    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function () {
            wrapper.css('opacity', '0.5');
        },
        success: function (data) {
            wrapper.html(data);
            wrapper.css('opacity', '1');

            // 🔥 SAFE SCROLL
            if (wrapper.length) {
                $('html, body').animate({
                    scrollTop: wrapper.offset().top - 100
                }, 400);
            }

            // 🔁 Re-init swiper if exists
            if (typeof initSwiper === "function") {
                initSwiper();
            }
        }
    });
});
</script>

<script>
    $(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    let url = $(this).attr('href');
    let wrapper = $('#subcategoryWrapper');

    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function () {
            wrapper.css('opacity', '0.5');
        },
        success: function (response) {
            wrapper.html(response);
            wrapper.css('opacity', '1');

            if (wrapper.length) {
                $('html, body').animate({
                    scrollTop: wrapper.offset().top - 120
                }, 400);
            }
        },
        error: function () {
            alert('Failed to load subcategories');
        }
    });
});
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    let url = $(this).attr('href');
    let wrapper = $(this).closest('section').find('[id$="Wrapper"]');

    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function () {
            wrapper.css('opacity', '0.5');
        },
        success: function (data) {
            wrapper.html(data);
            wrapper.css('opacity', '1');

            $('html, body').animate({
                scrollTop: wrapper.offset().top - 120
            }, 400);
        }
    });
});
</script>

<script>
    
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 10
        });
    });
</script>
<script>
    document.getElementById('year').textContent = new Date().getFullYear();
    $(document).ready((function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), $(".btn-action").click((function() {
            let t = $(this).data("id"),
                a = $(this).data("action");
            $.ajax({
                url: "/cart/update/" + t,
                type: "POST",
                data: {
                    action: a
                },
                success: function(a) {
                    "success" === a.status && ($("#cart-row-" + t +
                            " .quantityValue").val(a.quantity), $("#subtotal-" +
                            t).text("₹" + a.subtotal.toFixed(2)), $(
                            "#grandTotal").text("₹" + a.total.toFixed(2)), Swal
                        .fire({
                            toast: !0,
                            position: "top-end",
                            icon: "success",
                            title: a.message,
                            showConfirmButton: !1,
                            timer: 1500,
                            timerProgressBar: !0
                        }), 0 == a.quantity && $("#cart-row-" + t).remove())
                }
            })
        })), $(".remove-cart-form").submit((function(t) {
            t.preventDefault();
            let a = $(this);
            $.ajax({
                url: a.attr("action"),
                type: "POST",
                data: a.serialize(),
                success: function(t) {
                    "success" === t.status && ($("#cart-row-" + t.id).remove(), $(
                        "#grandTotal").text("₹" + parseFloat(t.total)
                        .toFixed(2)), Swal.fire({
                        toast: !0,
                        position: "top-end",
                        icon: "success",
                        title: t.message,
                        showConfirmButton: !1,
                        timer: 1500,
                        timerProgressBar: !0
                    }), 0 === t.total && $("tbody").html(
                        '<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>'
                    ))
                }
            })
        }))
    }));
</script>
<script>
const lenis = new Lenis({
    duration: 1.0,
    easing: (t) => Math.sin((t * Math.PI) / 2),
    smoothWheel: true,
    smoothTouch: false, // 👈 recommended for mobile
    wheelMultiplier: 1,
});

// RAF loop
function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);


    // Debug scroll events (optional)
    lenis.on('scroll', ({
        scroll
    }) => {
        // console.log(scroll)
    })

    // Animation frame loop
    function raf(time) {
        lenis.raf(time)
        requestAnimationFrame(raf)
    }
    requestAnimationFrame(raf)

    // Smooth anchor scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            e.preventDefault()
            const target = document.querySelector(this.getAttribute("href"))
            if (target) {
                lenis.scrollTo(target, {
                    offset: -50,
                    duration: 2
                }) // slow scroll to section
            }
        })
    })
</script>
</body>

</html>
