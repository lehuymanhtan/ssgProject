<?php
session_start();

$basePath = __DIR__ . '/sessions';

if (!isset($_SESSION['user_code'])) {
    $_SESSION['user_code'] = uniqid("user_", true);
}
$userFolder = $_SESSION['user_code'];

$sessionPath = $basePath . '/' . $userFolder;
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0755, true); 
    touch($sessionPath . '/foodOnYoutube.txt'); 
}

session_save_path($sessionPath);


if (isset($_POST["food"])) {
    $food = escapeshellarg($_POST["food"]);

    $output = shell_exec("python3 search.py $food");

    $foodFilePath = $sessionPath . "/foodOnYoutube.txt";
    $myfile = fopen($foodFilePath, "w") or die("Unable to open file!");
    fwrite($myfile, $output);
    fclose($myfile);

} else {
    echo "No food parameter provided.";
}







$myfile = fopen($foodFilePath, "r") or die("Unable to open file!");
$lines = file($foodFilePath);

echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>List of YouTube Videos</title>
    <style>
        /* Center the videos and arrange them vertically */
        body {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; /* Optional background color */
        }
        iframe {
            margin: 10px 0; /* Add spacing between videos */
        }
    </style>
</head>
<body>";

for ($i = 0; $i < count($lines); $i++) {
    $videoUrl = trim($lines[$i]);
    preg_match("/(?:v=|\/)([0-9A-Za-z_-]{11})/", $videoUrl, $matches);

    if (isset($matches[1])) {
        $embedUrl = "https://www.youtube.com/embed/" . $matches[1];
        echo "<iframe 
            width=\"800\" 
            height=\"450\" 
            src=\"$embedUrl\" 
            title=\"YouTube video player\" 
            frameborder=\"0\" 
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" 
            allowfullscreen>
        </iframe>";
    }
}

echo "</body>
</html>";

fclose($myfile);



?>
