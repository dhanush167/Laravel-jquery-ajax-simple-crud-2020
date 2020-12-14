<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Laravel AJAX</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
      <a class="navbar-brand" href="#">LaravelAjax</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-right">
          @if (Auth::guest())
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
          @else
              <li class="nav-item">
                <a class="nav-link" href="/posts">Posts</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="/changePassword">Change Password</a>
             </li>
             <li class="nav-user">
                {{ Auth::user()->name }}
             </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
          @endif
        </ul>
      </div>
      </div>
    </nav>

    @yield('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/forgotPassword.js"></script>
    <script type="text/javascript" src="js/changePassword.js"></script>


    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ADD
            $('#btn-save-add-post').click(function (e) {
                var title = $('#title').val();
                var author = $('#author').val();
                var description = $('#description').val();

                if (title == "") {
                    $("[name=title]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=title]").css("border","2px solid");
                }

                if (author == "") {
                    $("[name=author]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=author]").css("border","2px solid");
                }

                if (description == "") {
                    $("[name=description]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=description]").css("border","2px solid ");
                }

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/posts",
                    data: { "title": title, "author": author, "description": description },
                    dataType: 'json',
                    success: function (data) {
                        var post = '<tr id="post' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td>><td>' + data.author + '</td><td>' + data.description + '</td>';
                        post += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                        post += '<button class="btn btn-danger delete-post" value="' + data.id + '">Delete</button></td></tr>';
                        $('#posts-list').append(post);
                        $('#postsAddModal').modal('hide');

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });


            });

            // EDIT
            $('body').on('click', '#modal-edit', function () {
                var post_id = $(this).val();

                $.get('/posts/edit/' + post_id, function (data) {

                    $('#post_id').val(data.id);
                    var title = $('#title-edit').val(data.title);
                    var author = $('#author-edit').val(data.author);
                    var description = $('#description-edit').val(data.description);
                });
            });

            // UPDATE
            $('#btn-save-update-post').click(function (e) {

                var title = $('#title-edit').val();
                var author = $('#author-edit').val();
                var description = $('#description-edit').val();
                var post_id = $('#post_id').val();

                if (title == "") {
                    $("[name=title]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=title]").css("border","2px solid");
                }

                if (author == "") {
                    $("[name=author]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=author]").css("border","2px solid");
                }

                if (description == "") {
                    $("[name=description]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=description]").css("border","2px solid ");
                }


                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/posts/update/" + post_id,
                    data: {"title": title, "author": author, "description": description },
                    dataType: 'json',
                    success: function (data) {

                        var post = '<tr id="post' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td>><td>' + data.author + '</td><td>' + data.description + '</td>';
                        post += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                        post += '<button class="btn btn-danger delete-post" value="' + data.id + '">Delete</button></td></tr>';
                        $("#post_id" + post_id).replaceWith(post);
                        $('#postsEditModal').modal('hide');

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });
            });

            // DELETE
            $('.delete-post').click(function () {
                var post_id = $(this).val();

                $.ajax({
                    type: "DELETE",
                    url: 'posts/' + post_id,
                    success: function (data) {
                        $("#post" + post_id).remove();

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });
            });



        });

    </script>


</body>
</html>

