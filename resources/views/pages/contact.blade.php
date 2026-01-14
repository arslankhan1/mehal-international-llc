@extends('includes.main')
@section('content')
    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control contact-input" placeholder="Name"
                                    required value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control contact-input"
                                    placeholder="Email *" required value="{{ old('email') }}">
                            </div>
                            <div class="col-12">
                                <input type="tel" name="phone" class="form-control contact-input"
                                    placeholder="Phone number" value="{{ old('phone') }}">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control contact-input contact-textarea" placeholder="Comment" rows="5"
                                    required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn contact-submit-btn mt-5">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="container">
            <h1 class="contact-info-title text-start">Contact Info</h1>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="info-card">
                        <h3 class="info-card-title text-dark">Phone Number</h3>
                        <p class="info-card-text">
                            Office: <a href="tel:(469)767-7626">(469) 767-7626</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-card">
                        <h3 class="info-card-title text-dark">Email Addresses</h3>
                        <ul class="info-list">
                            <li>
                                <span class="bullet me-3">◦</span>
                                Questions/Customer Service:
                                <a href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a>
                            </li>
                            <li>
                                <span class="bullet">◦</span>
                                Sales:
                                <a href="mailto:Sales@mehalintl.com">Sales@mehalintl.com</a>
                            </li>
                            <li>
                                <span class="bullet">◦</span>
                                Purchasing/Partnership request:
                                <a href="mailto:Purchasing@mehalintl.com">Purchasing@mehalintl.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="info-card">
                        <h3 class="info-card-title">Email Addresses</h3>
                        <ul class="info-list">
                            <li>Questions/Customer Service:
                                <a href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a>
                            </li>
                            <li>Sales:
                                <a href="mailto:Sales@mehalintl.com">Sales@mehalintl.com</a>
                            </li>
                            <li>Purchasing/Partnership request:
                                <a href="mailto:Purchasing@mehalintl.com">Purchasing@mehalintl.com</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
