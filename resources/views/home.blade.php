@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>

                <?php //@FIXME ツイートを一覧で表示
                //@foreachでTweetControllerにあるDBのtweets指定して、as tweetで単行ずつに
                //ここで操作してるのはtweetsのデータ。ユーザーデータじゃない。?>
                 <?php //dd($tweets);?>

                @foreach($tweets as $tweet)
                <?php //  {{ ここの中の -> こいつを持ってくる }} ?>
                    <div class="card-body">
                        <?php //@FIXME ツイートを表示 ?>
                        {{ $tweet->tweet }}
                        <br>
                        <div style="display:flex; justify-content: left;align-items: center;">
                            <div style="float:left">
                                <?php //@FIXME ツイートした人の名前と時間を表示
                                //ユーザーデータが欲しい時は、Auth::userを使う。authのmigrateしてれば。
                                //ユーザーネームはtweetsクラスの中に入ってないから?>
                                {{ $tweet->name }} / {{ $tweet->created_at }}
                            </div>

                            <?php //@FIXME Favはマウスオーバーでアニメーションするだけの状態 ?>
                            <div style="float:left" class="heart"></div>
                        </div>
                    </div>

                    <hr style="margin-top:0px; margin-bottom:0px">

                    @endforeach

            </div>

            <?php //{{ $tweets->links() }} ?>
        </div>
    </div>
</div>
@endsection
