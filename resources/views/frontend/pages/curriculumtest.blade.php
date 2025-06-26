@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])


<style>
        body {
            background: linear-gradient(135deg, #ebf5ff 0%, #f3e8ff 50%, #fce8f3 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #2563eb 0%, #7c3aed 50%, #db2777 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .curriculum-card {
            height: 320px;
            border-radius: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .curriculum-card:hover {
            transform: scale(1.05) rotate(1deg);
        }
        
        .card-icon {
            width: 56px;
            height: 56px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            margin-bottom: 1rem;
        }
        
        .feature-badge {
            padding: 0.25rem 0.5rem;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
            backdrop-filter: blur(10px);
        }
        
        .stats-circle {
            width: 176px;
            height: 176px;
            border-radius: 9999px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            position: relative;
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        }
        
        .orbit-element {
            width: 56px;
            height: 56px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            position: absolute;
            animation: pulse 2s infinite;
        }
        
        .orbit-element:nth-child(2) {
            animation-delay: 0.5s;
        }
        
        .orbit-element:nth-child(3) {
            animation-delay: 1s;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        
        .footer-highlight {
            width: 48px;
            height: 48px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }
        
        .bg-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.1;
        }
        
        .bg-pattern div {
            position: absolute;
            border: 2px solid white;
            border-radius: 9999px;
        }
        
        .bg-pattern div:nth-child(1) {
            top: 12px;
            right: 12px;
            width: 24px;
            height: 24px;
        }
        
        .bg-pattern div:nth-child(2) {
            bottom: 12px;
            left: 12px;
            width: 16px;
            height: 16px;
        }
        
        .bg-pattern div:nth-child(3) {
            top: 50%;
            left: 8px;
            width: 12px;
            height: 12px;
            background-color: white;
            border: none;
        }
    </style>

    
<div class="text-center pt-5 pb-4 position-relative z-3">
        <h1 class="display-3 fw-black gradient-text mb-3">
            CURRICULUM
        </h1>
        <div class="fs-2 fw-bold text-primary mb-3">@NHGS</div>
        <p class="text-muted mx-auto fs-5 fw-semibold px-4" style="max-width: 66rem; line-height: 1.75;">
            Comprehensive educational framework designed to nurture well-rounded individuals through modern teaching methodologies and holistic development approaches.
        </p>
    </div>

    <!-- Stats Circle -->
    <div class="d-flex justify-content-center mb-5 position-relative z-3">
        <div class="position-relative">
            <div class="stats-circle">
                <div class="text-white display-4 fw-black mb-2">5</div>
                <div class="text-white fw-bold text-center fs-5">CORE<br>AREAS</div>
                
                <div class="orbit-element bg-gradient" style="background: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%); top: -20px; left: -20px;">
                    <i data-lucide="target" class="text-white" style="width: 28px; height: 28px;"></i>
                </div>
                <div class="orbit-element bg-gradient" style="background: linear-gradient(135deg, #4ade80 0%, #16a34a 100%); top: -20px; right: -20px;">
                    <i data-lucide="award" class="text-white" style="width: 28px; height: 28px;"></i>
                </div>
                <div class="orbit-element bg-gradient" style="background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%); bottom: -20px; left: 50%; transform: translateX(-50%);">
                    <i data-lucide="check-circle" class="text-white" style="width: 28px; height: 28px;"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Curriculum Cards -->
    <div class="container px-4 pb-5 position-relative z-3">
        <div class="row g-4 justify-content-center">
            <!-- Academics & Assessments -->
            <div class="col-12 col-md-6 col-lg-4 col-xl">
                <div class="curriculum-card" style="background: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%);">
                    <div class="bg-pattern">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="card-icon">
                        <i data-lucide="book-open" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                    <h3 class="text-white fs-5 fw-black mb-3">ACADEMICS & ASSESSMENTS</h3>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="feature-badge">CBSE Curriculum</span>
                        <span class="feature-badge">NCERT Syllabus</span>
                        <span class="feature-badge">Competence Focus</span>
                    </div>
                    <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                        The school follows CBSE Curriculum following the syllabus prescribed by NCERT with emphasis on developing competence & skills.
                    </p>
                    <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i>
                        <span class="small fw-bold">Active Implementation</span>
                    </div>
                </div>
            </div>
            
            <!-- Co-Scholastic Activities -->
            <div class="col-12 col-md-6 col-lg-4 col-xl">
                <div class="curriculum-card" style="background: linear-gradient(135deg, #4ade80 0%, #16a34a 100%);">
                    <div class="bg-pattern">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="card-icon">
                        <i data-lucide="users" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                    <h3 class="text-white fs-5 fw-black mb-3">CO-SCHOLASTIC ACTIVITIES</h3>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="feature-badge">Arts & Drama</span>
                        <span class="feature-badge">Music & Sports</span>
                        <span class="feature-badge">Beyond Academics</span>
                    </div>
                    <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                        Arts, Drama, Music, Sports & PE are given equal importance like Scholastic subjects. We nurture the interest of students to know beyond.
                    </p>
                    <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i>
                        <span class="small fw-bold">Active Implementation</span>
                    </div>
                </div>
            </div>
            
            <!-- 21st Century Skills -->
            <div class="col-12 col-md-6 col-lg-4 col-xl">
                <div class="curriculum-card" style="background: linear-gradient(135deg, #fb923c 0%, #ea580c 100%);">
                    <div class="bg-pattern">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="card-icon">
                        <i data-lucide="lightbulb" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                    <h3 class="text-white fs-5 fw-black mb-3">21ST CENTURY SKILLS</h3>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="feature-badge">Communication</span>
                        <span class="feature-badge">Collaboration</span>
                        <span class="feature-badge">Critical Thinking</span>
                    </div>
                    <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                        The school teaching events, activities, competitions and evaluations consistently evolve to prepare students for Complex Communications, Collaboration, Creativity, Critical Thinking.
                    </p>
                    <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i>
                        <span class="small fw-bold">Active Implementation</span>
                    </div>
                </div>
            </div>
            
            <!-- Modern Pedagogical Practices -->
            <div class="col-12 col-md-6 col-lg-4 col-xl">
                <div class="curriculum-card" style="background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%);">
                    <div class="bg-pattern">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="card-icon">
                        <i data-lucide="graduation-cap" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                    <h3 class="text-white fs-5 fw-black mb-3">MODERN PEDAGOGICAL PRACTICES</h3>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="feature-badge">Project Exchange</span>
                        <span class="feature-badge">Skill Development</span>
                        <span class="feature-badge">Modern Methods</span>
                    </div>
                    <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                        School conducts activities by dividing students of aligned teaching methodologies like Project Exchange, Skill Development etc.
                    </p>
                    <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i>
                        <span class="small fw-bold">Active Implementation</span>
                    </div>
                </div>
            </div>
            
            <!-- Holistic Development -->
            <div class="col-12 col-md-6 col-lg-4 col-xl">
                <div class="curriculum-card" style="background: linear-gradient(135deg, #f472b6 0%, #db2777 100%);">
                    <div class="bg-pattern">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="card-icon">
                        <i data-lucide="heart" class="text-white" style="width: 28px; height: 28px;"></i>
                    </div>
                    <h3 class="text-white fs-5 fw-black mb-3">HOLISTIC DEVELOPMENT</h3>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="feature-badge">Physical Development</span>
                        <span class="feature-badge">Life Skills</span>
                        <span class="feature-badge">Emotional Wellbeing</span>
                    </div>
                    <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                        Physical Development, Cognitive & aesthetic development, Life skills, Moral values, Ethical understanding and Emotional wellbeing of our students.
                    </p>
                    <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i>
                        <span class="small fw-bold">Active Implementation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="bg-gradient py-5 position-relative overflow-hidden mt-5" style="background: linear-gradient(90deg, #2563eb 0%, #7c3aed 50%, #db2777 100%);">
        <!-- Decorative Elements -->
        <div class="position-absolute" style="top: 24px; left: 64px; width: 48px; height: 48px; border: 3px solid white; opacity: 0.2; border-radius: 9999px;"></div>
        <div class="position-absolute" style="bottom: 24px; right: 64px; width: 40px; height: 40px; background-color: white; opacity: 0.1; border-radius: 9999px;"></div>
        <div class="position-absolute" style="top: 50%; left: 32px; width: 24px; height: 24px; background-color: #fcd34d; opacity: 0.3; border-radius: 9999px;"></div>

        <div class="container px-5 text-center position-relative z-3">
            <h2 class="text-white display-4 fw-black mb-4">
                Empowering Future Leaders
            </h2>
            <p class="text-white fs-5 opacity-90 mb-5 mx-auto fw-semibold" style="max-width: 60rem;">
                Join us in shaping tomorrow's innovators through comprehensive education and holistic development.
            </p>
            
            <!-- Feature Highlights -->
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 text-white">
                <div class="d-flex align-items-center gap-3">
                    <div class="footer-highlight">
                        <i data-lucide="check-circle" style="width: 24px; height: 24px;"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-5">Excellence</div>
                        <div class="small opacity-80">in Education</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="footer-highlight">
                        <i data-lucide="award" style="width: 24px; height: 24px;"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-5">Recognized</div>
                        <div class="small opacity-80">Standards</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="footer-highlight">
                        <i data-lucide="star" style="width: 24px; height: 24px;"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-5">Future</div>
                        <div class="small opacity-80">Ready</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
