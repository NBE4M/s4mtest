<!-- Footer -->
<footer class="page-footer font-small lighten-5" style="background-color: #444444!important;">

    <div class="bg-dark">
      <div class="container">

        <!-- Grid row-->
        <div class="row p-3 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a href="https://www.facebook.com/Samachar4media/" target="_blank" class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a href="https://twitter.com/samachar4media?lang=en" target="_blank" class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- linkedin -->
            <a href="https://www.linkedin.com/company/samachar4media-com/" target="_blank" class="gplus-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--whatsup -->
            <a href="https://wb.messengerpeople.com/?widget_hash=bac86292cde7a4444b6fbc935e586d7d&lang=en&wn=2&pre=1" target="_blank" class="li-ic">
              <i class="fab fa-whatsapp white-text mr-4"> </i>
            </a>
         <!--mail -->
            <a href="https://www.youtube.com/channel/UCqMEhxJQQaFwLH4PUtXjQcw" target="_blank" class="li-ic">
              <i class="fab fa-youtube white-text mr-4"> </i>
            </a>
           

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3 text-white">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">S4M के बारे में</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>It's the most read portal on news and views on Media. Published in Hindi. It is essential reading for publishers, journalists, media planners, marketers and others who need to connect with the largest and fastest growing market segment Hindi speaking people in India.</p>

        </div>
        <!-- Grid column -->

      
       <!-- Grid column -->
        <div class="col-md-3 col-6 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      	  <div class="scrollbar style-4 footer-height">
      	  	@if(isset($menus))
      	  	@foreach($menus as $menu)
            @if($menu->slug == 'photos' || $menu->slug == 'videos')
            <p >
              <a href="{{url('')}}/news/{{$menu->slug}}.html" class="text-white">{{$menu->title}}</a>
            </p>  
              @else
              @if($menu->title == 'और' || $menu->slug == '#')
              @else
              <p>  
              <a href="{{url('')}}/{{$menu->slug}}-news.html" class="text-white">{{$menu->title}}</a>
            </p>
              @endif
              
              @endif
	          @endforeach
	        @endif  
          </div>

        </div>
        <!-- Grid column -->
      
        <!-- Grid column -->
        <div class="col-md-2 col-6 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">OTHER LINK</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
           <div class="scrollbar style-4 footer-height">
            <p>
            <a class="text-white" href="{{url('news/subscribe.html')}}">Subscribe Here</a>
          </p>
          <p>
            <a class="text-white" href="{{url('news/sitemap.html')}}"> Sitemap</a>
          </p>
         <p>
            <a class="text-white" href="{{url('news/contact.html')}}">Contact Us</a>
          </p>
          <p>
            <a class="text-white" href="{{url('newsletter').'/'.date('d-m-Y').'/archive.html'}}">Newsletters</a>
          </p>
          <p>
            <a class="text-white" href="{{url('news/privacy.html')}}">Privacy Policy </a>
          </p>
          <p>
            <a class="text-white" href="{{url('news/term&condition.html')}}">Term & Condition </a>
          </p>
          <p>
            <a class="text-white" href="{{url('news/cookie&policy.html')}}">Cookie Policy </a>
          </p>
          <p>
            <a class="text-white" href="{{url('news/gdpr.html')}}">GDPR Compliance</a>
          </p>
        </div>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fa fa-home mr-3"></i> ADSERT WEB SOLUTIONS PVT. LTD., B-20, SECTOR 57 NOIDA (U.P)</p>
          <p style="color: #fff">
            <i class="fa fa-envelope mr-3"></i> <a href="mailto:s4m@exchange4media.com" style="color: #fff">s4m@exchange4media.com</a></p>
          <p>
            <i class="fa fa-phone mr-3"></i> + (0120) 4007700</p>
          <!-- <p>
            <i class="fa fa-print mr-3"></i> + (0120) 4007700</p> -->

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center text-black-50 py-3 text-light">The material on this site may not be reproduced, distributed, transmitted, cached or otherwise used, except with the prior written permission of digital.<p>Copyright © {{date('Y')}} ADSERT WEB SOLUTIONS PVT. LTD.</p>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer --> 
	<a href="javascript:" id="return-to-top">
		<i class="fas fa-angle-up fa-4x"></i>
	</a>	
	<a onclick="permission()">
		<i class="far fa-bell noti"></i>
	</a>
  @if(isset($polls) && isset($poll_answer))
  @if(Request::route()->uri == 'poll/result/{id}/{pageQuery?}' || Request::route()->uri == 'polls/archive.html')
  @else	
	<button type="button" class="btn waves-effect waves-light pol-btn btn-sm" data-toggle="modal" data-target="#sideModalTR">
		<h6>
			<i class="fas fa-poll text-warning"></i> &nbsp; 
			<strong>आपका वोट</strong>
		</h6>
	</button>
	<!-- Side Modal Top Right -->
	<!-- To change the direction of the modal animation change .right class -->
	<div class="modal fade right pol" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
    	<div class="modal-dialog modal-side modal-top-right right-modal" role="document">
      		<div class="modal-content">
            @if($poll_answer != '')
              <form method="post" id="poll_form">
              {{csrf_field()}}
              <input type="hidden" name="poll_id" id="poll_id" value="{{$polls->id}}"/>
        		<div class="modal-header p-2 bg-warning text-white">
          			<h5 class="modal-title w-100" id="myModalLabel">
                  <i class="fas fa-poll mr-2 text-white"></i>
          				<strong>आपका वोट</strong>
          			</h5>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>
        		<div class="modal-body">
					<p>
						<strong>
							{{ $polls->question}}
						</strong>
					</p>
					<hr class="bdr-solid-b">
          @foreach($poll_answer as $key)
					<!-- Group of default radios - option 1 -->
          <div class="row">
            <div class="col-md-2 col-2 pt-1">
              <input type="radio" name="votes" value="{{ $key->id }}" style="width: 70%;" required="">
            </div>
            <div class="col-md-10 col-10 pl-0">
            <label>{{ $key->answer }}</label>
          </div>
          </div>

					<hr>
          @endforeach	
						<span id="ans_validation" style="color: red;"></span> 
        		</div>
        		<div class="modal-footer" style="justify-content: center;">
          			<button type="button" class="btn btn-dark btn-sm" onclick="pollsubmit()">
          				<strong>Vote</strong>
          			</button>
          			<a href="{{url('poll/result/'.$polls->id)}}" type="button" class="btn btn-dark btn-sm">
          				<strong>View Result</strong>
          			</a>
        		</div>
          </form>
          @endif
      		</div>
    	</div>
  	</div>
