  @if (Session::has('message'))
  <p>{{ Session::get('message') }}</p>
  @endif
 <form class="form-inline" method="POST" action="http://localhost:81/samachar4media/public/admin/newsletterh/send" accept-charset="UTF-8" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="radio-inline"><input type="radio" name="test"  id="test" value="internal">Internal</label>
                <label class="radio-inline"><input type="radio" name="test" id="test1" value="external">External</label>
               <div class="form-group" style="display: inline-block;
                  margin-bottom: 0;
                  vertical-align: middle;width: 100%;">

                  <label for="email" style="display: inline-block;
                     max-width: 100%;
                     margin-bottom: 5px;
                     font-weight: 700;">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" style="display: inline-block;
                     width: 70%;
                     height: 34px;
                     padding: 6px 12px;
                     font-size: 14px;
                     line-height: 1.42857143;
                     color: #555;
                     background-color: #fff;
                     background-image: none;
                     border: 1px solid #ccc;
                     border-radius: 4px;
                     -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                     box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                     -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                     -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                     transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;">
                     <!-- internal -->
                  <input type="hidden" name="sender[]"  size="80" id="sender">
                  <input type="hidden" name="Emailto[]"  size="80" id="Emailto">
                  <input type="hidden" name="Emailcc[]"  size="80" id="Emailcc">
                  <input name="Emailbcc[]" type="hidden"  id="Emailbcc" size="80">
                  <!-- internal -->

                  <input type="submit" name="submit" value="Send News Flash" onclick="return validate();" style="background-color: #03256c;
                  color: #fff; display: inline-block;
                  padding: 6px 12px;
                  margin-bottom: 0;
                  font-size: 14px;
                  font-weight: 400;
                  line-height: 1.42857143;
                  text-align: center;
                  white-space: nowrap;
                  vertical-align: middle;
                  -ms-touch-action: manipulation;
                  touch-action: manipulation;
                  cursor: pointer;
                  -webkit-user-select: none;
                  -moz-user-select: none;
                  -ms-user-select: none;
                  user-select: none;
                  background-image: none;
                  border: 1px solid transparent;
                  border-radius: 4px;">
               </div>
               <br><br>
               
            </form>
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript">
$('input[name=test]').change(function(){
    var value = $( 'input[name=test]:checked' ).val();
    if(value == 'internal'){
   var to = 'mohit.pandey@exchange4media.com';
   var cc = 'ashok@exchange4media.com';
   var bcc = 'ashok@exchange4media.com';
    document.getElementById('sender').value=to;
    document.getElementById('Emailto').value=to;
    document.getElementById('Emailcc').value=cc;
    document.getElementById('Emailbcc').value=bcc;
}else{
  var to = 'mohit.pandey@exchange4media.com';
  var cc = 'ashok@exchange4media.com';
   var bcc = 'ashok@exchange4media.com';
   document.getElementById('sender').value=to;
    document.getElementById('Emailto').value=to;
    document.getElementById('Emailcc').value=cc;
    document.getElementById('Emailbcc').value=bcc;
}
});
            </script> -->