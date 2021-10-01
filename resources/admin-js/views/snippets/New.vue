<template>
	<div>
		<h5 class="font-weight-bold mb-5">Create Snippet</h5>
		<div class="my-4">
			<b-alert :show="success" variant="success">Snippet has been created successfully!</b-alert>
			<b-alert :show="error" variant="danger">There was a problem creating the snippet. Try again..</b-alert>
		</div>
		<form @submit.prevent="submitForm">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text"  v-model="form.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" v-model="form.description" required name="description" id="description" rows="5"></textarea>
			</div>

			<div class="form-group">
				<label for="snippet">HTML SNIPPET</label>
				<textarea class="form-control" v-model="form.snippet" required name="snippet" id="snippet" rows="6"></textarea>
			</div>
			
			<div class="my-4">
				<b-button type="submit" variant="primary w-100 btn-lg">SUBMIT</b-button>
			</div>
		</form>
	</div>
</template>
<script>
	export default {
		name: "NewSnippet",
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
				axios
					.post("/api/manage/snippets/create", this.form)
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
			}
		}
	}
</script>