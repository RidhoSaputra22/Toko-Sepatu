<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>SepatuKu</title>

  <style>
    *{
      /* outline: 1px solid red; */
    }

    @media print{
      button, input, select, option, a{
        display: none;
        visibility: hidden;
      }
    }

  </style>

</head>
<body>
  {{ $slot }}
</body>
</html>