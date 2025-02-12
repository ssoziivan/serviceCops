<!-- Homepage view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php if($userData): ?>
        <h1>User Profile: <?= $userData['name'] ?></h1>
    <?php else: ?>
        <h1>User Not Found</h1>
    <?php endif; ?>
        
</body>
</html>