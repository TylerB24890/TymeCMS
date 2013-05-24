
<footer>
    <div class='row'>Copyright 2013. Tyler Bailey. All Rights Reserved.</div>
</footer>
<script type='text/javascript'>
    
    $(document).ready(function(){
       
       if($('#select_template').val() == 'homepage_slider') {
           $('#slider_upload_form').show(); 
       } else {
           $('#slider_upload_form').hide(); 
       }
       //when homepage slider template is selected display the photo forms
       $('#select_template').bind('change', function (e) { 
            if( $('#select_template').val() == 'homepage_slider') {
                $('#slider_upload_form').show();
            } else{
                $('#slider_upload_form').hide();
            }         
        });
        
       if($('#select_template').val() == 'photo_gallery') {
           $('#photo_upload_form').show(); 
       } else {
           $('#photo_upload_form').hide(); 
       }
       //when homepage slider template is selected display the photo forms
       $('#select_template').bind('change', function (e) { 
            if( $('#select_template').val() == 'photo_gallery') {
                $('#photo_upload_form').show();
            } else{
                $('#photo_upload_form').hide();
            }         
        });
        
    });
    
</script>
</body>
</html>