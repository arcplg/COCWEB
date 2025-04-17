<?php
// Add themes support
function custom_new_menu() {
    register_nav_menu('primary-menu',__( 'Primary Menu' )); 
}
add_action( 'init', 'custom_new_menu' );

// Settings Meta
function update_og_url($url) {
    return "https://concrete-corp.com";
}
add_filter('wpseo_opengraph_url', 'update_og_url', 10, 1);

function update_og_sitename($name) {
    return "CONCRETE Corp";
}
add_filter('wpseo_opengraph_site_name', 'update_og_sitename', 10, 1);

// Disable upgrade plugins
function disable_upgrade_plugins( $value ) {
    if( isset( $value->response['advanced-custom-fields-pro/acf.php'] ) ) {        
        unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    }
    if( isset( $value->response['polylang-pro/polylang.php'] ) ) {        
        unset( $value->response['polylang-pro/polylang.php'] );
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_upgrade_plugins' );

// Add Custom post type
function create_posttype() {
    register_post_type( 'career',
        array(
            'labels' => array(
                'name' => __( 'Carrers' ),
                'singular_name' => __( 'Carrer' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'career'),
            'show_in_rest' => true,
        )
    );

    register_post_type( 'cv',
        array(
            'labels' => array(
                'name' => __( 'Careers CV' ),
                'singular_name' => __( 'Career Cv' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'cv'),
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'create_posttype' );

function send_career_cv() {
    $errors = array();
    $data = array();
    $wordpress_upload_dir = wp_upload_dir();        
    $fileCV = $_FILES['file'];
    $new_file_path = $wordpress_upload_dir['path'] . '/' . $fileCV['name'];
    $new_file_mime = mime_content_type( $fileCV['tmp_name'] );
    $allowedExtension = array('pdf', 'docx', 'doc');

    $language = $_POST['language'];
    $require_name_error = pll__('require name');
    $require_position_error = pll__('require position');
    $require_file = pll__('require upload');
    $max_size_file = pll__('max size file');
    $invalid_extension = pll__('invalid extension');

    // Check errors
    $data['candidate'] = isset($_POST['candidate']) ? $_POST['candidate'] : '';
    $data['position-name'] = isset($_POST['position-name']) ? $_POST['position-name'] : '';
    $data['position-id'] = isset($_POST['position-id']) ? $_POST['position-id'] : '';
    $data['fileCV'] = isset($fileCV) ? $fileCV : '';

    $errors['candidate'] = empty($data['candidate']) ? $require_name_error : '';
    $errors['positionId'] = empty($data['position-id']) ? $require_position_error : '';
    if(empty($data['fileCV'])) {
        $errors['fileCV'] = $require_file;
    }else {
        if($data['fileCV']['size'] > wp_max_upload_size()) $errors['fileCV'] = $max_size_file;

        $ext = pathinfo($data['fileCV']['name'], PATHINFO_EXTENSION);
        $errors['fileCV'] = !in_array($ext, $allowedExtension) ? $invalid_extension : '';
    }

    if($errors['fileCV'] != '' || $errors['positionId'] != '' || $errors['candidate'] != '') {
        $errors['isSuccess'] = false;
    }

    // number of tries when the file with the same name is already exists
    $i = 1;
    while( file_exists( $new_file_path ) ) {
        $i++;
        $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $fileCV['name'];
    }
    
    // looks like everything is OK
    if(!isset($errors['isSuccess'])) {
        if(move_uploaded_file($fileCV['tmp_name'], $new_file_path)) {
            $upload_id = wp_insert_attachment( array(
                'guid'           => $new_file_path, 
                'post_mime_type' => $new_file_mime,
                'post_title'     => preg_replace( '/\.[^.]+$/', '', $fileCV['name'] ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $new_file_path );
        
            // Generate and save the attachment metas into the database
            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            $url = wp_get_attachment_url($upload_id);
    
            // Insert to admin
            $id_post = wp_insert_post(array(
                'post_title' => $data['candidate'].' '.date('Y/m/d h:i'),
                'post_content' => $data['position-name'],
                'post_type' => 'cv',
                'post_author'   => 1,
                'post_status' => 'publish'
            ));
            update_post_meta( $id_post, 'links_cv', $upload_id );
    
            // Send mail
            $to = pll__('email recieve cv');
            $subject = 'Apply '.$data['position-name'].' - '.$data['candidate'];
            $message = htmlspecialchars_decode('<div style="font-size: 18px; line-height: 40px;">'.'Information of candidate:<br />'
                .'<b>Name:</b> '.$data['candidate'].'<br />'.
                '<b>Apply position: </b>'.$data['position-name'].'<br />'
                .'<b>CV: </b>'.'<a href="'.$url.'">Read more</a></div>'
            );
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail( $to, $subject, $message, $headers);
    
            $errors['isSuccess'] = true;
        }
    }    
    
    echo json_encode($errors);
    die();
}

add_action( 'wp_ajax_send_career_cv', 'send_career_cv' );
add_action( 'wp_ajax_nopriv_send_career_cv', 'send_career_cv' );

// String translation
add_action('init', function() {
    pll_register_string('welcome-text', 'WELCOME TEXT');
    pll_register_string('join-us', 'JOIN US');
    pll_register_string('upload-your-cv', 'UPLOAD YOUR CV');
    pll_register_string('your-name', 'YOUR NAME');
    pll_register_string('position', 'position');
    pll_register_string('submit', 'SUBMIT');
    pll_register_string('require_name', 'require name');
    pll_register_string('require_upload', 'require upload');
    pll_register_string('require_position', 'require position');
    pll_register_string('max_size_file', 'max size file');
    pll_register_string('invalid_extension', 'invalid extension');
    pll_register_string('job-list', 'job list');
    pll_register_string('text-careers', 'Careers');
    pll_register_string('require-compulsory', 'require compulsory');
    pll_register_string('working-time', 'working time');
    pll_register_string('skill_priority', 'skill priority');
    pll_register_string('benefit', 'benefit');
    pll_register_string('salary', 'salary');
    pll_register_string('deadline', 'deadline');
    pll_register_string('thank-you-sent', 'thank you sent');
    pll_register_string('will-contact-after', 'will contact after');
    pll_register_string('form-have-error', 'form have error');
    pll_register_string('text-service', 'SERVICES');
    // pll_register_string('text-technology', 'TECHNOLOGY');
    pll_register_string('our-clients', 'OUR CLIENTS');
    pll_register_string('our-informations', 'OUR INFORMATIONS');
    pll_register_string('members', 'MEMBERS');
    pll_register_string('news', 'NEWS');
    pll_register_string('meet our team', 'MEET OUR TEAM');
    pll_register_string('email', 'email recieve cv');
});