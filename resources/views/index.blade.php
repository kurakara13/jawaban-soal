<html>
  <head>
    <title>Jawaban Soal Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-4.2.1-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('vendor/bootstrap-4.2.1-dist/js/bootstrap.min.js')}}"></script>
  </head>
  <body class=" bg-light">
    <div class="container" style="margin-top:150px">
      <div class="card-columns">
        <a href="{{url('program-duplikat')}}">
          <div class="card">
            <img class="card-img-top" src="{{asset('img/duplikat.png')}}" alt="Card image">
            <div class="card-body text-center">
              <p class="card-text">Program Pencarian Duplikat</p>
            </div>
          </div>
        </a>
        <a href="{{url('program-buble-sort')}}">
          <div class="card">
            <img class="card-img-top" src="{{asset('img/bubble-sort.png')}}" alt="Card image">
            <div class="card-body text-center">
              <p class="card-text">Program Buble Sort</p>
            </div>
          </div>
        </a>
        <a href="{{url('bank')}}">
          <div class="card">
            <img class="card-img-top" src="{{asset('img/bank.png')}}" alt="Card image">
            <div class="card-body text-center">
              <p class="card-text">Program Bank</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </body>
</html>
