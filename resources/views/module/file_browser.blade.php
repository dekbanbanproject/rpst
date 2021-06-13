
<html >

<head>    
    <title> dis-obt</title>

    <link rel="apple-touch-icon" href="{{ asset('images/icons/logod.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/logod.ico') }}">
  
<style type="text/css">
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size:80%;
    }
    #form{
        width:500px;
    }
    #folderExplorer {
        float:left;
        width: 500px;
        border-left: 1px solid #dff0ff;
    }
    .thumbnail{
        float:left;
        margin:3px;
        padding: 3px;
        border: 1px solid #dff0ff;
    }
    ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    li{
        padding:0;            
    }
</style>

{{-- <script src="{{ asset('/') }}ckeditor/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}ckeditor/ckeditor.js"></script> --}}
<script>
   $(document).ready(function () {
       var funcNum = <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
       $('#fileExplorer').on('click','img', function){
           var fileUrl = $(this).attr('title');
           window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
           window.close();
       }).hover(function(){
           $(this).css('cursor','pointer');
       });
   });
</script>
</head>
<body>             
        <div id="fileExplorer">
            @foreach ($fileNames as $fileName)
                <div class="thumbnail">
                 <img src="{{asset('storage/uploads/'.$fileName)}}" alt="thumb" title="storage/uploads/{{$fileName}}" width="120" height="100">
                    <br/>
                    {{$fileName}}
                </div>
            @endforeach
        </div>
</body>
</html> 
       

