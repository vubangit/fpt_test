<?php
/**
 * Created by PhpStorm.
 * User: BangLang
 * Date: 06/15/2017
 * Time: 5:13 PM
 */
$conn = mysqli_connect('localhost', 'root', '', 'book') or die ('cannot connect DB!');
?>

    <html>
    <head></head>
    <body>
    <h1>Comment</h1>
    <form action="BookCommentUpload.php" method="post">
        <button type="submit">Create</button>
    </form>
    <form action="BookCommentList.php" method="post">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Other</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM book_comment';
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die ('error');
            }
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <td><?php echo $row['comment'] ?></td>
                    <td>
                        <button type="submit" id="edit">edit</button>
                        <button type="submit" id="delete">delete</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
    <form action="index.php" method="post">
        <button type="submit">back</button>
    </form>
    </body>
    </html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>