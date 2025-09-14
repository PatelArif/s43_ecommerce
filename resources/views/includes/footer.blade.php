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
                                        {{-- <img src="assets/img/logo/logo4.png" alt="logo-img"style="max-width: 100px;"> --}}
                                 
                                    <h3>  Step For Environment</h3>

                                    </a>
                                </div>
                                <div class="footer-content">
                                    <div class="social-item">
                                        <p>
                                           At S4E, our mission is to inspire and empower individuals to adopt a sustainable lifestyle by providing high-quality, eco-friendly, and reusable products.
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
                                           Mumbai<br>
                                            
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


{{-- 
                        <div class="bottom-list wow fadeInUp" data-wow-delay=".5s">
                            <div class="app-image">
                             <img src="{{ asset('assets/img/footer/01.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/02.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/03.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/04.png') }}" alt="img">
                            </div>
                        </div> --}}
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
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 30,
      "density": { "enable": true, "value_area": 400 }
    },
    "color": { "value": "#ffffff" },
    "shape": {
      "type": "image",
      "image": {
        "src": "assets/img/hero/leaves-design.png",
        "width": 50,
        "height": 50
      }
    },
    "opacity": {
      "value": 0.7,
      "random": true
    },
    "size": {
      "value": 30,
      "random": true
    },
    "line_linked": { "enable": false },
    "move": {
      "enable": true,
      "speed": 1,
      "direction": "bottom",
      "random": true,
      "straight": false,
      "out_mode": "out"
    }
  },
  "interactivity": {
    "events": {
      "onhover": { "enable": true, "mode": "bubble" }
    },
    "modes": {
      "bubble": { "distance": 150, "size": 18, "duration": 2, "opacity": 1 }
    }
  },
  "retina_detect": true
});
</script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>

<script>
particlesJS("particles-footer", {
  "particles": {
    "number": { "value": 150, "density": { "enable": true, "value_area": 600 } },
    "color": { "value": "#ffffff" },
    "shape": { "type": "box" },
    "opacity": { "value": 0.5 },
    "size": { "value": 3, "random": true },
    "line_linked": { "enable": true, "distance": 100, "color": "#ffffff", "opacity": 0.4, "width": 1 },
    "move": { "enable": true, "speed": 2 }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": { "onhover": { "enable": true, "mode": "repulse" }, "onclick": { "enable": true, "mode": "push" }, "resize": true },
    "modes": {
      "grab": { "distance": 400, "line_linked": { "opacity": 1 } },
      "bubble": { "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 },
      "repulse": { "distance": 150, "duration": 0.4 },
      "push": { "particles_nb": 4 },
      "remove": { "particles_nb": 2 }
    }
  },
  "retina_detect": true
});

// Stats.js monitor
var count_particles, stats, update;
stats = new Stats;
stats.setMode(0);
stats.domElement.style.position = 'absolute';
stats.domElement.style.left = '0px';
stats.domElement.style.top = '0px';
document.body.appendChild(stats.domElement);

count_particles = document.createElement("div");
count_particles.className = "js-count-particles";
count_particles.style.position = "absolute";
count_particles.style.bottom = "0px";
count_particles.style.left = "0px";
count_particles.style.color = "#fff";
count_particles.style.padding = "5px";
document.body.appendChild(count_particles);

update = function() {
  stats.begin();
  stats.end();
  if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
    count_particles.innerText = 'Particles: ' + window.pJSDom[0].pJS.particles.array.length;
  }
  requestAnimationFrame(update);
};
requestAnimationFrame(update);
</script>


<script>
  // This JavaScript code automatically inserts the current year
  document.getElementById('year').textContent = new Date().getFullYear();
  
</script>   
<script>
$(document).ready(function(){

    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // Handle increment/decrement
    $('.btn-action').click(function(){
        let id = $(this).data('id');
        let action = $(this).data('action');

        $.ajax({
            url: '/cart/update/' + id,
            type: 'POST',
            data: { action: action },
            success: function(res){
                if(res.status === 'success'){
                    // Update quantity
                    $('#cart-row-' + id + ' .quantityValue').val(res.quantity);
                    // Update subtotal
                    $('#subtotal-' + id).text('₹' + res.subtotal.toFixed(2));
                    // Update grand total
                    $('#grandTotal').text('₹' + res.total.toFixed(2));

                    // Show toast
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    });

                    // Remove row if quantity is 0
                    if(res.quantity == 0){
                        $('#cart-row-' + id).remove();
                    }
                }
            }
        });
    });

    // Handle remove from cart
// Remove item
$('.remove-cart-form').submit(function(e){
    e.preventDefault();
    let form = $(this);

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        success: function(res){
            if(res.status === 'success'){
                // Remove the row from UI
                $('#cart-row-' + res.id).remove();

                // Update grand total
                $('#grandTotal').text('₹' + parseFloat(res.total).toFixed(2));

                // Show toast
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });

                // If cart becomes empty, show empty row
                if(res.total === 0){
                    $('tbody').html('<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>');
                }
            }
        }
    });
});



});
</script>

    </body>

<!-- Mirrored from ex-coders.com/html/ecomas/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Mar 2025 02:07:17 GMT -->
</html>