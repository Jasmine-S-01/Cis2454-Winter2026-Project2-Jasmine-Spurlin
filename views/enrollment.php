<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Course List</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
           <h2>Section List</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>student_code</th>
                <th>section_id</th>
                <th>grade</th>
            </tr>
            <?php foreach ($enrollment as $enrollment) : ?>
                <tr>
                    <td><?php echo $enrollment->get_id(); ?></td>
                    <td><?php echo $enrollment->get_student_id(); ?></td>
                    <td><?php echo $enrollment->get_section_id(); ?></td>
                    <td><?php echo $enrollment->get_grade(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h2>Add or Update Section</h2>
        <form action="enrollment.php" method="post"> 
            <label>Id:</label> 
            <input type="number" name="id"/><br> 
            <label>student_code:</label> 
            <input type="text" name="student_code"/><br> 
            <label>section_id:</label> 
            <input type="number" name="section_id"/><br> 
            <label>grade:</label> 
            <input type="text" name="grade"/><br> 
            
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update</br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h2>Delete Section</h2>
        <form action="enrollment.php" method="post"> 
            <?php include("sectionViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Section"/> 
        </form>
    </body>
    </br>
</html>