<?php
/**
 * Created by PhpStorm.
 * User: BangLang
 * Date: 06/15/2017
 * Time: 5:13 PM
 */
$conn = mysqli_connect('localhost', 'root', '', 'book') or die ('cannot connect DB!');
?>

<?php
if (isset($_POST['id_edit'])) {
    $edit_flag = true;
    $id = $_POST['id_edit'];
    $name = $_POST['name'];
    $publisher = $_POST['publisher'];
    $page = $_POST['page'];
}

?>

<!--Add book-->

<!---->

<html>
<h1>Add new book</h1>
<form action="index.php" method="post">
    <?php if (isset($edit_flag)) { ?>
        <input type="hidden" name="edit_flag" value="1"/>
        <input type="hidden" name="id" value="<?php echo $id ?>"/>
    <?php } else { ?>
        <input type="hidden" name="add_flag" value="1"/>
        <?php
    } ?>
    <table>
        <tr>
            <th>name</th>
            <td><input type="text" name="name" value="<?php if (isset($edit_flag)) echo $name; ?>"/></td>
        </tr>
        <tr>
            <th>publisher</th>
            <td><input type="text" name="publisher" value="<?php if (isset($edit_flag)) echo $publisher; ?>"/>
            </td>
        </tr>
        <tr>
            <th>page</th>
            <td><input type="text" name="page" size="30" value="<?php if (isset($edit_flag)) echo $page; ?>"/>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit">add
                </button>
            </td>
        </tr>
    </table>
</form>

<form action="index.php">
    <button type="submit">Back</button>
</form>

</html>
