<template>
	<div class="admin-app d-flex">
		<Sidebar></Sidebar>
		<div class="content">
			<Header></Header>
			<main>
				<router-view></router-view>
			</main>
			<Footer></Footer>
		</div>
	</div>
</template>
<script>
	import Sidebar from "./components/layout/Sidebar";
	import Header from "./components/layout/Header";
	import Footer from "./components/layout/Footer";
	export default {
		name: "App",
		components: {
			Header,
			Footer,
			Sidebar
		}
	};
</script>