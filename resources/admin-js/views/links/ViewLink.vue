<template>
	<div>
		<template v-if="editable">
            <form @submit.prevent="updateForm">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text"  v-model="link.title" name="title" required id="title" class="form-control form-control-lg" aria-describedby="titleHelp">
				</div>

				<div class="form-group">
					<label for="content">Url</label>
					<input type="url"  v-model="link.url" name="url" required id="url" class="form-control form-control-lg" aria-describedby="titleHelp">
				</div>

				<div class="form-check">
					<input class="form-check-input" v-model="link.open_in_new_tab" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Open link new tab
					</label>
				</div>
				
				<div class="my-4">
					<b-button type="submit" variant="primary w-100 btn-lg">Update</b-button>
				</div>
			</form>
        </template>
		<template v-else>
			<h4 class="font-weight-bold mb-5">{{link.title}}</h4>
			<div class="my-3">
				<p>{{link.url}}</p>
			</div>
			<template v-if="link.id">
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
		name: "ViewLink",
		props: ["id"],
		data() {
			return {
				link: {},
                error: false,
                editable:false,
                success: false,
			};
		},
		mounted() {
			this.getLink();
		},
		methods: {
			getLink() {
				axios
					.get(`/api/manage/links/show/${this.id}`)
					.then(res => {
						this.link = res.data.link;
					})
					.catch(err => {
						console.log(err);
						this.error = true;
					});
            },
            updateForm() {
				this.error = this.success = false;
				axios
					.post(`/api/manage/links/update/${this.id}`, this.link)
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
                axios.post(`/api/manage/links/delete/${this.id}`)
                .then(res=>{
                    var d = res.data
                    if(d.deleted){
                        this.$router.push({name:'links'})
                    }
                })
                .catch(err=>{
                    console.log(err);
                    
                })
            },
		}
	};
</script>