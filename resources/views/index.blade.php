<html>
<head>
  <title>CSS Gallery</title>
  <link href="/css/index.css" rel="stylesheet">
  <script type="text/javascript" src="/js/index.js"></script>
</head>
<body>
  <p class="heading">Photo Gallery</p>

  <!-- list album -->
  <div class="gallery-image">
    @php $cnt = 0; @endphp
    @foreach($albums as $album) <!-- each album -->
    <div class="img-box">
      <a href="/albums/{{ $album->id }}">
        <img src="{{ $album->avatar }}" alt="" />
        <div class="transparent-box">
          <div class="caption">
            <p>{{ $album->album_name }}</p>
            <p class="opacity-low"> {{ $counts[$cnt] }} images</p> <!-- number of images in album -->
          </div>
        </div>
      </a>

      <!-- Form DELETE -->
      <form method="POST" action="{{ url('albums/'.$album->id) }}">
        @csrf
        @method("DELETE")
        <button class="close" type="submit" >×</button> 
      </form>

    </div>
    @php $cnt++; @endphp
    @endforeach
  </div>

  <!-- button create new album -->
  <button class="button" onclick="click_add_button()">+</button>

  <!-- Form CREATE NEW MODEL -->
  <form id="add-album" style="display: none;" action="/albums" method="POST">
    @csrf
    <br />
    Avatar: <input type="text" name="avatar"><br />
    Name  : <input type="text" name="name">
    <input type="submit" value="CREATE" id="submit-album">
    <br /><br />
  </form>

</body>
</html>