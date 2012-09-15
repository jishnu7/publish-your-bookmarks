<?php

function read($node, $data = '') {

    global $EXCLUDE;
    global $FILE_NAME;
    global $FAVICON;

    if(gettype($node) == 'object' || isset($node->type)) {
        if (in_array($node->title, $EXCLUDE)) {
            return $data;
        }
        if(isset($node->children)) {
            if ($node->title != NULL) {
                $data .= ('<li><a href="#">' . $node->title. '</a></li>');
            }
            if ($data == '') {
                $data .= '<ul class="bookmark-list">';
            } else {
                $data .= '<ul>';
            }
            foreach($node->children as $key => $child) {
                    $data = read($child, $data );
            }
            $data .= '</ul>';
        }else{
            if ($FAVICON) {
                $data .= convert($node->title, @$node->uri, get_favicon(@$node->uri));
            } else {
                $data .= convert($node->title, @$node->uri, False);
            }
        }
    }else{
        $data .= "Seems like ". $FILE_NAME ." is not a json bookmark file";
    }
    return $data;
}


function convert($title, $url, $favicon) {
        if($url) {
            $link = '<li>';
            if ($favicon) {
                $link .= '<img src="'. $favicon .'" />';
            }
            $link .= '<a href="' . $url . '" target="_blank">' . $title . '</a></li>';
        }else{
            $link = '<li><a href="#" style="color:#ccc">' . $title . '</a></li>';
        }
        return $link;
}

function get_favicon($url) {
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return 'http://' . $regs['domain'] . '/favicon.ico';
    }
    return False;
}
