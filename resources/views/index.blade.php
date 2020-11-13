<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutureCon</title>
    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--Icons-->
    <script src="https://kit.fontawesome.com/1e8a0b56b4.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="../css/style.css"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header>

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg stroke">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-globe-asia mx-3"></i>
                    FutureCon 2020
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-right text-light"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active home">
                            <a class="nav-link cool-link" href="#tophome">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item about">
                            <a class="nav-link cool-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cool-link" href="#speakers">Speaker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cool-link" href="#schedule">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cool-link" href="#registration">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cool-link" href="#FAQ">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <form method="get" action="/participants/create-step1">
                                <button class="nav-link btn btn-outline-danger nav-register-btn">Register</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>



        <div class="container h-100 col-12" id="tophome">
            <div class="row h-100">
                <div class="col-12 text-center ">
                    <h1>FutureCon 2020</h1>
                    <p>Join Us to Build a Future Together!</p>
                    <div class="wrapper">
                        <form method="get" action="/participants/create-step1">
                            <button class="btn btn-danger px-5 py-2 mt-3 header-btn">Register
                                Now</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- Conference Details-->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>About The Conference</h2>
                        <p class="text-justify">
                            {{-- The conference aims to provide an outstanding opportunity for both academic and industrial
                            communities alike to address new trends and challenges, emerging technologies and progress
                            in standards on topics relevant to today’s fast-moving areas of Industry 4.0. --}}
                            {{ isset($abouts->description) ? $abouts->description : '' }}

                        </p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <h3><span class="mr-3"><i class="fas fa-location-arrow"></i></span>Where</h3>
                        <p>{{ isset($abouts->venue) ? $abouts->venue : '' }}</p>
                        <h3><span class="mr-3"><i class="far fa-clock"></i></span>When</h3>
                        <p>{{ isset($abouts->date) ? $abouts->date : '' }}</p>
                    </div>

                </div>
            </div>
        </section>
        <!--Speakers-->
        <section id="speakers" class="wow fadeInUp">
            <div class="container">
                <div class="section-header">
                    <h2>Keynote Speakers</h2>
                    <p>Here are some of our speakers</p>
                </div>

                <div class="row">
                    @foreach ($speakers as $speaker)
                    <div class="col-lg-4 col-md-6">
                        <div class="speaker">
                            {{-- <img src="{{ storage_path('app/public'.'/'.$speakers[0]->speakerImg)}}" alt="Speaker 1"
                            class="img-fluid "> --}}
                            {{-- <img src="C:\Users\junsi\Desktop\project\project_conference\storage\app\public\speakerImg\speakerImage-1590724679.jpg"
                                alt="Speaker 1" class="img-fluid "> --}}

                            <img src="/storage/{{$speaker->speakerImg}}" alt="" class="img-fluid fit-image">
                            <div class="details">
                                <h3><a href="speaker-details.html">{{ $speaker->speaker_name }}</a></h3>
                                <p>{{ $speaker->speaker_bio }}</p>
                                <div class="social">
                                    <a href="{{ 'mailto:'.$speaker->speaker_email }}"><i
                                            class="far fa-envelope fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </section><!-- End Speakers Section -->

        <!-- Schedule-->
        <section id="schedule" class="section-with-bg">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <h2>Schedule & Tracks</h2>
                    <p>The schedule of each track of FutureCon 2020</p>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    @foreach($tracks as $key=>$track)
                    <li class="nav-item">
                        <a href={{".track-".++$key }} class="nav-link {{ $key == 1 ? 'active' : '' }}" role="tab"
                            data-toggle="tab">Track
                            {{ $key }}</a>
                    </li>
                    @endforeach
                </ul>

                <!-- <h3 class="sub-heading">Schedule for each of the tracks are as follows:</h3> -->

                <div class="tab-content row justify-content-center">
                    @foreach($tracks as $key=>$track)
                    <div role="tabpanel"
                        class="col-lg-9 tab-pane fade track-{{++$key}} {{ $key == 1 ? ' show active' : '' }}">

                        <h3 class="sub-heading">{{ $track->track_name }}</h3>
                        @foreach ($track->schedules->sortBy('start_time') as $key=>$schedule)
                        <div class="row schedule-item">
                            <div class="col-md-2">
                                {{\Carbon\Carbon::createFromFormat('H:i:s',$schedule->start_time)->format('h:i A')}}
                            </div>
                            {{-- <div class="col-md-2"><time>{{ $schedule->start_time }}</time>
                        </div> --}}
                        <div class=" col-md-10">

                            @if(isset( $schedule->speaker_id))
                            <div class="speaker">
                                <img src="/storage/{{$schedule->speaker->speakerImg}}"
                                    alt="{{ $schedule->speaker->speaker_name }}">
                            </div>
                            @endif

                            <h4>{{ $schedule->title }}
                                <span>{{ isset($schedule->speaker_id) ? $schedule->speaker->speaker_name : ''}}</span>


                            </h4>
                            <p>{{ $schedule->subtitle }}</p>

                        </div>

                    </div>
                    @endforeach
                </div>
                @endforeach




            </div>

            </div>

        </section><!-- End Schedule Section -->



        <!-- Registration -->
        <section id="registration" class="section-with-bg wow fadeInUp">
            <div class="container">

                <div class="section-header">
                    <h2>Registration</h2>
                    <p>Secure your seat today!</p>
                </div>

                <div class="row">
                    @foreach($fees as $key=>$fee)

                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">{{ $fee->title }}</h5>
                                <h6 class="card-price text-center">RM {{ $fee->price }}</h6>
                                <hr>
                                <p class="card-text text-center">
                                    {{ $fee->description }}
                                </p>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-toggle="modal"
                                        data-target="#buy-ticket-modal" data-ticket-type="{{ $key }}">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>

            <!-- Modal Order Form -->
            <div id="buy-ticket-modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reserve a Seat</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="/participants/prefill">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <select id="ticket-type" name="member_type" class="form-control">
                                        <option value="">-- Select Member Type --</option>
                                        <option value="0">Non-IEEE Member</option>
                                        <option value="1">IEEE Member</option>
                                        <option value="2">Student</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->


        </section><!-- End Buy Ticket Section -->

        <!--FAQ-->
        <section id="FAQ" class="wow fadeInUp">

            <div class="container">

                <div class="section-header">
                    <h2>FAQ</h2>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <ul id="faq-list">
                            @foreach($faqs as $key2=>$faq)

                            <li>
                                <a data-toggle="collapse" class="collapsed" href={{ "#faq".$key2 }}>
                                    {{ $faq->question }}
                                    <i class="fa fa-minus-circle"></i></a>
                                <div id={{ "faq".$key2 }} class="collapse" data-parent="#faq-list">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>

        </section><!-- End  F.A.Q Section -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 footer-info text-justify">


                            <h3> <i class="fas fa-globe-asia mx-3"></i> FutureCon 2020</h3>
                            <p>
                                The conference aims to provide an outstanding opportunity for both academic and
                                industrial communities alike to address new trends and challenges, emerging technologies
                                and progress in standards on topics relevant to today’s fast-moving areas of Industry
                                4.0.
                            </p>
                        </div>

                        <!-- <div class="col-lg-3"></div> -->



                        <div class="col-lg-3 offset-lg-3 col-md-5 offset-md-1 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                Universiti Tenaga Nasional (UNITEN)<br>
                                Jalan IKRAM-UNITEN<br>
                                43000 Kajang<br>
                                Selangor MALAYSIA<br>
                                <strong>Phone:</strong> +603-8921 2020<br>
                                <strong>Email:</strong> futurecon2020@uniten.edu.my<br>
                            </p>
                        </div>

                    </div>

                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>CSEB574</strong>. All Rights Reserved
                </div>

            </div>
        </footer><!-- End  Footer -->

    </main>











    <!-- jQuery cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>



    <!-- Library for animation-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!--Complete Bootstrap CDN-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    {{-- <script src="./main.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>