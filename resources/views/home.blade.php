<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@auth
    <p>congrate you are logged in.</p>
    <form action="/logout" method="POST">
    
        @csrf
        <button>logout</button>
    
  </form>

  <div style="border: 3px solid black;">
    <h2>Create a new POST</h2>
    <form action="/create-post" method="POST">
    @csrf
    <input type="text" name="title" placeholder="post title">
<textarea name="body" placeholder="body content..."></textarea>
<button>Save post</button>
    </form>
    </div>

    <div style="border: 3px solid black;">
<h2>All Posts</h2>
@foreach ($posts as $post)

<div style="background-color:gray; padding: 10px; margin: 10px; ">
    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
    {{$post['body']}}
<p><a href="/edit-post/{{$post->id}}"></a>Edit</p>
<form action="/delete-post/{{$post->id}}" method="post">
    @csrf
    @method('delete')
    <button>delete</button>
</form>
</div>
@endforeach
    </div>
@else
<div style="border: 3px solid black;">
    <h2>Register</h2>
<form action="/register" method="POST">
    @csrf
<input name="name" type="text" placeholder="name"></input>
<input name="email" type="text" placeholder="email">
<input name="password" type="password" placeholder="password">
<button>Register</button>
</form>
</div>
<div style="border: 3px solid black;">
    <h2>login</h2>
<form action="/login" method="POST">
    @csrf
<input name="loginname" type="text" placeholder="name"></input>
<input name="loginpassword" type="password" placeholder="password">
<button>login</button>
</form>
</div>

@endauth

</body>
</html>