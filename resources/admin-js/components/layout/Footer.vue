<template>
	<footer>
		<div class="d-flex justify-content-center py-3 text-muted">
			<span>{{year}}. All Rights Reserved.</span>
		</div>
	</footer>
</template>
<script>
	export default {
		name: "Footer",
		computed: {
			year() {
				var d = new Date();
				return d.getFullYear();
			}
		}
	};
</script>