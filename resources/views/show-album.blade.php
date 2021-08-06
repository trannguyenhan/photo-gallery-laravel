<!DOCTYPE html>
<html>
<head>
	<link href="/css/photo.css" rel="stylesheet">
  <script type="text/javascript" src="/js/photo.js"></script>
</head>
<body>

<!-- Header -->
<div class="logout">
  <a href="/albums">Quay lại</a>
</div>
<div class="header">
  <h1>{{ $album->album_name }}</h1>
  <p>The album consists of {{ $number_of_album }} images</p>
  <button class="button" onclick="click_add_button()">+</button>

  <!-- Form CREATE NEW MODEL -->
  <form id="add-photo" style="display: none;" action="/photos" method="POST">
    @csrf
    <br />
    Link: <input type="text" name="link"><br />
          <input type="text" value="{{ $album->id }}" name="id_album" style="display: none;"> 
    <input type="submit" value="CREATE" id="submit-photo">
    <br /><br />
  </form>

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
