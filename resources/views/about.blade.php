@extends('layout')

@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ABOUT US</h2>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ABOUT US</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="images/about-img.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">We are <span>MoMeet</span></h2>
                    <p>
                        MoMeet adalah sebuah platform digital yang memungkinkan pengguna untuk
                        melakukan reservasi tempat untuk rapat seperti hotel, restoran, dan cafe. Aplikasi ini
                        dirancang untuk memberikan kemudahan dan kenyamanan bagi pengguna dalam merencanakan dan
                        mengatur tempat dan jadwal kegiatan mereka.
                    </p>
                    <p>
                        Dengan menggunakan aplikasi ini, pengguna dapat dengan mudah mencari dan membandingkan berbagai
                        pilihan layanan yang tersedia. Mereka dapat melihat informasi terkait, seperti lokasi, harga,
                        fasilitas, dan ulasan dari pengguna lain untuk membantu mereka membuat keputusan yang tepat.
                        Aplikasi ini juga biasanya dilengkapi dengan fitur pencarian dan filter untuk
                        membantu pengguna menyesuaikan preferensi mereka. Pengguna juga dapat melakukan komunikasi
                        melalui website ini dengan para penyedia reservasi.
                    </p>
                    <!-- <a class="btn hvr-hover" href="#">Read More</a> -->
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Praktis</h3>
                        <p>Memudahakan reservasi anda. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Cepat</h3>
                        <p>Reservasi dalam 1 Menit. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Fleksibel</h3>
                        <p>Reservasi kapan saja dan dimana saja. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Meet Our Team</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Azkal</h3> <span class="post">Front End Developer</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100084036101237"
                                        class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/momeet_info" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="mailto:muhammad.betmal21@student.uisi.ac.id" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="https://youtube.com/@arxeuzeziko198" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>"Seperti Error Fixed yang selalu dinantikan semua Programmer, selalu nantikan aku ya. Aku
                                Azkal". </p>
                        </div>
                        <hr class="my-0">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-2.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Rangga</h3> <span class="post">Back End Developer</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100094042145649"
                                        class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/momeet_info" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="mailto:airlangga.pratama21@student.uisi.ac.id" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="https://youtube.com/@airlanggaaldipratama5757" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>"Tak banyak bicara, bercerita melalui codingan. Halo aku Rangga". </p>
                        </div>
                        <hr class="my-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="align-item: center">
            <a class="btn btn-primary" style="background-color: #8C52FF" style="text-align: center"
                href="/contactUs">HUBUNGI ADMIN</a>
        </div>
    </div>
@endsection
