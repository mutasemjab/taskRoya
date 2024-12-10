<div>
    <style>
        .position_absolute{
            position: absolute !important;
            top:30px;
            z-index: 9999;
            text-align:center;
            color: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
            margin-right:20px;
            border-radius:4px;
            width: calc(100% - 40px);
        }
        .alert-danger{
            background:#f83939db;
        }
        .alert-success{
            background:#68d415;
        }
        .alert-warning{
            background:#ffce00;
        }
    </style>
  @if (session()->has('error'))
  <div class="alert alert-danger position_absolute">
    {{ session('error') }}
  </div>
  @endif

  @if (session()->has('danger'))
  <div class="alert alert-danger position_absolute">
    {{ session('danger') }}
  </div>
  @endif

  @if (session()->has('success'))
  <div class="alert alert-success position_absolute">
    {{ session('success') }}
  </div>
  @endif

  @if (session()->has('warning'))
  <div class="alert alert-warning position_absolute">
    {{ session('warning') }}
  </div>
  @endif

  @if (session()->has('info'))
  <div class="alert alert-info position_absolute">
    {{ session('info') }}
  </div>
  @endif
  @section('js')
    <script>
      $('document').ready(function(){
        setTimeout(function(){
          $(".position_absolute").fadeOut('slow');
        }, 2500);
      });
    </script>
  @endsection
</div>
