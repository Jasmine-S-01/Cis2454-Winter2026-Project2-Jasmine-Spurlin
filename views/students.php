
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Students List</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
        <table>
            <tr>
                <th>Name</th>
                <th>Major</th>
                <th>ID</th>
            </tr>
            <?php foreach ($students as $students) : ?>
                <tr>
                    <td><?php echo $students->get_name(); ?></td>
                    <td><?php echo $students->get_major(); ?></td>
                    <td><?php echo $students->get_id(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h2>Add or Update User</h2>
        <form action="students.php" method="post"> 
            <label>Name:</label> 
            <input type="text" name="name"/><br> 
            <label>Major:</label> 
            <input type="text" name="major"/><br> 
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update</br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h2>Delete User</h2>
        <form action="students.php" method="post"> 
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Student"/> 
        </form>
    </body>
    </br>
</html>