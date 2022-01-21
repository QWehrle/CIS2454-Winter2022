<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Week 2</title>
    </head>
    <body>
        <form action="hello.php" method="post">
            <label>Name: </label>
            <input type="text" name="name"/><br>
            <label>Preferred pronouns: </label>
            <input type="text" name="pronouns"/><br>
            <label>Major: </label>
            <input type="text" name="major"/><br>
            <label>Previous Programming Experience: </label>
            <input type="text" name="experience"/><br>
            <label>Fun fact: </label>
            <input type="text" name="fun_fact"/><br>
            <input type="submit" value="Submit"/>
        </form>
        <form action="pizza.php" method="get">
            <label>Number of people at the party: </label>
            <input type="text" name="people_at_party"/><br>
            <label>Average slices per person: </label>
            <input type="text" name="slices_per_person"/><br>
            <label>Pizza Size ( small, medium, large ): </label>
            <input type="text" name="size"/><br>
            <input type="submit" value="Pizza Time!"/>
        </form>
        <a href="page2.php">Page 2</a>
    </body>
</html>
