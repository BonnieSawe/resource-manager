<template>
	<div>
		<template v-if="editable">
            <form @submit.prevent="updateForm">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text"  v-model="snippet.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" v-model="snippet.description" required name="description" id="description" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label for="snippet">HTML SNIPPET</label>
					<textarea class="form-control" v-model="snippet.snippet" required name="snippet" id="snippet" rows="6"></textarea>
				</div>
				
				<div class="my-4">
					<b-button type="submit" variant="primary w-100 btn-lg">Update</b-button>
				</div>
			</form>
        </template>
		<template v-else>
			<h4 class="font-weight-bold mb-5">{{snippet.title}}</h4>
			<div class="my-3">
				<p>{{snippet.description}}</p>
			</div>
			<div class="my-3 bg-white card-body">
				<p>{{snippet.description}}</p>
			</div>
			<template v-if="snippet.id">
				<hr />
				<div class="d-flex btn-list">
					<b-button variant="warning" @click="editable = true">Edit</b-button>
					<b-button variant="danger" @click="deleteSnippet">Delete</b-button>
				</div>
			</template>
		</template>
	</div>
</template>
<script>
	export default {
		name: "ViewSnippet",
		props: ["id"],
		data() {
			return {
				snippet: {},
                error: false,
                editable:false,
                success: false,
			};
		},
		mounted() {
			this.getSnippet();
		},
		methods: {
			getSnippet() {
				axios
					.get(`/api/manage/snippets/show/${this.id}`)
					.then(res => {
						this.snippet = res.data.snippet;
					})
					.catch(err => {
						console.log(err);
						this.error = true;
					});
            },
            updateForm() {
				this.error = this.success = false;
				axios
					.post(`/api/manage/snippets/update/${this.id}`, this.snippet)
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
            deleteSnippet(index){
                axios.post(`/api/manage/snippets/delete/${this.id}`)
                .then(res=>{
                    var d = res.data
                    if(d.deleted){
                        this.$router.push({name:'snippets'})
                    }
                })
                .catch(err=>{
                    console.log(err);
                    
                })
            },
		}
	};
</script>