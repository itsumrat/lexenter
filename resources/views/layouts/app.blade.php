<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tagsinput.css') }}">
    <link rel="stylesheet" href="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .sidebar-wrapper .sidebar-menu ul li .active {
            background-color: rgb(82,90,101);
            border-radius: 3px;
        }
    </style>

</head>
<body>

<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="material-icons">view_week</i>
    </a>

@yield("content")
<!-- page-content" -->
</div>

<!-- page-wrapper -->
<!-- Scripts -->
<!--<script src="{{ asset('js/app.js') }}" defer></script>-->
<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/tagsinput.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.tiny.cloud/1/3i49hpqom10cbuezqaq684zomrslpeggexe815tzkurjiom7/tinymce/5/tinymce.min.js"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
@stack('script')
@yield("script")
<script>
    var url_path = window.location.pathname;
    var target = $('a[href$="' + url_path + '"]');
    target.addClass("active");

    $('button.delete-btn').on('click', function (e) {
        e.preventDefault();
        var self = $(this);
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, Cancel delete!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "It has been deleted", "success");
                    setTimeout(function () {
                        self.parents(".delete_form").submit();
                    }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
                } else {
                    swal("Cancelled", "It is safe", "error");
                }
            });
    });
</script>
</body>
</html>


{{-- {!! Form::open(['method' => 'DELETE','route' => ['childcategory.destroy', $childcategory->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                            <button class="admin-actionbtn delete-btn" type="submit">
                                <i class="fas fa-trash-alt">
                                </i>
                            </button>
                            {!! Form::close() !!} --}}