<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>

    <!-- For toster-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/toastr/toastr.css'; ?>">
    <script src="<?php echo base_url().'assets/toastr/toastr.js'; ?>"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/morris/morris.min.js'; ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'; ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'; ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url().'assets/plugins/knob/jquery.knob.js'; ?>"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'; ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'; ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'; ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url().'assets/dist/js/pages/dashboard.js'; ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>


    <script type="text/javascript" src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" />
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        $(".chosen").chosen();

      });

      tinymce.init({
      selector: '#description , #page_description',
      height: 500,
      menubar: false,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      templates: [
      { title: 'Test template 1', content: 'Test 1' },
      { title: 'Test template 2', content: 'Test 2' }
      ],
      toolbar: 'undo redo | insert | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: ['//www.tinymce.com/css/codepen.min.css',
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i']
    });

    </script>
    <script type="text/javascript">

    var baseurl = "<?php echo base_url();?>";
    $("body").on("click",".faq_status", function(e){
        var status = $(this).attr("href-status");
        var id = $(this).attr("href-id");
        var act = $(this).attr("href-act");
        var userrole = $(this).attr("href-role");
        var cur = $(this);    
         
        if(confirm("Sure you want to change "+act+" ?"))
        {
            $.ajax({
              type: "POST",
              url: baseurl+"admin/home/changestatus",
              data:{tabname:'faq',status:status,id:id,useract:act,userrole:userrole},
              dataType: 'json',
              success: function(response) {

                // alert("success");
                // console.log(response);
                if (response.success == 1)
                {
                    // alert("success");
                    // console.log();
                    showMessage(response.msg,"","success");
                    setTimeout(function(){ window.location.reload(); },500);                 
                }
                else
                {
                    showMessage(response.msg,"","error");
                }
              }
            });
        }
    });

    $("body").on("click",".category_status", function(e){
        var status = $(this).attr("href-status");
        var id = $(this).attr("href-id");
        var act = $(this).attr("href-act");
        var userrole = $(this).attr("href-role");
        var cur = $(this);    
         
        if(confirm("Sure you want to change "+act+" ?"))
        {
            $.ajax({
              type: "POST",
              url: baseurl+"admin/home/changestatus",
              data:{tabname:'faq_categories',status:status,id:id,useract:act,userrole:userrole},
              dataType: 'json',
              success: function(response) {

                // alert("success");
                // console.log(response);
                if (response.success == 1)
                {
                    // alert("success");
                    // console.log();
                    showMessage(response.msg,"","success");
                    setTimeout(function(){ window.location.reload(); },500);                 
                }
                else
                {
                    showMessage(response.msg,"","error");
                }
              }
            });
        }
    });

    $("body").on("click",".blog_status", function(e){
        var status = $(this).attr("href-status");
        var id = $(this).attr("href-id");
        var act = $(this).attr("href-act");
        var userrole = $(this).attr("href-role");
        var cur = $(this);    
         
        if(confirm("Sure you want to change "+act+" ?"))
        {
            $.ajax({
              type: "POST",
              url: baseurl+"admin/home/changestatus",
              data:{tabname:'blogs',status:status,id:id,useract:act,userrole:userrole},
              dataType: 'json',
              success: function(response) {

                // alert("success");
                // console.log(response);
                if (response.success == 1)
                {
                    // alert("success");
                    // console.log();
                    showMessage(response.msg,"","success");
                    setTimeout(function(){ window.location.reload(); },500);                 
                }
                else
                {
                    showMessage(response.msg,"","error");
                }
              }
            });
        }
    });


    function showMessage(title,msg,msg_type)
    {
        var topt = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": true,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "200",
          "hideDuration": "600",
          "timeOut": "1000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

        if(msg_type == "info")
        {
            toastr.info(msg,title,topt);
        }
        
        if(msg_type == "warning")
        {
            toastr.warning(msg,title,topt);
        }

        if(msg_type == "success")
        {
            toastr.success(msg,title,topt);
        }
        
        if(msg_type == "error")
        {
            toastr.error(msg,title,topt);
        }
        return true;
        //toastr.clear();
    }
  </script>
</body>

</html>