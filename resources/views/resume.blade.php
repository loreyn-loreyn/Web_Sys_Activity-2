<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - {{ $name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style> 
        @media print {
            body { background: none; }
            .resume { box-shadow: none; margin: 0; width: 100%; }
            .logout-btn { display: none; }
            .collapsible { background: none; cursor: auto; }
            .collapsible-content { display: block !important; }
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:  rgb(0, 151, 15);
            border: 1px solid rgb(0, 151, 14);
            border-radius: 8px;
            padding: 15px 25px;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
            font-size: 16px;
            font-weight: bold;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
            text-align: center;
            min-width: 250px;
            color: rgb(255, 255, 255);
        }

        /* Collapsible button style */
        .collapsible {
            background: #e5f3e5;
            color: #065f46;
            cursor: pointer;
            padding: 10px 15px;
            width: 100%;
            text-align: left;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .collapsible:hover {
            background:rgb(255, 255, 255);
        }

        .collapsible:after {
            content: '\002B'; /* plus sign */
            float: right;
        }

        .collapsible.active:after {
            content: "\2212"; /* minus sign */
        }

        .collapsible-content {
            display: none;
            overflow: hidden;
            padding: 10px 15px;
            background: #f9faf9;
            border-left: 3px solid #10b981;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-6">

    <!-- Logout button component -->
    @include('component.logout')

    @if (session('success'))
        <div id="popup-message" class="popup">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden relative resume">

        {{-- Profile Image --}}
        <div class="absolute top-2.5 right-7">
            <img src="{{ asset('images/my_photo.jpg') }}" 
            alt="Profile Photo"
            class="w-28 h-28 rounded-full border-4 border-white shadow-lg object-cover">
        </div>

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-8">
            <h1 class="text-4xl font-bold">{{ $name }}</h1>
            <p class="text-lg">{{ $title }}</p>
        </div>

        {{-- Profile + Contact --}}
        <div class="grid md:grid-cols-3 gap-6 p-8">
            <div class="col-span-1 space-y-6">
                {{-- Contact --}}
                <div class="bg-gray-50 shadow rounded-xl p-5">
                    <h2 class="text-xl font-semibold text-green-700 mb-3">Contact</h2>
                    <ul class="space-y-2 text-gray-700">
                        <li>
                            <a href="https://www.google.com/maps/search/?api=1&query=Brgy.+Sampaloc,+Talavera,+Nueva+Ecija"
                               target="_blank" class="hover:text-green-600 transition">
                                🏠︎ Brgy. Sampaloc, Talavera, Nueva Ecija
                            </a>
                        </li>
                        <li>
                            <button onclick="copyPhone('09661565006')" class="hover:text-green-600 transition cursor-pointer">
                                ☎ 09661565006
                            </button>
                        </li>
                        <li>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=bulanadi.sophia@gmail.com"
                               target="_blank" class="hover:text-green-600 transition">
                                ✉︎ bulanadi.sophia@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/in/sophialoureine" 
                               target="_blank" class="hover:text-green-600 transition">
                                🔗 linkedin.com/in/sophialoureine
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/loreyn-loreyn" 
                               target="_blank" class="hover:text-green-600 transition">
                                💻 github.com/loreyn-loreyn
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Education --}}
                <div class="bg-gray-50 shadow rounded-xl p-5">
                    <h2 class="text-xl font-semibold text-green-700 mb-3">Education</h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ $education }}</p>
                </div>
            </div>

            <div class="col-span-2 space-y-6">
                {{-- Profile --}}
                <div class="bg-gray-50 shadow rounded-xl p-5">
                    <h2 class="text-xl font-semibold text-green-700 mb-3">Profile</h2>
                    <p class="text-gray-700">{{ $profile }}</p>
                </div>

                {{-- Skills --}}
                <div class="bg-gray-50 shadow rounded-xl p-5">
                    <h2 class="text-xl font-semibold text-green-700 mb-3">Skills</h2>
                    <ul class="grid grid-cols-2 gap-2 text-gray-700">
                        @foreach($skills as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Experience --}}
        <div class="px-8 pb-8">
            <h2 class="text-2xl font-bold text-green-700 mb-6">Work Experience</h2>
            <div class="space-y-6">
                @foreach($experience as $exp)
                    <button class="collapsible">{{ $exp['company'] }} <span class="text-sm text-gray-500 float-right">{{ $exp['date'] }}</span></button>
                    <div class="collapsible-content">
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            @foreach($exp['tasks'] as $task)
                                <li>{{ $task }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <script>
        // Collapsible functionality
        const collapsibles = document.querySelectorAll(".collapsible");
        collapsibles.forEach(btn => {
            btn.addEventListener("click", function() {
                this.classList.toggle("active");
                const content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        });

        // Prevent going back to resume after logout
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.location.replace("{{ route('login') }}");
        };

        // Popup fade out
        document.addEventListener("DOMContentLoaded", function () {
            let popup = document.getElementById("popup-message");
            if (popup) {
                setTimeout(() => {
                    popup.style.opacity = "0";
                    setTimeout(() => popup.remove(), 500);
                }, 3000);
            }
        });

        // Copy phone number
        function copyPhone(number) {
            navigator.clipboard.writeText(number).then(() => {
                alert("Phone number copied: " + number);
            });
        }
    </script>
</body>
</html>
