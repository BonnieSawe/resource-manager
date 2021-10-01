<template>
	<div class="container">
		<h5 class="font-weight-bold mb-5">All Links</h5>
		<div class="my-4">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4 mb-4 post-card" v-for="link in links" :key="link.id">
					<router-link :to="{name:'view-link',params:{id:link.id}}" class="card">
						<div class="card-body">
							<h4 class="card-title">{{link.title}}</h4>
							<p class="card-text">{{link.url}}</p>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: "AllLinks",
		
		data() {
			return {
				links: [],
				loading: false,
				error:false,
			};
		},
		mounted() {
			this.loading = true;
			this.getLinks();
		},
		methods: {
			getLinks() {
				axios
					.get("/api/manage/links")
					.then(res => {
						this.links = res.data.links;
					})
					.catch(err => {
						console.log(err);
					});
			}
		}
	};
</script>