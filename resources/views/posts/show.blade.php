<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿詳細</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <a href="{{ route('posts.index') }}">投稿アプリ</a>

                <ul>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="container">
                <h1 class="fs-2 my-3">投稿詳細</h1>

                @if (session('flash_message'))
                    <p class="text-success">{{ session('flash_message') }}</p>
                @endif

                <div class="mb-2">
                    <a href="{{ route('posts.index') }}" class="text-decoration-none">&lt; 戻る</a>
                </div>

                <article>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title fs-5">{{ $post->title }}</h2>
                            <p class="card-text">{{ $post->content }}</p>

                            @if ($post->user_id === Auth::id())
                                <div class="d-flex">
                                    <a href="{{ route('posts.edit', $post) }}"
                                        class="btn btn-outline-primary d-block me-1">編集</a>

                                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                        onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">削除</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            </div>
        </main>

        <footer>
            <p>&copy; 投稿アプリ All rights reserved.</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
