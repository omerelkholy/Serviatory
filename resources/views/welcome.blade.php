<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviatory - Service Reservation System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=montserrat:500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Aubrey&family=Birthstone&family=Creepster&family=Fira+Mono:wght@400;500;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend+Deca:wght@100..900&family=Merienda:wght@300..900&family=Micro+5&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IE+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Silkscreen:wght@400;700&family=Tiny5&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- Custom Style -->
    <style>
        :root {
            --primary-dark: #0f1720; /* Dark blue-black from logo background */
            --primary-light: #f1f1f1; /* Off-white for text */
            --accent-color: #3b82f6; /* Accent blue */
            --secondary-accent: #4f46e5; /* Secondary accent */
            --success-color: #10b981; /* Success green */
            --danger-color: #ee0f0f;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Fira Mono", monospace;
            background-color: var(--primary-dark);
            color: var(--primary-light);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
            position: relative;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo-text {
            font-family: 'Lexend Deca', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-light);
        }

        .logo-accent {
            color: var(--accent-color);
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            font-family: 'Fira Mono', monospace;
            font-weight: 500;
            padding: 0.6rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login {
            background-color: transparent;
            color: var(--primary-light);
            border: 1px solid var(--accent-color);
        }

        .btn-login:hover {
            background-color: rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .btn-register {
            background-color: var(--accent-color);
            color: var(--primary-light);
        }

        .btn-register:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-logout{
            background-color: var(--danger-color);
        }

        .btn-logout:hover {
            background-color: #9C0502;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem 0;
            min-height: calc(100vh - 90px);
        }

        .hero-content {
            width: 55%;
        }

        .hero-image {
            width: 45%;
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .hero-title {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #d1d5db;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: var(--primary-light);
            font-size: 1rem;
            padding: 0.8rem 2rem;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-light);
            border: 1px solid var(--primary-light);
            font-size: 1rem;
            padding: 0.8rem 2rem;
        }

        .btn-outline:hover {
            background-color: rgba(241, 241, 241, 0.1);
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            background-color: #0a1017;
        }

        .section-title {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: rgba(15, 23, 32, 0.6);
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 3px solid var(--accent-color);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .feature-title {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .feature-description {
            font-family: 'Inter', sans-serif;
            color: #d1d5db;
            line-height: 1.6;
        }

        /* Animation for blinking cursor */
        .cursor {
            display: inline-block;
            width: 10px;
            height: 24px;
            background-color: var(--accent-color);
            margin-left: 5px;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Floating elements animation */
        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Footer */
        footer {
            background-color: rgba(10, 16, 23, 0.95);
            padding: 4rem 0 2rem;
            border-top: 1px solid rgba(59, 130, 246, 0.2);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column {
            display: flex;
            flex-direction: column;
        }

        .footer-description {
            color: #9ca3af;
            margin: 1rem 0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .footer-heading {
            font-family: 'Lexend Deca', sans-serif;
            color: var(--primary-light);
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            position: relative;
        }

        .footer-heading:after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
        }

        .footer-links a:hover {
            color: var(--accent-color);
            transform: translateX(3px);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin: 1rem 0;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            background-color: var(--accent-color);
            color: var(--primary-light);
            transform: translateY(-3px);
        }

        .footer-newsletter-text {
            color: #9ca3af;
            margin-bottom: 1rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .newsletter-input-group {
            display: flex;
            margin-bottom: 1.5rem;
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--primary-light);
            border-radius: 0.375rem 0 0 0.375rem;
            font-family: "Fira Mono", monospace;
        }

        .newsletter-input-group input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--accent-color);
        }

        .btn-newsletter {
            background-color: var(--accent-color);
            color: var(--primary-light);
            border: none;
            padding: 0 1rem;
            border-radius: 0 0.375rem 0.375rem 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-newsletter:hover {
            background-color: #2563eb;
        }

        .app-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .app-badge {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--primary-light);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .app-badge:hover {
            background-color: rgba(59, 130, 246, 0.2);
            transform: translateY(-2px);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .copyright {
            color: #9ca3af;
            font-size: 0.875rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-bottom-links a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--accent-color);
        }

        @media (max-width: 768px) {
            .footer-grid {
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 2rem 0;
            }

            .hero-content, .hero-image {
                width: 100%;
            }

            .hero-image {
                justify-content: center;
                margin-top: 3rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-buttons {
                gap: 0.5rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }

        /* Service Grid */
        .services-preview {
            padding: 4rem 0;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .service-card {
            background-color: rgba(15, 23, 32, 0.8);
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .service-image {
            height: 180px;
            background-color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-size: 3rem;
        }

        .service-content {
            padding: 1.5rem;
        }

        .service-title {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .service-description {
            color: #d1d5db;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .service-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            color: #9ca3af;
        }

        .service-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #fbbf24;
        }

        /* Animated background effect */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(59, 130, 246, 0.15);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-animation span:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .bg-animation span:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .bg-animation span:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .bg-animation span:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .bg-animation span:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .bg-animation span:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .bg-animation span:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .bg-animation span:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .bg-animation span:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .bg-animation span:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* Stats Section */
        .stats {
            background-color: rgba(15, 23, 32, 0.8);
            padding: 4rem 0;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-family: 'Inter', sans-serif;
            color: #d1d5db;
            font-size: 1rem;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 0;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background-color: rgba(15, 23, 32, 0.6);
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            font-family: 'Georgia', serif;
            font-size: 5rem;
            position: absolute;
            top: 10px;
            left: 20px;
            color: rgba(59, 130, 246, 0.2);
            line-height: 1;
        }

        .testimonial-content {
            font-family: 'Inter', sans-serif;
            font-style: italic;
            color: #d1d5db;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--accent-color);
        }

        .testimonial-info h4 {
            font-family: 'Lexend Deca', sans-serif;
            margin-bottom: 0.25rem;
        }

        .testimonial-info p {
            font-size: 0.875rem;
            color: #9ca3af;
        }

        /* CTA Section */
        .cta {
            padding: 5rem 0;
            text-align: center;
            background: linear-gradient(rgba(15, 23, 32, 0.9), rgba(15, 23, 32, 0.9)),
            url('https://via.placeholder.com/1920x1080') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .cta-content {
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .cta-title {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .cta-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            color: #d1d5db;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .typed-text {
            color: var(--accent-color);
        }
    </style>
</head>
<body>
<!-- Background Animation -->
<div class="bg-animation">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

<div class="container">
    <nav>
        <div class="logo">
            <img src="{{asset("serviatory.png")}}" alt="Serviatory">
        </div>
        <div class="nav-buttons">
            @guest
                <a href="{{ route('login') }}" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-register">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            @else
                <a href="{{auth()->user()->role === "admin" ?  route('dashboard.index') : route('services.index')}}" class="btn btn-login">
                    <i class="{{auth()->user()->role === "admin" ? "fas fa-tachometer-alt" : "fa-solid fa-ticket"}}"></i> {{auth()->user()->role === "admin" ? "Dashboard" : "Services"}}
                </a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-register btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="hero-title">Reserve Services with <span class="logo-accent">Ease</span><span class="cursor"></span></h1>
            <p class="hero-subtitle">Serviatory is your all-in-one platform for discovering, booking, and managing service appointments. Streamline your scheduling process and save time.</p>
            <div class="hero-buttons">
                <a href="/register" class="btn btn-primary">
                    <i class="fas fa-rocket"></i> Get Started
                </a>
                <a href="#features" class="btn btn-outline">
                    <i class="fas fa-info-circle"></i> Learn More
                </a>
            </div>
        </div>
    </section>
</div>

<!-- Features Section -->
<section class="features" id="features">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Why Choose <span class="logo-accent">Serviatory</span></h2>
        <div class="features-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="feature-title">Easy Booking</h3>
                <p class="feature-description">Book services in just a few clicks. Our intuitive interface makes scheduling appointments effortless.</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3 class="feature-title">Smart Reminders</h3>
                <p class="feature-description">Never miss an appointment with automated reminders and notifications.</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <i class="fas fa-user-clock"></i>
                </div>
                <h3 class="feature-title">Real-time Availability</h3>
                <p class="feature-description">See service provider availability in real-time and book instantly.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title" data-aos="fade-up">Ready to <span class="typed-text">simplify</span> your reservations?</h2>
            <p class="cta-subtitle" data-aos="fade-up" data-aos-delay="100">Join thousands of satisfied users who have transformed their service booking experience with Serviatory.</p>
            <a href="/register" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-user-plus"></i> Create Your Free Account
            </a>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="services-preview">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Popular Services</h2>
        <div class="services-grid">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="service-image">
                    <i class="fas fa-cut"></i>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Haircut & Styling</h3>
                    <p class="service-description">Professional haircuts and styling services from top stylists.</p>
                    <div class="service-meta">
                        <span>From $25</span>
                        <div class="service-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="service-image">
                    <i class="fas fa-spa"></i>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Spa & Massage</h3>
                    <p class="service-description">Relaxing spa treatments and therapeutic massages.</p>
                    <div class="service-meta">
                        <span>From $45</span>
                        <div class="service-rating">
                            <i class="fas fa-star"></i>
                            <span>4.9</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                <div class="service-image">
                    <i class="fas fa-car"></i>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Auto Maintenance</h3>
                    <p class="service-description">Comprehensive auto repair and maintenance services.</p>
                    <div class="service-meta">
                        <span>From $39</span>
                        <div class="service-rating">
                            <i class="fas fa-star"></i>
                            <span>4.7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-container">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number" id="stat-users">0</div>
                <div class="stat-label">Happy Users</div>
            </div>

            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number" id="stat-providers">0</div>
                <div class="stat-label">Service Providers</div>
            </div>

            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number" id="stat-bookings">0</div>
                <div class="stat-label">Bookings Made</div>
            </div>

            <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-number" id="stat-cities">0</div>
                <div class="stat-label">Cities Covered</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">What Our Users Say</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
                <p class="testimonial-content">Serviatory has completely transformed how I book appointments. The interface is so intuitive and I love getting reminders before my sessions!</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="testimonial-info">
                        <h4>Sarah Johnson</h4>
                        <p>Regular User</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
                <p class="testimonial-content">As a salon owner, Serviatory helps me manage bookings efficiently. I've seen a 30% increase in clients since I started using this platform.</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="testimonial-info">
                        <h4>Michael Chen</h4>
                        <p>Service Provider</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
                <p class="testimonial-content">I love how easy it is to find and compare services. The rating system helps me choose the best providers, and I've never been disappointed!</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="testimonial-info">
                        <h4>Emily Rodriguez</h4>
                        <p>Regular User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-column">
                <div class="logo">
                    <img src="{{asset("serviatory.png")}}" alt="Serviatory">
                </div>
                <p class="footer-description">Serviatory is your all-in-one platform for discovering, booking, and managing service appointments.</p>
                <div class="social-links">
                    <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="#">Service Providers</a></li>
                    <li><a href="#">Pricing Plans</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Support</h4>
                <ul class="footer-links">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Newsletter</h4>
                <p class="footer-newsletter-text">Subscribe to get updates on new features and providers.</p>
                <form class="footer-newsletter-form" action="#" method="POST">
                    <div class="newsletter-input-group">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit" class="btn-newsletter">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <div class="app-links">
                    <a href="#" class="app-badge">
                        <i class="fab fa-apple"></i> App Store
                    </a>
                    <a href="#" class="app-badge">
                        <i class="fab fa-google-play"></i> Google Play
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                &copy; 2025 Serviatory. All rights reserved.
            </div>
            <div class="footer-bottom-links">
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
<script>
    // Initialize AOS animation library
    AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-in-out'
    });

    // Initialize Typed.js for text animation
    document.addEventListener('DOMContentLoaded', function() {
        let typed = new Typed('.typed-text', {
            strings: ['simplify', 'streamline', 'optimize', 'enhance'],
            typeSpeed: 80,
            backSpeed: 40,
            backDelay: 1500,
            loop: true
        });
    });

    // Animated Stats Counter
    function animateValue(id, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            document.getElementById(id).innerText = value.toLocaleString();
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // IntersectionObserver for stats animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start animations when stats section is visible
                animateValue("stat-users", 0, 25000, 2000);
                animateValue("stat-providers", 0, 1500, 2000);
                animateValue("stat-bookings", 0, 120000, 2000);
                animateValue("stat-cities", 0, 85, 2000);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    // Observe stats section
    document.addEventListener('DOMContentLoaded', function() {
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>
</body>
</html>
