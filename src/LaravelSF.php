<?php 
namespace SweeterFetch;

use Illuminate\Support\Facades\DB;
class LaravelSF {
    protected static $pdo;
    protected static $need_dump_info;
    //init
    function __construct( $connection_name = 'mysql' ) {
        if (self::$pdo == null) {
            self::$pdo = DB::connection( $connection_name )->getPdo();
            self::$pdo->exec ( 'SET NAMES UTF8' );

            //follow .env
            $this->NeedDumpInfo(env('APP_DEBUG'));
        }
    }

    //for dump
    private function IsError() {
        if( self::$need_dump_info ) {
            $errorCode = self::$pdo->errorCode ();
            if ($errorCode != '00000') {
                var_dump ( self::$pdo->errorInfo () );
                exit ();
            }
        }
    }

    //need dump info
    function NeedDumpInfo( $flag = true ) {
        self::$need_dump_info = (bool)$flag;
    }

    //execute query
    function Eq($sql) {
        $res = self::$pdo->query ( $sql );
        $this->IsError ();
        $res->setFetchMode ( \PDO::FETCH_ASSOC );
        return $res->fetchAll ();
    }

    //execute one row
    function Eor($sql) {
        $res = self::$pdo->query ( $sql );
        $this->IsError ();
        $res->setFetchMode ( \PDO::FETCH_ASSOC );
        $data = $res->fetch ();
        return $data;
    }

    //execute col
    function Ec($sql) {
        $res = self::$pdo->query ( $sql );
        $this->IsError ();
        $res->setFetchMode ( \PDO::FETCH_ASSOC );
        $data = $res->fetchAll ( \PDO::FETCH_COLUMN, 0 );
        return $data;
    }

    //execute scalar
    function Es($sql) {
        $res = self::$pdo->query ( $sql );
        $this->IsError ();
        $res->setFetchMode ( \PDO::FETCH_NUM );
        $data = $res->fetch ( \PDO::FETCH_COLUMN );
        return $data;
    }

    //execute none query
    function Enq($sql) {
        $res = self::$pdo->exec($sql);
        $this->IsError();

        return $res;
    }

    function quote($var) {
        return self::$pdo->quote ( $var );
    }
}
