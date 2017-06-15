<?php
/**
 * Created by PhpStorm.
 * User: BangLang
 * Date: 06/15/2017
 * Time: 5:13 PM
 */
?>
<html>
<head>

</head>
<body>
<h1>Create comment</h1>
<form action="index.php" method="post">
    <table>
        <tr>
            <th>Comment</th>
            <td>
                <input type="text" name="comment"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">add</button>
            </td>
        </tr>
    </table>
</form>
<form action="BookCommentList.php" method="post">
    <button type="submit">back</button>
</form>
</body>
</html>
