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
                <th>course_code</th>
                <th>faculty_id</th>
                <th>semester</th>
            </tr>
            <?php foreach ($sections as $section) : ?>
                <tr>
                    <td><?php echo $section->get_id(); ?></td>
                    <td><?php echo $section->get_course_code(); ?></td>
                    <td><?php echo $section->get_faculty_id(); ?></td>
                    <td><?php echo $section->get_semester(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h2>Add or Update Section</h2>
        <form action="section.php" method="post"> 
            <label>Id:</label> 
            <input type="number" name="id"/><br> 
            <label>course_code:</label> 
            <input type="text" name="course_code"/><br> 
            <label>faculty_id:</label> 
            <input type="number" name="faculty_id"/><br> 
            <label>semester:</label> 
            <input type="text" name="semester"/><br> 
            
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update</br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h2>Delete Section</h2>
        <form action="section.php" method="post"> 
            <?php include("courseViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Section"/> 
        </form>
    </body>
    </br>
</html>