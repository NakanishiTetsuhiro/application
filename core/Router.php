<?php

class Router
{
    protected $routes;


    public function __construct($definitions)
    {
        $this->routes = $this->compileRoutes($definitions);
    }


    public function compileRoutes($definitions)
    {
        $routes = array();

        foreach ($definitions as $url => $params) {
            $tokens = explode('/', ltrim($url, '/'));
            // explode : 文字列を/をdelemeterにして分割した後、各要素を配列に格納した値を返す
            // ltrim : 文字列の先頭から空白（もしくはその他の文字）を取り除く(今回の場合は / )

            foreach ($tokens as $i => $token) {
                if (0 === strpos($token, ':')) {
                    // strpos : 文字列内の部分文字列が最初に現れる場所を見つける

                    $name = substr($token, 1);
                    // substr : Return part of a string

                    $token = '(?P<' . $name . '>[^/]+)';
                }
                $tokens[$i] = $token;
            }

            $pattern = '/' . implode('/', $tokens);
            // implode : tokensの中身をスラッシュで区切って１つの文字列としてくっつける
            $routes[$pattern] = $params;
        }

        return $routes;
    }


    /**
     * 指定されたPATH_INFOを元にルーティングパラメータを特定する
     *
     * @param string $path_info
     * @return array|false
     */
    public function resolve($path_info)
    {
        if ('/' !== substr($path_info, 0, 1)) {
            $path_info = '/' . $path_info;
        }
        
        foreach ($this->routes as $pattern => $params) {

            // preg_matchで使われている#はデリミタ。正規表現はこれで囲まなければいけない決まりらしい
            if (preg_match('#^' . $pattern . '$#', $path_info, $matches)) {
                $params = array_merge($params, $matches);

                return $params;
            }
        }

        return false;
    }
}
