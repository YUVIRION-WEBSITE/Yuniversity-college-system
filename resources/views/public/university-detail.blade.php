@extends('components.layouts.public-layout')

@section('title', '{{ $university->name }} - EduConnect')

@section('head')
    <meta property="og:title" content="{{ $university->name }} - EduConnect">
    <meta property="og:description" content="Explore {{ $university->name }} on EduConnect. Discover its mission, vision, colleges, and academic programs.">
    <meta property="og:image" content="{{ $university->banner_path ?? ($university->logo_path ?? 'https://via.placeholder.com/1200x630') }}">
    <meta name="twitter:card" content="summary_large_image">
    <style>
        /* Hero Section */
        .hero-section {
            background-size: cover;
            background-position: center;
            min-height: 40vh;
            transition: all 0.3s ease;
        }
        @media (min-width: 768px) {
            .hero-section {
                min-height: 60vh;
            }
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.75);
            border-radius: 8px;
            padding: 1.5rem;
        }
        @media (min-width: 640px) {
            .hero-overlay {
                padding: 2rem;
            }
        }
        .hero-overlay h1 {
            color: var(--text-dark);
            font-size: 2.25rem;
            font-weight: 900;
        }
        @media (min-width: 640px) {
            .hero-overlay h1 {
                font-size: 3.25rem;
            }
        }
        .hero-overlay p {
            color: var(--text-dark);
            font-size: 1rem;
        }
        @media (min-width: 640px) {
            .hero-overlay p {
                font-size: 1.125rem;
            }
        }

        /* Info Cards */
        .info-card {
            min-height: 160px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            background-color: var(--background-light);
            border-radius: 8px;
        }
        .dark .info-card {
            background-color: var(--background-dark);
        }
        .info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }
        .info-card h3 {
            color: var(--text-light);
            font-weight: 700;
        }
        .dark .info-card h3 {
            color: var(--text-dark);
        }
        .info-card p.italic {
            font-style: italic;
            color: var(--text-light);
        }
        .dark .info-card p.italic {
            color: var(--text-dark);
        }

        /* Colleges Section */
        .college-card {
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            background-color: var(--background-light);
            border-radius: 8px;
        }
        .dark .college-card {
            background-color: var(--background-dark);
        }
        .college-card img {
            transition: transform 0.3s ease;
        }
        .college-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }
        .college-card:hover img {
            transform: scale(1.05);
        }
        .college-card h3 {
            color: var(--text-light);
            font-weight: 700;
        }
        .dark .college-card h3 {
            color: var(--text-dark);
        }
        .empty-state {
            background-color: var(--background-light);
            color: var(--text-light);
            border-radius: 8px;
        }
        .dark .empty-state {
            background-color: var(--background-dark);
            color: var(--text-dark);
        }

        /* Focus Styles */
        a:focus, button:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Animations */
        .animate-slide-in {
            animation: slide-in 0.6s ease-out forwards;
        }
    </style> 
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative flex items-center justify-center bg-cover bg-center text-white hero-section animate-slide-in" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('{{ $university->banner_path ?? ($university->logo_path ?: 'https://via.placeholder.com/1200x600') }}');" aria-labelledby="university-title">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto hero-overlay">
            <h1 id="university-title" class="mb-4">{{ $university->name }}</h1>
            <p class="mb-2"><strong>Location:</strong> {{ $university->location ?? 'Not available' }}</p>
            <p class="mb-2"><strong>Type:</strong> {{ $university->type ?? 'Not available' }}</p>
            <a href="{{ route('public.enquiry.create') }}" class="btn btn-apply mt-4 animate-slide-in delay-100">Apply Now</a>
        </div>
    </div>
</section>

    <!-- University Info Cards -->
    <section class="py-5 bg-white">
        <div class="container" style="max-width: 1280px;">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <!-- Mission -->
                <div class="col animate-slide-in">
                    <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-bold text-primary mb-3">Mission</h3>
                            <p class="fs-6 text-dark">{{ $university->mission ?? 'Mission not available' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Vision -->
                <div class="col animate-slide-in delay-100">
                    <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-bold text-primary mb-3">Vision</h3>
                            <p class="fs-6 text-dark">{{ $university->vision ?? 'Vision not available' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="col col-md-6 col-lg-4 animate-slide-in delay-200">
                    <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-bold text-primary mb-3">About</h3>
                            <p class="fs-6 text-dark">{{ $university->description ?? 'Description not available' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Additional Info (e.g., Location and Type) -->
                <div class="col col-md-6 col-lg-4 animate-slide-in delay-300">
                    <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-bold text-primary mb-3">Details</h3>
                            <p class="fs-6 text-dark"><strong>Location:</strong> {{ $university->location ?? 'Not available' }}</p>
                            <p class="fs-6 text-dark"><strong>Type:</strong> {{ $university->type ?? 'Not available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Colleges Section -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Colleges</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @forelse ($university->colleges as $college)
                    <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}" class="col text-decoration-none" aria-label="View details for {{ $college->name }}">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $college->name }}" class="w-100 h-100 object-fit-cover" src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $college->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">{{ $college->tagline ?? 'No tagline available' }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center fs-6 text-dark animate-slide-in">No colleges available for this university.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary">Ready to Join {{ $university->name }}?</h2>
            <a href="{{ route('public.enquiry.create') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-apply fw-semibold shadow" style="height: 40px; padding: 0 20px;" aria-label="Start your application to {{ $university->name }}">Start Your Application</a>
        </div>
    </section>


@endsection