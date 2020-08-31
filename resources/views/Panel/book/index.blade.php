@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span>@if($books->count()== null) 0 @else {{$books->count()}} @endif  kitap öneriniz bulundu</span>
                <a href="{{route('create.book')}}" class="btn btn-success btn-sm ml-3"><i class="fa fa-add">Yeni Ekle</i></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Kategori</th>
                        <th>Kitap Adı</th>
                        <th>Açıklama</th>
                        <th>Yazar</th>
                        <th>Eklenme Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><img src="{{$book->img_url}}" width="200"></td>
                            <td>{{$book->category}}</td>
                            <td id="title">{{$book->title}}</td>
                            <td>{{$book->description}}</td>
                            <td>{{$book->writer_fullname}}</td>
                            <td>{{$book->created_at->diffForHumans()}}</td>
                            <td>{{$book->updated_at->diffForHumans()}}</td>
                            <td>
                                <input  class="switch" type="checkbox"  @if($book->is_active == 1) checked @endif  data-on="Aktif"   book-id="{{$book->id}}"  data-off="Pasif"  data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-class="fast">
                            </td>
                            <td>
                                <a target="_blank" href=""  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('edit.book',$book->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a book-id="{{$book->id}}" book-title="{{$book->title}}"  class="btn btn-sm btn-danger text-white delete-book" title="Kitabı Sil" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('delete.book')}}" >
                    @csrf
                    <input type="hidden" id ="book-id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> SİLME İŞLEMİ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Kitap önerinizi kalıcı olarak silmek istediğinize emin misiniz?
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
              id = $(this)[0].getAttribute('book-id');
              isActive = $(this).prop('checked');
              //get metoduyla veriyi controller gönder
              $.get( "{{route('switch.book')}}",{id:id,isActive:isActive}, function( data ) {
                  console.log(data);
              });

          });
          $('.delete-book').click(function () {
              id = $(this)[0].getAttribute('book-id');
              $('#book-id').val(id);
          });
      })
    </script>
@endsection
