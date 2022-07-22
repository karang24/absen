<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>G-Apps</title>
    <link href="{{ asset('public/css/animate.css') }} " rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('public/font-awesome/css/font-awesome.min.css"') }} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
		<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="page-top" class="landing-page no-skin-config pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md navbar-scroll" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="index.html">G-Apps</a>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" href="#page-top">Helpdesk</a></li>
                        <!--li><a class="nav-link page-scroll" href="#features">Features</a></li>
                        <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                        <li><a class="nav-link page-scroll" href="#testimonials">Testimonials</a></li>
                        <li><a class="nav-link page-scroll" href="#pricing">Pricing</a></li>
                        <li><a class="nav-link page-scroll active" href="#contact">Contact</a></li-->
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class=""></li>
        <li data-target="#inSlider" data-slide-to="1" class="active"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item">
            <div class="container">
                <div class="carousel-caption">
                    <h1>We craft<br>
                        brands, web apps,<br>
                        and user interfaces<br>
                        we are IN+ studio</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        <a class="caption-link" href="#" role="button">Inspinia Theme</a>
                    </p>
                </div>
                <div class="carousel-image wow zoomIn animated" style="visibility: visible;">
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>We create meaningful <br> interfaces that inspire.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Helpdesk</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form method="get">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>

                                    <div class="col-sm-10"><input type="email" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"> <!--span class="form-text m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span-->
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								<div class="form-group row"><label class="col-sm-2 col-form-label">Departemen</label>
                                    <div class="col-sm-10"><input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                               
								<div class="form-group row"><label class="col-sm-2 col-form-label">Kategori Bantuan</label>
                                    <div class="col-sm-10">
										<select class="form-control">
											<option value="Normal">Normal</option>
											<option value="Minor">Minor</option>
											<option value="Priority">Priority</option>
											<option value="Urgent">Urgent</option>
										</select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                               
								<div class="form-group row"><label class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Deskripsi</label>
									
                                    <div class="col-sm-10">
									<textarea id="konten" class="form-control" name="konten" rows="10" cols="50" data-sample-short ></textarea>

									</div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
       
    </div>

</section>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p></p>
            </div>
        </div>
        <div class="row m-b-lg justify-content-center">
            <div class="col-lg-3 ">
                <address>
                    <strong><span class="navy">PT. Geopersada Mulia Abadi</span></strong><br>
                    7H4M2+C24, Pinenek, Kec. Likupang Tim.<br>
                    Kabupaten Minahasa Utara, Sulawesi Utara<br>
                    <abbr title="Phone">Phone:</abbr>
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                   PT. Geopersada Mulia Abadi merupakan perusahan jasa Kontraktor Pertambangan & Alat Berat yg beroperasi di Site Toka Tindung Gold Mine Project, Likupang Timur, Sulawesi Utara          </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p><strong>© 2022 PT. Geopersada Mulia Abadi</strong><br> </p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->

<script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('public/js/popper.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.js')}}"></script>
<script src="{{asset('public/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('public/js/inspinia.js')}}"></script>
<script src="{{asset('public/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('public/js/plugins/wow/wow.min.js')}}"></script>

  <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>


<script>

  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });   
  

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>



</body></html>