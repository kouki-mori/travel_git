<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/post.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <title>投稿編集画面</title>
</head>

<body class="member-main-body">
    @include('travels.header2')

    <section style=" width: 100%;">
        <div class="post-form">
            <h2 style="margin-top: 25px; border-left: 7px solid; padding-left: 10px;">投稿編集</h2>
            <form action="{{ route('update') }}" method="POST" class="" onSubmit="return checkSubmit()" enctype="multipart/form-data" style="width: 100%; height: 100%; margin-top: 30px; margin-bottom: 30px; padding-bottom: 30px; border: 1px solid #C0C0C0; text-align: center;">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $post->id }}">
                <div id="post-info" class="info">
                    <div class="p-i-list">
                        <label style="width: 20%;"  for="image">画像：</label>
                        <input style="width: 300px;" type="file" id="image" name="image" value="{{ old('image', $post->image) }}" required autocomplete="image">
                    </div>
                    @if ($errors->has('image'))
                    <p id="error-msg" class="name_error" style="width: 600px; text-align: left; margin: 0 0 0 275px; color: red;">
                        {{ $errors->first('image') }}
                    </p>
                    @endif


                    <div class="p-i-list">
                        <label style="width: 20%;"  for="theme">テーマ：</label>
                        <input style="width: 60%;"  id="theme" name="theme" type="text" value="{{ old('theme', $post->theme) }}" required autocomplete="theme">
                    </div>
                    @if ($errors->has('theme'))
                    <p id="error-msg" class="name_error" style="width: 600px; text-align: left; margin: 0 0 0 275px; color: red;">
                        {{ $errors->first('theme') }}
                    </p>
                    @endif


                    <div class="p-i-list">
                        <label style="width: 20%;"  for="area">エリア：</label>
                        <p></p>
                        <select type="text" class="form-control custom-select" name="area" id="area" style="width: 30%; border: 1px solid #777777;" value="{{ old('area', $post->area) }}" required>
                            @foreach(config('pref') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('area'))
                    <p id="error-msg" class="name_error" style="width: 600px; text-align: left; margin: 0 0 0 275px; color: red;">
                        {{ $errors->first('area') }}
                    </p>
                    @endif


                    <div class="p-i-list">
                        <label style="width: 20%;"  for="address">場所の詳細：</label>
                        <p></p>
                        <input style="width: 60%;"  type="text" id="address" name="address" value="{{ old('address', $post->address) }}" required autocomplete="address">
                    </div>
                    @if ($errors->has('address'))
                    <p id="error-msg" class="name_error" style="width: 600px; text-align: left; margin: 0 0 0 275px; color: red;">
                        {{ $errors->first('address') }}
                    </p>
                    @endif


                    <div class="p-i-list">
                        <label style="width: 20%;"  for="comment">コメント：</label>
                        <p style="word-break: break-word; white-space: pre-line; overflow-wrap: anywhere;"></p>
                        <textarea id="comment" name="comment" cols="30" rows="10" style="height: 200px; width: 60%;" required autocomplete="comment">{{ old('comment', $post->comment) }}</textarea>
                    </div>
                    @if ($errors->has('comment'))
                    <p id="error-msg" class="name_error" style="width: 600px; text-align: left; margin: 0 0 0 275px; color: red;">
                        {{ $errors->first('comment') }}
                    </p>
                    @endif

                </div>
                <div class="confirm-button" style="padding-top: 30px;">
                    <a style="margin-right: 20px; width: 12%;" class="btn btn-secondary" href="{{ route('index_member') }}">キャンセル</a>
                    <button  style="margin-right: 20px; width: 12%;" class="btn btn-dark" type="submit" name="action" value="submit">更新する</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function checkSubmit() {
            if (window.confirm('更新してよろしいですか？')) {
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


