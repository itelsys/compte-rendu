<template>
	<div class="content" @click.prevent="showEmail">
		<h4 class="">{{ moment(data.created_at) }}</h4>
		<p>{{ (data.content).substring(0, 100) }}</p>
		<div class="margin-bottom-15"></div>
	</div>
</template>

<script>
	export default {
		props: {
			data: {type: Object, default: {}}
		},
		methods: {
			moment (value) {
				return moment(value).fromNow()
			},
			showEmail () {
				this.$emit('show')
			}
		}
	}
</script>

<style scoped>
	.content {
		padding: 17px;
		cursor: pointer;
	}
</style>