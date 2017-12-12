<!DOCTYPE html>
<html>
<head>
    <title>小萝卜</title>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" />
    <link rel="stylesheet" href="/xlb/public/scripts/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/xlb/public/scripts/jquery/css/jquery.alerts.css" />
    <link rel="stylesheet" href="/xlb/public/styles/admin/style.css" />
</head>
<body style="height: 100%">
<script type="text/javascript" src="/xlb/public/scripts/jquery/js/jQuery-2.2.0.min.js"></script>
<script type="text/javascript" src="/xlb/public/scripts/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/xlb/public/scripts/jquery/js/json2.js"></script>
<script type="text/javascript" src="/xlb/public/scripts/jquery/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/xlb/public/scripts/Common.js"></script>
<script type="text/javascript">
    jAlert("<h4>您登录过期，请重新登录<h4>", "", function() {
        top.location.href = "/xlb/admin/index/login";
    });
</script>
</body>
</html>
