<!-- <!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿詳細</title>
     {{-- Bootstrap --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     {{-- Google Fonts --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
    
     <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
    </head>
 
 <body>
    <div class="wrapper">
     <header>
         <nav class="navbar navbar-light bg-light">
         <div class="container">
             <a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ</a>
 
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                         @csrf
                     </form>
                 </li>
             </ul>
</div>
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
                 <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary d-block me-1">編集</a>
                 <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-outline-danger">削除</button>
                 </form>
</div>
             @endif
</div>
</div>
         </article>
     </main>
 
     <footer class="d-flex jystify-content-center align-items-center bg-light">
         <p class="text-muted small mb-0">&copy; 投稿アプリ All rights reserved.</p>
     </footer>
</div>
     {{-- Bootstrap --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 </body>
 
 </html> -->

 @extends('layouts.app')
 
 @section('title', '投稿詳細')
 
 @section('content')
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
                 <p class="card-text">{{ $post->updated_at }}</p>
 
                 @if ($post->user_id === Auth::id())
                     <div class="d-flex">
                         <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary d-block me-1">編集</a>
 
                         <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-outline-danger">削除</button>
                         </form>
                     </div>
                 @endif
             </div>
         </div>
     </article>
 @endsection