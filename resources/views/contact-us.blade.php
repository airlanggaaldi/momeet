@extends('layout')

@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Tanyakan Sesuatu</h2>
                        <form action="{{ route('contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="pesan" id="message" placeholder="Your Message" rows="4"
                                            data-error="Write your message" required></textarea>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i><a
                                        href="https://maps.app.goo.gl/TvPfcSE3hp3fURH66
                                ">
                                        Kompleks PT. Semen Indonesia (Persero) Tbk
                                        Jl. Veteran, Kb. Dalem, Sidomoro, Kec. Kebomas, Kabupaten Gresik, Jawa Timur
                                        61122 </a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a
                                        href="https://wa.me/082335958933">+6282335958933</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a
                                        href="mailto:momeet.info@gmail.com">momeet.info@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
