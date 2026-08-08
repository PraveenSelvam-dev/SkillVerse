@extends('layouts.app')
@section('title', 'Contact Us | SkillVerse')

@section('content')
<div class="container py-5 text-white">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold mb-3">Get in Touch</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Have questions about SkillVerse? Our team is here to help you navigate your learning journey.</p>
    </div>

    <div class="row g-5">
        <div class="col-lg-6">
            <h3 class="fw-bold mb-4">Send us a Message</h3>
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4 p-4 p-md-5">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-light small fw-bold">First Name</label>
                            <input type="text" class="form-control bg-transparent border-secondary text-white" placeholder="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-light small fw-bold">Last Name</label>
                            <input type="text" class="form-control bg-transparent border-secondary text-white" placeholder="Doe">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-light small fw-bold">Email Address</label>
                            <input type="email" class="form-control bg-transparent border-secondary text-white" placeholder="john@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-light small fw-bold">Subject</label>
                            <select class="form-select bg-transparent border-secondary text-white">
                                <option class="text-dark">General Inquiry</option>
                                <option class="text-dark">Support / Billing</option>
                                <option class="text-dark">Become an Instructor</option>
                                <option class="text-dark">Report a Bug</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-light small fw-bold">Message</label>
                            <textarea class="form-control bg-transparent border-secondary text-white" rows="5" placeholder="How can we help you?"></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary w-100 fw-bold py-2 rounded-pill" style="background: #6C63FF; border: none;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-5">
                <h3 class="fw-bold mb-4">Contact Information</h3>
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex justify-content-center align-items-center text-white fs-5" style="width: 50px; height: 50px; background: rgba(108, 99, 255, 0.2);">
                            <i class="fa-solid fa-location-dot text-primary"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Our Headquarters</h6>
                            <p class="text-muted small mb-0">123 Innovation Drive, Tech City, TC 90210</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex justify-content-center align-items-center text-white fs-5" style="width: 50px; height: 50px; background: rgba(108, 99, 255, 0.2);">
                            <i class="fa-solid fa-envelope text-primary"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Us</h6>
                            <p class="text-muted small mb-0">support@skillverse.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex justify-content-center align-items-center text-white fs-5" style="width: 50px; height: 50px; background: rgba(108, 99, 255, 0.2);">
                            <i class="fa-solid fa-phone text-primary"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Call Us</h6>
                            <p class="text-muted small mb-0">+1 (800) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card bg-dark border-0 rounded-4 overflow-hidden" style="height: 300px; background: #16213e;">
                <!-- Map Placeholder -->
                <div class="w-100 h-100 d-flex justify-content-center align-items-center text-muted flex-column">
                    <i class="fa-solid fa-map-location-dot fa-4x mb-3 opacity-50"></i>
                    <p>Interactive Map Placeholder</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
