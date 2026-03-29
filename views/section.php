<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sections</title>
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
           <h3>Section List</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Course Code</th>
                <th>Faculty Id</th>
                <th>Semester</th>
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
        <h3>Add or Update Section</h3>
        <form action="section.php" method="post"> 
            <label>Id:</label> 
            <input type="number" name="id"/><br> 
            <label>Course Code:</label> 
            <input type="text" name="course_code"/><br> 
            <label>Faculty Id:</label> 
            <input type="number" name="faculty_id"/><br> 
            <label>Semester:</label> 
            <input type="text" name="semester"/><br> 
            
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h3>Delete Section</h3>
        <form action="section.php" method="post"> 
            <?php include("sectionViewDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Section"/> 
        </form>
    </body>
    </br>
</html>