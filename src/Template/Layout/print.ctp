<!DOCTYPE html>
<html>
  <head>
  <title>Print this page</title>
  <style>
    div {
      width: 200px; 
      border: 1px solid; 
      text-align: center; 
      float: left; 
      height: 210px;
    }
  </style>
  </head>
  <body>
    <?= $this->fetch('content') ?>
  </body>    
</html>