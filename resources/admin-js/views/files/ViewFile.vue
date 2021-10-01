<template>
	<div>
		<template v-if="editable">
            <form @submit.prevent="updateForm">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text"  v-model="file.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
				</div>

				<div class="form-group">
					<label for="content">File</label>
					<input type="file" 
						ref="file" v-on:change="handleFileUpload()"
						name="file" required id="file" accept="application/pdf" 
						class="form-control form-control-lg" aria-describedby="titleHelp">
				</div>
				
				<div class="my-4">
					<b-button type="submit" variant="primary w-100 btn-lg">Update</b-button>
				</div>
			</form>
        </template>
		<template v-else>
			<h4 class="font-weight-bold mb-5">{{file.title}}</h4>
			<template v-if="file.id">
				<hr />
				<div class="d-flex btn-list">
					<b-button variant="warning" @click="editable = true">Edit</b-button>
					<b-button variant="danger" @click="deleteLink">Delete</b-button>
				</div>
			</template>
		</template>
	</div>
</template>
<script>
	export default {
		name: "ViewFile",
		props: ["id"],
		data() {
			return {
				file: {},
				uploadedFile: {},
                error: false,
                editable:false,
                success: false,
			};
		},
		mounted() {
			this.getFile();
		},
		methods: {
			getFile() {
				axios
					.get(`/api/manage/files/show/${this.id}`)
					.then(res => {
						this.file = res.data.file;
					})
					.catch(err => {
						console.log(err);
						this.error = true;
					});
            },
            updateForm() {
				this.error = this.success = false;
				let formData = new FormData();
				formData.append('file', this.uploadedFile)
				formData.append('title', this.file.title)
				axios
					.post(`/api/manage/files/update/${this.id}`, formData)
					.then(res => {
						var d = res.data;
						if (res.data.updated) {
                            this.success = true;
                            this.editable = false
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
            deleteLink(index){
                axios.post(`/api/manage/files/delete/${this.id}`)
                .then(res=>{
                    var d = res.data
                    if(d.deleted){
                        this.$router.push({name:'files'})
                    }
                })
                .catch(err=>{
                    console.log(err);
                    
                })
            },

			handleFileUpload(){
				this.uploadedFile = this.$refs.file.files[0];
			}
		}
	};
</script>