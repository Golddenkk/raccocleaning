<?php
$excerpt = get_the_excerpt();
$author = get_field('author');
$post_date = get_the_date('d/m/y');
?>
<?php
            $size = 'large';
            the_post_thumbnail( $size);
            ?>
<?php the_permalink() ?>
<?php the_title(); ?>