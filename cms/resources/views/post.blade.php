<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>tagalog</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container pt-5">
        <h2 class="mb-3">新規投稿</h2>
        @include('common.errors')
        <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"></label>タイトル</label>
              <input type="text" name="post_title" class="form-control" id="exampleFormControlInput1" placeholder="タイトル">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">投稿内容</label>
              <textarea class="form-control" name="post_desc" id="exampleFormControlTextarea1" rows="25"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </div>
        </form>
        </div>
    </body>
</html>