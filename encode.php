public function encode_curl_url($url)
    {
        //get scheme url
        $scheme =parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);
        $port = parse_url($url, PHP_URL_PORT);
        $path = parse_url($url, PHP_URL_PATH);

        //process path
        $explodePath = explode('/', $path);

        $endPath = end($explodePath);
        $endPath = rawurlencode($endPath); //encode it
        // join path
        $joinPath = '';
        foreach ($explodePath as $p) {
            if (!empty($p)) {
                if ($p == end($explodePath))
                    $joinPath .= '/'.$endPath;
                else
                    $joinPath .= '/'.$p;
            }
        }

        $enCodeUrl = $scheme.'://'.$host;
        if (isset($port)) {
            $enCodeUrl .= ':'.$port;
        }
        $enCodeUrl .= $joinPath;
        return $enCodeUrl;
    }
