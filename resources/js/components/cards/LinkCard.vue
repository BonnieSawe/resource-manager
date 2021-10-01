<template>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{link.title}}</h4>
			<a :href="link.url" :target="target" class="btn btn-primary">Visit Link</a>
		</div>
	</div>
</template>
<script>
	export default {
		name: "LinkCard",
		props: ['link'],
		computed: {
			target() {
				if (this.link.open_in_new_tab === true) return '_blank'
				return '_self'
			}
		}
	}
</script>