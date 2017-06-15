<?php
/**
 * Created by PhpStorm.
 * User: BangLang
 * Date: 06/15/2017
 * Time: 5:12 PM
 *
 */
$conn = mysqli_connect('localhost', 'root', '', 'book') or die ('cannot connect DB!');
?>

<!--Add-->

<?php
if (isset($_POST['add_flag'])) {
    $sql = "INSERT INTO `book_list`(`name`, `publisher`, `page`) VALUES ('" . $_POST['name'] . "','" . $_POST['publisher'] . "'," . $_POST['page'] . ")";
    mysqli_query($conn, $sql);
}
?>

<!---->

<!---Edit->

<?php
if (isset($_POST['edit_flag'])) {
    $sql = "UPDATE book_list,  SET name='" . $_POST['name'] . "',publisher='" . $_POST['publisher'] . "',page='" . $_POST['page'] . "' WHERE id = " . $_POST['id'];
    mysqli_query($conn, $sql);
}
?>

<!---->

<!--Delete-->

<?php
if (isset($_POST['id_delete'])) {
    $sql = "DELETE FROM book_list WHERE id = " . $_POST['id_delete'];
    //echo $sql;
    mysqli_query($conn, $sql);
}
?>

<!---------->

<html>
<h1>Book's list</h1>
<form action="BookUpload.php">
    <button type="submit" name="add book">Add book</button>
</form>
<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>publisher</th>
        <th>page</th>
        <th>other</th>
    </tr>
    <!--Get book's list-->
    <?php
    $sql = 'SELECT * FROM book_list';
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die ('error');
    }
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['publisher'] ?></td>
            <td><?php echo $row['page'] ?></td>
            <td>
                <form action="BookUpload.php" method="post">
                    <input type="hidden" name="id_edit" value="<?php echo $row['id'] ?>"/>
                    <input type="hidden" name="name" value="<?php echo $row['name'] ?>"/>
                    <input type="hidden" name="publisher" value="<?php echo $row['publisher'] ?>"/>
                    <input type="hidden" name="page" value="<?php echo $row['page'] ?>"/>
                    <button type="submit" name="edit">edit</button>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="id_delete" value="<?php echo $row['id'] ?>"/>
                    <button type="submit" name="delete">delete</button>
                </form>
                <form action="BookCommentList.php" method="post">
                    <button type="submit" name="comment" value="<?php echo $row['id'] ?>">comment</button>
                </form>
            </td>
        </tr>
        <?php
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</table>
</html>
