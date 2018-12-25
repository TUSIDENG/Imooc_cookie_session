<?php
class CustomSession implements SessionHandlerInterface {
    private $link;
    private $lifetime;

    public function open(  $save_path, $session_name ) {
        $this->lifetime = get_cfg_var('session.gc_maxlifetime');
        $this->link = mysqli_connect('localhost', 'root', 'root', 'php');
        mysqli_set_charset($this->link, 'utf8');

        if ( $this->link ) {
            return true;
        }
        return false;
    }

    public function close() {
        mysqli_close( $this->link );
        return true;
    }

    public function read($session_id) {
        $id = mysqli_escape_string($this->link, $session_id);
        $sql = "SELECT * FROM sessions WHERE session_id='{$id}' AND session_expires>" . time();
        $result = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($result)==1) {
            $session_data = mysqli_fetch_assoc($result)['session_data'];
            return $session_data;
        }
        return '';
    }

    public function write( $session_id, $session_data ) {
        $newExpires = time() + $this->lifetime;

        $session_id = mysqli_escape_string($this->link, $session_id);
        $session_data = mysqli_escape_string($this->link, $session_data);

        // 首先查询是否存在会话id,存在是更新记录，否则是第一次，插入记录
        $sql = "SELECT session_id FROM sessions WHERE session_id='{$session_id}'";
        $result = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($result)==1) {
            $sql = "UPDATE sessions SET session_expires='{$newExpires}', session_data='{$session_data}' WHERE session_id='{$session_id}'";
        } else {
            $sql = "INSERT INTO sessions VALUES('$session_id', '$session_data', '$newExpires')";
        }
        mysqli_query($this->link, $sql);
        return mysqli_affected_rows($this->link)===1;
    }

    public function destroy($session_id) {
        $id = mysqli_escape_string($this->link, $session_id);
        $sql = "DELETE FROM sessions WHERE session_id='{$id}'";
        mysqli_query($this->link, $sql);
        return mysqli_affected_rows($this->link)==1;
    }

    public function gc($maxlifetime) {
        $sql = 'DELETE FROM sessions WHERE session_expires<' . time();
        mysqli_query($this->link, $sql);
        if (mysqli_affected_rows($this->link) > 1) {
            return true;
        }
        return false;
    }
}