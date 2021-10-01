<template>
	<div class="sidebar bg-dark text-white">
		<div class="mt-5">
			<nav class="nav flex-column justify-content-center">
				<router-link :to="{name:'home'}" class="nav-link" >Dash</router-link>
				<router-link :to="{name:'snippets'}" class="nav-link" >Snippets</router-link>
				<router-link :to="{name:'files'}" class="nav-link" >Files</router-link>
				<router-link :to="{name:'links'}" class="nav-link" >Links</router-link>
			</nav>
		</div>
	</div>
</template>