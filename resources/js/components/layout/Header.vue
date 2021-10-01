<template>
	<header class="navbar py-5" :class="{'home':home}">
		<div class="container">
			<router-link class="navbar-brand" :to="{name:'home'}">Home</router-link>
			<div class="ml-auto">
				<ul class="nav">
					<li class="nav-item">
						<router-link :to="{name:'snippets'}" class="nav-link">Snippets</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{name:'files'}" class="text-secondary nav-link">Files</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{name:'links'}" class="nav-link">Links</router-link>
					</li>
					<li class="nav-item">
						<a href="/admin" class="btn btn-primary" role="button">
							Admin Dashboard
						</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
</template>
<script>
export default {
	name:"Header",
	data(){
		return{}
	},
	computed:{
		home(){
			return this.$route.path == '/'
		}
	}
}
</script>