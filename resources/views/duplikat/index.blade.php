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
          <a class="nav-link" href="#">Program Pencarian Duplikat Huruf Pertama</a>
        </li>
      </ul>
    </nav>
    <div class="container" style="margin-top:100px">
    	<div class="row">
        <div class="col-md-6">
    		<h2>Masukan Huruf</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12" style="padding:0px">
                  <input type="text" id="datainput" class="form-control input-lg"/>
                  <span class="input-group-btn">
                      <button class="btn btn-info btn-lg" id="formsubmit" type="button" style="font-size: 32px;">
                          <i class="fas fa-search"></i>
                      </button>
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <h2>Hasil Pencarian</h2>
          <input type="text" class="form-control input-lg" placeholder="Data Duplikat : " id="hasilpencarian" readonly style="padding:22px"/>
        </div>
    	</div>
    </div>
  </body>

  <script>
  $(document).ready(function() {
    $('#formsubmit').click(function(e){
      var result = '';
      var input = $('#datainput').val();
      var letters = /^[zA-Z]+$/;

      if(input == null || input == ''){
        alert('data tidak boleh kosong');
        $('#hasilpencarian').val(null);
      }else if (!input.match(letters)) {
        alert('data harus huruf');
        $('#datainput').val(null);
        $('#hasilpencarian').val(null);
      }else {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
           url: "{{url('/program-duplikat/post')}}",
           method: 'post',
           data: {
              datainput: input
           },
           success: function(response){
             $('#hasilpencarian').val('Data Duplikat : '+response);
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
