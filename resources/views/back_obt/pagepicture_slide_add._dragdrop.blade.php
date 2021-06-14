@extends('layouts.dash_obt')


@section('content')
 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">  
            
            <div class="card border-info bg-transparent">
                <div class="card-content"> 
                    <div class="card-header">
                        <a href="{{url('back_obt/pagepicture_slide')}}" class="btn btn-sm btn-warning box-shadow-2 btn-min-width pull-right mr-1" style="color:rgb(253, 251, 251)">ย้อนกลับ <i class="ft-chevrons-left ml-1" style="color:rgb(253, 251, 251)"></i></a>
                        <h4 class="card-title">เพิ่มรายการรูปภาพ </h4>   
                    </div>  
                {{-- <form action="{{ route('obt.pagepicture_slide_save') }}" method="POST" enctype="multipart/form-data"> --}}
                    <form action="{{ route('obt.upload_store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone">
                        @csrf                             
                  
                    </form> 
                </div>
            </div>    
           
        </div>
    </div>
</div>


    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script type="text/javascript">
  Dropzone.options.dropzone = {
      max_file_size: 12000000,
      renameFile: function(file){
          var dt = new Date();
          var time = dt.getTime();
          return file.name;
      }, 
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      timeout:5000000,
      removedfile:function(file){
        var name = file.upload.filename;
        $.ajax({
            headers:{
                // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url:'{{route("obt.uploadpic_delete")}}',
            data:{filename: name},
            success: function(data)
                {
                console.log("remove OK");
                }, 
                error: function(e){
                    console.log(e)
                }
             });
             var fileRef;
             return (fileRef = file.previewElement) != null ?
             fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function(file,response){
          console.log(response);
      }, 
      error: function(file,response){
          return false;
      }
  };
</script>
@endsection

