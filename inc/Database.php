<?php


class Database
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "adv_shopping_cart",
        $tablename = "products",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->conn = new mysqli($servername, $username, $password);

        // Check connection
        if (!$this->conn){
            die("Connection failed : " . $this->conn->error);
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if($this->conn->query($sql)){

            $this->conn = new mysqli($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS `products` (
                `id` int(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `code` varchar(50) NOT NULL,
                `name` text NOT NULL,
                `description` text NOT NULL,
                `prev_price` float(12,2) NOT NULL DEFAULT 0.00,
                `current_price` float(12,2) NOT NULL DEFAULT 0.00,
                `img_path` text NOT NULL,
                `date_created` datetime NOT NULL DEFAULT current_timestamp(),
                `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
              );";

            $this->conn->query($sql);
            if ($this->conn->error){
                echo "Error creating table : " . $this->conn->error;
            }

            // Insert Default Products if db is empty:
            $check_db_data = $this->conn->query("SELECT `id` FROM `{$this->tablename}` ")->num_rows;
            if($check_db_data <= 0){
               $insert_sql = "INSERT INTO `{$this->tablename}` (`code`, `name`, `description`, `prev_price`, `current_price`, `img_path`) VALUES
                            ('123456', 'Scholar Pencils', 'Scholar Pencils offer smooth, consistent lines with an ergonomic design for comfort. Ideal for writing and drawing, they sharpen easily and come in various grades. Perfect for students and professionals.', 99, 79, 'upload/1.png'),
                            ('123457', 'Scholar Notebook', 'Scholar Notebook is designed for students and professionals, offering high-quality, smooth paper for effortless writing. With a durable cover and a convenient size, its perfect for notes, sketches, and ideas on the go.', 220, 199, 'upload/2.png'),
                            ('123458', 'Scholar Envelope', 'The Scholar Envelope combines durability and elegance for secure document storage. Perfect for professional and personal use, its ideal for letters, invitations, and important papers.', 22, 20, 'upload/3.png'),
                            ('123459', 'Scholar Highlighters', 'Scholar Highlighters offer vibrant colors with smooth, non-smudge ink. Designed for precision and comfort, they are perfect for studying, note-taking, and organizing important information.', 0, 149, 'upload/4.png'),
                            ('123450', 'Scholar Folder', 'The Scholar Folder provides durable, stylish document organization. Ideal for students and professionals, its perfect for keeping papers, reports, and assignments neatly arranged and protected.', 0, 150, 'upload/5.png')";
                $this->conn->query($insert_sql);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData($pids = []){
        $where = "";
        if(count($pids)) {
            $pids = implode(",", $pids);
            $where = " where id in ({$pids})";
        }
        $sql = "SELECT * FROM {$this->tablename} $where";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }
    }
}






