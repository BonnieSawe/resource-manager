<template>
	<div>
		<h5 class="font-weight-bold mb-5">Upload File</h5>
		<div class="my-4">
			<b-alert :show="success" variant="success">File has been uploaded successfully!</b-alert>
			<b-alert :show="error" variant="danger">There was a problem uploading the file. Try again..</b-alert>
		</div>
		<form @submit.prevent="submitForm">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text"  v-model="form.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
			</div>

			<div class="form-group">
				<label for="content">File</label>
				<input type="file" 
					ref="file" v-on:change="handleFileUpload()"
					name="file" required id="file" accept="application/pdf" 
					class="form-control form-control-lg" aria-describedby="titleHelp">
			</div>
			
			<div class="my-4">
				<b-button type="submit" variant="primary">Upload</b-button>
			</div>
		</form>
		
	</div>
</template>
<script>
	export default {
		name: "NewFile",
		data() {
			return {
				form: {},
				success: false,
				error: false
			};
		},
		methods: {
			submitForm() {
				this.error = this.success = false;
				let formData = new FormData();
				formData.append('file', this.form.file)
				formData.append('title', this.form.title)
				axios
					.post("/api/manage/files/create", formData)
					.then(res => {
						var d = res.data;
						if (res.data.created.id) {
							this.success = true;
							this.form = {}
						} else {
							this.error = true;
						}
						console.log(res.data);
					})
					.catch(err => {
						console.log(err);
						this.error = true;
					});
			},

			handleFileUpload(){
				this.form.file = this.$refs.file.files[0];
			}

		}
	};
</script>