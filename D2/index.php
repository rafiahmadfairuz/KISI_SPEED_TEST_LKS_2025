<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D2</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: start;
            
        }
    </style>
</head>
<body>
    <form action="docs.php" class="container" method="POST">
        <input type="text" name="judul" placeholder="File Title" required>
        <textarea name="isi" style="width: 170px; margin:20px 0px;" placeholder="File Content" id="" required></textarea>
        <button type="submit">Create</button>
    </form>
    
</body>
</html>