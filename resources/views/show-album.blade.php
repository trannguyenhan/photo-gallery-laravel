<!DOCTYPE html>
<html>
<head>
	<link href="/css/photo.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<div class="logout">
  <a href="/albums">Quay lại</a>
</div>
<div class="header">
  <h1>{{ $album->album_name }}</h1>
  <p>The album consists of {{ $number_of_album }} images</p>
  <button class="button">+</button>
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    @foreach($column_1 as $c)
      <img src="{{ $c->link }}" style="width:100%">
    @endforeach
  </div>

  <div class="column">
    @foreach($column_2 as $c)
      <img src="{{ $c->link }}" style="width:100%">
    @endforeach
  </div>

  <div class="column">
    @foreach($column_3 as $c)
      <img src="{{ $c->link }}" style="width:100%">
    @endforeach
  </div>

  <div class="column">
    @foreach($column_4 as $c)
      <img src="{{ $c->link }}" style="width:100%">
    @endforeach
  </div>  
</div>
</body>
</html>
