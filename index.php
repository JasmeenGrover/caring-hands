<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
     <script src="https://kit.fontawesome.com/818e8fe1b0.js" crossorigin="anonymous"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            var ju = false;
            var jp = false;
            var jm = false;
            var rad;
            var res;

            $("#btnSign").click(function() {
                if (ju == false && jp == false && jm == false) {
                    $("#errSign").html("Fill the required data first");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (ju == false && jp == false) {
                    $("#errSign").html("Please fill your UID and password");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (ju == false && jm == false) {
                    $("#errSign").html("Please fill your UID and mobile no");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (jp == false && jm == false) {
                    $("#errSign").html("Please fill your password and mobile no");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (ju == false) {
                    $("#errSign").html("Please fill your UID");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (jp == false) {
                    $("#errSign").html("Please fill your password");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else if (jm == false) {
                    $("#errSign").html("Please fill your mobile");
                    $("#errSign").css("color", "#e84a5f");
                    return;
                } else {
                    var txtUid = $("#txtUid").val();
                    var txtPwd = $("#txtPwd").val();
                    var txtMob = $("#txtMob").val();
                    var radDoc = $("#radDoc").val();
                    var radPat = $("#radPat").val();
                    if ($("#radDoc").prop("checked") == true)
                        rad = $("#radDoc").val();
                    if ($("#radPat").prop("checked") == true)
                        rad = $("#radPat").val();
                    var url = "ajax-process-signup.php?uid=" + txtUid + "&pwd=" + txtPwd + "&mob=" + txtMob + "&rad=" + rad;
                    $.get(url, function(response) {
                        if (response == "Signup Successful") {
                            if (rad == "doctor") {
                                window.location.href = 'doc-login.php';
                            } else if (rad == "patient") {
                                window.location.href = 'profile-patient.php';
                            }
                        } else {
                            $("#errSign").html(response);
                            $("#errSign").css("color", "#e84a5f");
                        }
                    });

                }

            });

            $("#btnLog").click(function() {
                var txtUid2 = $("#txtUid2").val();
                var txtPwd2 = $("#txtPwd2").val();
                var url = "ajax-process-login.php?uid=" + txtUid2 + "&pwd=" + txtPwd2;
                $.get(url, function(response) {

                    if (response == "Authorized login") {
                        if (res == "Authorized login (You are a doctor)") {
                            window.location.href = 'doc-login.php';
                        } else if (res == "Authorized login (You are a patient)") {
                            window.location.href = 'dashboard-patient.php';
                        }
                    } else {
                        $("#errLog").html("Please fill the details correctly");
                        $("#errLog").css("color","#e84a5f");
                    }

                });
            });

            $("#txtUid2").blur(function() {
                var txtUid2 = $("#txtUid2").val();
                if (txtUid2 == "") {
                    $("#errUid2").html("Please fill your UID");
                    $("#errUid2").css("color", "#e84a5f");
                } else {
                    var url = "ajax-chk-uid-login.php?uid=" + txtUid2;
                    $.get(url, function(response) {
                        $("#errUid2").html(response);
                        res = response;
                        if (response == "Unauthorized login")
                            $("#errUid2").css("color", "#e84a5f");
                        else
                            $("#errUid2").css("color", "#32e0c4");
                    });
                }
            });

            $("#txtUid").blur(function() {
                var txtUid = $("#txtUid").val();
                if (txtUid == "") {
                    $("#errUid").html("Please fill a desired UID");
                    $("#errUid").css("color", "#e84a5f");
                } else {
                    var url = "ajax-chk-uid-signup.php?uid=" + txtUid;
                    $.get(url, function(response) {
                        $("#errUid").html(response);
                        ju = true;
                        if (response == "Username available")
                            $("#errUid").css("color", "#32e0c4");
                        else
                            $("#errUid").css("color", "#e84a5f");
                    });

                }
            });


            $("#txtPwd").blur(function() {
                var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                var txtPwd = $("#txtPwd").val();
                var result = r.test(txtPwd);
                if (txtPwd == "") {
                    $("#errPwd").html("Please fill a desired password");
                    $("#errPwd").css("color", "#e84a5f");
                } else {
                    if (result == true) {
                        $("#errPwd").html("Valid");
                        $("#errPwd").css("color", "#32e0c4");
                        jp = true;
                    } else {
                        $("#errPwd").html("Invalid");
                        $("#errPwd").css("color", "#e84a5f");
                    }
                }

            });
            $("#txtMob").blur(function() {
                var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                var txtMob = $("#txtMob").val();
                var result = phoneno.test(txtMob);
                if (txtMob == "") {
                    $("#errMob").html("Please fill your mobile no.");
                    $("#errMob").css("color", "#e84a5f");
                } else {
                    if (result == true) {
                        $("#errMob").html("Valid");
                        $("#errMob").css("color", "#32e0c4");
                        jm = true;
                    } else {
                        $("#errMob").html("Invalid");
                        $("#errMob").css("color", "#e84a5f");
                    }
                }
            });
        });

    </script>
</head>

<body>
  <!-- navbar -->
  <section id="title">
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand logo" href="index.php">StayHealthy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item nav-font">
                <a class="nav-link" href="#services"><i class="fas fa-notes-medical"></i> Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#reachus"><i class="fas fa-location-arrow"></i> ReachUs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aboutus"><i class="fas fa-users"></i> AboutUs</a>
              </li>
                <li class="nav-item">
                    <div class="btn btn-outline-light navSign" data-toggle="modal" data-target="#modalRegisterForm">Signup</div>
                </li>
                <li class="nav-item">
                    <div class="btn btn-light navLog" data-toggle="modal" data-target="#modalLoginForm">Login</div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Title -->
    <div class="row">
      <div class="col-lg-6">
<h1 class="big-heading">Looking For a Doctor?</h1>
<input type="text" name="" value="" class="title-search"> <br>
<a href="#"><button type="button" class="btn btn-lg btn-outline-light btn-title mt-2">Search</button></a>
<h3>Find the right doctor. Get the best care.</h3>
      </div>
      <div class="col-lg-6">
        <img src="pics/title.png" class="title-image" alt="">
      </div>
    </div>
      </div>
</section>

<!-- Services Section -->
<section id="services">
    <div class="text-center" id="service">
        <div class="section-heading" id="service-text">
            Our services
        </div>
    </div>

    <div class="service-background">
        <div class="d-flex flex-row justify-content-center">
          <div class="row service-card">
    <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mt-3 service-card1">
                <img src="pics/doctor-search.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">Find doctors</p>
                    <p class="card-text">Find the right doctor. Get the best care.</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mt-3 service-card2">
                <img src="pics/history.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">BP History</p>
                    <p class="card-text">Check your previously recorded Blood pressure</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mt-3 card-small service-card3">
                <img src="pics/history2.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">Sugar History</p>
                    <p class="card-text">Check your previously recorded Sugar Levels</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-center mt-5">
          <div class="row service-card">
      <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mb-3 service-card1">
                <img src="pics/slips.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">Find your slips</p>
                    <p class="card-text">Upload your slips so that you can find them anytime anywhere</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mb-3 service-card2">
                <img src="pics/doctor-regis.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">Doctor registration</p>
                    <p class="card-text">Doctors can register with us for serving people</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card align-items-center shadow-sm mb-3 card-small service-card3">
                <img src="pics/patient-regis.png" class="card-img-top image" alt="...">
                <div class="card-body text-center">
                    <p class="font-weight-bold size">Patient registration</p>
                    <p class="card-text">Patient can register with us for keeping all their records at one place</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

    <!-- ReachUs -->
    <section id="reachus">
    <div class="text-center" id="service">
        <div class="section-heading">
            Reach Us
        </div>
    </div>
    <div class="reach-background">
        <div class="d-flex flex-row justify-content-center">
          <div class="row">
            <div class="col-lg-6">
            <div class="col-md-3 mt-3 mb-3 reachus1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8805713514444!2d74.95013941553826!3d30.21195591759388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1596005449367!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="col-md-3 mt-3 mb-3 reachus2">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBanglore-Computer-Education-236546743050307&tabs=timeline&width=450&height=500&small_header=true&adapt_container_width=false&hide_cover=true&show_facepile=false&appId" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
            </div>
            </div>
        </div>
    </div>
    </section>

    <!-- AboutUs -->
    <section id="aboutus">
    <div class="text-center" id="service">
        <div class="section-heading">
            Meet developers
        </div>
    </div>
    <div class="about-background">
        <div class="d-flex flex-row justify-content-center">
          <div class="row">
            <div class="col-lg-6">
            <div class="">
                <div class="card align-items-center shadow-sm about-card1">
                    <img src="pics/sir.png" class="card-img-top footerimg" alt="...">
                    <div class="card-body text-center">
                        <p class="size font-weight-bold">Developed by</p>
                        <p class="card-text">
                            Name : Jasmeen Grover <br>
                            Email : jasmeengrover945@gmail.com
                        </p>
                    </div>
                </div>
            </div>
              </div>
              <div class="col-lg-6">
            <div class="">
                <div class="card align-items-center shadow-sm about-card2">
                    <img src="pics/sir.png" class="card-img-top footerimg" alt="...">
                    <div class="card-body text-center">
                        <p class="size font-weight-bold">Under the guidance of</p>
                        <p class="card-text">
                            Name : Rajesh Kumar Bansal <br>
                            Contact : 9872246056 <br>
                        </p>
                    </div>
                </div>
            </div>
              </div>
              </div>
        </div>
    </div>
  </section>

<!-- footer section -->

<section id="footer">
<div class="footer-background">
<i class="icon far fa-copyright"></i>  Copyright All rights are reserved to StayHealthy. <br>
<i class="icon fab fa-facebook-f"></i>
<i class="icon fab fa-instagram"></i>
<i class="icon fab fa-twitter"></i>
<i class="icon fab fa-github"></i>
<i class="icon fab fa-linkedin-in"></i>
</div>
</section>


    <!--    models-->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Login form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mt-2 d-flex justify-content-center text-center">
                    <form>
                        <div class="form-group">
                            <label for="txtUid2">Your UID</label>
                            <input type="text" id="txtUid2" name="txtUid2" class="form-control">
                            <span id="errUid2" class="font-weight-bolder"></span>
                        </div>
                        <div class="form-group">
                            <label for="txtPwd2">Your Password</label>
                            <input type="password" id="txtPwd2" name="txtPwd2" class="form-control">
                            <span id="errPwd2" class="font-weight-bolder"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex flex-column justify-content-center">
                    <input type="button" id="btnLog" name="btnLog" class="btn btn-dark" value="Login">
                    <span id="errLog" class="font-weight-bolder"></span>
                    <a href="forgot-password.php" class="text-decoration-none">
                        Forgot Password ?
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Signup form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <form>
                        <div class="form-group text-center">
                            <label for="txtUid">UID</label>
                            <input type="text" id="txtUid" name="txtUid" class="form-control">
                            <span id="errUid" class="font-weight-bolder"></span>
                        </div>
                        <div class="form-group text-center">
                            <label for="txtPwd">Password</label>
                            <input type="password" id="txtPwd" name="txtPwd" class="form-control">
                            <span id="errPwd" class="font-weight-bolder"></span>
                        </div>
                        <div class="form-group text-center">
                            <label for="txtMob">Mobile</label>
                            <input type="text" id="txtMob" name="txtMob" class="form-control">
                            <span id="errMob" class="font-weight-bolder"></span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="radio">
                                <label><input type="radio" name="rad" value="doctor" id="radDoc"> Doctor</label>
                            </div>
                            <div class="radio ml-5">
                                <label><input type="radio" name="rad" value="patient" id="radPat"> Patient</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex flex-column justify-content-center">
                    <input type="button" class="btn btn-dark" id="btnSign" name="btnSign" value="Signup">
                    <span id="errSign" class="font-weight-bolder"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "5ffb60df7ad4d00007e5b02b";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->
</body>

</html>
