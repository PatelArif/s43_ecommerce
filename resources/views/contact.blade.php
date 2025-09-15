@include('includes.head')
@include('includes.header')
<style>.header-1 {background:transparent;}</style>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    </script>
@endif
   <section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

    <div class="container-fluid  position-relative z-10">
        <div class="conatct-main-wrapper">
            <div class="content p-5 text-white">
                <h2>Keep In Touch with Us</h2>
            </div>
        </div>
    </div>
</section>



         <!-- contact-us-Section Start -->
        <section class="contact-us-section section-padding1 fix">
            <div class="container">
                <div class="conatct-main-wrapper">
                    <div class="contact-box-wrapper">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="comment-form-wrap">
                                    <h3>Sent A Message</h3>
        <form id="contact-form2">
    @csrf
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="form-clt">
                <input type="text" name="name" id="name" placeholder="Your Name" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-clt">
                <input type="email" name="email" id="email" placeholder="Email address" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-clt">
                <textarea name="message" id="message" placeholder="Type your message" required></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="theme-btn">Post Comment</button>
        </div>
    </div>
</form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-right">
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="fa-thin fa-comments"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                            <a href="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</a>

                                            </h6>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="fa-thin fa-location-pin"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                               Mumbai, India
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="contact-item mb-0">
                                        <div class="icon">
                                            <i class="fa-thin fa-share-nodes"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                                Find on social media
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="social-icon d-flex align-items-center">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="bg-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- map-Section Start -->
        <div class="map-section section-padding pt-0">
            <div class="container">
                <div class="map-items">
                    <div class="googpemap">
<iframe 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15080.8515767458!2d72.8776558!3d19.0759837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63f1b9aa3a9%3A0x22f0b6e962f8d833!2sMumbai%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sin!4v1693730570000!5m2!1sen!2sin" 
  width="600" 
  height="450" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
                    </div>
                </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#contact-form2').on('submit', function(e) {
        e.preventDefault();

        let formData = {
            _token: $('input[name=_token]').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        };

        $.ajax({
            url: "{{ route('contact.store') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                // Clear form
                $('#contact-form2')[0].reset();

                // SweetAlert success
                Swal.fire({
                    icon: 'success',
                    title: 'Message Sent!',
                    text: 'Thank you for contacting us.',
                });
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = '';

                $.each(errors, function(key, value){
                    errorMessage += value + '\n';
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
});
</script>

@include('includes.footer')
     