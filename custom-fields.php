<?php
function create_form_custom_field($post) {
    
    $date_course = get_post_meta($post->ID, 'date_course', true);
   
	$integral  = get_post_meta($post->ID, 'integral', true);
    $noturno  = get_post_meta($post->ID, 'noturno', true);
    $sabado  = get_post_meta($post->ID, 'sabado', true);
    $finais_de_semana  = get_post_meta($post->ID, 'finais_de_semana', true);
    
	$dt_integral  = get_post_meta($post->ID, 'dt_integral', true);
    $dt_noturno  = get_post_meta($post->ID, 'dt_noturno', true);
    $dt_sabado  = get_post_meta($post->ID, 'dt_sabado', true);
    $dt_finais_de_semana  = get_post_meta($post->ID, 'dt_finais_de_semana', true);
    

	$carga_h  = get_post_meta($post->ID, 'carga_h', true);
	 
	 if(empty($dt_integral)||empty($dt_noturno)||empty($dt_sabado)||empty($dt_finais_de_semana)){
			$dt_integral  = 'DD-MM-AAAA';
			$dt_noturno  = 'DD-MM-AAAA';
			$dt_sabado  = 'DD-MM-AAAA';
			$dt_finais_de_semana  = 'DD-MM-AAAA';
		}  
	  
	 
    $html  = '<label for="date_course"> Integral </label>';
    $html .= '<div id="listas"><textarea pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="Digite Data Corretamente" rows="4" cols="50" id="dt_integral"  name="dt_integral" value="'.$dt_integral .'" />' .$dt_integral . '</textarea></div>';
	
	$html .= '<label for="date_course"> Noturno </label>';
    $html .= '<div id="listas"><textarea rows="4" cols="50" id="dt_noturno"  name="dt_noturno" value="'.$dt_noturno .'" />'.$dt_noturno .' </textarea></div>';
   
	$html .= '<label for="date_course"> Sabado </label>';
    $html .= '<div id="listas"><textarea rows="4" cols="50" id="dt_sabado"  name="dt_sabado" value="'.$dt_sabado .'" />'.$dt_sabado .' </textarea></div>';
   
	$html .= '<label for="date_course"> Finais de Semana </label>';
	$html .= '<div id="listas"><textarea rows="4" cols="50" id="dt_finais_de_semana"  name="dt_finais_de_semana" value="'.$dt_finais_de_semana .'" /> '. $dt_finais_de_semana .' </textarea></div>';
  
  
	$html .= '<br><label for="integral"> Integral </label>';
	
	$html .= '<br><select name="integral" value="'. $integral .'" />
				<option selected> Escolha Turno </option>
				<option > Sim </option>
				<option> Não </option>
			</select>';	
			
	$html .= '<br><label for="integral"> Noturno </label>';		
	$html .= '<br><select name="noturno" value="'. $noturno .'" />
				<option selected> Escolha Turno </option>
				<option > Sim </option>
				<option> Não </option>
			</select>';

	$html .= '<br><label for="integral"> Sabado </label>';		
	$html .= '<br><select name="sabado" value="'. $sabado .'" />
				<option selected> Escolha Turno </option>
				<option > Sim </option>
				<option> Não </option>
			</select>';
			
	$html .= '<br><label for="integral"> Finais de Semana </label>';
	$html .= '<br><select name="finais_de_semana" value="'. $finais_de_semana .'" />
				<option selected> Escolha Turno </option>
				<option > Sim </option>
				<option> Não </option>
			</select>';
			
	$html .= '<br><label for="carga_h"> Carga horária </label>';
    $html .= '<br><input id="carga_h" type="text" name="carga_h" value="'. $carga_h .'" />';
	
  
 
    echo $html;
} 
function add_custom_meta_box() {
    add_meta_box(
            'custom-field-code',
            'Configuração Extra',
            'create_form_custom_field',
            'post'
        );
}add_action( 'add_meta_boxes', 'add_custom_meta_box');

function save_form_custom_field($post_id) { 
 
	if( isset($_POST['dt_integral'] ) ) {
        update_post_meta( $post_id, 'dt_integral', sanitize_text_field( $_POST['dt_integral'] ) );
    }	
	
	if( isset($_POST['dt_noturno'] ) ) {
        update_post_meta( $post_id, 'dt_noturno', sanitize_text_field( $_POST['dt_noturno'] ) );
    }	
	
	if( isset($_POST['dt_sabado'] ) ) {
        update_post_meta( $post_id, 'dt_sabado', sanitize_text_field( $_POST['dt_sabado'] ) );
    }	
	
	if( isset($_POST['dt_finais_de_semana'] ) ) {
        update_post_meta( $post_id, 'dt_finais_de_semana', sanitize_text_field( $_POST['dt_finais_de_semana'] ) );
    }	
	
	if( isset($_POST['integral'] ) ) {
        update_post_meta( $post_id, 'integral', sanitize_text_field( $_POST['integral'] ) );
    }	
	
	if( isset($_POST['noturno'] ) ) {
        update_post_meta( $post_id, 'noturno', sanitize_text_field( $_POST['noturno'] ) );
    }	
	
	if( isset($_POST['sabado'] ) ) {
        update_post_meta( $post_id, 'sabado', sanitize_text_field( $_POST['sabado'] ) );
    }	
	
	if( isset($_POST['finais_de_semana'] ) ) {
        update_post_meta( $post_id, 'finais_de_semana', sanitize_text_field( $_POST['finais_de_semana'] ) );
    }

	if( isset($_POST['carga_h'] ) ) {
        update_post_meta( $post_id, 'carga_h', sanitize_text_field( $_POST['carga_h'] ) );
    }
}
 
	add_action( 'save_post', 'save_form_custom_field');

?>