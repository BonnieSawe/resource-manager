<template>
	<div class="container">
		<h5 class="font-weight-bold mb-5">All Files</h5>
		<div class="my-4">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4 mb-4 post-card" v-for="file in files" :key="file.id">
					<router-link :to="{name:'view-file',params:{id:file.id}}" class="card">
						<div class="card-body">
							<h4 class="card-title">{{file.title}}</h4>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: "AllFiles",
		
		data() {
			return {
				files: [],
				loading: false,
				error:false,
			};
		},
		mounted() {
			this.loading = true;
			this.getFiles();
		},
		methods: {
			getFiles() {
				axios
					.get("/api/manage/files")
					.then(res => {
						this.files = res.data.files;
					})
					.catch(err => {
						console.log(err);
					});
			}
		}
	};
</script>