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
           <h3>Course List</h3>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Credits</th>
            </tr>
            <?php foreach ($courses as $course) : ?>
                <tr>
                    <td><?php echo $course->get_code(); ?></td>
                    <td><?php echo $course->get_name(); ?></td>
                    <td><?php echo $course->get_description(); ?></td>
                    <td><?php echo $course->get_credits(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h3>Add or Update Courses</h3>
        <form action="course.php" method="post"> 
            <label>Code:</label> 
            <input type="number" name="code"/><br> 
            <label>Name:</label> 
            <input type="text" name="name"/><br> 
            <label>Description:</label> 
            <input type="text" name="description"/><br> 
            <label>Credits:</label> 
            <input type="number" name="credits"/><br> 
            
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h3>Delete Courses</h3>
        <form action="course.php" method="post"> 
            <?php include("courseViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Course"/> 
        </form>
    </body>
    </br>
</html>