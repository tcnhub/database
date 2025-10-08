<div class="container mt-5" id="customTabs">

    <!-- Navegación de pestañas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php
        $tabs = [
            'machupicchu' => ['title' => 'MACHUPICCHU TOURS', 'slug' => 'machu-picchu-tours', 'more' => 'More Machu Picchu Tours'],
            'peru'        => ['title' => 'PERU TOURS', 'slug' => 'peru-packages', 'more' => 'More Peru Packages'],
            'inca'        => ['title' => 'INCA TRAIL TOURS', 'slug' => 'inca-trail-tours', 'more' => 'More Inca Trail Treks'],
            'ausangate'   => ['title' => 'AUSANGATE', 'slug' => 'ausangate-treks', 'more' => 'More Ausangate Treks'],
            'lares'       => ['title' => 'LARES', 'slug' => 'lares-treks', 'more' => 'More Lares Treks'],
            'salkantay'   => ['title' => 'SALKANTAY', 'slug' => 'salkantay-treks', 'more' => 'More Salkantay Treks'],
            'choquequirao'=> ['title' => 'CHOQUEQUIRAO', 'slug' => 'choquequirao-treks', 'more' => 'More Choquequirao Treks'],
        ];

        $is_first = true;
        foreach ($tabs as $id => $data): ?>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link <?php echo $is_first ? 'active' : ''; ?>"
                    id="<?php echo $id; ?>-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#<?php echo $id; ?>"
                    type="button"
                    role="tab"
                    aria-controls="<?php echo $id; ?>"
                    aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>">
                    <?php echo esc_html($data['title']); ?>
                </button>
            </li>
            <?php $is_first = false; endforeach; ?>
    </ul>

    <!-- Contenido de pestañas -->
    <div class="tab-content" id="myTabContent">

        <?php
        $is_first = true;
        foreach ($tabs as $id => $data):
            $args = [
                'post_type'      => 'package',
                'tax_query'      => [[
                    'taxonomy' => 'tour-category',
                    'field'    => 'slug',
                    'terms'    => $data['slug'],
                ]],
                'posts_per_page' => -1,
            ];

            $query = new WP_Query($args);
            ?>
            <div class="tab-pane fade <?php echo $is_first ? 'show active' : ''; ?>"
                 id="<?php echo $id; ?>"
                 role="tabpanel"
                 aria-labelledby="<?php echo $id; ?>-tab">
                <?php
                if ($query->have_posts()) {
                    echo '<div class="row">';
                    $counter = 1;

                    while ($query->have_posts()) {
                        $query->the_post();

                        $col_class = ($counter === 1) ? 'col-md-8' : 'col-md-4';

                        if ($counter === 6) {
                            echo '<div class="col-12 mb-3"><h2 class="text-center">'
                                . esc_html($data['more']) . '</h2></div>';
                        }

                        $template_part = ($counter <= 5)
                            ? 'includes/cards/card-5'
                            : 'includes/cards/card-3';
                        ?>
                        <div class="<?php echo esc_attr($col_class); ?> mb-3">
                            <?php get_template_part($template_part); ?>
                        </div>
                        <?php
                        $counter++;
                    }
                    echo '</div>';
                } else {
                    echo '<p>No se encontraron tours para "' . esc_html($data['title']) . '".</p>';
                }

                wp_reset_postdata();
                ?>
            </div>
            <?php
            $is_first = false;
        endforeach;
        ?>
    </div>
</div>
