<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <title>会員用メイン画面</title>
</head>

<body class="main-body" style="background-color: #F8F8FF;">
    @include('travels.header2')


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: 600px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/freestocks-_IZZKKL0uBs-unsplash.jpg" class="d-block w-100" alt="..." style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 4.25rem; opacity: 0.9; font-family: Comic Sans MS;">Travel Record</h5>
                    <p style="font-size: 30px; opacity: 0.9; font-family: Comic Sans MS;">Let's share everyone's memories.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/filiz-elaerts-MHs6pLaS5DY-unsplash.jpg" class="d-block w-100" alt="..." style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/marek-piwnicki-oSqHUw8HLYo-unsplash.jpg" class="d-block w-100" alt="..." style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="hiden" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="display: none;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="display: none;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <form action="{{ route('search') }}" method="POST" class="form-inline my-2 my-lg-0 ml-2" style="justify-content: flex-end; padding: 20px 220px 30px 0px;">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control mr-sm-2" name="search" value="" placeholder="キーワードを入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form>


    <div class="container">
        @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
        @endif

        @isset($search_result)
        <div>
            <h5 style="text-align: right; margin: 10px 60px 20px 0;" class="card-title">{{ $search_result }}</h5>
        </div>
        @endisset

        <div class="row" style="display: block;">
            @foreach($posts as $post)
            <div class="card mb-3 Larger shadow" style="max-width: 1000px; margin: auto;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img style="object-fit: cover;" src="{{ Storage::url($post->image)}}" class="bd-placeholder-img" width="100%" height="250" xmlns="" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96" /><text style="display: none;" x="50%" y="50%" fill="#dee2e6" dy=".3em">{{ $post->id  }}</text>
                        </img>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="height: 210px;">
                            <h5 class="card-title">{{ $post->theme  }}</h5>
                            <p style="display: -webkit-box; overflow: hidden; -webkit-box-orient: vertical; -webkit-line-clamp: 3;" class="card-text text-black-50">{{ $post->comment  }}</p>
                            <p class="card-text"><small class="text-muted">{{ $post->area  }} : {{ $post->address  }}</small></p>
                        </div>


                        <div style="text-align: right;text-align: right; display: flex; justify-content: flex-end; padding-right: 20px;">
                            <div style="padding-right: 25px;">
                                <button class="like-button btn btn-outline-primary" data-post-id="{{ $post->id }}">
                                    @if ($post->likedByCurrentUser())
                                    いいね解除
                                    @else
                                    いいね！
                                    @endif
                                </button>
                                <span class="like-count">{{ $post->likesCount() }} </span>
                            </div>
                            <a href="/travels/{{ $post->id }}" class="button" style="color: black;">詳細を見る >></a>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const likeButtons = document.querySelectorAll('.like-button');

                    likeButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const postId = this.getAttribute('data-post-id');


                            // いいね機能実装
                            fetch('/travels/like', {
                                    // データ送信
                                    method: 'POST',

                                    headers: {
                                        // リクエストをJSON形式で送信・csrf対策
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        post_id: postId
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    const likeCountSpan = this.nextElementSibling;
                                    likeCountSpan.textContent = data.action === 'like' ? parseInt(likeCountSpan.textContent) + 1 : parseInt(likeCountSpan.textContent) - 1;
                                    this.textContent = data.action === 'like' ? 'いいね解除' : 'いいね！';
                                })
                                .catch(error => {
                                    console.log('Error:', error);
                                });
                        });
                    });
                });
            </script>


            <div>
                <div style="margin: 30px 0px 20px 70px;">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>

