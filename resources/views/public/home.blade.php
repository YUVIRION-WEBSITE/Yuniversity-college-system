@extends('components.layouts.public-layout')

@section('title', 'Welcome to UMS')

@section('content')
    <!-- Hero Section with Enhanced Slider and Stats -->
{{-- Hero Section with Vertical Slider --}}
<section class="hero-section position-relative overflow-hidden" style="">
  <div class="container-fluid" style="height:80vh">
    <div class="row h-100 align-items-center">
      
      {{-- Left Section - Text Content --}}
      <div class="col-lg-5 text-content-wrapper position-relative px-5" style=" display: flex; align-items: center;">
        <div class="container ps-lg-5">
          <div class="text-slider-container position-relative" style="height: 400px; overflow: hidden;">
            @foreach ($sliders as $index => $slider)
              <div class="text-slide position-absolute w-100" 
                   data-index="{{ $index }}"
                   style="transition: all 0.8s cubic-bezier(0.645, 0.045, 0.355, 1); 
                          opacity: {{ $index === 0 ? '1' : '0' }}; 
                          transform: translateY({{ $index === 0 ? '0' : '50px' }});">
                <div class="content-wrapper pe-lg-5">
                  <div class="decorative-line mb-4" style="width: 80px; height: 4px; background: linear-gradient(90deg, #d4af37, #f4d03f);"></div>
                  <h1 class="display-3 fw-bold text-gradient mb-4" style="line-height: 1.2; font-family: 'Playfair Display', serif;">
                    {{ $slider['caption'] }}
                  </h1>
                  <p class="fs-5 mb-4 text-muted" style="line-height: 1.8; font-family: 'Poppins', sans-serif; max-width: 500px;">
                    {{ $slider['sub_caption'] }}
                  </p>
                  <a href="{{ route('public.enquiry.create') }}" 
                     class="btn btn-primary-custom px-5 py-3 fw-semibold shadow-lg position-relative overflow-hidden">
                    <span class="btn-text position-relative" style="z-index: 2;">Get Started</span>
                    <span class="btn-overlay position-absolute top-0 start-0 w-100 h-100"></span>
                  </a>
                </div>
              </div>
            @endforeach
          </div>

          {{-- Slider Controls --}}
          <div class="slider-controls d-flex align-items-center gap-4 mt-5">
            @foreach ($sliders as $index => $slider)
              <button class="control-dot {{ $index === 0 ? 'active' : '' }}" 
                      data-slide="{{ $index }}"
                      style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #d4af37; background: {{ $index === 0 ? '#d4af37' : 'transparent' }}; cursor: pointer; transition: all 0.3s;">
              </button>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Right Section - Image Slider --}}
      <div class="col-lg-7 image-content-wrapper position-relative p-5" style=" display: flex; align-items: center;">
        <div class="image-slider-container position-relative w-100 overflow-hidden" style="height: 60vh;  border-radius: 10%; ">
          @foreach ($sliders as $index => $slider)
            <div class="image-slide position-absolute top-0 start-0 w-100 h-100 " 
                 data-index="{{ $index }}"
                 style="transition: all 0.8s cubic-bezier(0.645, 0.045, 0.355, 1); 
                        opacity: {{ $index === 0 ? '1' : '0' }}; 
                        transform: translateY({{ $index === 0 ? '0' : ($index > 0 ? '100%' : '-100%') }});
                        z-index: {{ $index === 0 ? '2' : '1' }};">
              <div class="image-wrapper position-relative h-100">
                <img src="{{ $slider['image'] ?? 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200' }}" 
                     alt="{{ $slider['caption'] }}"
                     class="w-100 h-100"
                     style="object-fit: cover; object-position: center; ">
                <div class="image-overlay position-absolute top-0 start-0 w-100 h-100" 
                     style="background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(212,175,55,0.2) 100%);"></div>
              </div>
            </div>
          @endforeach>

          
        </div>
      </div>
    </div>

     <div id="stats-stack" class="position-absolute bottom-0 start-50 translate-middle-x w-100" style="max-width: 1200px; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(8px); border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 24px; z-index: 10;">
            <div class="d-flex flex-wrap justify-content-around gap-4 text-center">
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="200">0</span>
                    <span class="fs-6 text-dark">Students</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="500">0</span>
                    <span class="fs-6 text-dark">Universities</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="1000">0</span>
                    <span class="fs-6 text-dark">Colleges</span>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-3 fs-md-1 fw-bold text-secondary count" data-target="2000">0</span>
                    <span class="fs-6 text-dark">Courses</span>
                </div>
            </div>
      </div>
  
    </div>
</section>
<!-- jQuery + Slick -->


