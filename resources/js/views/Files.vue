<template>
	<div class="files-page padded">
		<section>
			<div class="container">
				<template v-if="files.length">
					<div class="section-title d-flex">
					<h1 class="display-5">View Files</h1>
				</div>
				<div class="row my-5">
					<div class="col-sm-12 col-md-6 col-lg-4 post-card  mb-4" v-for="file in files" :key="file.id">
						<FileCard :file="file"></FileCard>
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
				files:[],
			};
		},
		mounted() {
			this.getFiles();
		},
		methods: {
			getFiles() {
				axios.get('/api/files')
				.then(res=>{
					this.files = res.data.files
				})
				.catch(err=>{
					console.log(err);					
				})
			}
		}
	};
</script>