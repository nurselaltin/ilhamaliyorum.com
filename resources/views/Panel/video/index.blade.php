@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span> </span>
            </h6>
        </div>
        @if(!isset($videos))
            <div class="card-body col-md-offset-3">
                <div class=" col-md-6 alert alert-danger">
                    <span>Hiç video öneriniz bulunmamaktadır.Eklemek için <a href="#">tıklayınız</a></span>
                </div>
            </div>
            @else
               <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Video</th>
                            <th>Kategori</th>
                            <th>Video Başlık</th>
                            <th>Açıklama</th>
                            <th>Eklenme Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td><iframe width="250" height="200" src="https://www.youtube.com/embed/kJoeCNIrlKQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                                    </iframe></td>
                                <td>{{$video->category}}</td>
                                <td id="title">{{$video->title}}</td>
                                <td>{{$video->description}}</td>
                                <td>{{$video->created_at->diffForHumans()}}</td>
                                <td>{{$video->updated_at->diffForHumans()}}</td>
                                <td>
                                    <input  class="switch" type="checkbox"  @if($video->is_active == 1) checked @endif  data-on="Aktif"   video-id="{{$video->id}}"  data-off="Pasif"  data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-class="fast">
                                </td>
                                <td>
                                    <a target="_blank" href=""  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('edit.video',$video->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

    </div>
    <div class="modal" id="removeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      $(function () {
          $('.switch').change(function () {
              id=$(this)[0].getAttribute('video-id');
              isActive = $(this).prop('checked');
              $.get('{{route('switch.video')}}',{id:id,isActive:isActive},function (data) {
                  console.log(data);
              });
          });

          $('.remove-click').click(function () {
               $('#removeModal').modal();

          });
      })
    </script>
@endsection
