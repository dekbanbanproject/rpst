@extends('layouts.dash_obt')

@section('content')
 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">  
            
            <div class="card border-info bg-transparent">
                <div class="card-content"> 
                    <div class="card-header">
                        <a href="{{url('back_obt/quality')}}" class="btn btn-sm btn-warning box-shadow-2 btn-min-width pull-right mr-1" style="color:rgb(253, 251, 251)">ย้อนกลับ <i class="ft-chevrons-left ml-1" style="color:rgb(253, 251, 251)"></i></a>
                        <h4 class="card-title">แก้ไขรายการเนื้อหา </h4>   
                    </div>  
                <form action="{{ route('obt.quality_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf       
                    <input type="hidden" id="quality_id" name="quality_id" value="{{$quas->quality_id}}">  
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group position-relative ">
                                    <label for="" style="font-size:19px;color:rgb(63, 37, 179)">ชื่อเรื่อง</label>
                                    <input type="text" class="form-control round mb-1 mt-1 border-success" id="iconLeft10" placeholder="Title Input" name="quality_name" value="{{$quas->quality_name}}">                                                    
                                </fieldset>
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group position-relative ">
                                    <label for="" style="font-size:19px;color:rgb(63, 37, 179)">ชื่อเรื่องย่อย</label>
                                    <input type="text" class="form-control round mb-1 mt-1 border-success" id="iconLeft10" placeholder="Titlesub Input" name="quality_namesub" value="{{$quas->quality_namesub}}">                                                    
                                </fieldset>
                            </div>                          
                        </div>
                        <div class="row">                           
                            <div class="col-md-6">
                                <fieldset class="form-group position-relative ">
                                    <label for="" style="font-size:19px;color:rgb(63, 37, 179)">หมวดหมู่</label>
                                    <select class="form-control" id="group_id" name="group_id" required>
                                            <option value="">--กรุณาเลือก--</option>
                                            @foreach ($pagegroups as $group)
                                            @if ($quas->group_id == $group->group_id)
                                            <option value="{{$group->group_id}}" selected>{{$group->group_name}}</option>
                                            @else
                                            <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                                            @endif
                                               
                                            @endforeach
                                    </select>
                                   
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group position-relative ">
                                    <label for="" style="font-size:19px;color:rgb(63, 37, 179)">หน้าหลัก</label>
                                    <select class="form-control" id="module_id" name="module_id" required>
                                        <option value="">--กรุณาเลือก--</option>
                                        @foreach ($pageModules as $modul)
                                        @if ($quas->module_id == $modul->module_id)
                                        <option value="{{$modul->module_id}}" selected>{{$modul->module_name}}</option>
                                        @else
                                        <option value="{{$modul->module_id}}">{{$modul->module_name}}</option>
                                        @endif
                                           
                                        @endforeach
                                </select>
                                </fieldset>
                            </div>
                        </div>
                        

                        <fieldset class="form-group position-relative ">
                            <label for="" class="mb-1" style="font-size:19px;color:rgb(63, 37, 179)">รายละเอียดเนื้อหา</label>
                            <textarea class="form-control" id="summary-ckeditor" name="summary_ckeditor">{!! $quas->quality_detail !!}</textarea>    
                        </fieldset>
                    </div>
                    <div class="card-footer" align="right">
                        <a href="{{url('back_obt/quality')}}" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</a>
                        <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>            
                    </div>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            height: 200,
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        </script>

@endsection

