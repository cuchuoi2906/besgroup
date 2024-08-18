<?php
   function pageheader() {
        global $post;
        if(is_page()){
            $title = get_the_title();
            $himgurl = get_template_directory_uri()."/images/header/about.jpg";
        }
        ?>
        <div class="section">
            <div class="section_secondmv" style="background-image:url(<?php echo $himgurl ?>)">
            <div class="insidemv">
                <div class="container">
                <h2><span><?php echo $title ?></span></h2>
                </div>
            </div>
            </div>
        </div>
<?php
    }
?>