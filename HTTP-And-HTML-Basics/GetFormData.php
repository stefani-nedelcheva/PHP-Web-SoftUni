<form>
    <input type="text" name="name" placeholder="Name"/><br/>
    <input type="text" name="age" placeholder="Age"/><br/>
    <input type="radio" name="gender" value="male"/><br/>
    <input type="radio" name="gender" value="female"/><br/>
    <input type="submit" value="Submit"/>
</form>

<?php
if (isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {
    $name = $_GET['name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];

    echo "My name is . $name. I am . $age years old. I am . $gender.";
}
?>
