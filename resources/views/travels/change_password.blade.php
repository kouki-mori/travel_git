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
    <title>Travel_record パスワード変更画面</title>
</head>

<body>
    @include('travels.header2')


    <div class="login-body" style="padding-top: 100px;">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="login-box">
            <form action="{{ route('change_password') }}" method="post" class="login-form">
                @csrf
                <div class="login-h-box">
                    <div class="login-h-border"></div>
                    <h3 class="login-h3">パスワード変更</h3>
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}" autocomplete="current-password">
                    <button style="margin-top: 5px; width: 5rem; height: 30px; line-height: 1;" class="btn btn-secondary" id="btn_passview">表示</button>

                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">新しいパスワード</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" value="{{ old('new_password') }}" autocomplete="new_password">
                    <button style="margin-top: 5px; width: 5rem; height: 30px; line-height: 1;" class="btn btn-secondary" id="btn_new_passview">表示</button>

                    @error('new_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">パスワードを変更</button>
            </form>
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


            btn_new_passview.addEventListener("click", (e) => {
            e.preventDefault();

            // Toggle password input visibility for the new password field
            if (new_password.type === 'password') {
                new_password.type = 'text';
                btn_new_passview.textContent = '非表示';
            } else {
                new_password.type = 'password';
                btn_new_passview.textContent = '表示';
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