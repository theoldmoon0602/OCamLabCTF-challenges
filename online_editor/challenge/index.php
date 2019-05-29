<?php

$content = '';
$filename = '';
$errmsg = '';

if (isset($_GET['source'])) {
        highlight_file("index.php");
        exit();
}

do {
    if (isset($_GET['i']) && $_GET['i'] === 'open' && isset($_GET['filename']) && !empty($_GET['filename'])) {
        $filename = trim($_GET['filename']);
        if (preg_match('@(\.\./)@', $filename) || $filename[0] == '/') {
            $errmsg = 'unsafe filename';
            break;
        }
        $content = file_get_contents($filename);
        if (strpos($content, 'OCamLabCTF') !== FALSE) {
            $errmsg = 'unsafe content is included';
            $content = '';
            break;
        }
    } else if (isset($_POST['i']) && $_POST['i'] === 'save' && isset($_POST['filename']) && !empty($_POST['filename']) && isset($_POST['content']) && !empty($_POST['content'])) {
        $filename = $_POST['filename'];
        if (preg_match('@^[A-Za-z0-9-_. ]+$@', $filename) === false) {
            $errmsg = 'unsafe filename';
            break;
        }
        if (preg_match('@(\.\./|\.php|\.html|\.js|\.css|\.htaccess)@', $filename) || $filename[0] == '/') {
            $errmsg = 'unsafe filename';
            break;
        }
        if (strpos($filename, 'README') !== FALSE) {
            $errmsg = 'unsafe filename';
            break;
        }
        if (strpos($filename, 'flag') !== FALSE) {
            $errmsg = 'unsafe filename';
            break;
        }
        file_put_contents($filename, $_POST['content']);

        $files = glob("*");
        while (count($files) > 100) {
            shuffle($files);
            if ($files[0] !== 'README' && $files[0] !== 'index.php' && $files[0] !== 'flag.php') {
                unlink($files[0]);
                $files = array_slice($files, 1);
            }
        }
    }
} while (false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The ONLINE EDITOR</title>
    <style>
html,body {
    margin: 0;
    padding: 0;
    height: 100%;
}
.container {
    max-width: 960px;
    margin: 0 auto;
}

.note textarea{
    display: block;
    width: 100%;
    padding: 20px 10px;
    font-size: 120%;
    resize: vertical;
}
.note input[type=text] {
    padding: 0.2em 0;
}
.note input[type=submit] {
    padding: 0.4em 2em;
    background-color: transparent;
    font-weight: bold;
    border: 2px solid #000;
    border-radius: 4px;
}
.note input[type=submit]:hover {
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>The ONLINE EDITOR</h1>
        <p><a href="?source">view source</a></p>

        <p><?=htmlspecialchars($errmsg);?> </p>

        <form method="post" class="note">
            <textarea name="content" id="" cols="30" rows="10"><?=htmlspecialchars($content, ENT_QUOTES);?></textarea>
            <input type="text" name="filename" required value="<?=htmlspecialchars($filename, ENT_QUOTES);?>">
            <input type="submit" name="i" value="save">
        </form>
        <h3>Files List</h3>
        <ul>
        <?php foreach (glob("*") as $f) { ?>
        <li><a href="?i=open&filename=<?= htmlspecialchars(basename($f)); ?>"><?= htmlentities(basename($f)); ?></a></li>
        <?php }?>
        </ul>
    </div>
</body>
</html>
