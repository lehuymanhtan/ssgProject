<?php
session_start();

$basePath = __DIR__ . '/sessions';

if (!isset($_SESSION['user_code'])) {
    $_SESSION['user_code'] = uniqid("user_", true);
}
$userFolder = $_SESSION['user_code'];

if (isset($_POST["food"])) {
    $food = htmlspecialchars($_POST["food"], ENT_QUOTES, 'UTF-8');
    $_SESSION[$_SESSION['user_code']] = $food;
} else {
    die("No food provided");
}

$sessionPath = $basePath . '/' . $userFolder;
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0755, true); 
}

session_save_path($sessionPath);


if (!file_exists("$sessionPath/testAI.py")) {
    shell_exec("cp ./testAI.py $sessionPath/testAI.py");
}

if (!file_exists("$sessionPath/filter.py")) {
    shell_exec("cp ./filter.py $sessionPath/filter.py");
}
if (!file_exists("$sessionPath/findFood.php")) {
    shell_exec("cp ./findFoodOrg.php $sessionPath/findFood.php");
}
if (!file_exists("$sessionPath/search.py")) {
    shell_exec("cp ./search.py $sessionPath/search.py");
}


header("Location: ./sessions/" . $_SESSION['user_code'] . "/findFood.php");
exit();




// trứng, thịt lợn, cơm, hành lá, chanh