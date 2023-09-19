<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <title>Travel_record</title>
</head>

<body>
    @include('travels.header1')

    <div class="login-body">
        <div class="login-box">
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <div class="login-h-box">
                    <div class="login-h-border"></div>
                    <h3 class="login-h3">会員ログイン</h3>
                </div>


                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="email" value="{{ old('email', $previouslyEnteredEmail) }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" autocomplete="current-password" value="{{ old('password', $previouslyEnteredPassword) }}">
                    <button style="margin-top: 5px; width: 5rem; height: 30px; line-height: 1;" class="btn btn-secondary" id="btn_passview">表示</button>

                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn-box" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
            </form>
            <a href="{{ route('register') }}" style="display: block; text-align: right; padding-top: 5px;">新規登録はこちらから</a>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {

            // (1)パスワード入力欄とボタンのHTMLを取得
            let btn_passview = document.getElementById("btn_passview");
            let input_pass = document.getElementById("password");


            let btn_new_passview = document.getElementById("btn_new_passview");
            let new_password = document.getElementById("new_password");


            // (2)ボタンのイベントリスナーを設定
            btn_passview.addEventListener("click", (e) => {

                // (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
                e.preventDefault();

                // (4)パスワード入力欄のtype属性を確認
                if (password.type === 'password') {

                    // (5)パスワードを表示する
                    password.type = 'text';
                    btn_passview.textContent = '非表示';

                } else {

                    // (6)パスワードを非表示にする
                    password.type = 'password';
                    btn_passview.textContent = '表示';
                }
            });

        });
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>


