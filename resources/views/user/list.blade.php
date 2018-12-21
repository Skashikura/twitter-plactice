@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php //@FIXME ユーザーデータの存在チェック ?>
            @if(empty($users))

            <p>ユーザーがありません</p>

            @else

            <div class="card">
                <div class="card-header">ユーザ一覧</div>

                <?php //@FIXME ユーザーデータを表示 ?>
                @foreach($users as $user)

                <?php //dd($user); ?>
                    <div class="card-body">
                        <?php //@FIXME ユーザー名を表示 ?>
                        {{ $user->name }}


                        <div style="float:right">


                                <?php //@FIXME 未フォロー時の表示 ?>

                                @if( !in_array( $user->id,$follow_id_list ) )

                                {!! Form::open(['id' => 'formTweet', 'url' => 'users/follow/', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::hidden('followId', $user->id, ['id' => 'followId'])}}
                                    <button type="submit" class="btn btn-light">
                                        {{ __('フォローする') }}
                                    </button>
                                    {{ Form::close() }}

                                @else

                                <?php //@FIXME フォロー中の表示 ?>
                                {!! Form::open(['id' => 'formTweet', 'url' => 'users/unfollow/', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::hidden('unfollowId', $user->id, ['id' => 'unfollowId'])}}
                                    <button type="submit" class="btn btn-light">
                                        {{ __('フォロー中') }}
                                    </button>
                                @endif
                                <?php //dd($user->follows->follow_id) ?>
                        </div>

                    </div>
                    <hr>
                    @endforeach
                    @endif




                <?php //@FIXME ページングを表示 ?>

            </div>
        </div>
    </div>
</div>

@endsection