@push('scripts')
<script src="{{ asset('js/slider.js') }}"></script>
@endpush



    <!-- Search Section -->
 <!-- Parallax Search Section -->
<section class="parallax-search-section position-relative py-5">
    <div class="parallax-overlay"></div>
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center text-white mb-4">
            <h2 class="fw-bold">Find Your Perfect University</h2>
        </div>
        <div class="position-relative animate-slide-in max-w-4xl mx-auto">
            <input type="search" placeholder="Search universities, colleges, or courses..." 
                   class="w-100 rounded-3 border-0 py-4 px-5 fs-5 shadow-lg" style="background: rgba(255,255,255,0.95);">
        </div>
    </div>
</section>

    <!-- About Section -->
     <section class="about-section">
      <div class="d-flex justify-content-center p-1 fw-bold  section-underline" style="font-family: 'Playfair Display', serif;"><h1>Why Should You Choose Us</h1></div>
      <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="section-headline">Empowering Students to Achieve Their Dreams</h1>
                    <p class="section-subheadline">Your trusted partner in education and career success</p>
                    
                    <div class="about-text">
                        <p>We believe every student deserves personalized guidance to unlock their full potential. Our comprehensive services combine expert mentorship, strategic planning, and unwavering support to help you navigate the complex journey of university admissions and career development. With years of experience and a deep commitment to student success, we transform aspirations into achievements, one milestone at a time.</p>
                    </div>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="feature-content">
                                <h4>University Admissions Excellence</h4>
                                <p>Expert guidance through every step of the application process, from college selection to acceptance.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-compass"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Personalized Career Counseling</h4>
                                <p>Discover your passion and chart a career path aligned with your strengths and aspirations.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-content">
                                <h4>One-on-One Mentorship</h4>
                                <p>Dedicated mentors who understand your unique journey and provide tailored support throughout.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Study Abroad Support</h4>
                                <p>Navigate international opportunities with confidence through comprehensive guidance and resources.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <div class="decorative-circle"></div>
                        <div class="about-image">
                          <img src="{{ asset('Images/about.jpg') }}" alt="">
                          
                            <img src="{{ asset('Images/about.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- universities section --}}
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline" style="font-family: 'Playfair Display', serif;">Featured Universities</h2>

            <div class="row g-4">

                @foreach ($universities as $university)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}"
                          class="text-decoration-none">
                            
                            <div class="service-card">

                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                                <div class="card-body">

                                    <!-- Title -->
                                    <h3 class="card-title text-pink">
                                        {{ $university->name }}
                                    </h3>

                                    <!-- Location -->
                                    <p class="card-text text-secondary">
                                        {{ $university->location ?? 'Location not available' }}
                                    </p>

                                    <!-- Image -->
                                    <div class="card-image">
                                        <img src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $university->name }}">
                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Top Colleges -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="section-underline fs-2 fs-sm-2 fw-bold text-center mb-4" style="font-family: 'Playfair Display', serif;">
                Top Colleges
            </h2>   
            <div class="row g-4">
                @foreach ($colleges as $college)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}"
                        class="text-decoration-none">
                            <div class="service-card">
                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>
                                <div class="card-body">
                                    <!-- College Name -->
                                    <h3 class="card-title text-pink">
                                        {{ $college->name }}
                                    </h3>
                                    <!-- Parent University Name -->
                                    <p class="card-text text-secondary">
                                        {{ $college->university_id ? \App\Models\University::find($college->university_id)->name ?? 'N/A' : 'Independent' }}
                                    </p>
                                    <!-- College Image -->
                                    <div class="card-image">
                                        <img src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $college->name }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Popular Courses -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline" style="font-family: 'Playfair Display', serif;">
                Popular Courses
            </h2>
            <div class="row g-4">
                @foreach ($courses as $course)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.courses.show', ['slug' => $course->slug]) }}"
                        class="text-decoration-none">

                            <div class="service-card">

                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                                <div class="card-body">

                                    <!-- Course Name -->
                                    <h3 class="card-title text-pink">
                                        {{ $course->name }}
                                    </h3>

                                    <!-- Duration -->
                                    <p class="card-text text-secondary">
                                        {{ $course->duration ?? 'Duration not available' }}
                                    </p>

                                    <!-- Image -->
                                    <div class="card-image">
                                        <img src="{{ $course->image_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $course->name }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('public.homeSections.testimonials');
    



    @include('public.homeSections.contact', ['test' => 'ok'])


    <!-- Call to Action -->
    <section class="py-5" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold ">Ready to Start Your Journey?</h2>
            <a href="{{ route('public.universities.index') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-primary fw-semibold shadow" style="height: 40px; padding: 0 20px; transition: all 0.3s ease;" aria-label="Explore universities">Explore More</a>
        </div>
    </section>

@endsection
