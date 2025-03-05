<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Công Thức Món Ăn</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
        pre {
            background-color: #fff4e3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
            white-space: pre-wrap;
            font-size: 1em;
            line-height: 1.6;
            color: #444;
            text-align: left;
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
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            background-color: #ff6f61;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #e65a50;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Minigame</h1>
        <p>Muốn chơi minigame để săn thưởng không?</p>
        <pre>
<h3>Hãy vào about us và truy cập ngay fanpage facebook của let we cook</h3>
<h3>Đăng kí ngay minigame do let we cook tổ chức để ẵm ngay giải thưởng nàooo</h3>

        </pre>
        
        <div class="video-container">
            <h2></h2>
            <p></p>
            <iframe 
        width="800" 
        height="450" 
        src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
        </div>

        <a href="index.html" class="btn">Quay lại Trang Chủ</a>
        <div class="footer">&copy; 2025 Công thức nấu ăn. Powered by AI.</div>
    </div>
</body>
</html>

