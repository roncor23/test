<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Senebu</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="shortcut icon" href="image/logo.png" />

  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js"></script> -->


</head>
<style type="text/css">
  /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */

.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(image/loading.gif) center no-repeat #fff;
  background: url(../image/loading.gif) center no-repeat #fff;
  background: url(../../image/loading.gif) center no-repeat #fff;
}
</style>
  <body>
    <div class="se-pre-con"></div>
    <div id="app">
      <index></index>
    </div>
  </body>
</html>