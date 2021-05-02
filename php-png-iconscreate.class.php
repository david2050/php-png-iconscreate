<?php

class phpPngIconsCreate {
    public $saidas;
    function __construct(){
        $this->saidas = array(
            "128x128" => 128, 
            "144x144" => 144, 
            "152x152" => 152, 
            "192x192" => 192, 
            "192x192-apple" => 192, 
            "256x256" => 256, 
            "512x512" => 512
        );
    }
    function createIconsPwa($arquivo_entrada, $path_saida){
        if(@file_exists($arquivo_entrada)){
            $saidas = $this->saidas;
            @mkdir($path_saida);
            
            $imagem = $arquivo_entrada;
            $fileHandle = @fopen($imagem, 'r');
            
            $src = imagecreatefromstring(stream_get_contents($fileHandle));
            list($width, $height) = array(imagesx($src), imagesy($src));
            
            foreach($saidas as $key=>$val){
                $tmp = imagecreatetruecolor($val, $val);
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $val, $val, $width, $height);
                $saida_now = $path_saida.'/icon-'.$key.'.png';
                imagepng($tmp, $saida_now, 8.5);
                $relatorio_saida[] = $path_saida.'/icon-'.$key.'.png';
            }

            return $relatorio_saida;
        }
        else {
            return "arquivo de entrada não encontrado";
        }
    
        
    }
}