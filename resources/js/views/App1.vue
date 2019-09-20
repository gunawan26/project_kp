    
<template>
	<div id="app1" class="container">
		<div class="row py-4">
			<Input />
			<Show />
		</div>
	</div>
</template>

<script>
	import Show from '@/js/components/Show.vue'
	import Input from '@/js/components/Input.vue'
	export default {
		name: 'app1',
		components: {
			Show,
			Input
		}
	}
</script>