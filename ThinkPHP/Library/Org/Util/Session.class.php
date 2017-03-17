<?php
/**
 * author          : 刘磊
 * createTime   : 2015/8/25 11:00
 * description   : 
 */

namespace Org\Util;
class Session
{
    public static $test = 1;
    static function id()
    {
        return session_id();
    }
    static function start()
    {
        //	session_set_cookie_params(0,C("COOKIE_PATH"),C("DOMAIN_ROOT"));
        session_set_cookie_params(0);
        @session_start();
    }

    // 判断session是否存在
    static function is_set($name) {
        return isset($_SESSION[C("AUTH_KEY").$name]);
    }

    // 获取某个session值
    static function get($name) {
        if(session( C("AUTH_KEY").$name ) != null){
            return session( C("AUTH_KEY").$name );
        }
        return null;
    }

    // 设置某个session值
    static function set($name,$value) {
        session( C("AUTH_KEY").$name , $value );
    }

    // 删除某个session值
    static function delete($name) {
        session( C("AUTH_KEY").$name , null );
    }

    // 清空session
    static function clear() {
        session('[destroy]');
    }

    //关闭session的读写
    static function close()
    {
        @session_write_close();
    }

    //session是否过期
    static function  is_expired()
    {
        if ( session( C("AUTH_KEY")."expire") != null  && session( C("AUTH_KEY")."expire" ) <time()) {
            return true;
        }
        else {
            session( C("AUTH_KEY")."expire" , time() + ( intval ( C("EXPIRED_TIME") ) * 60 ) );
            return false;
        }
    }
}
