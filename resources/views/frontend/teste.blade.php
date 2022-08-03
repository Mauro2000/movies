<?php

use Illuminate\Support\Facades\Request;
use App\IMDB\IMDB;
$dados=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['imdbid'])){
        $IMDBID=filter_var($_POST['imdbid'],FILTER_SANITIZE_STRING);
        if(!empty($IMDBID)){
            $IMDB = new IMDB($IMDBID);
            if ($IMDB->isReady) {
                array_push($dados,
                    [
                        "poster"=>$IMDB->getPoster($sSize = 'small'),
                        "name"=>$IMDB->gettitle(),
                        "desc"=>$IMDB->getDescription(),
                        'categs'=>explode('/',$IMDB->getGenre()),
                        'year'=>$IMDB->getYear(),
                        'time'=>$IMDB->getRuntime(),
                        'type'=>$IMDB->getType(),
                ]);


                if($dados[0]['type']=="Movie"){
                    array_push($dados[0],
                    [
                        'directors'=>$IMDB->getDirector(),
                        'cast'=>$IMDB->getCastImages($iLimit = 12, $bMore = true, $sSize = 'mid', $bDownload = false),
                        'votes'=>$IMDB->getRating(),
                        'reviews'=> $IMDB->getMetaCritics(),
                        'MPAA'=>$IMDB->getMpaa(),
                        'Creator'=>$IMDB->getCreator(),
                        'photos'=>$IMDB->getPhotos($iLimit = 4, $bMore = false, $sSize = 'mid'),
                    ]);
                }elseif ($dados[0]['type']=="TV Series") {
                    array_push($dados[0],
                    [
                        'directors'=>$IMDB->getDirectorAsUrl($sTarget = ''),
                        'cast'=>$IMDB->getCastImages($iLimit = 12, $bMore = true, $sSize = 'mid', $bDownload = false),
                        'votes'=>$IMDB->getRating(),
                        'seasons'=>explode('/',$IMDB->getSeasons()),
                    ]);
                }elseif ($dados[0]['type']=="TV Mini Series") {
                    array_push($dados[0],
                    [
                        'directors'=>$IMDB->getDirectorAsUrl($sTarget = ''),
                        'cast'=>$IMDB->getCastImages($iLimit = 12, $bMore = true, $sSize = 'mid', $bDownload = false),
                        'votes'=>$IMDB->getRating(),
                        'seasons'=>explode('/',$IMDB->getSeasons()),
                    ]);
                }

            }else{
                $dados['status']='error';
                $dados['msg']='Não encontrado';
            }

        }
    }else{
        array_push($dados,[
            'error'=>'Campo Vazio',
    ]);
    }
}else{
    return abort('403');
}

echo json_encode($dados);

//

//print_r($IMDB);
