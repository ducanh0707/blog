@extends('V_backend.index')
@section('content')
<div class="content-wrapper"  style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{asset('admin/dashboard')}}" class="btn btn-primary btn-sm">Quay lại</a>
       
      <h3>Sửa thông tin website</h3>
      @include('V_backend/alert')
    </section>

    <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
               @include('Theme::inc_menu')
            </div>
            
            <div class="col-md-10">
               <form action="{{asset('admin/theme/style')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{-- mau sac   --}}
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Cài đặt màu sắc
                        </div>
                     </div>
                     <div class="box-body">
                        {{-- mau nen  --}}
                        <div class="form-group row">
                           <div class="col-md-3">
                              <label><i class="fa fa-palette"></i> Màu nền 1</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->bg_color}}" id="bg_color_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('bg_color')" value="{{$theme->bg_color}}" id="bg_color" class="form-control" name="bg_color" autocomplete="off"/>
                              </div>
                              <script>
                                 $('#bg_color').colorpicker();
                              </script>
                           </div>
                           <div class="col-md-6">
                              <label> Màu nền dạng chuyển màu (gradient)</label>
                              <div class="row">
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->bg_color_1}}" id="bg_color_1_review"> </div>
                                       </div>
                                       <input type="text"  onchange="changecolor('bg_color_1')" value="{{$theme->bg_color_1}}" id="bg_color_1" class="form-control" name="bg_color_1" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#bg_color_1').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->bg_color_2}}" id="bg_color_2_review"> </div>
                                       </div>
                                       <input type="text" onchange="changecolor('bg_color_2')" value="{{$theme->bg_color_2}}" id="bg_color_2" class="form-control" name="bg_color_2" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#bg_color_2').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-2">
                                    <div style="height:30px; background-image: linear-gradient(to bottom right, {{$theme->bg_color_1}}, {{$theme->bg_color_2}})" id="bg_color_gradient_review"> </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <label> Màu nền 3</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->bg_color_3}}" id="bg_color_3_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('bg_color_3')" value="{{$theme->bg_color_3}}" id="bg_color_3" class="form-control" name="bg_color_3" autocomplete="off"/>
                              </div>
                              <script>
                                    $('#bg_color_3').colorpicker();
                              </script>
                           </div>
                        </div>
                        {{-- mau tieu de  --}}
                        <div class="form-group row mt-4">
                           <div class="col-md-3">
                              <label><i class="fa fa-heading"></i> Màu tiêu đề 1</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->title_color}}" id="title_color_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('title_color')" value="{{$theme->title_color}}" id="title_color" class="form-control" name="title_color" autocomplete="off"/>
                              </div>
                              <script>
                                 $('#title_color').colorpicker();
                              </script>
                           </div>
                           <div class="col-md-6">
                              <label> Màu tiêu đề dạng chuyển màu (gradient)</label>
                              <div class="row">
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->title_color_1}}" id="title_color_1_review"> </div>
                                       </div>
                                       <input type="text"  onchange="changecolor('title_color_1')" value="{{$theme->title_color_1}}" id="title_color_1" class="form-control" name="title_color_1" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#title_color_1').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->title_color_2}}" id="title_color_2_review"> </div>
                                       </div>
                                       <input type="text" onchange="changecolor('title_color_2')" value="{{$theme->title_color_2}}" id="title_color_2" class="form-control" name="title_color_2" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#title_color_2').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-2">
                                    <div style="height:30px; background-image: linear-gradient(to bottom right, {{$theme->title_color_1}}, {{$theme->title_color_2}})" id="title_color_gradient_review"> </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <label> Màu tiêu đề 3</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->title_color_3}}" id="title_color_3_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('title_color_3')" value="{{$theme->title_color_3}}" id="title_color_3" class="form-control" name="title_color_3" autocomplete="off"/>
                              </div>
                              <script>
                                    $('#title_color_3').colorpicker();
                              </script>
                           </div>
                        </div>
                        {{-- mau but bam  --}}
                        <div class="form-group row">
                           <div class="col-md-3">
                              <label><i class="fas fa-mouse"></i> Màu nền bút bấm 1</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->button_color}}" id="button_color_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('button_color')" value="{{$theme->button_color}}" id="button_color" class="form-control" name="button_color" autocomplete="off"/>
                              </div>
                              <script>
                                 $('#button_color').colorpicker();
                              </script>
                           </div>
                           <div class="col-md-6">
                              <label> Màu nền bút bấm dạng chuyển màu (gradient)</label>
                              <div class="row">
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->button_color_1}}" id="button_color_1_review"> </div>
                                       </div>
                                       <input type="text"  onchange="changecolor('button_color_1')" value="{{$theme->button_color_1}}" id="button_color_1" class="form-control" name="button_color_1" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#button_color_1').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->button_color_2}}" id="button_color_2_review"> </div>
                                       </div>
                                       <input type="text" onchange="changecolor('button_color_2')" value="{{$theme->button_color_2}}" id="button_color_2" class="form-control" name="button_color_2" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#button_color_2').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-2">
                                    <div style="height:30px; background-image: linear-gradient(to bottom right, {{$theme->button_color_1}}, {{$theme->button_color_2}})" id="button_color_gradient_review"> </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <label> Màu chữ bút bấm 3</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->button_color_3}}" id="button_color_3_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('button_color_3')" value="{{$theme->button_color_3}}" id="button_color_3" class="form-control" name="button_color_3" autocomplete="off"/>
                              </div>
                              <script>
                                    $('#button_color_3').colorpicker();
                              </script>
                           </div>
                        </div>
                        {{-- duong vien  --}}
                        <div class="form-group row">
                           <div class="col-md-3">
                              <label><i class="fa fa-vector-square"></i> Màu đường viền 1</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->border_color}}" id="border_color_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('border_color')" value="{{$theme->border_color}}" id="border_color" class="form-control" name="border_color" autocomplete="off"/>
                              </div>
                              <script>
                                 $('#border_color').colorpicker();
                              </script>
                           </div>
                           <div class="col-md-6">
                              <label> Màu đường viền dạng chuyển màu (gradient)</label>
                              <div class="row">
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->border_color_1}}" id="border_color_1_review"> </div>
                                       </div>
                                       <input type="text"  onchange="changecolor('border_color_1')" value="{{$theme->border_color_1}}" id="border_color_1" class="form-control" name="border_color_1" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#border_color_1').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-5">
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                       <div class="input-group-text" style="background-color:{{$theme->border_color_2}}" id="border_color_2_review"> </div>
                                       </div>
                                       <input type="text" onchange="changecolor('border_color_2')" value="{{$theme->border_color_2}}" id="border_color_2" class="form-control" name="border_color_2" autocomplete="off"/>
                                    </div>
                                    <script>
                                       $('#border_color_2').colorpicker();
                                    </script>
                                 </div>
                                 <div class="col-2">
                                    <div style="height:30px; background-image: linear-gradient(to bottom right, {{$theme->border_color_1}}, {{$theme->border_color_2}})" id="border_color_gradient_review"> </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <label> Màu đường viền 3</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                 <div class="input-group-text" style="background-color:{{$theme->border_color_3}}" id="border_color_3_review"> </div>
                                 </div>
                                 <input type="text"  onchange="changecolor('border_color_3')" value="{{$theme->border_color_3}}" id="border_color_3" class="form-control" name="border_color_3" autocomplete="off"/>
                              </div>
                              <script>
                                    $('#border_color_3').colorpicker();
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- font chu  --}}
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Cài đặt kích thước chữ
                        </div>
                     </div>
                     <div class="box-body">
                        {{-- the h  --}}
                        <div class="form-group row">
                           <div class="col-md-2">
                              <label><i class="fa fa-heading"></i> Tiêu đề h1</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h1}}" class="form-control" name="h1" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <label>Tiêu đề h2</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h2}}" class="form-control" name="h2" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <label>Tiêu đề h3</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h2}}" class="form-control" name="h3" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <label>Tiêu đề h4</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h4}}" class="form-control" name="h4" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <label>Tiêu đề h5</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h5}}" class="form-control" name="h5" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <label>Tiêu đề h6</label>
                              <div class="input-group">
                                 <input type="number" value="{{$theme->h6}}" class="form-control" name="h6" >
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">pixel </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                           {{-- kich thuoc chu khac  --}}
                           <div class="form-group row">
                              <div class="col-md-3">
                                 <label><i class="fa fa-text-height"></i> Văn bản</label>
                                 <div class="input-group">
                                    <input type="number" value="{{$theme->text_font}}" class="form-control" name="text_font" >
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">pixel </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <label>Nút bấm</label>
                                 <div class="input-group">
                                    <input type="number" value="{{$theme->button_font}}" class="form-control" name="button_font" >
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">pixel </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <label>Mô tả</label>
                                 <div class="input-group">
                                    <input type="number" value="{{$theme->des_font}}" class="form-control" name="des_font" >
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">pixel </div>
                                    </div>
                                 </div>
                              </div>
                           
                           </div>
                     </div>
                  </div>
                  {{-- font chu  --}}
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Cài đặt font chữ
                        </div>
                     </div>
                     <div class="box-body">
                        <?php
                        $family =  array_slice(scandir('style/font'), 2); 
                     ?>
                           {{-- kich thuoc chu khac  --}}
                           <div class="form-group row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label id="title_family_review" style="font-size:20px; font-family: {{$theme->title_family}}"><i class="fa fa-mortar-pestle"></i> Font chữ tiêu đề</label>
                                    <select name="title_family" class="form-control" onchange="FontFamily('title_family')" id="title_family">
                                       <option value="arial">Mặc định (Arial)</option>
                                       @foreach($family as $family_title_r)
                                          @php $name_f = explode('.',$family_title_r) @endphp
                                          <option value="{{$name_f[0]}}" @if($theme->title_family == $name_f[0]) selected @endif>{{$name_f[0]}}</option>
                                       @endforeach
                                    </select>

                                 </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label id="des_family_review" style="font-size:20px; font-family: {{$theme->des_family}}"> Font chữ mô tả</label>
                                    <select name="des_family" class="form-control" onchange="FontFamily('des_family')" id="des_family">
                                    <option value="arial">Mặc định (Arial)</option>
                                    @foreach($family as $family_des_r)
                                        @php $name_fd = explode('.',$family_des_r) @endphp
                                        <option value="{{$name_fd[0]}}" @if($theme->des_family == $name_fd[0]) selected @endif>{{$name_fd[0]}}</option>
                                    @endforeach
                                    </select>

                                </div>
                             </div>
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <label id="text_family_review" style="font-size:20px; font-family: {{$theme->text_family}}"> Font chữ văn bản</label>
                                        <select name="text_family" class="form-control" onchange="FontFamily('text_family')" id="text_family">
                                        <option value="arial">Mặc định (Arial)</option>
                                        @foreach($family as $family_text_r)
                                            @php $name_ft = explode('.',$family_text_r) @endphp
                                            <option value="{{$name_ft[0]}}" @if($theme->text_family == $name_ft[0]) selected @endif>{{$name_ft[0]}}</option>
                                        @endforeach
                                        </select>

                                    </div>
                              </div>
                           </div>
                     </div>
                     <style>
                        @foreach($family as $family_style_r)
                            @php $name_fs = explode('.',$family_style_r) @endphp
                            @font-face {
                                font-family: {{$name_fs[0]}};
                                src: url("{{asset('style/font/'.$family_style_r)}}");
                            }
                        @endforeach
                     </style>
                     <script>
                         function FontFamily(id){
                            var family = $('#'+id).val();
                            $('#'+id+'_review').css('font-family',family);
                         }
                     </script>
                  </div>

               
                  {{-- gui  --}}
                  <button type="submit" class="btn btn-primary">Lưu thông tin</button>
               </form>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
@endsection