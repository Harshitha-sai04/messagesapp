<?php
include 'db.php';

// select query
$query = 'SELECT * FROM messages ORDER BY dateStamp DESC';
$messages = mysqli_query($connection, $query);
// check for the error message
if(isset($_GET['error'])){
    $error = $_GET['error'];
}
// check for the success message
if(isset($_GET['success'])){
    $success = $_GET['success'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Messages App</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class='container'>
            <header>
                <h1>Messages app</h1>
                <?php if($error): ?>
                    <div class='alert'>
                            <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <?php if($success): ?>
                    <div class='success'>
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
            </header>
            <div class='main'>
                <form method='POST' action='process.php'>
                    <input type='text' name='message' placeholder='Type your message here'>
                    <input type='text' name='username' placeholder='Input user name'>
                    <input type='submit' value='Submit'>
                </form>
            </div>
            <hr>
            <ul class='messages'>
                <?php while($row = mysqli_fetch_assoc($messages)): ?>
                    <li><?php echo $row['message'].' | '.$row['user'].': '.$row['dateStamp'] ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <footer>
            messageapp &copy; 2020
        </footer>
    </body>
</html>