<html>
  <head>
    <title>Jawaban Soal Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-4.2.1-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('vendor/bootstrap-4.2.1-dist/js/bootstrap.min.js')}}"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}" style="font-size:25px"><i class="fas fa-home"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Program Buble Sort Tanpa Temporary Variable</a>
        </li>
      </ul>
    </nav>
    <div class="container" style="margin-top:100px">
    	<div class="row">
        <div class="col-md-6">
    		<h2>Masukan Data Angka Acak</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12" style="padding:0px">
                  <input type="text" id="datainput" class="form-control input-lg"/>
                  <span class="input-group-btn">
                      <button class="btn btn-info btn-lg" id="formsubmit" type="button" style="font-size: 32px;">
                          <i class="fas fa-filter"></i>
                      </button>
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <h2>Hasil Buble Sort</h2>
          <div class="hasil" id="hasilpngurutan">

          </div>
        </div>
    	</div>
    </div>
  </body>

  <script>
  $(document).ready(function() {
    $('#formsubmit').click(function(e){
      var input = $('#datainput').val();
      var letters = /^[0-9]+$/;

      if(input == null || input == ''){
        alert('data tidak boleh kosong');
        $('#hasilpngurutan').html('');
      }else if (!input.match(letters)) {
        alert('data harus angka');
        $('#datainput').val(null);
        $('#hasilpngurutan').html('');
      }else {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
           url: "{{url('/program-buble-sort/post')}}",
           method: 'post',
           data: {
              datainput: input
           },
           success: function(response){
             var result = $.parseJSON(response);
             $('#hasilpngurutan').html("Hasil Pengurutan: "+result.data+"<br><br>Penjelasan : <br>"+result.tampil);
           },
           error: function(response){
               var errors = response.responseJSON;
               console.log(errors);
               // Render the errors with js ...
             }
         });
      }
     });
  });
  </script>
</html>
