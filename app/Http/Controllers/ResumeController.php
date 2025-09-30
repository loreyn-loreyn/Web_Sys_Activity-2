<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'), // same as $this->middleware('auth')
        ];
    }

    public function show()
    {
        // If not authenticated, redirect to login (extra safety)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $name = "SOPHIA LOUREINE M. BULANADI";
        $title = "Aspiring Marketing Assistant";
        $profile = "Extremely motivated to constantly develop my skills and grow professionally...";

        $contact = [
            "📍 333, Purok 6, Brgy. Sampaloc, Talavera, Nueva Ecija",
            "📞 09661565006",
            "✉️ bulanadi.sophialoureine.m@gmail.com",
            "🔗 linkedin.com/in/sophialoureine"
        ];

        $education = "Batangas State University  
Bachelor of Science in Information Technology, 2026";

        $skills = [
            "Exceptional communication and networking skills",
            "Successful working in a team environment, as well as independently",
            "Ability to work under pressure and multi-task",
            "Ability to follow instructions and deliver quality results"
        ];

        $experience = [
            [
                "company" => "Freelance, Digital Marketing Assistant",
                "date" => "2024 - Present",
                "tasks" => [
                    "Assisted in managing social media campaigns and content planning",
                    "Analyzed performance metrics to optimize marketing strategies",
                    "Created promotional materials and visuals for online platforms"
                ]
            ],
            [
                "company" => "Talavera Senior High School, Student Intern",
                "date" => "2022 - 2023",
                "tasks" => [
                    "Helped organize school events and promotional activities",
                    "Worked with faculty staff on creative materials",
                    "Assisted in documentation and communications"
                ]
            ]
        ];

        return response()
            ->view('resume', compact('name', 'title', 'profile', 'contact', 'education', 'skills', 'experience'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
