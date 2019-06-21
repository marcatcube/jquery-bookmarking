<?php
class MarcatGiaInPosts {
    public function __construct() {
        add_action( 'rest_api_init',  array( $this, 'MarcatGiaInPostsfunc' ));
    }
    public function MarcatGiaInPostsfunc() {
        register_rest_route( 'wp/v2/', '/MarcatGiaInPosts', array(
            'methods' => 'GET',
            'callback' => array( $this, 'MarcatGiaInPostsDatas' ),
            'args' =>array(
                'post_ids' => array(
                    'required' => true,
                    'default'=>0,
                    'sanitize_callback' => function($param) {
                        return esc_attr( $param );
                    }                    
                )
            )
        ) );
    }
    public function MarcatGiaInPostsDatas($data) {
        $ids = htmlspecialchars(esc_attr($data['post_ids']));
        $postdata = $this->MarcatGiaInPostsSearch($ids);
        return $postdata;
    }
    private function MarcatGiaInPostsSearch($ids) {
        global $wpdb;
        $idsdata = explode(',',$ids);
        foreach($idsdata as $key=>$val){
            $format[] = '%d';
        }
        $query = "SELECT * FROM $wpdb->posts WHERE ID in(".implode(', ', $format).") AND post_status='publish'";
        $resql = $wpdb->get_results($wpdb->prepare($query, $idsdata));
        //整理
        foreach ($resql as $key => $val) {            
            $out_putid[$key]['id'] = $val->ID;
            $out_putid[$key]['title'] = get_the_title($val->ID);
            $out_putid[$key]['date']['ymd'] = get_the_date( 'Y-m-d', $val->ID );
            $out_putid[$key]['date']['ymd_j'] = get_the_date( 'Y年m月d日', $val->ID );
            $week = array ( '日', '月', '火', '水', '木', '金', '土' );
            $out_putid[$key]['date']['ymd_j_yobi'] = get_the_date( 'Y年m年d日', $val->ID  ) . ' (' . $week[date ( 'w', get_the_date( 'U', $val ) )] . ')';
            $week = array ( 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' );
            $out_putid[$key]['date']['ymd_e_yobi'] = get_the_date( 'Y.m.d', $val->ID  ) . ' ' . $week[date ( 'w', get_the_date( 'U', $val ) )] . '';
            $post = get_post( $val->ID);
            $out_putid[$key]['contents'] = $post->post_content;
            $contenttaguhasi = wp_strip_all_tags( $post->post_content );
            $contenttaguhasi = remove_shortcode( $contenttaguhasi );
            $out_putid[$key]['contents_tagnashi'] = $contenttaguhasi;
            $out_put_customs = marcatgia($val->ID);
            if(!empty($out_put_customs) and is_array($out_put_customs)) {
                foreach($out_put_customs as $key2=>$val2){
                    $out_putid[$key][$key2] = $val2;
                }
            }
            $cats = get_the_category($val->ID);
            foreach($cats as $key2=>$cat){
                $out_putid[$key]['category'][$key2]['term_id'] = $cat->term_id;
                $out_putid[$key]['category'][$key2]['name'] = $cat->name;
                $out_putid[$key]['category'][$key2]['term_group'] = $cat->term_group;
                $out_putid[$key]['category'][$key2]['term_taxonomy_id'] = $cat->term_taxonomy_id;
                $out_putid[$key]['category'][$key2]['taxonomy'] = $cat->taxonomy;
                
                $out_putid[$key]['category'][$key2]['description'] = $cat->description;
                $out_putid[$key]['category'][$key2]['parent'] = $cat->parent;
                $out_putid[$key]['category'][$key2]['count'] = $cat->count;
                $out_putid[$key]['category'][$key2]['object_id'] = $cat->object_id;
                
                $out_putid[$key]['category'][$key2]['cat_ID'] = $cat->cat_ID;
                $out_putid[$key]['category'][$key2]['category_count'] = $cat->category_count;
                $out_putid[$key]['category'][$key2]['category_description'] = $cat->category_description;
                $out_putid[$key]['category'][$key2]['category_nicename'] = $cat->category_nicename;
                $out_putid[$key]['category'][$key2]['category_parent'] = $cat->category_parent;
            }
        }
        return $out_putid;
    }
}
$MarcatGiaInPosts = new MarcatGiaInPosts();
	
?>