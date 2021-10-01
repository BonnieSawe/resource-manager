<template>
	<div class="container">
		<h5 class="font-weight-bold mb-5">All Snippets</h5>
		<div class="my-4">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4 mb-4 post-card" v-for="snippet in snippets" :key="snippet.id">
					<router-link :to="{name:'view-snippet',params:{id:snippet.id}}" class="card">
						<div class="card-body">
							<h4 class="card-title">{{snippet.title}}</h4>
							<p class="card-text">{{snippet.description}}</p>
							<textarea class="form-control" rows="9" v-model="snippet.snippet"></textarea>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: "AllPosts",
		
		data() {
			return {
				snippets: [],
				loading: false,
				error:false,
			};
		},
		mounted() {
			this.loading = true;
			this.getSnippets();
		},
		methods: {
			getSnippets() {
				axios
					.get("/api/manage/snippets")
					.then(response => {
						this.snippets = response.data.snippets;
					})
					.catch(err => {
						console.log(err);
					});
			},
			imgNumber(id){
				var a = id.toString()
				console.log(a);		
				return a[a.length - 1]
			}
		}
	};
</script>