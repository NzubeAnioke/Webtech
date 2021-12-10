<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>my profile </title>
</head>

<body>
  <style>
    * {
      box-sizing: border-box;
      margin-left: auto;
      margin-right: auto;
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 900px;
      /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
  </head>

  <body>

    <h2>Two Equal Columns</h2>

    <div class="row">
      <div class="column" style="background-color:#aaa;">
        <h2>Column 1</h2>
        <p>Some text..</p>
      </div>
      <div class="column" style="background-color:#bbb;">
        <h2>Column 2</h2>
        <p>Some text..</p>
      </div>
    </div>

  </body>

</html>




</body>

</html>