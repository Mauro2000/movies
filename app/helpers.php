<?php

function activeSubMenu($uri = '') {
    $active = '';

    if (Request::is( Request::segment(1).'/'.Request::segment(2) . '/' . $uri)) {
            $active = 'active';


    }

    return $active;
}


function activeMenu($uri = '') {
    $active = '';

    if (Request::is(Request::segment(1) . '/' . $uri.'/*')) {
            $active = 'active';


    }

    return $active;
}

function getTrailer($movie, $year)
        {
            $movieName = str_replace(' ', '+', $movie);
            $movieYear = $year;
            $page = file_get_contents('http://www.youtube.com/results?search_query='.$movieName.'+'.$movieYear.'+trailer&aq=1&hl=en');



            if($page)
            {
                if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $page, $matches))
                {
                    return $matches;

                    $embed = '<embed src="http://www.youtube.com/v/'.$matches[1].'&autoplay=1&fs=1" type="application/x-shockwave-flash" wmode="transparent" allowfullscreen="true" width="557" height="361"></embed>';
                    return $embed;
                }
            }
            else
            {
                echo "<b>check internet connection.....</b>";
            }
        }

        function imageColor($imageUrl){

            $image = new \Imagick(asset($imageUrl));
            $image->resizeImage(250, 250, \Imagick::FILTER_GAUSSIAN, 1);
            $image->quantizeImage(1, \Imagick::COLORSPACE_RGB, 0, false, false);
            $image->setFormat('RGB');
            return substr(bin2hex($image), 0, 6);
        }
