<template>
	<div class="post-page padded">
		<section>
			<div class="container">
				<template v-if="snippets.length">
					<div class="section-title d-flex">
					<h1 class="display-5">View Snippets</h1>
				</div>
				<div class="row my-5">
					<div class="col-sm-12 col-md-6 col-lg-4 post-card  mb-4" v-for="snippet in snippets" :key="snippet.id">
						<SnippetCard :snippet="snippet"></SnippetCard>
					</div>
				</div>
				</template>
				<template v-else>
					<NoResources></NoResources>
				</template>
				
			</div>
		</section>
	</div>
</template>
<script>
	export default {
		name: "Snippets",
		data() {
			return {
				snippets:[],
			};
		},
		mounted() {
			this.getSnippets();
		},
		methods: {
			getSnippets() {
				axios.get('/api/snippets')
				.then(res=>{
					this.snippets = res.data.snippets
				})
				.catch(err=>{
					console.log(err);					
				})
			}
		}
	};
</script>