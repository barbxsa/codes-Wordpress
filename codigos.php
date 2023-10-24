//Script de Redirection

<script>
    setTimeout(function() {
        window.location.href = "https://api.whatsapp.com/send?phone=5511930546930&text=Ol%C3%A1%2C%20Gostaria%20de%20solicitar%20um%20or%C3%A7amento!";
    }, 3000);
</script>

//Criação de um post type
function custom_post_type1() {

// Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Produto', 'Post Type General Name', 'twentythirteen' ),
    'singular_name'       => _x( 'Produto', 'Post Type Singular Name', 'twentythirteen' ),
    'menu_name'           => __( 'Produtos', 'twentythirteen' ),
    'parent_item_colon'   => __( 'Produto Relacionado', 'twentythirteen' ),
    'all_items'           => __( 'Todos as Produtos', 'twentythirteen' ),
    'view_item'           => __( 'Ver Produtos', 'twentythirteen' ),
    'add_new_item'        => __( 'Adicionar nova Produto', 'twentythirteen' ),
    'add_new'             => __( 'Adicionar nova', 'twentythirteen' ),
    'edit_item'           => __( 'Editar Produto', 'twentythirteen' ),
    'update_item'         => __( 'Atualizar Produto', 'twentythirteen' ),
    'search_items'        => __( 'Buscar por Produto', 'twentythirteen' ),
    'not_found'           => __( 'Nenhum Produto encontrado', 'twentythirteen' ),
    'not_found_in_trash'  => __( 'Nenhum Produto encontrado na lixeira', 'twentythirteen' ),
  );


// Set other options for Custom Post Type

  $args = array(
    'label'               => __( 'Produto', 'twentythirteen' ),
    'description'         => __( 'Produto news and reviews', 'twentythirteen' ),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies'          => array( 'genres' ),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => false,
    'menu_icon' => 'http://areadeteste.com.br/mrbite/wp-content/uploads/2018/09/compras_icone.png',
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  // Registering your Custom Post Type
  register_post_type( 'Produto', $args );

}

//Registrar uma taxonomia nese post type
register_taxonomy(
  "categorias",
      "Produto",
      array(
        "label" => "Categorias",
            "singular_label" => "Categoria",
            "rewrite" => true,
            "hierarchical" => true
  )
);

add_action( 'init', 'custom_post_type1', 0 );
// function end //


//Looping do Wordpress
 <!-- Loop Serviços-->
    <div class="looping">
	 <?php
               $the_query = new WP_Query( array(
               		'posts_per_page'=>	9,
               		'post_type'     => 'servicos',
               		'order'			=> 'desc',
               		'paged' => get_query_var('paged') ? get_query_var('paged') : 1)
               );
	 				 $i = 0;
                 		while ($the_query -> have_posts()) : $the_query -> the_post();
               ?>
		
		<div class="col-md-4" style="float: left;margin-bottom: 1.5em;">
    <div id="post-913" class="cmsmasters_project_grid post-913 project type-project status-publish format-standard has-post-thumbnail hentry pj-categs-assistance pj-categs-services" data-category="assistance services">
      <div class="project_outer">
         <figure class="cmsmasters_img_rollover_wrap preloader">
            <img width="580" height="390" src="<?php the_post_thumbnail_url( 'large' ); ?>" class="full-width wp-post-image" alt="Serviços Imperdry" title="Serviços Imperdry"/>
            <div class="cmsmasters_img_rollover"><a href="<?php the_permalink(); ?>" title="Serviços Imperdry" class="cmsmasters_open_post_link button">Mais detalhes</a></div>
         </figure>
         <div class="project_inner">
            <header class="cmsmasters_project_header entry-header">
               <h4 class="cmsmasters_project_title entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4>
            </header>
            <div class="cmsmasters_project_cont_info entry-meta"><span class="cmsmasters_project_category"><a href="http://imperdry.com.br/servicos/impermeabilizacao-de-estofados/" class="cmsmasters_cat_color cmsmasters_cat_31" id="cmsmasters_cat_31" rel="category tag">Imperdry</a></span></div>
         </div>
         <span class="dn meta-date">20151127090514</span>	
      </div>
   </div></div>
		
		
			
			
	<?php
    	endwhile;
    ?>
	
	</div>         


  //Puxar nome da Categoria na página 

  <?php global $post;
	$terms = get_the_terms($post->id, 'category');
	$nome_categoria = $terms[0]->name;
?>

<?php echo $nome_taxonomy; ?>



// Redirecionar para https - colar no .htacess

RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://ouvisomeventos.com.br/$1 [R,L]


//Codigo de Search do Wordpress

<form method="get" action="<?php echo home_url(); ?>" role="search">
 <input type="text" name="s" placeholder="Pesquisar produtos...">									 
 <input type="hidden" name="post_type" value="produtos" />										 
 <button type="submit" value="Pesquisar" class="button_search">											 
 <i class="fas fa-search"></i>
 </button>									  
</form>