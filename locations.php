<div class="external-block">
    <?php $counter = 0;
    if( have_rows('the_bars') ): ?>
    <?php while( have_rows('the_bars') ): the_row();
    $counter++;
        $image = get_sub_field('image');
        ?>
    <div class="frame single-item">
        <div class="bit-40"><?php echo wp_get_attachment_image( $image, 'full' ); ?></div>
        <div class="bit-60">
            <div class="details">
                <div class="heading heading__4"><?php the_sub_field('bar_name'); ?></div>
                <?php the_sub_field('short_description'); ?>

                <?php 
$location = get_sub_field('location');
if( $location ): ?>
                <div id='map<?php echo ($counter); ?>' style='width: 100%; height: 300px;'></div>
                <script>
                mapboxgl.accessToken =
                    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
                var map = new mapboxgl.Map({
                    container: 'map<?php echo ($counter); ?>',
                    style: 'mapbox://styles/silverless/ckea9de6w02lj19qo7kwsdgp8',
                    center: [<?php echo esc_attr($location['lng']); ?>,
                        <?php echo esc_attr($location['lat']); ?>
                    ],
                    zoom: 14
                });
                // add marker to map
                new mapboxgl.Marker()
                    .setLngLat([<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>])
                    .addTo(map);
                </script>
                <?php 
$link = get_sub_field('bar_website_link');
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <span class="cyan-link">
                    <a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo esc_url( $link_url ); ?>">
                        <?php echo esc_html( $link_title ); ?><i class="fas fa-external-link-alt"></i>
                    </a>
                </span>
                <?php endif; ?>



            </div>
        </div>
    </div>

    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    <p><?php the_sub_field('caption'); ?></p>

    <?php endwhile; ?>
    <?php endif; ?>
</div>
