<?php
    class Todo
    {
        private $id;
        private $title;
        private $description;
        private $important;
    
    
        public function get_id()
        {
            return $this->id;
        }
        public function set_id(int $argument_id)
        {
            $this->id = $argument_id;
        }
    
    
        public function get_title()
        {
            return $this->title;
        }
        public function set_title(string $argument_title)
        {
            $this->title = $argument_title;
        }
    
    
        public function get_description()
        {
            return $this->description;
        }
        public function set_description(string $argument_description)
        {
            $this->description = $argument_description;
        }

        public function get_important()
        {
            return $this->important;
        }
        public function set_important(bool $argument_important)
        {
            $this->important = $argument_important;
        }
    
    };
?>