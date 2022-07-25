<?php
    $domain = "";
    if (PHP_SAPI == "cli") {
        ob_start();
    }
    $data = explode("\r\n", file_get_contents("./index.txt"));
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        body {max-width: 740px;margin: 0 auto;padding: 30px;}
        a {text-decoration: none;}
        a:hover {text-decoration: underline;}
    </style>
</head>
<body>
<ol>
    <?php
        foreach ($data as $value) {
            $index = mb_strpos($value, " ");
            if (is_bool($index)) {
                continue;
            }
            $name = mb_substr($value, $index + 1);
            $url = sprintf("%s/play/?url=%s/mp4/%s.mp4&title=%s", $domain, $domain, mb_substr($value, 0, $index), $name);
            printf("<li><a href=\"%s\">%s</a></li>\n\t", $url, $name);
        }
    ?>
</ol>
</body>
</html>
<?php
    if (PHP_SAPI == "cli") {
        file_put_contents("./index.html", ob_get_clean());
    }
?>
