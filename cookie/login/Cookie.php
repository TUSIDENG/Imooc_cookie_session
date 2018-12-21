<?php
namespace tusi;

/**
 * Cookie的设置，读取，更新，删除
 * @Bug每次设置都需要设置选项，不然会使用上一次设置Cookie的选项，原因：选项是对象属性。
 * @todo 检测Cookie函数
 */
class Cookie
{
    private static $_instance = null;
    private $expires = 0;
    private $path = '';
    private $domain = '';
    private $secure = false;
    private $httponly = false;

    /**
     * 构造函数完成初始化工作
     * @param [array] $options Cookie相关选项
     */
    private function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    private function __clone() {}

    /**
     * @param [array] $options 设置Cookie相关选项
     * @return Cookie
     */
    private function setOptions(array $options = [])
    {
        if (isset($options['expires'])) {
            $this->expires = (int)$options['expires'];
        }

        if (isset($options['path'])) {
            $this->path = $options['path'];
        }

        if (isset($options['domain'])) {
            $this->domain = $options['domain'];
        }

        if (isset($options['secure'])) {
            $this->secure = (boolean)$options['secure'];
        }

        if (isset($options['httponly'])) {
            $this->httponly = (boolean)$options['httponly'];
        }

        return $this; //链式调用
    }

    /**
     * @Description 单例模式
     * @Since
     * @param array $options
     * @return Cookie Cookie对象
     */
    public static function getInstance(array $options = [])
    {
        if (is_null(self::$_instance)) {
            $class = __class__;
            self::$_instance = new $class($options);
        }
        return self::$_instance;
    }

    /**
     * 设置Cookie
     * @param string $name Cookie的名称
     * @param mixed $value Cookie的值
     * @param array $options Cookie相关选项
     */
    public function set($name, $value, array $options = [])
    {
        if (count($options) > 0) {
            $this->setOptions($options);
        }

        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }

        setcookie($name, $value, $this->expires, $this->path, $this->domain, $this->secure, $this->httponly);
    }

    /**
     * 获取Cookie值
     * @param string $name
     * @return mixed null，对象或者一个标量类型
     */
    public function get($name)
    {
        if ( isset( $_COOKIE[$name] ) ) {
            return substr( $_COOKIE[$name], 0, 1) == '{' ? json_decode( $_COOKIE[$name] ) : $_COOKIE[$name];
        } else {
            return null;
        }
    }

    /**
     * 删除Cookie
     * @param string $name
     * @param array $options
     * @return void
     */
    public function delete($name, array $options = [])
    {
        if ( isset( $options ) && count( $options ) > 1 ) {
            $this->setOptions( $options );
        }

        if ( isset($_COOKIE[$name] )) {
            setcookie( $name, '', 1, $this->path, $this->domain, $this->secure, $this->httponly );
            unset( $_COOKIE['name'] ); //删除后，服务端通过$_COOKIE也不能访问
        }
    }

    public function deleteAll(array $options = [])
    {
        if ( isset( $options ) && count( $options ) > 1 ) {
            $this->setOptions( $options );
        }

        //遍历删除Cookie
        if ( !empty($_COOKIE) )
        foreach ($_COOKIE as $name => $value) {
            setcookie( $name, '', 1, $this->path, $this->domain, $this->secure, $this->httponly );
            unset( $_COOKIE['name'] );
        }
    }
}

$cookie = Cookie::getInstance();

/* $cookie->set('aa', 1111);
$cookie->set('bb', 222);
$cookie->set( 'cc', 12345, array( 'expires' => time() + 30*24*3600  ) ); */

/* $serverName = $_SERVER['SERVER_NAME'];
$domain = substr( $serverName, strpos( $serverName, '.' ) );
echo $serverName;
echo $domain;
$cookie->set( 'cc', 'document.cookie', array( 'expires' => 0, 'path' => '/', 'domain' => $domain ,
'httponly' => true ) ); */


//$cookie->set( 'userinfo', array( 'name' => '邓威', 'age' => 23 ) );
$cookie->deleteAll();
