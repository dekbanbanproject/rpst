{{-- @extends('layouts.dash_products') --}}
@extends('layouts.dash_obt') 

@section('content')
<?php

    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d');
    use App\Http\Controllers\ConfigController;  
?>

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Appointment Table -->
                <div class="row match-height">                    
                    <div id="recent-appointments" class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">รายการบุคลากร</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            {{-- <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="hospital-book-appointment.html" target="_blank">View all</a> --}}
                                            <button type="button" class="btn btn-m btn-primary box-shadow-2 btn-min-width pull-right" data-toggle="modal" data-target="#rotateIn">เพิ่มบุคลากร <i class="ft-plus-circle ml-1"></i>&nbsp;&nbsp;
                                            {{-- <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มตำแหน่ง <i class="ft-plus-circle ml-1"></i> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">ลำดับ</th>
                                                <th class="border-top-0">ชื่อ</th>
                                                <th class="border-top-0">picture</th>
                                                <th class="border-top-0">สิทธิ์การใช้งาน</th>
                                                <th class="border-top-0">ตำแหน่ง</th>
                                                <th class="border-top-0">แผนก</th>
                                                <th class="border-top-0">วันที่</th>
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($user as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate">{{$key+1}}</td>
                                                    <td class="text-truncate">{{$u->name}}  {{$u->lname}}</td>
                                                    <td class="text-truncate p-1">
                                                        <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{$u->name}}" class="avatar avatar-sm pull-up">

                                                                <img class="avatar ml-1" src="data:image/png;base64,{{ chunk_split(base64_encode($u->img))}}" alt="Avatar" height="60" width="60">

                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="text-truncate p-1">
                                                       
                                                        <ul class="list-unstyled users-list m-0">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="ADMIN" class="avatar avatar-sm pull-up">
                                                                <label for="">{{$u->utype}}</label>
                                                            </li>
                                                            @if ($u->admin != '')
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="ADMIN" class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/admin.png') }}" alt="Avatar">
                                                                </li>
                                                            @endif
                                                            @if ($u->read != '')
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="READ" class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/read.png') }}" alt="Avatar">
                                                                </li>
                                                            @endif
                                                            @if ($u->write != '')
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="WRITE" class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/write.png') }}" alt="Avatar">
                                                                </li>
                                                            @endif
                                                            @if ($u->print != '')
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="PRINT" class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/print.png') }}" alt="Avatar">
                                                                </li> 
                                                            @endif
                                                           
                                                            <li class="avatar avatar-sm">
                                                                <span class="badge badge-info">{{ConfigController::countpermise($u->id)}} </span>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="text-truncate">{{$u->POSIT_NAME}}</td>
                                                    <td class="text-truncate">{{$u->departs_name}}</td>
                                                    <td class="text-truncate">{{Datethai($u->updated_at)}}</td>
                                                    {{-- <td class="text-padding">
                                                        <div class="float-left"> 
                                                            @if($u->status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u->id }}" name="{{ $u->id }}" data-color="info" onchange="switchprofile({{ $u->id }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u->id }}" name="{{ $u->id }}" data-color="info" onchange="switchprofile({{ $u->id }});" >
                                                            @endif
                                                        </div>
                                                    </td>   --}}
                                                    <td>
                                                        {{-- <a href="" data-toggle="modal" data-target="#rotateInDownLeft{{$u->id}}"><i class="la la-key font-large-1" style="color:rgb(233, 7, 7)"></i></a>&nbsp;&nbsp; --}}
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->id}}"> <i class="la la-gear font-large-1" style="color:rgb(23, 175, 245)"></i></a>&nbsp;&nbsp;
                                                        <a href="" data-toggle="modal" data-target="#rotateInedit{{$u->id}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>&nbsp;&nbsp;
                                                        <a href="{{url('setting/profile_delete/'.$u->id)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                        {{-- <button type="button" href="" class="btn btn-sm btn-info btn-glow round px-2" data-toggle="modal" data-target="#rotateInDownRight{{$u->id}}"><i class="ft-settings"></i></button> --}}
                                                    </td>                                                  
                                                </tr>

                                                 <!-- Modal Right Config Permise-->
                                                <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel66" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info ">
                                                                <h4 class="modal-title text-white" id="myModalLabel66">Config Permise &nbsp;&nbsp;=>&nbsp;&nbsp; {{$u->name}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                    <form action="{{ route('per.profile_permiss_update') }}" method="post">
                                                        @csrf 

                                                        <input type="hidden" id="id_update" name="id_update" value="{{$u->id}}">

                                                            <div class="modal-body">                                                               
                                                                <div class="row">                                                                    
                                                                    <div class="col-sm-3">
                                                                        <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/admin.png') }}" alt="Avatar" width="60" height="60"><br><br>
                                                                        <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            @if ($u->admin == '')
                                                                                <input type="checkbox" class="form-check-input" id="admin" name="admin" >
                                                                            @else
                                                                                <input type="checkbox" class="form-check-input" id="admin" name="admin" checked>                                                                               
                                                                            @endif      
                                                                          
                                                                        </div>
                                                                    </div>
                                                                                                                               
                                                                {{-- <div class="row">   --}}
                                                  
                                                                    <div class="col-sm-3">
                                                                        <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/read.png') }}" alt="Avatar"  width="60" height="60"><br><br>
                                                                        <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            @if ($u->read == '')
                                                                            <input type="checkbox" class="form-check-input" id="read" name="read" >
                                                                            @else
                                                                            <input type="checkbox" class="form-check-input" id="read" name="read" checked>
                                                                            @endif                                                                           
                                                                        
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/write.png') }}" alt="Avatar"  width="60" height="60"><br><br>
                                                                        <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            @if ($u->write == '')
                                                                            <input type="checkbox" class="form-check-input" id="write" name="write" >
                                                                            @else
                                                                            <input type="checkbox" class="form-check-input" id="write" name="write" checked>
                                                                            @endif  
                                                                        </div> 
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/print.png') }}" alt="Avatar"  width="60" height="60"><br><br>
                                                                        <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            @if ($u->print == '')
                                                                            <input type="checkbox" class="form-check-input" id="print" name="print" >
                                                                            @else
                                                                            <input type="checkbox" class="form-check-input" id="print" name="print" checked>
                                                                            @endif
                                                                        </div> 
                                                                    </div>
                                                                </div>   
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
                                                            </div>
                                                        </form>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Left Change Password-->
                                                <div class="modal animated rotateInDownLeft text-left" id="rotateInDownLeft{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel65" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger ">
                                                                <h4 class="modal-title text-white" id="myModalLabel65">Change Password &nbsp;&nbsp;=>&nbsp;&nbsp; {{$u->name}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <form action="{{ route('changpassword') }}" method="post">
                                                        @csrf 
                                                        <input type="hidden" id="id_update" name="id_update" value="{{$u->id}}">
                                                            <div class="modal-body">
                                                                <label>New Password: </label>
                                                                <div class="form-group position-relative has-icon-left">
                                                                    <input type="text" placeholder="New Password" class="form-control" id="password" name="password" required>
                                                                    <div class="form-control-position">
                                                                        <i class="la la-key font-large-1 line-height-1 text-muted icon-align"></i>
                                                                    </div>
                                                                </div>       
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal animated rotateInDownRight text-left" id="rotateInedit{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning ">
                                                                <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูล</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <form action="{{ route('per.profile_update') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf 
                                                        <input type="hidden" id="id_update" name="id_update" value="{{$u->id}}">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group col-3 mb-2">
                                                                        <div class="form-group">
                                                                            @if ($u->img == '')
                                                                            <img src="{{ asset('img/logo/logod.png') }}" id="" alt="Image" class="img-thumbnail" style="height:250px; width:250px;">
                                                                        @else
                                                                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($u->img))}}" id="edit_preview" alt="Image" class="img-thumbnail" style="height:250px; width:250px;">
                                                                        @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="ediURL(this)" >
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                                                        </div>                                           
                                                                    </div>
                                                                    <div class="form-group col-9 mb-2">                                                
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label>ชื่อ: </label>
                                                                                <div class="form-group position-relative has-icon-left">
                                                                                    <input type="text" placeholder="ชื่อ" class="form-control" id="name" name="name" value="{{$u->name}}" required>
                                                                                    <div class="form-control-position">
                                                                                        <i class="la la-user font-large-0 line-height-1 text-muted icon-align"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>นามสกุล: </label>
                                                                                <div class="form-group position-relative has-icon-left">
                                                                                    <input type="text" placeholder="นามสกุล" class="form-control" id="lname" name="lname" value="{{$u->lname}}" required>                                                       
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            <label>Tel: </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="" class="form-control" id="cid" name="cid" value="{{$u->cid}}">
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-phone-square font-large-0 line-height-1 text-muted icon-align"></i>
                                                                                </div>
                                                                            </div>   
                                                                       </div>
                                                                    </div>
                            
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label>Username: </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="Username" class="form-control" id="Username" name="username" value="{{$u->username}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-user font-large-0 line-height-1 text-muted icon-align"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label>Password: </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="password" placeholder="Password" class="form-control" id="Password" name="password" value="{{$u->password}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-key font-large-0 line-height-1 text-muted icon-align"></i>
                                                                                </div>
                                                                            </div>   
                                                                        </div>

                                                                       
                                                                        <div class="col-md-4">                                           
                                                                            <label>ตำแหน่ง: </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <select class="form-control" id="position" name="position" required>
                                                                                    <option value="">--กรุณาเลือก--</option>
                                                                                    @foreach ($posits as $p)
                                                                                    @if ($u->position == $p->POSIT_ID)
                                                                                    <option value="{{$p->POSIT_ID}}" selected>{{$p->POSIT_NAME}}</option>
                                                                                    @else
                                                                                    <option value="{{$p->POSIT_ID}}">{{$p->POSIT_NAME}}</option>
                                                                                    @endif
                                                                                      
                                                                                    @endforeach
                                                                            </select>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-shield font-large-0 line-height-1 text-muted icon-align"></i>
                                                                                </div>
                                                                            </div>                                         
                                                                        </div>      
                                                                    </div>  
                                                                  
                                                              <div class="row">  
                                                                <div class="col-md-4">                                           
                                                                    <label>แผนก: </label>
                                                                    <div class="form-group dep-relative has-icon-left">
                                                                        <select class="form-control" id="dep" name="dep" required>
                                                                            <option value="">--กรุณาเลือก--</option>
                                                                            @foreach ($deps as $d)
                                                                            @if ($u->dep == $d->departs_id)
                                                                            <option value="{{$d->departs_id}}" selected>{{$d->departs_name}}</option>
                                                                            @else
                                                                            <option value="{{$d->departs_id}}">{{$d->departs_name}}</option>
                                                                            @endif
                                                                              
                                                                            @endforeach
                                                                    </select>
                                                                        <div class="form-control-position">
                                                                            <i class="la la-shield font-large-0 line-height-1 text-muted icon-align"></i>
                                                                        </div>
                                                                    </div>                                         
                                                                </div>      
                                                                <div class="col-md-8">
                                                                    <label>Line Token: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" placeholder="" class="form-control" id="linetoken" name="linetoken" value="{{$u->linetoken}}">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-comment font-large-0 line-height-1 text-muted icon-align"></i>
                                                                        </div>
                                                                    </div>                                
                                                                </div>
                                                            </div>    
                                                            <br>  
                                                            <div class="row">  
                                                                <div class="form-group col-sm-2 mb-2">
                                                                    
                                                                </div> 
                                                                <div class="form-group col-sm-2 mb-2">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/admin.png') }}" alt="Avatar" width="40" height="40"><br><br>
                                                                    {{-- <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                     
                                                                            <input type="checkbox" class="form-check-input" id="admin" name="admin" >                                                       
                                                                    </div> --}}
                                                                    @if ($u->admin == '')
                                                                    <input type="checkbox" class="form-check-input" id="admin" name="admin" >
                                                                    @else
                                                                        <input type="checkbox" class="form-check-input" id="admin" name="admin" checked>                                                                               
                                                                    @endif  
                                                                </div>                              
                                                                <div class="form-group col-sm-2 mb-2">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/read.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                                                    {{-- <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                      
                                                                        <input type="checkbox" class="form-check-input" id="read" name="read" >                                                      
                                                                    </div>  --}}
                                                                    @if ($u->read == '')
                                                                    <input type="checkbox" class="form-check-input" id="read" name="read" >
                                                                    @else
                                                                    <input type="checkbox" class="form-check-input" id="read" name="read" checked>
                                                                    @endif 
                                                                </div>
                                                                <div class="form-group col-sm-2 mb-2">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/write.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                                                    {{-- <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <input type="checkbox" class="form-check-input" id="write" name="write" >
                                                                        </div>  --}}
                                                                        @if ($u->write == '')
                                                                        <input type="checkbox" class="form-check-input" id="write" name="write" >
                                                                        @else
                                                                        <input type="checkbox" class="form-check-input" id="write" name="write" checked>
                                                                        @endif  
                                                                </div>
                                                                <div class="form-group col-sm-2 mb-2">
                                                                    <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/print.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                                                    {{-- <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <input type="checkbox" class="form-check-input" id="print" name="print" >
                                                                    </div>  --}}
                                                                    @if ($u->print == '')
                                                                    <input type="checkbox" class="form-check-input" id="print" name="print" >
                                                                    @else
                                                                    <input type="checkbox" class="form-check-input" id="print" name="print" checked>
                                                                    @endif
                                                                </div>
                                                            </div>        
                                                        </div>
                                                    </div>
                                                    <hr>
                                                            <div class="modal-footer">
                                                                {{-- <button type="reset" class="btn grey btn-outline-danger" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                <button type="submit" class="btn btn-outline-info"><i class="ft-save mr-1"></i>Save changes</button> --}}
                                                                <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>


                                           @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Appointment Table Ends -->

            </div>
        </div>
    </div>
  </div>
  <!-- END: Content-->


                    <!-- Modal เพิ่มข้อมูลบุคลากร-->
                    <div class="modal animated rotateInDownLeft text-left" id="rotateIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success ">
                                    <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูล</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <form action="{{ route('per.profile_save') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <input type="hidden" id="id_update" name="id_update" value="{{$u->id}}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-3 mb-2">
                                            <div class="form-group">
                                                <img src="{{ asset('app-assets/images/portrait/small/default.jpg')}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:250px; width:250px;">
                                            </div>
                                            <div class="form-group">
                                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="addURL(this)" >
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                            </div>                                           
                                        </div>
                                       
                                        <div class="form-group col-9 mb-2">                                                
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>ชื่อ: </label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" placeholder="ชื่อ" class="form-control" id="name" name="name" required>
                                                        <div class="form-control-position">
                                                            <i class="la la-user font-large-0 line-height-1 text-muted icon-align"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>นามสกุล: </label>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" placeholder="นามสกุล" class="form-control" id="lname" name="lname" required>                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                <label>Tel: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" placeholder="" class="form-control" id="cid" name="cid" >
                                                    <div class="form-control-position">
                                                        <i class="la la-phone-square font-large-0 line-height-1 text-muted icon-align"></i>
                                                    </div>
                                                </div>   
                                           </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Username: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" placeholder="Username" class="form-control" id="Username" name="username" required>
                                                    <div class="form-control-position">
                                                        <i class="la la-user font-large-0 line-height-1 text-muted icon-align"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Password: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="password" placeholder="Password" class="form-control" id="Password" name="password" required>
                                                    <div class="form-control-position">
                                                        <i class="la la-key font-large-0 line-height-1 text-muted icon-align"></i>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="form-group col-4 mb-2">                                           
                                                <label>ตำแหน่ง: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <select class="form-control" id="position" name="position" required>
                                                        <option value="">--กรุณาเลือก--</option>
                                                        @foreach ($posits as $p)
                                                            <option value="{{$p->POSIT_ID}}">{{$p->POSIT_NAME}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-position">
                                                        <i class="la la-shield font-large-0 line-height-1 text-muted icon-align"></i>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>                                                                                  
                                
                                    <div class="row">   
                                        <div class="col-md-4">                                           
                                            <label>แผนก: </label>
                                            <div class="form-group dep-relative has-icon-left">
                                                <select class="form-control" id="dep" name="dep" required>
                                                    <option value="">--กรุณาเลือก--</option>
                                                    @foreach ($deps as $d)                                                       
                                                    <option value="{{$d->departs_id}}">{{$d->departs_name}}</option>                                                                                                                 
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-shield font-large-0 line-height-1 text-muted icon-align"></i>
                                                </div>
                                            </div>                                         
                                        </div>  

                                        <div class="col-md-8">
                                            <label>Line Token: </label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" placeholder="" class="form-control" id="linetoken" name="linetoken" >
                                                <div class="form-control-position">
                                                    <i class="la la-comment font-large-0 line-height-1 text-muted icon-align"></i>
                                                </div>
                                            </div>                                
                                        </div>
                                    </div>  
                                 
                                        <br>  
                                        
                                        

                                    <div class="row"> 
                                        <div class="form-group col-sm-2 mb-2">
                                                                    
                                        </div>
                                        <div class="form-group col-sm-2 mb-2">
                                            <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/admin.png') }}" alt="Avatar" width="40" height="40"><br><br>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                     
                                                    <input type="checkbox" class="form-check-input" id="admin" name="admin" >                                                       
                                            </div>
                                        </div>                              
                                        <div class="form-group col-sm-2 mb-2">
                                            <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/read.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                      
                                                <input type="checkbox" class="form-check-input" id="read" name="read" >                                                      
                                            </div>                                                                        
                                        </div>
                                        <div class="form-group col-sm-2 mb-2">
                                            <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/write.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" class="form-check-input" id="write" name="write" >
                                                </div> 
                                        </div>
                                        <div class="form-group col-sm-2 mb-2">
                                            <img class="media-object rounded-circle" src="{{ asset('app-assets/images/permise/print.png') }}" alt="Avatar"  width="40" height="40"><br><br>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" class="form-check-input" id="print" name="print" >
                                            </div> 
                                        </div>
                                    </div>        
                                </div>
                            </div>
                            <hr>
                                <div class="modal-footer">
                                    {{-- <button type="reset" class="btn grey btn-outline-danger" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                    <button type="submit" class="btn btn-outline-info"><i class="ft-save mr-1"></i>Save changes</button> --}}
                                    <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                    <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/vendors/js/material-vendors.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>
    

    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}"></script>
    <script>
        function switchprofile(profile){
            var checkBox=document.getElementById(profile);
            var onoff;
    
            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('per.switchactive_profile')}}",
                        method:"GET",
                        data:{onoff:onoff,profile:profile,_token:_token}
                })
             }
       </script>
    <script>
        function addURL(input) {
            var fileInput = document.getElementById('img');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#add_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
            }
</script>
<script>
    function ediURL(input) {
        var fileInput = document.getElementById('img');
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#edit_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }else{
                alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                fileInput.value = '';
                return false;
            }
        }
</script>


@endsection

