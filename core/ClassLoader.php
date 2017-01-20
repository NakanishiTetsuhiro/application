<?php


class ClassLoader
{
    protected $dirs;


    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
        // PHPでクラスをspl_autoload_registerを使ってオートロードする
        // http://egapool.hatenablog.com/entry/2013/11/17/195045
        // 
        // spl_autoload_register()は__autoload()が呼ばれた時に実行する関数を定義する関数です。
        //
        // __autoload()とは、インスタンス生成時に対象となるクラスが読み込まれていない時に呼ばれる関数 です。呼び出し時にそのクラス名を引数として与えます。__autoloadの使い方としては、その引数（＝クラス名）をもとにクラスファイルを読み込むメソッドを実装するようにします。
    }


    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    public function loadClass($class)
    {
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $class . '.php';
            if (is_readable($file)) {
                require $file;
            
            
                return;
            }
        }
    }
}
