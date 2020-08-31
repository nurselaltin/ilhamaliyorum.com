@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span>{{$blogs->count()}} yazınız bulundu</span>
                <a href="{{route('create.blog')}}" class="btn btn-success btn-sm ml-3"><i class="fa fa-add">Yeni Ekle</i></a>
            </h6>
        </div>
        @if(!isset($blogs))
            <div class="card-body col-md-offset-3">
                <div class=" col-md-6 alert alert-danger">
                    <span>Hiç yazınız bulunmamaktadır.Eklemek için <a href="#">tıklayınız</a></span>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Kategori</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>Eklenme Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td><img src="{{$blog->img_url}}" width="200"></td>
                                <td>{{$blog->category}}</td>
                                <td id="title">{{$blog->title}}</td>
                                <td>{{$blog->description}}</td>
                                <td>{{$blog->created_at->diffForHumans()}}</td>
                                <td>{{$blog->updated_at->diffForHumans()}}</td>
                                <td>
                                    <input  class="switch" type="checkbox"  @if($blog->is_active == 1) checked @endif  data-on="Aktif"   blog-id="{{$blog->id}}"  data-off="Pasif"  data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-class="fast">
                                </td>
                                <td>
                                    <a target="_blank" href=""  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('edit.blog',$blog->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                    <a blog-id="{{$blog->id}}" blog-title="{{$blog->title}}"  class="btn btn-sm btn-danger text-white delete-blog" title="Yazı Sil" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('delete.blog')}}" >
                    @csrf
                    <input type="hidden" id ="blog-id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> SİLME İŞLEMİ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Yazıyı kalıcı olarak silmek istediğinize emin misiniz?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </div>
                </form>

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
              id = $(this)[0].getAttribute('blog-id');
              isActive = $(this).prop('checked');
              //get metoduyla veriyi controller gönder
              $.get( "{{route('switch.blog')}}",{id:id,isActive:isActive}, function( data ) {
                  console.log(data);
              });

          });
          $('.delete-blog').click(function () {
              id = $(this)[0].getAttribute('blog-id');
              $('#blog-id').val(id);
          });
      })
    </script>
@endsection
