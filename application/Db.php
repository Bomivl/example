<?php

namespace application;

/**
 * Description of Db
 *
 * @author Михаил
 */
class Db {

    const FILEDB = __DIR__ . "/../DbSQLite.db";

    protected $db;

    public function __construct() {
        //echo self::FILEDB;
        try {
            $this->db = new \PDO('sqlite:' . self::FILEDB);
            $this->existsDb();
        } catch (\PDOException $e) {
            echo "Ошибка " . $e->getMessage();
        }
    }

    protected function existsDb() {
        if (is_file(self::FILEDB) and filesize(self::FILEDB) == 0) {
            $sql = "CREATE TABLE content(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    content TEXT
        )";
            $this->db->exec($sql);
        }
    }

    public function query($query) {
        try {
//            $prep = $this->db->prepare($query);
//            $prep->execute();
            $res = $this->db->query($query)->fetch(\PDO::FETCH_ASSOC);
            return $res;
        } catch (\PDOException $e) {
            echo 'Ошибка' . $e->getMessage();
        }
    }
    public function execute($sql, $param){
        $res = $this->db->prepare($sql)->execute($param);
        return $res;
    }

}
