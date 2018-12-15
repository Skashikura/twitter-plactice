@extends('layouts.app')

@section('content')


    <div class="">
        <div class="">
            <div class="">
                <div class="" style="width:100%; text-align:center;">
                  <h1 style="
                  margin:0 auto;
                  background-color: rgba(0,0,0,0.3);
                  width: 300px;
                  display: inline-block;

                  ">
                    Logged in !!
                  </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header" style="border:solid 1px #dee2e6;">ユーザ一覧</div>

                <a class="btn btn-primary" style="width:100px;margin:5px" href="{{ url('/users/create') }}" role="button">新規追加</a>

                <table class="table"  style="border:solid 1px #dee2e6;">
                    <thead class="thead-dark">
                      <tr style="border:solid 1px #dee2e6;">
                        <th scope="col" style="border:solid 1px #dee2e6;">ID</th>
                        <th scope="col" style="border:solid 1px #dee2e6;">名前</th>
                        <th scope="col" style="border:solid 1px #dee2e6;">メール</th>
                        <th scope="col" style="border:solid 1px #dee2e6;">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a class="btn btn-primary" href="/users/edit/{{ $item->id }}" role="button">修正</a>
                                    <button type="button" data-id="{{ $item->id }}" class="btn btn-secondary delButton">削除</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="delForm" action="/users/delete" method="post">
        <input id="del_id" name="delId" type="hidden" value="">
        @csrf
    </form>

    <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

    <script>
        $(function(){
            $(".delButton").click(function() {

                //確認ダイアログを表示する
                if (confirm("本当に削除してよろしいですか？")) {
                    $("#del_id").val($(this).data().id);
                    $("#delForm").submit();
                } else {

                }
                //alert( "Handler for .click() called." );
            });
        });
    </script>
@endsection
