<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* ====================================================================
 * Our customization (fully editable)
 * ==================================================================*/
	if(!isset($customization)){ //does the child theme use customization? 
	$customization = array(

		'ccreation' => array(
			array('title' => 'CCreation '.__('Settings', 'cc'), 'des' => ''),
			array('title' => __('General', 'cc'), 'id' => 'cc_main', 'des' => ''),
			array('title' => __('Google Font', 'cc'), 'id' => 'cc_google_font', 'des' => ''),
		
		'cc_colors' => array(
			array('title' => __('Colors', 'cc'), 'des' => __('Edit colors.', 'cc')),
			array('title' => __('Main', 'cc'), 'id' => 'cc_colors_main', 'des' => ''),),
		
	);global $customization;}

/* ====================================================================
 * Our customization (fully editable)
 * ==================================================================*/
	if(!isset($cc)){
	$cc = array(
	'no_index' => array( // no-index section
		'version' => array('3.1.4', '3'), // single option, not editable
		),

	'cc_main' => array( //section 
		'brand_name' => array('default' => 'My Company', 'type' => 'text', 'title' => 'Brand name'), //single option
		'brand_creation_day' => array('default' => 2002, 'type' => 'boolean', 'title' => 'Company creation day'), //single option
		'brand_mail' => array('default' => 'sample@example.com', 'type' => 'boolean', 'title' => 'Company e-mail'), //single option
		'brand_phone' => array('default' => '626 326 632', 'type' => 'boolean', 'title' => 'Company phone'), //single option
		),
	'cc_google_font' => array( //section 
		'google_font' => array('default' => 'Lato', 'type' => 'select', 'title' => 'Font', 'args' => array('Lato', 'Open+Sans', 'Roboto')), //single option
		),
	'cc_colors_main' => array( //section 
		'bg_color' => array('default' => '#fff', 'type' => 'color', 'title' => 'Background colors'), //single option
		),
	);global $cc;}

/* ====================================================================
 * Customization
 * ==================================================================*/
	function cc_customizer( $wp_customize ) {
	//Multiselect
	class cc_ms extends WP_Customize_Control {public $type = 'multiple-select'; public function render_content() { if ( empty( $this->choices )) return; ?><label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><select <?php $this->link(); ?> multiple="multiple" style="width: 100%;"> <?php foreach ( $this->choices as $value => $label ) {$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';} ?></select></label><?php }}
	
	//Function add Panel
	function cc_wpp($wp_customize, $id, $option, $d){$wp_customize->add_panel($id, array('priority' => $d,'capability' => 'edit_theme_options','theme_supports' => '','title' => $option[0]['title'],'description' => $option[0]['des']));}
	//Function add sections
	function cc_wps($wp_customize, $id, $section, $e){$wp_customize->add_section($section['id'], array('priority' => $e,'capability' => 'edit_theme_options','theme_supports' => '','title' => $section['title'],'description' => $section['des'],'panel' => $id));}
	//Register our menu
	global $customization;$d = 10;foreach($customization as $id => $option){$i = 0;$e = 1;cc_wpp($wp_customize, $id, $option, $d);$d++;foreach($option as $section){if($i != 0){cc_wps($wp_customize, $id, $section, $e);}$i++;}$i = 0;$e++;}
	
	}add_action( 'customize_register', 'cc_customizer' );

/* ====================================================================
 * Register customization settings
 * ==================================================================*/
	function cc_register(){global $cc;foreach(array_keys($cc) as $key){$cc[$key] = get_theme_mod($key, $cc[$key]);}}cc_register();global $cc;

/* ====================================================================
 * Register shortocodes
 * ==================================================================*/
	function c_($id){global $cc;return $cc[$id];}function ec_($id){global $cc;echo $cc[$id];}
 ?>
