<?php

   function the_breadcrumb() {

        global $post;

        echo '

        <div class="section section_breadcrumb"><div class="container"><ul id="breadcrumbs" class="breadcrumb">';

        if (!is_home()) {

            echo '<li><a href="';

            echo get_option('home');

            echo '">';

            echo 'Trang chủ';

            echo '</a></li>';

            if (is_category() || is_single()) {

                if ( is_singular( 'news' ) ) {
                    $wp_the_query   = $GLOBALS['wp_the_query'];
                    $post_type        = $wp_the_query->query_vars['post_type'];
                    $post_type_object = get_post_type_object( $post_type );
                    $postname = $post_type_object->labels->singular_name;
                    $postype_link = get_post_type_archive_link('news');

                    echo "<li><a href=".$postype_link.">".$postname."</a></li>";
                    echo '<li>';

                    echo the_title();

                    echo '</li>';
                }else {
                    echo '<li>';

                    the_category(' </li>');

                    if (is_single()) {

                        echo '</li>';

                        echo '<li>';

                        echo the_title();

                        echo '</li>';

                        echo '</li>';

                    }
                }

            } elseif (is_page()) {

                if($post->post_parent){

                    $anc = get_post_ancestors( $post->ID );

                    $title = get_the_title();

                    foreach ( $anc as $ancestor ) {

                        $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator"></li>';

                    }

                    echo $output;

                    echo '<strong title="'.$title.'"> '.$title.'</strong>';

                } else {

                    echo '<li><strong> '.get_the_title().'</strong></li>';

                }

            } 

        }

        elseif (is_tag()) {single_tag_title();}

        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}

        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}

        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}

        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}

        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}

        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}

        echo '</ul></div></div>';

    }

?>

