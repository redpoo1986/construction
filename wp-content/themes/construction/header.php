<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="/assets/css/common.css">
</head>
<body>
    <header>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="">
		<?php if ( wp_is_mobile() ) : ?>
				<div class="hamburger-menu-wrapper">
					<input type="checkbox" id="hamburger-menu-button">
					<label for="hamburger-menu-button" class="hamburger-menu-open">
						<i class="fas fa-bars"></i>
					</label>
					<label for="hamburger-menu-button" class="hamburger-menu-close"></label>
					<div class="hamburger-menu-content">
						<nav class="hamburger-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'hamburger-menu' , 'fallback_cb' => 'false' ) ); ?>
						</nav>
					</div>
				</div>
			<?php endif; ?>
    </header>