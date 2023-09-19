<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <title>会員用メイン画面</title>
</head>

<body class="detail-body">
    @include('travels.header2')

    <section>
        <div class="post-detail">
            <h2>投稿詳細画面</h2>
            <div id="detail-info" class="info">
                <div class="p-i-list">
                    <label for="image">画像：</label>
                    <p class="list-p">
                        <img src="{{ Storage::url($post->image)}}" width="400px" style="height: 400px; object-fit: contain;" >
                    </p>
                </div>

                <div class="p-i-list">
                    <label for="theme">テーマ：</label>
                    <p class="list-p">{{ $post->theme }}</p>
                </div>

                <div class="p-i-list">
                    <label for="area">エリア：</label>
                    <p class="list-p">{{ $post->area }}</p>
                </div>

                <div class="p-i-list">
                    <label for="address">場所の詳細：</label>
                    <p class="list-p">{{ $post->address }}</p>
                </div>

                <div class="p-i-list">
                    <label for="comment">コメント：</label>
                    <p style="word-break: break-word; white-space: pre-line; overflow-wrap: anywhere; width: 80%; text-align: left; padding-left: 50px;">{{ $post->comment }}</p>
                </div>

                <div class="confirm-button" style="display: flex; justify-content: center;">
                    <a class="btn btn-secondary" style="margin-right: 15px;" href="{{ route('index_member') }}">戻る</a>
                    <a class="btn btn-primary" style="margin-right: 15px;" href="/travels/edit/{{ $post->id }}" class="button">編集</a>
                    <form action="{{ route('delete', $post->id) }}" method="POST" class="" onSubmit="return checkDelete()">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script>
        function checkDelete() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>