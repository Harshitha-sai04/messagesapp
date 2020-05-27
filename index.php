<?php
include 'db.php';

// select query
$query = 'SELECT * FROM messages';
$messages = mysqli_query($connection, $query);
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
            </header>
            <div class='main'>
                <form>
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