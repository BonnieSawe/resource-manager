<template>
	<footer class="bg-dark text-muted py-5">
		<div class="container">
			<div class="row"></div>
			<div class="d-flex justify-content-center">
				<span>{{year}}. All RIghts Reserved. Design/Dev by <a class="text-white" target="_blank" href="https://github.com/BonnieSawe">Bonnie Sawe</a></span>
			</div>
		</div>
	</footer>
</template>
<script>
export default {
	name:'Footer',
	computed:{
		year(){
			var d = new Date()
			return d.getFullYear()
		}
	}
}
</script>