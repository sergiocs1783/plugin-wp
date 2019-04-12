<?php

	function showCourse() {
	 
	 $args = array(
		'cat' => 38, //ID Categoria Curso
		'posts_per_page ' => 4, // Número de posts a exibir
	);
?>


<table style="font-size: 19px;" class="cursos-home table table-striped">
  <thead>
    <tr>
      <th style="text-align: center;">#</th>
      <th style="text-align: center;">CURSO</th>
      <th style="text-align: center;">INTEGRAL</th>
      <th style="text-align: center;">NOTURNO</th>
      <th style="text-align: center;">SABADO</th>
      <th style="text-align: center;">FINAL DE SEMANA</th>
      <th style="text-align: center;">INSCREVA-SE</th>
    </tr>
  </thead>
  
  <?php $new_loop = new WP_Query( $args );
		if ( $new_loop->have_posts() ) { while ( $new_loop->have_posts() ) : $new_loop->the_post();
			if($dt_integral = get_post_meta(get_the_ID(), 'dt_integral', true)){
				if($dt_noturno = get_post_meta(get_the_ID(), 'dt_noturno', true)){
					if($dt_sabado = get_post_meta(get_the_ID(), 'dt_sabado', true)){
						if($dt_finais_de_semana = get_post_meta(get_the_ID(), 'dt_finais_de_semana', true)){
							if($integral = get_post_meta(get_the_ID(), 'integral', true)) {
								if($noturno = get_post_meta(get_the_ID(), 'noturno', true)) {
									if($sabado = get_post_meta(get_the_ID(), 'sabado', true)) {
										if($finais_de_semana = get_post_meta(get_the_ID(), 'finais_de_semana', true)) {
											if($carga_h = get_post_meta(get_the_ID(), 'carga_h', true)) {				
	?>	
	
		<tbody>
			<tr>
				<td style="width: 150px;"><?=the_post_thumbnail('curse-custom-size') ?></td>
				<td ><?=the_title() ?><br>Carga horaria: <?php echo esc_html($carga_h); ?> H<br> Presencial e Online Ao Vivo</td>
				<td style="width: 130px;text-align: center;"><?php if($integral=='Sim'){ echo esc_html($dt_integral);} endif; ?></td>
				<td style="width: 130px;text-align: center;"><?php if($noturno=='Sim'){ echo esc_html($dt_noturno);} endif; ?></td>
				<td style="width: 130px;text-align: center;"><?php if($sabado=='Sim'){ echo esc_html($dt_sabado);} endif; ?></td>
				<td style="width: 200px;text-align: center;"><?php if($finais_de_semana=='Sim'){ echo esc_html($dt_finais_de_semana);} endif; ?></td>
				<td><a class="btn btn-inscrevase" href="<?php echo esc_url( get_permalink() ); ?>">INSCREVA-SE</a></td>
			</tr>
		</tbody>
	
	<?php
											}
										}
									}
								}
							}
						}
					}
				}
			}
	endwhile;
	}
	?>
	
</table>


<?php 
		wp_reset_postdata();
	}
		add_shortcode('show_course', 'showCourse');
?>
