<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Course List</title>
        <style>
            
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        
        body {
            font-family: "Roboto", sans-serif;
            line-height: 1.5; 
            padding: 20px; 
        }

        table { 
            width: 40%; 
            border-collapse: collapse;  
        }
        th, td { 
            padding: 5px; 
            border: 1px solid #ccc; 
            text-align: left; 
        }
        th { background: #eee; }

        label { 
           
            width: 100px; 
            margin-bottom: 10px;
            
            
        }
        input, button, select, textarea {
        font-family: inherit;
        }
        
    </style>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
           <h3>Enrollment List</h3>
        <table>
            <tr>
                <th>Id</th>
                <th>Student Code</th>
                <th>Section Id</th>
                <th>Grade</th>
            </tr>
            <?php foreach ($enrollments as $enrollment) : ?>
                <tr>
                    <td><?php echo $enrollment->get_id(); ?></td>
                    <td><?php echo $enrollment->get_student_id(); ?></td>
                    <td><?php echo $enrollment->get_section_id(); ?></td>
                    <td><?php echo $enrollment->get_grade(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h3>Add or Update Enrollment</h3>
        <form action="enrollment.php" method="post"> 
            <label>Student Code:</label> 
            <input type="number" name="student_code"/><br> 
            <label>Section Id:</label> 
            <input type="number" name="section_id"/><br> 
            <label>Grade:</label> 
            <input type="text" name="grade"/><br> 
            
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h3>Delete/Drop Enrollment</h3>
        <form action="enrollment.php" method="post"> 
            <?php include("enrollmentViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Section"/> 
        </form>
    </body>
    </br>
</html>