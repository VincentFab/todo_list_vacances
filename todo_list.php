<?php
require_once("./manager/todo_manager.php");
require_once("./manager/DBManager.php");
$manager = new TodoManager();


if (!empty($_POST["title"]) && !empty($_POST["description"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    if(isset($_POST["important"])){
        $important = 1;
    }else{
        $important = 0;
    };
    

    $manager->create_todo($title, $description, $important);

} else if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $manager->delete_todo_by_id($id);
}

?>
<link rel="stylesheet" href="./style.css">

<main>
    <table>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>Description</th>
            <th>Important</th>
            <th>Supprimer</th>
        </tr>

        <?php
        $todo = new Todo();
        $statement = $manager->get_all_todo();
        foreach ($statement as $key => $value) {
            echo ('<tr>');
            echo ('<th>' . $value->get_id() . '</th>');
            echo ('<td>' . $value->get_title() . '</td>');
            echo ('<td>' . $value->get_description() . '</td>');
            echo ('<td>' . $value->get_important() . '</td>');
            echo ('<td>' . "<a href='todo_list.php?delete=" . $value->get_id() . "'>Delete</a>" . "</td>");
            echo ('<tr>');
        }
        ?>

    </table>

    <form action="todo_list.php" method="post">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        
        <label for="important">Important</label>
        <input type="checkbox" name="important" id="important">

        <input type="submit" value="Confirmer">
    </form>


</main>