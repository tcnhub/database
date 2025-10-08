<div class="container mt-5" id="customTabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="machupicchu-tab" data-bs-toggle="tab" data-bs-target="#machupicchu" type="button" role="tab" aria-controls="machupicchu" aria-selected="true">MACHUPICCHU TOURS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="peru-tab" data-bs-toggle="tab" data-bs-target="#peru" type="button" role="tab" aria-controls="peru" aria-selected="false">PERU TOURS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="inca-tab" data-bs-toggle="tab" data-bs-target="#inca" type="button" role="tab" aria-controls="inca" aria-selected="false">INCA TRAIL TOURS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ausangate-tab" data-bs-toggle="tab" data-bs-target="#ausangate" type="button" role="tab" aria-controls="ausangate" aria-selected="false">AUSANGATE</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lares-tab" data-bs-toggle="tab" data-bs-target="#lares" type="button" role="tab" aria-controls="lares" aria-selected="false">LARES</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="salkantay-tab" data-bs-toggle="tab" data-bs-target="#salkantay" type="button" role="tab" aria-controls="salkantay" aria-selected="false">SALKANTAY</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="choquequirao-tab" data-bs-toggle="tab" data-bs-target="#choquequirao" type="button" role="tab" aria-controls="choquequirao" aria-selected="false">CHOQUEQUIRAO</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="machupicchu" role="tabpanel" aria-labelledby="machupicchu-tab">
            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'machu-picchu-tours',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Machu Picchu Tours</h2></div>';
                    }



                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';


                    ?>


                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>

        </div>



        <div class="tab-pane fade" id="peru" role="tabpanel" aria-labelledby="peru-tab">
            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'peru-packages',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Peru Packages</h2></div>';
                    }


                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>
        </div>
        <div class="tab-pane fade" id="inca" role="tabpanel" aria-labelledby="inca-tab">
            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'inca-trail-tours',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Inca Trail Treks</h2></div>';
                    }


                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>
        </div>
        <div class="tab-pane fade" id="ausangate" role="tabpanel" aria-labelledby="ausangate-tab">


            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'ausangate-treks',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Ausangate Treks</h2></div>';
                    }


                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>


        </div>
        <div class="tab-pane fade" id="lares" role="tabpanel" aria-labelledby="lares-tab">
            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'lares-treks',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Tours</h2></div>';
                    }


                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>
        </div>
        <div class="tab-pane fade" id="salkantay" role="tabpanel" aria-labelledby="salkantay-tab">



            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'salkantay-treks',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Salkantay Treks</h2></div>';
                    }

                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>



        </div>
        <div class="tab-pane fade" id="choquequirao" role="tabpanel" aria-labelledby="choquequirao-tab">


            <?php
            $args = array(
                'post_type' => 'package',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tour-category',
                        'field'    => 'slug',
                        'terms'    => 'choquequirao-treks',
                    ),
                ),
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<div class="row">';
                $counter = 1; // Contador para rastrear el índice del post

                while ($query->have_posts()) {
                    $query->the_post();

                    // Asignar clase según la posición
                    if ($counter === 1) {
                        $col_class = 'col-md-8';
                    } elseif ($counter === 2) {
                        $col_class = 'col-md-4';
                    } else {
                        $col_class = 'col-md-4';
                    }

                    // Mostrar un título después de la quinta iteración
                    if ($counter === 6) {
                        echo '<div class="col-12 mb-3"><h2 class="text-center">More Choquequirao Treks</h2></div>';
                    }

                    // Seleccionar plantilla según la iteración
                    $template_part = ($counter <= 5) ? 'includes/cards/card-5' : 'includes/cards/card-3';
                    ?>
                    <div class="<?php echo $col_class; ?> mb-3">
                        <?php get_template_part($template_part); ?>
                    </div>
                    <?php
                    $counter++; // Incrementar el contador
                }
                echo '</div>';
            } else {
                echo '<p>No se encontraron tours para "Machu Picchu Tours".</p>';
            }

            wp_reset_postdata();
            ?>


        </div>
    </div>
</div>
