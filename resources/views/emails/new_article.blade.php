<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Article Published</title>
    <style>
        body {font-family: 'Inter', sans-serif; background-color: #1a1a1a; color: #f5f5f5; padding: 20px;}
        .container {max-width: 600px; margin: auto; background: #2a2a2a; padding: 20px; border-radius: 8px;}
        a {color: #ffcc00; text-decoration: none;}
        .button {display: inline-block; background: #ff6600; color: #fff; padding: 10px 20px; border-radius: 5px; margin-top: 15px;}
    </style>
</head>
<body>
<div class="container">
    <h2>नवीन लेख प्रकाशित भयो!</h2>
    <p><strong>{{ $article->title }}</strong> शीर्षकको नयाँ लेख प्रकाशित भएको छ।</p>
    <p>{{ $article->description }}</p>
    <a href="{{ url('/article/' . $article->slug) }}" class="button">पूरा लेख हेर्नुहोस्</a>
    <p style="margin-top:20px; font-size:12px; color:#aaa;">यदि तपाईं सदस्यता समाप्त गर्न चाहनुहुन्छ भने <a href="#">यहाँ</a> क्लिक गर्नुहोस्।</p>
</div>
</body>
</html>
