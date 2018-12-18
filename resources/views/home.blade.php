@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>

                <?php //@FIXME ツイートを一覧で表示 ?>
                    <div class="card-body">
                        <?php //@FIXME ツイートを表示 ?>

                        <br>
                        <div style="display:flex; justify-content: left;align-items: center;">
                            <div style="float:left">
                                <?php //@FIXME ツイートした人の名前と時間を表示 ?>
                            </div>

                            <?php //@FIXME Favはマウスオーバーでアニメーションするだけの状態 ?>
                            <div style="float:left" class="heart"></div>
                        </div>
                    </div>

                    <hr style="margin-top:0px; margin-bottom:0px">
            </div>

            <?php //{{ $tweets->links() }} ?>
        </div>
    </div>
</div>
@endsection
