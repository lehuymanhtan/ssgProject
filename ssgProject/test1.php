<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered YouTube Video with Autoplay</title>
    <style>
        /* Center the video using flexbox */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full screen height */
            margin: 0;
            background-color: #f0f0f0; /* Optional background color */
        }
    </style>
</head>
<body>
    <!-- Embed YouTube Video -->
    <iframe 
        width="800" 
        height="450" 
        src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
</body>
</html>
