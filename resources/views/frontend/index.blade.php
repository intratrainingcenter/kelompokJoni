<!DOCTYPE html>
<html>

<head>
  <title>SMK INTRA 1 KEDOYA - INTERNATIONAL SCHOOL</title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,700,800')}}" rel="stylesheet" media="screen">

  <link href="{{asset('AdminLTE/Alstar/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
  <link href="{{asset('AdminLTE/Alstar/css/style.css')}}" rel="stylesheet" media="screen">
  <link href="{{asset('AdminLTE/Alstar/color/default.css')}}" rel="stylesheet" media="screen">

  
</head>

<body>

 
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle nav</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        
        <a class="navbar-brand" href="{{asset('index.php')}}">SMK INTRA 1 KEDOYA</a>

      </div>
      <div class="navigation collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="current"><a href="#intro">Home</a></li>
          <li><a href="{{asset('#about')}}">About Us</a></li>
          <li><a href="{{asset('#contact')}}">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

 
  <div id="intro">
    <div class="intro-text">
      <div class="container">
        <div class="col-md-12">
          <div id="rotator">
            <h1><span class="1strotate">Welcome To, SMK INTRA 1 KEDOYA</span></h1>
            <div class="line-spacer"></div>
            <p><span class="2ndrotate"></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <section id="about" class="home-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading">
            <h2>About us</h2>
            <div class="heading-line"></div>
            <p>We are the first international school in Indonesia since 1999</p>
          </div>
        </div>
      </div>
      <div class="row wow fadeInUp">
        <div class="col-md-6 about-img">
          <img src="{{asset('AdminLTE/Alstar/img/about-img.jpg')}}" alt="">
        </div>

        <div class="col-md-6 content">
          <h2>A very warm welcome to the SMK Intra 1 Kedoya in the beautiful country of Indonesia</h2>
          <h3>SMK Intra 1 Jakarta was founded in 2004 with support from the British Embassy to educate the British and Commonwealth families living in Jakarta.</h3>
          <p>
            Located in West Jakarta, SMK Intra 1 Kedoya has an 18 hectare campus designed specifically to enrich the academic life of all our students. From classrooms and centers in Primary to Secondary specialist classrooms, staff and students together can enjoy high quality teaching and learning. In addition to this academic facility, we have a large theater, swimming pool, tennis court and soccer field on campus to provide many opportunities for students to have enriched experiences at school. In 2018, we completed our new sports building, which is a national standard specification.
          </p>
        </div>
      </div>
    </div>
  </section>



 
  <section id="contact" class="home-section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading">
            <h2>Contact us</h2>
            <div class="heading-line"></div>
            <p>If you have any question or just want to say 'hello' to SMK INTRA 1 KEDOYA please fill out form below and we will be get in touch with you within 24 hours. </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>

          <!-- <form action="" method="post" class="form-horizontal contactForm" role="form"> -->
            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-8">
                <a class="btn btn-theme btn-lg btn-block" href="/">Send message</a>
                <!-- <button type="submit" class="btn btn-theme btn-lg btn-block">Send message</button> -->
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </section>

  
  <section id="bottom-widget" class="home-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="contact-widget wow bounceInLeft">
            <i class="fa fa-map-marker fa-4x"></i>
            <h5>Main Office</h5>
            <p>
              Jalan Inpres No 1 Kedoya, Jakarta Barat, DKI Jakarta<br />
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-widget wow bounceInUp">
            <i class="fa fa-phone fa-4x"></i>
            <h5>Call</h5>
            <p>
              +6289 6969 6060<br>

            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-widget wow bounceInRight">
            <i class="fa fa-envelope fa-4x"></i>
            <h5>Email us</h5>
            <p>
              smkintra.kedoya@gmail.com<br />
            </p>
          </div>
        </div>
      </div>
      
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Copyright &copy; SMK Intra 1 Kedoya. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 
  <script src="{{asset('AdminLTE/Alstar/js/jquery.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/wow.min.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/mb.bgndGallery.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/mb.bgndGallery.effects.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/jquery.simple-text-rotator.min.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/jquery.nav.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/modernizr.custom.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/grid.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/js/stellar.js')}}"></script>
  <script src="{{asset('AdminLTE/Alstar/contactform/contactform.js')}}"></script>

  
  <script src="{{asset('AdminLTE/Alstar/js/custom.js')}}"></script>

</body>
</html>
