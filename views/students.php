
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Students List</title>
        <style>
            
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        
        body {
            font-family: "Roboto", sans-serif;
            line-height: 1.5; 
            padding: 20px; 
        }

        table { 
            width: 25%; 
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
        <table>
            <h3>Student List</h3>
            <tr>
                <th>Name</th>
                <th>Major</th>
                <th>ID</th>
            </tr>
            <?php foreach ($all_students as $students) : ?>
                <tr>
                    <td><?php echo $students->get_name(); ?></td>
                    <td><?php echo $students->get_major(); ?></td>
                    <td><?php echo $students->get_id(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h3>Add or Update Student</h3>
        <form action="students.php" method="post"> 
            <label>Name:</label> 
            <input type="text" name="name"/><br> 
            <label>Major:</label> 
            <input type="text" name="major"/><br> 
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h3>Delete Student</h3>
        <form action="students.php" method="post">
             <?php include("studentViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Student"/> 
        </form>
    </body>
    </br>
</html>