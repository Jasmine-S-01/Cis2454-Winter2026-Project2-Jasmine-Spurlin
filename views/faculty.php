
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Faculty</title>
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
        <h3>Faculty List</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name
                <th>Email</th>
            </tr>
            <?php foreach ($faculty as $faculty) : ?>
                <tr>
                    <td><?php echo $faculty->get_id(); ?></td>
                    <td><?php echo $faculty->get_name(); ?></td>
                    <td><?php echo $faculty->get_email(); ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        </br>
        <h3>Add or Update Faculty</h3>
        <form action="faculty.php" method="post">
            <label>ID:</label> 
            <input type="text" name="id"/><br> 
            <label>Name:</label> 
            <input type="text" name="name"/><br> 
            <label>Email:</label> 
            <input type="text" name="email"/><br> 
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add
            <input type="radio" name="insert_or_update" value="update">Update
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        </br>
        <h3>Delete Faculty</h3>
        <form action="faculty.php" method="post"> 
            <label>ID:</label> 
            <input type="text" name="id"/>
            <input type="hidden" name='action' value='delete'/>
            <label>&nbsp;</label>
            <input type="submit" value="Delete Faculty"/></br>
        </form>
    </body>
    </br>
</html>