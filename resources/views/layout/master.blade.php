<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    input, textarea, button,label {
    display:inline-block;
    font-family:arial;
    margin:4px;
    }
    </style>
</head>
<body>



<div style="position: relative; top:100px;">
@yield('content')
</div>
<div style="position: fixed;overflow: hidden;">
@include('sharedata.nav')
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js
"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

  $("#uploadFile").change(function(){

     $('#image_preview').html("");

     var total_file=document.getElementById("uploadFile").files.length;

     for(var i=0;i<total_file;i++)

     {

      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width=150 height=150>");
      

     }

  });

  $('form').ajaxForm(function() 

   {

    alert("Uploaded SuccessFully");

   }); 
</script>

</body>
</html>
