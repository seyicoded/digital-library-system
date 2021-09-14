<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="{{url('css/w3.css')}}">
        <title>Digital Library Information System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{url('user/assets/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('user/css/styles.css')}}" rel="stylesheet" />
        <style>
            #container_holder .book_item_container{
                display: flex;
                margin: 10px 0px;
            }
            #container_holder .book_item_container .book_item_container_left{
                flex: 1;
                overflow: hidden;
            }
            #container_holder .book_item_container .book_item_container_left img{
                width: 100%;
                height: 300px;
            }
            #container_holder .book_item_container .book_item_container_right{
                width: 55%;
                display: flex;
                padding: 15px;
                flex-direction: column;
                justify-content: space-between;
            }

            #container_holder .book_item_container .book_item_container_right .top{
                flex: 1
            }

            #container_holder .book_item_container .book_item_container_right .top .author{

            }

            #container_holder .book_item_container .book_item_container_right .bottom a *{
                width: 100%;
                font-weight: 900;
                font-size: 38
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function load_search_result(){
                var txt = $("input[name='search_text']").val();
                var box = $('#container_holder');

                box.html('loading');

                $.get('{{url('/get_booking_from_search')}}?search='+txt,  // url
                function (data, textStatus, jqXHR) {  // success callback
                    box.html(data);
                });
            }
        </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Library System</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">{{base64_decode($_COOKIE[sha1('matric_for_user_signed_in_bidemi_project')])}}</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#portfolio">INFO</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">DIGITAL LIBRARY INFORMATION SYSTEM</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Building a comprehensive digital library system will help users to manage all phases of the information lifecycle!</p>
                        <a class="btn btn-primary btn-xl" href="#books">EXPLORE</a>
                    </div>
                </div>
            </div>
        </header>

        <section id='books' style="display: flex; padding: 15px 0px">
            {{-- @yield('content') --}}
            <div id='left' style="flex: 1">
                <div class="w3-container w3-padding">
                    <h1 class="w3-center">books</h1>
                    <br />

                    {{-- container for search --}}
                    <div class="" style="display: flex">
                        <input name="search_text" class="w3-input" type="search" placeholder="search by name, faculty, department, author, e.t.c" />
                        <img class="" onclick="load_search_result()" src="https://www.vippng.com/png/detail/501-5013902_search-icon-lupe-icon-png-free.png" style="width: 60px; cursor: pointer;" />
                    </div>

                    {{-- container for displaying books item --}}
                    <div class="w3-container" id='container_holder'>
                        @foreach ($data['books'] as $dt)

                            <div class="book_item_container w3-card w3-round">
                                <div class="book_item_container_left">
                                    <img src="https://corestationers.co.za/wp-content/uploads/woocommerce-placeholder-300x300.png"/>
                                </div>
                                <div class="book_item_container_right">
                                    <div class="top">
                                        <h2>{{$dt->b_name}}</h2>
                                        <div><p class="author">Faculty: {{$dt->f_name}}</p></div>
                                        <div><p class="author">Department: {{$dt->d_name}}</p></div>
                                        <div><p class="author">Author: {{$dt->b_author}}</p></div>
                                    </div>
                                    <div class="bottom">
                                        <a href="{{$dt->b_path}}" target="_blank"><button class="w3-btn w3-btn-block w3-green">GET BOOK</button></a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div id='right' class="" style="width: 25%">
                <h1>publication notice</h1>
                @foreach ($data['publication'] as $dt)
                    <div class="w3-card w3-round w3-padding w3-margin">
                        <h6 style="color: gray">{{$dt->p_title}}</h6>
                        <p style="font-size: 11px">{{$dt->p_content}}</p>
                        <div style="font-style: italic; font-size: 11px" class="w3-right">{{date('d M Y', strtotime($dt->date_created))}}</div>
                        <br />
                        <br />
                    </div>
                @endforeach
            </div>
        </section>

        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Having Issues!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">if so we can be contact!</p>
                    </div>
                </div>
                {{-- <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div> --}}
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+234 (0) 906 869 7453</div>
                        <br />
                        <div>Owolabi Taofeeq Jimoh</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021. <br /> <br /> 17/47cs/xp/0027</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('user/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