@endif
@endif
  	<!-- Side Modal Top Right -->
</div>
<!--main-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37285268-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-37285268-1');
</script> 
<script src="{{Config::get('constants.storagepath').'js/jquery-3.2.1.min.js'}}"></script> 
<script type='text/javascript' src="{{Config::get('constants.storagepath').'js/sticky-sidebar.js'}}"></script>
<script src="{{Config::get('constants.storagepath').'js/jquery.newsTicker.js'}}"></script>
<!--<script type="text/javascript" src="js/jquery.vticker-min.js"></script>-->
<script type="text/javascript" src="{{Config::get('constants.storagepath').'js/post-block.js'}}"></script>
<script src="{{Config::get('constants.storagepath').'js/popper.min.js'}}"></script> 
<script src="{{Config::get('constants.storagepath').'js/bootstrap-4.0.0.js'}}"></script>
<script src="{{Config::get('constants.storagepath').'js/mdb.min.js'}}"></script>
<script src="{{Config::get('constants.storagepath').'js/custom.js'}}"></script>

<script src="{{Config::get('constants.storagepath').'js/social.js'}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script> -->

<script  src="{{Config::get('constants.storagepath').'js/story.js'}}" charset="utf-8"></script> 
<!-- <script src="https://storage.googleapis.com/news-photo/js/autocomplete.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="{{Config::get('constants.storagepath').'js/s4m.js'}}"></script> -->
<script src="{{url('js/s4m.js')}}"></script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//samachar4media-com.disqus.com/count.js" async></script>
<script type="text/javascript">
$(function() {

var x = readCookie('s4m')
if (x == null || x == '' || empty(x)) {
  setTimeout(function(){ 
        $('#sideModalTR').modal()
      }, 3000);
}
 x = "";   //Uncomment this for cookies less site capture
 if(!x)
 {
  createCookie('s4m','overlay',null)
  $('#sitecapture').modal('show');
  $('#sitecapture').modal({
    backdrop: 'static',
    keyboard: false
  });
  
setTimeout(function(){
      $('#sitecapture').modal('hide')
    }, 10000);
  
  $('#sitecapture').on('hidden.bs.modal', function () {
      $('#sitecaptureNew').modal('show');
  });
  
 }

});


function createCookie(name,value,days) 
{
 if (days) 
 {
  var date = new Date();
  date.setTime(date.getTime()+(days*24*60*60*1000));
  var expires = "; expires="+date.toGMTString();
 }
 else var expires = "";
 document.cookie = name+"="+ value + expires +"; path=/";
}

function readCookie(name) 
{
 var nameEQ = name + "=";
 var ca = document.cookie.split(';');
 for(var i=0;i < ca.length;i++) 
 {
  var c = ca[i];
  while (c.charAt(0)==' ') c = c.substring(1,c.length);
  if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
 }
 return null;
}

function eraseCookie(name) 
{
 createCookie(name,"",-1);
}
</script>


