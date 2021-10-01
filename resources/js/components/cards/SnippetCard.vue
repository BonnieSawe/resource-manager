<template>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{snippet.title}}</h4>
			<p class="card-text">{{snippet.description}}</p>
			<div class="container">
				<p class="lead">{{ snippet.snippet }}</p>
				<hr class="my-2" />
				<b-alert :show="showAlert" variant="success">Snippet Copied to Clip Board</b-alert>
				<b-button variant="primary w-100" @click="copyToClipBoard(snippet.snippet)">Copy Snippet</b-button>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: "SnippetCard",
		props: ['snippet'],
		data() {
			return {
				showAlert: false
			};
		},

		methods: {
			copyToClipBoard(textToCopy){
				const tmpTextField = document.createElement("textarea")
				tmpTextField.textContent = textToCopy
				tmpTextField.setAttribute("style","position:absolute; right:200%;")
				document.body.appendChild(tmpTextField)
				tmpTextField.select()
				tmpTextField.setSelectionRange(0, 99999)
				document.execCommand("copy")
				tmpTextField.remove()
				this.showAlert = true
			}
		}
	}
</script>