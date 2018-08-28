<?php
/*
Template Name: Search Page
*/
get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php
		global $wp_query;
		$total_results = $wp_query->found_posts;
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>