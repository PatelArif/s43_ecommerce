<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step For Environment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
        .fade-in {
            animation: fadeIn 1.2s ease-in-out forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-green-50 relative overflow-hidden">

    <!-- Particles Background -->
  <div id="particles-js" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;"></div>

    <!-- Login Card -->
    <div class="bg-white rounded-xl shadow-lg p-5 max-w-lg w-full fade-in">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-green- w-16 h-16 rounded-xl flex items-center justify-center mb-4">
                <img src="../assets/img/logo/logo4.png" alt="step4environment" class="w-250 h-250">
            </div>
            <h1 class="text-2xl font-bold text-green-700">Step4Environment</h1>
            <p class="text-gray-500 text-sm">Admin Dashboard for Sustainable Commerce</p>
        </div>

        <div class="text-center mb-6">
            <h2 class="font-semibold text-lg text-gray-700">Welcome Back</h2>
            <p class="text-gray-400 text-sm">Sign in to manage your eco-friendly store</p>
        </div>

        <form id="adminLoginForm" class="space-y-4">
            <input type="email" name="email" placeholder="Email Address" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400">
           <div class="relative">
    <input id="password" type="password" name="password" placeholder="Enter your password" 
           class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400">
    <span id="togglePassword" class="absolute right-3 top-3 text-gray-400 cursor-pointer">👁️</span>
</div>

            <div class="flex justify-between items-center text-sm text-gray-500">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4">
                    Remember me
                </label>
                <a href="#" class="text-green-500 hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="w-full bg-green-500 text-white p-3 rounded-lg hover:bg-green-600 transition">Sign In to Dashboard</button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">Secure Admin Access</p>
        <p class="text-center text-gray-600 text-sm mt-1">Protected by end-to-end encryption and sustainable security practices</p>

        <p class="text-center text-gray-600 text-sm mt-6">&copy; 2025 Step4Environment Admin. All rights reserved.</p>
        <p class="text-center text-gray-600 text-sm">Powered by Step4Environment</p>
    </div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Optionally, change the icon
        togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>

    <!-- Particles JS -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 50, "density": { "enable": true, "value_area": 1000 } },
                "color": { "value": "#166337" },
                "shape": {   "type": "image", // use image for leaves
            "image": {
                "src": "assets/img/6959474.png", // leaf image
                "width": 150,
                "height": 150
            }},
                "opacity": { "value": 0.9 },
                "size": { "value": 25 },
                "line_linked": { "enable": false, "distance": 150, "color": "#166337", "opacity": 0.9, "width": 5 },
                "move": { "enable": true, "speed": 2, "direction": "none", "out_mode": "bounce" }
            },
            "interactivity": {
    "detect_on": "window", // was "canvas"
    "events": { 
        "onhover": { "enable": true, "mode": "repulse" }, 
        "onclick": { "enable": true, "mode": "push" } 
    },
    "modes": { 
        "repulse": { "distance": 200 }, // make it more noticeable
        "push": { "particles_nb": 4 } 
    }},
            "retina_detect": true
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<script>
    
     @if(session('logout_success'))
        Swal.fire({
            icon: 'success',
            title: 'Logged out',
            text: "{{ session('logout_success') }}",
            timer: 3000,
            showConfirmButton: true,
             confirmButtonColor: '#28a745'
        });
    @endif
       $("#adminLoginForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/admin/login",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },

            success: function (data) {
                if (data.status) {
                    Swal.fire("Success!", data.message, "success").then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    Swal.fire("Login Failed", data.message, "error");
                }
            },
            error: function (xhr) {
                let msg = "Something went wrong.";
                if (xhr.responseJSON?.errors) {
                    msg = Object.values(xhr.responseJSON.errors).flat().join("\n");
                } else if (xhr.responseJSON?.message) {
                    msg = xhr.responseJSON.message;
                }
                Swal.fire("Error", msg, "error");
            },
        });
    });
</script>
</body>
</html>
