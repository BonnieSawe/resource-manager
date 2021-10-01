<template>
	<div id="app" class="main-app">
		<Header></Header>
		<main class="bg-light">
			<router-view />
		</main>
		<Footer></Footer>
	</div>
</template>
<script>
	import Header from "./components/layout/Header";
	import Footer from "./components/layout/Footer";
	export default {
		name: "App",
		components: {
			Header,
			Footer
		},	
	};
</script>