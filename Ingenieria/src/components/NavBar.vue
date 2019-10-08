<template>
	<header>
		<div class="row my-3 mx-0">
			<div class="col-sm p-0 text-center">
				<h1 class="header-tittles mt-2 mb-0">{{leftTitle}}</h1>
			</div>
			<div class="col col-sm-2 p-0" style="margin: 0;">
				<div style="width: 100px; height: 100px; margin: 0 auto;">
					<img :src="imageUrl" class="img-fluid" style="height: 100%; border-radius: 50%; object-fit: cover;">
				</div>
			</div>
			<div class="col-sm p-0 text-center">
				<h1 class="header-tittles mt-2 mb-0">{{rightTitle}}</h1>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-size p-0">
			<div class="navbar-collapse collapse justify-content-center order-2">
        <ul class="navbar-nav">
					<li class="nav-item link-style" v-for="option in options" v-bind:key="option.id">
						<a class="nav-link pt-3" :class="{ active: isActive(option) }" href="#" @click="setActive(option)">{{option}}</a>
					</li>
        </ul>
			</div>
		</nav>
	</header>
</template>

<script type="text/javascript">

	export default {
		data() {
			return {
				activeItem: '',
				leftTitle: '',
				rightTitle: '',
				imageUrl: ''
			}
		},

		methods: {
			isActive: function (menuItem) {
				return this.activeItem === menuItem
			},
			setActive: function (menuItem) {
				this.activeItem = menuItem // no need for Vue.set()
			}
		},

		props: {
			options: {
				type: Array,
				default: null
			},
			headerLeftTitle: {
				type: String,
				default: ''
			},
			headerRightTitle: {
				type: String,
				default: ''
			},
			imageData: {
				type: String,
				default: ''
			},
			upperCase: {
				type: Boolean,
				default: false
			}
		},

		mounted() {
			if(this.upperCase) {
				this.leftTitle = this.headerLeftTitle.toUpperCase()
				this.rightTitle = this.headerRightTitle.toUpperCase()
			} else {
				this.leftTitle = this.headerLeftTitle
				this.rightTitle = this.headerRightTitle
			}
			this.activeItem = this.options[0],
			this.imageUrl = this.imageData		
		},

		watch: {
			headerLeftTitle: function() {
				if(this.upperCase) {
					this.leftTitle = this.headerLeftTitle.toUpperCase()
				} else {
					this.leftTitle = this.headerLeftTitle
				}
			},
			headerRightTitle: function() {
				if(this.upperCase) {
					this.rightTitle = this.headerRightTitle.toUpperCase()
				} else {
					this.rightTitle = this.headerRightTitle
				}
			},
			upperCase: function() {
				if(this.upperCase) {
					this.leftTitle = this.headerLeftTitle.toUpperCase()
					this.rightTitle = this.headerRightTitle.toUpperCase()
				} else {
					this.leftTitle = this.headerLeftTitle
					this.rightTitle = this.headerRightTitle
				}
			},
			imageData: function() {
				this.imageUrl = this.imageData
			}
		}

	}

</script>