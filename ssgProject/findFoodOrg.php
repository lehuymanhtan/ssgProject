<?php
session_start();

// Check user session
if (!isset($_SESSION['user_code']) || empty($_SESSION['user_code'])) {
    echo "User session is invalid. Please login again.";
    exit;
}

$userCode = $_SESSION['user_code'];
$food = $_SESSION[$userCode] ?? null;

if (empty($food)) {
    echo "No food item specified. Please provide a valid input.";
    exit;
}

// Python execution and file read
try {
    $pythonPath = "/usr/bin/python3";
    $testAIScript = escapeshellcmd("$pythonPath testAI.py");
    $filterScript = escapeshellcmd("$pythonPath filter.py");

    shell_exec("$testAIScript " . escapeshellarg($food));
    shell_exec($filterScript);
    shell_exec("python3 search.py");

    $filePath = "./answerByAI1.txt";
    if (!file_exists($filePath)) {
        throw new Exception("Result file not found.");
    }

    $content = file_get_contents($filePath);
    if ($content === false) {
        throw new Exception("Cannot read content from result file.");
    }

    // Read video links
    $videoFilePath = "./foodVidLink.txt";
    $videoSections = [];
    if (file_exists($videoFilePath)) {
        $videoContent = file_get_contents($videoFilePath);
        $sections = preg_split('/\n(?=🔹)/', $videoContent);
        foreach ($sections as $section) {
            preg_match('/🔹 (.+):/', $section, $titleMatch);
            if (!empty($titleMatch[1])) {
                preg_match_all('/https:\/\/www\.youtube\.com\S+/', $section, $matches);
                $videoSections[$titleMatch[1]] = $matches[0] ?? [];
            }
        }
    }
} catch (Exception $e) {
    $content = "An error occurred: " . htmlspecialchars($e->getMessage());
}

// HTML Output
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Mind - AI Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script type="module" src="https://md-block.verou.me/md-block.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            flex-direction: column;
        }
        .container {
            max-width: 800px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            font-size: 2.2em;
            color: #ff6f61;
        }
        p {
            font-size: 1.1em;
            color: #666;
        }
        .response {
            background-color: #fff4e3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
            font-size: 1em;
            line-height: 1.6;
            color: #444;
            text-align: initial;
        }
        .video-container {
            margin-top: 20px;
            text-align: left;
        }
        .video-container h2 {
            font-size: 1.5em;
            color: #ff6f61;
            margin-top: 20px;
        }
        .video-container iframe {
            width: 100%;
            max-width: 560px;
            height: 315px;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your AI-Generated Recipe</h1>
        <p>Based on your input, here’s what we found:</p>
        <div class="response">
            <md-block>
HTML;

echo htmlspecialchars($content);

echo <<<HTML
            </md-block>
        </div>
    <div class="video-container">
HTML;

// Display YouTube videos grouped by dish
foreach ($videoSections as $dish => $videoLinks) {
    echo "<h2>$dish</h2>";
    echo "<p>Dưới đây là video hướng dẫn cách làm:</p>";
    foreach ($videoLinks as $videoLink) {
        preg_match('/v=([a-zA-Z0-9_-]+)/', $videoLink, $videoId);
        if (!empty($videoId[1])) {
            echo '<iframe src="https://www.youtube.com/embed/' . htmlspecialchars($videoId[1]) . '" allowfullscreen></iframe>';
        }
    }
}

echo <<<HTML
        </div>
        <a href="../../index.html" class="btn">Back to Home</a>
        <div class="footer">&copy; 2025 <span>Meal Mind</span>. Powered by AI.</div>
    </div>
</body>
</html>
HTML;
?>