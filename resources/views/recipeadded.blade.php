<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>

<body style="background:#f4f4f4;padding:40px;font-family:Arial;">

    <div style="max-width:600px;margin:auto;background:white;padding:40px;border-radius:20px;box-shadow:0 10px 30px rgba(0,0,0,0.1);">

        <h1 style="color:#f97316;font-size:40px;text-align:center;">
            🍴 New Recipe Added
        </h1>

        <p style="font-size:18px;color:#555;line-height:30px;margin-top:30px;">

            A new recipe has been successfully added to the Recipe World platform.

        </p>

        <div style="background:#fff7ed;padding:25px;border-radius:15px;margin-top:30px;">

            <h2 style="color:#ea580c;">
                Recipe Details
            </h2>

            <p style="font-size:18px;">
                <strong>Recipe Name:</strong> {{ $title }}
            </p>

        </div>

        <div style="text-align:center;margin-top:40px;">

            <a
                href="http://127.0.0.1:8000"
                style="background:#f97316;color:white;padding:15px 30px;border-radius:12px;text-decoration:none;font-size:18px;"
            >
                Visit Website
            </a>

        </div>

    </div>

</body>
</html>