<?php

namespace App;
use PDO;
use wfm\Base;

class Db extends Base 
{

    private $conn;

    public function __construct()
    {
        try {
            $db = require_once '../config/config_db.php';
            $this->conn = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}", $db['user'], $db['password']);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch(\PDOException $e)
        {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    
}


interface NewsInterface{
    public function getLastNews();
    public function getNewsByRegion();
    public function getNewsByDate();
}

class News implements NewsInterface {
    public function getLastNews() {
        return 'Получить последние новости';
    }
    public function getNewsByRegion() {
        return 'Получить новости по региону';
    }
    public function getNewsByDate() {
        return 'Получить новости по дате';
    }
}



// Интерфейс устройства
interface Device {
    public function isEnabled();
    public function enable();
    public function disable();
    public function getVolume();
    public function setVolume($percent);
    public function getChannel();
    public function setChannel($channel);
}


// Класс Пульта
class Remote {
    protected $device;

    public function __construct(Device $device) {
        $this->device = $device;
    }

    public function togglePower() {
        if ($this->device->isEnabled()) {
            $this->device->disable();
        } else {
            $this->device->enable();
        }
    }

    public function volumeDown() {
        $this->device->setVolume($this->device->getVolume() - 10);
    }

    public function volumeUp() {
        $this->device->setVolume($this->device->getVolume() + 10);
    }

    public function channelDown() {
        $this->device->setChannel($this->device->getChannel() - 1);
    }

    public function channelUp() {
        $this->device->setChannel($this->device->getChannel() + 1);
    }
}

// Расширенный класс Пульта
class AdvancedRemote extends Remote {
    public function mute() {
        $this->device->setVolume(0);
    }
}

// Пример использования
$tv = new Tv();
$remote = new Remote($tv);
$remote->togglePower();

$radio = new Radio();
$advancedRemote = new AdvancedRemote($radio);

?>

