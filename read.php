<?php

function read( $node, $data = '' ) {

    global $EXCLUDE;
    global $FILE_NAME;

    if( gettype($node) == 'object' || isset($node->type) ){
        if (in_array($node->title, $EXCLUDE)) {
            return $data;
        }
        if(isset($node->children)){
            if ($node->title != NULL) {
                $data .= ("<li><h2>" . $node->title. "</h2></li>");
            }
            $data .= '<ul>';
            foreach($node->children as $key => $child){
                    $data = read($child, $data );
            }
            $data .= '</ul>';
        }else{
                $data .= convert( $node->title, @$node->uri );
        }
    }else{
        $data .= "Seems like ". $FILE_NAME ." is not a json bookmark file";
    }
    return $data;
}


function convert( $title, $url ){
        if($url){
                $link = '<li><a href="' . $url . '" target="_blank">' . $title . '</a></li>';
        }else{
                $link = '<li><a href="#" style="color:#ccc">' . $title . '</a></li>';
        }
        return $link;
}


