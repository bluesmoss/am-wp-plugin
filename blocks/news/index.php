<?php
function plz_news_render_callback($block_attributes, $block_content){

  $block_classes = isset($block_attributes['className'])
    ? $block_attributes['className'] . 'wp-block-plz-news'
    : 'wp-block-plz-news';

  $args = array(
    'post_per_page' => -1,
    ''
  );

  if(isset($block_attributes['category'])){
    $args['category'] = $block_attributes['category'];
  }

  $news = get_posts($args);
  $render = '';

	if ( 0 < count( $news ) ) {
		$render     .= '<div class="' . esc_attr( $block_classes ) . '">';
			$render .= '<h3>News related:</h3>';
			$render .= '<ul className="posts">';
		foreach ( $news as $new ) {
			$render     .= '<li>';
				$render .= "<a href=\"{$new->guid}\">";
				$render .= "{$new->post_title}";
				$render .= '</a>';
			$render     .= '</li>';
		}
			$render .= '</ul>';
		$render     .= '</div>';
	}

	return $render;
}

add_action('init', 'plz_news_block_init');

function plz_news_block_init(){
  register_block_type(
    __DIR__,
    [
      'render_callback' => 'plz_news_render_callback'
    ]
  );
}