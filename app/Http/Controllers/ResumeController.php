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
            new Middleware('auth'),
        ];
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $name = "SOPHIA LOUREINE M. BULANADI";
        $title = "Software Engineer";
        $profile = "Detail-oriented and innovative Software Engineer with 4+ years of experience in developing scalable web applications and enterprise solutions. Passionate about solving complex problems through clean code, agile methodologies, and modern technologies.";

        $contact = [
            "🏠︎ 333, Purok 6, Brgy. Sampaloc, Talavera, Nueva Ecija",
            "☎ 09661565006",
            "✉︎ bulanadi.sophia@gmail.com",
            "🔗 linkedin.com/in/sophialoureine",
            "💻 github.com/loreyn-loreyn"
        ];

        $education = "Batangas State University  
Bachelor of Science in Computer Science, 2027 (Cum Laude)";

        $skills = [
            "Languages: C, Java, HTML, C#, PHP, Dart",
            "Web: Laravel, Flutter",
            "Databases: MySQL, PostgreSQL",
            "Cloud & Tools: Git",
            "Soft Skills: Agile/Scrum, Problem-Solving, Collaboration"
        ];

        $experience = [
            [
                "company" => "Globe Telecom, Makati City",
                "date" => "June 2029 - Present",
                "tasks" => [
                    "Developed and maintained scalable web apps with Laravel & React.js, serving 1M+ customers",
                    "Integrated secure payment gateway APIs, reducing transaction errors by 30%",
                    "Led a team of 5 junior developers in coding best practices and Git workflows",
                    "Deployed applications on AWS with 99.9% uptime"
                ]
            ],
            [
                "company" => "Accenture Philippines, Taguig City",
                "date" => "July 2027 - May 2029",
                "tasks" => [
                    "Built responsive dashboards with Vue.js and Laravel, enhancing reporting efficiency",
                    "Automated unit testing with QA team, reducing bugs by 25%",
                    "Wrote reusable components and documentation adopted company-wide"
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
