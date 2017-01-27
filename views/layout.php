<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php if (isset($title)): echo $this->escape($title) . ' - '; endif; ?>Mini Blog</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="">
</head>
<body>

    <div id="header">
        <h1><a href="<?php echo $base_url; ?>">Mini Blog</a></h1>
    </div>

    <div id="main">
        <?php echo $_content; ?>
    </div>

</body>
</html>
