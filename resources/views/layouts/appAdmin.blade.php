<?php

/*echo '<pre>';
var_dump($roles);
echo '</pre>';*/

//echo $roles->name;
//exit;

//echo Request::segment(1);exit;
?>
<!DOCTYPE html
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WBITS | Dashboard</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <script src="{{ URL::to('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/datepicker/datepicker3.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ URL::to('assets/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/iCheck/flat/blue.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/morris/morris.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/datepicker/datepicker3.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="{{ URL::to('cart.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::to('assets/css/example.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/material-charts.css') }}">


        <!-- DataTables -->
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/datatables/dataTables.bootstrap.css') }}">

        <!-- DataTables -->
        <script src="{{ URL::to('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <script type="text/javascript">
            $(function () {
                $("#example1").DataTable({
                    "scrollX": true
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });

            function confirmSubmit() {
                var agree = confirm("Are you sure to delete this record?");
                if (agree)
                    return true;
                else
                    return false;
            }



        </script>

        <script src="{{ URL::to('assets/js/material-charts.js') }}"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('includes.header')
            @include('includes.aside')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('includes.footer')
        </div>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="{{ URL::to('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/select2/select2.full.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::to('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/knob/jquery.knob.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="{{ URL::to('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/fastclick/fastclick.js') }}"></script>
        <script src="{{ URL::to('assets/dist/js/app.min.js') }}"></script>
        <script src="{{ URL::to('assets/dist/js/pages/dashboard.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ URL::to('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ URL::to('assets/dist/js/demo.js') }}"></script>
        <script src="{{ URL::to('assets/dist/js/custom_js.js') }}"></script>


        <script type="text/javascript">
            $(".select2").select2();
            $('.datepicker').datepicker({
                autoclose: true,
                setDate: new Date(),
                format: 'yyyy-mm-dd'
            });

            $(".timepicker").timepicker({
                showInputs: false,
                showMeridian: false
            });

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }

        </script>




        <script type="text/javascript">
            $( "#departmentToSection" ).change(function()   {
                alert(ok);
            })
        </script>




    </body>
</html>

