<template>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{file.title}}</h4>
			<a :href="file.url" class="btn btn-primary">Download file</a>
		</div>
	</div>
</template>
<script>
	export default {
		name: "FileCard",
		props: ['file']
	}
</script>