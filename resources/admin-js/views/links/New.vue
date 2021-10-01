<template>
	<div>
		<h5 class="font-weight-bold mb-5">Create Link</h5>
		<div class="my-4">
			<b-alert :show="success" variant="success">Link has been created successfully!</b-alert>
			<b-alert :show="error" variant="danger">There was a problem creating the link. Try again..</b-alert>
		</div>
		<form @submit.prevent="submitForm">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text"  v-model="form.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
			</div>

			<div class="form-group">
				<label for="content">Url</label>
				<input type="url"  v-model="form.url" name="url" required id="url" class="form-control form-control-lg" aria-describedby="titleHelp">

			</div>

			<div class="form-check">
				<input class="form-check-input" v-model="form.open_in_new_tab" type="checkbox" value="" id="flexCheckDefault">
				<label class="form-check-label" for="flexCheckDefault">
					Open link new tab
				</label>
			</div>
			
			<div class="my-4">
				<b-button type="submit" variant="primary">Create</b-button>
			</div>
		</form>
		
	</div>
</template>
<script>
	export default {
		name: "NewLink",
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
					.post("/api/manage/links/create", this.form)
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
	};
</script>