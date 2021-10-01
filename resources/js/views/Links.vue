<template>
	<div class="links-page padded">
		<section>
			<div class="container">
				<template v-if="links.length">
					<div class="section-title d-flex">
					<h1 class="display-5">View Links</h1>
				</div>
				<div class="row my-5">
					<div class="col-sm-12 col-md-6 col-lg-4 post-card  mb-4" v-for="link in links" :key="link.id">
						<LinkCard :link="link"></LinkCard>
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
		name: "Links",
		data() {
			return {
				links:[],
			};
		},
		mounted() {
			this.getPosts();
		},
		methods: {
			getPosts() {
				axios.get('/api/links')
				.then(res=>{
					this.links = res.data.links
				})
				.catch(err=>{
					console.log(err);					
				})
			}
		}
	};
</script>