<template>
<section id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-dark">
					<p>{{ app_name }}</p>
					<p class="h6">Copyrights &copy; All right Reversed.</p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
</template>

<script>
export default {
      name: 'Footer'
    }
</script>

<style scoped>
section {
    padding: 40px 0;
}

section .section-title {
    text-align: center;
    color: #444;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #ccc !important;
}

#footer a{
	color: #444;
}
</style>