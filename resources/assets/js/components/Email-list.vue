<template>
	<div class="row">
		<div class="col-md-5">
			<div class="panel-content email">
				<div v-for="email in data" class="is-active">
					<email :data="email" @show="showEmail = email"></email>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="panel-content email-content">
				<div v-if="showEmail != null">
					{{ showEmail.content }}
				</div>
				<div v-else>
					<h1 class="empty">Aucun message sélectionné</h1>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Email from './Email'
	export default {
		props: {
			data: {type: Array, default: []}
		},
		data () {
			return {
				showEmail: null
			}
		},
		components : {
			email: Email
		}
	}
</script>

<style scoped>
	.email {
		padding: 0;
		height: 100%;
		width: 100%;
		background: white
	}
	.email-content {
		position: fixed;
	}
	.is-active:hover {
		background: #f1f1f1
	}
	.empty {
		opacity: .4;
		text-align: center;
	}
</style>