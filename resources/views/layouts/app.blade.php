<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Mafkodat - Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">

		<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
        <!-- Datatables -->
    <link href="{{asset('assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

		<!--[if lt IE 9]>
			<script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('assets/js/respond.min.js')}}"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- header -->
            @include('include.header')
            <!-- /header -->
            <!-- sidebar -->
                @include('include.sidebar')
            <!-- /sidebar -->

		<!-- Page Wrapper -->
        <div class="page-wrapper">

                <div class="content container-fluid">
                    <!-- page content -->
                    @yield('content')
                    <!-- /page content -->
				</div>
		</div>
		<!-- /Page Wrapper -->

        </div>
        <!--Footer-->
        @include('include.footer')
        <!-- /Footer -->


        <!-- jQuery -->
        <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{url('assets/js/popper.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>

		<!-- Slimscroll JS -->
        <script src="{{url('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

		<script src="{{url('assets/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{url('assets/plugins/morris/morris.min.js')}}"></script>
		<script src="{{url('assets/js/chart.morris.js')}}"></script>
        		<!-- Datatables JS -->
		{{-- <script src="{{urlasset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{urlasset('assets/plugins/datatables/datatables.min.js')}}"></script> --}}
		   <!-- Datatables -->
           <script src="{{url('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
           <script src="{{url('assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
           <script src="{{url('assets/plugins/jszip/dist/jszip.min.js')}}"></script>
           <script src="{{url('assets/plugins/pdfmake/build/pdfmake.min.js')}}"></script>
           <script src="{{url('assets/plugins/pdfmake/build/vfs_fonts.js')}}"></script>

		<!-- /Main Wrapper -->
        <div class="modal fade" id="delete_item_ok">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float: right">تاكد الحذف</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="name" id="delete_id_modal" class="form-control" placeholder=" الاسم  ">
                        <input type="hidden" name="name" id="delete_name_pages_modal" class="form-control" placeholder=" الاسم  ">
                        <h3> <p style="color: red;">هل انت متأكد من الحذف ؟&hellip;</p></h3></div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">تراجع </button>
                        <button type="button" onclick="deleteItemModal()" class="btn btn-primary">موافق</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        @yield('scripts')
        <script>
            function delete_item(id, name_pages) {
                        document.getElementById("delete_id_modal").value = id;
                        document.getElementById("delete_name_pages_modal").value = name_pages;
                        $("#delete_item_ok").modal("show");
                        toastr.error('هل متأكد من الحذف.');
                    }

                    function deleteItemModal() {
                        var id = document.getElementById("delete_id_modal").value;
                        var name_pages = document.getElementById("delete_name_pages_modal").value;
                        $.ajax({
                            type: 'get'
                            , url: "/" + name_pages+ "_delete/" + id
                            , contentType: false
                            , cache: false
                            , beforeSend: function() {
                                // $('#delete_item_ok').css("opacity", ".8");
                            }
                            , success: function(msg) {
                                if (msg == 'error') {
                                    document.getElementById("delete_id_modal").value = '';
                                    document.getElementById("delete_name_pages_modal").value = '';
                                    toastr.error('العنصر هذا مربوط بعدة عناصر .');
                                    $("#delete_item_ok").modal('hide');
                                } else {
                                    $("#delete_"+name_pages+"_" + id).hide(1000);
                                    document.getElementById("delete_id_modal").value = '';
                                    document.getElementById("delete_name_pages_modal").value = '';
                                    //var ajaxDisplay = document.getElementById(name_pages + "_" + id).innerHTML = msg;
                                    $("#delete_item_ok").modal('hide');
                                    // $('#delete_item_ok').css("opacity", "1");
                                    toastr.success('تم الحذف بنجاح .');
                                }
                            }
                        });
                    }
            function eye_item(id,item) {
    var ajaxRequest;
    try {
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            var ajaxDisplay = document.getElementById(item + "_eye" + id);
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    };
    ajaxRequest.open("get", '/'+ item + "_eye/" + id, true);
    ajaxRequest.send();
}
        function loadSectionPage(name){
            $(name).LoadingOverlay("show", {
                background  : "rgba(56, 57, 58, 0.5)"
            });
            $(name).LoadingOverlay("show");
        }
        function loadPageHide(name) {
            $(name).LoadingOverlay("hide", true);
        }
        </script>
            {{-- <script type="text/javascript">
                function updateUserProfile() {

                    var form = $('#form_user_profile_update')[0]; // You need to use standard javascript object here
                    var formData = new FormData(form);

                    $.ajax({
                        type: 'Post'
                        , url: route('user.profile.update')
                        , data: formData
                        , contentType: false
                        , cache: false
                        , processData: false
                        , beforeSend: function() {
                            //$('.submitBtn').attr("disabled","disabled");
                            $('#edit_personal_details').css("opacity", ".5");
                        }
                        , success: function(msg) {
                            if (msg == 'error') {

                                //$("#modal_slider").modal('hide');
                                demo.showNotification('top', 'left', 'danger', "تاكد من المدخلات");
                            } else {
                                $("#edit_personal_details").modal('hide');

                                $('#edit_personal_details').css("opacity", "1");
                                //$("#modalConfirmupdateclass").modal('hide');
                                demo.showNotification('top', 'left', 'success', "تم تعديل الفصل");
                                //$("#classback").html(msg);
                            }
                            //$('#form_create_slider').css("opacity","");
                            //$(".submitBtn").removeAttr("disabled");

                        }
                    });
                }

            </script> --}}
        @stack('AjaxScript')
        <!-- Custom Theme Scripts -->
        <script src="{{url("assets/js/custom.min.js")}}"></script>
        <!-- Custom JS -->
		<script  src="{{url('assets/js/script.js')}}"></script>


    </body>

</html>
