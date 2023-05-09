<?php
    require_once("./manager/DBManager.php");
    require_once("./class/todo_class.php");
    class TodoManager extends DBManager
    {
        public function get_all_todo()
        {
            $prepare = $this->getConnection()->query("SELECT * FROM `Todo_list`");
            $team_list = [];
            foreach ($prepare as $todo_data) {
                $todo = new Todo();
                $todo->set_id($todo_data["id"]);
                $todo->set_title($todo_data["title"]);
                $todo->set_description($todo_data["description"]);
                $todo->set_important($todo_data["important"]);

                $team_list[] = $todo;
            }
            return $team_list;
        }

        public function delete_todo_by_id(int $id)
        {
            $data = $prepare = $this->getConnection()->prepare("DELETE FROM Todo_list WHERE id = ?");
            $prepare->execute([$id]);
           
            return !empty($data->fetch());
        }

        public function todo_exist (int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Todo_list` Where id = ?");
            $prepare->execute([$id]);
    
            return !empty($data->fetch());
            }

        public function get_todo_by_id(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Todo_list WHERE id = ?;");
            $prepare->execute([
                $id
            ]);
            foreach ($data as $key => $value) {
                $team = new Todo();
                $team->set_id($value["id"]);
                $team->set_title($value["title"]);
                $team->set_description($value["description"]);
                $team->set_important($value["important"]);
                return $team;
            }
            return null;
        }

        public function create_todo(string $title, string $description, int $important){
            $prepare = $this->getConnection()->prepare("INSERT INTO `Todo_list` (title, description, important) VALUES (:title, :description, :important); ");
            $prepare->bindValue(":title", $title);
            $prepare->bindValue(":description", $description);
            $prepare->bindValue(":important", $important);
            $prepare->execute();
        }
    }
?>