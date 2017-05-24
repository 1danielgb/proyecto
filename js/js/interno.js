new Vue({
		el: 'body',
		data: {
			//message: 'Hello World'
			modalIsOpen:false,
			nombre: '',
			internos: []
			

		},
		
		ready: function() {
			//this.getinterno();
		},	

		methods: {
			
			saveChanges: function(){
				//this.modalIsOpen = !this.modalIsOpen;
				alert('Is true');
				this.$set('modalIsOpen', false);
				alert(this.nombre);
				// this.$http.get('http://127.0.0.1:8081/cereso/administrador/consulController/internos').then(function(response){
				// 	this.$set('internos', response.data);
				// });
				
				// if (this.nombre == ) {

				// };
				//almacenando el nombre
				// this.$http.post('http://127.0.0.1:8081/cereso/administrador/consulController/index', this.nombre).then(function(respuesta){
				// 	console.log(respuesta);
				// });

			},
			getinterno: function(nombre){
				this.$http.post('http://127.0.0.1:8081/cereso/administrador/consulController/index', this.nombre).then(function(respuesta){
				 	alert(respuesta);
				 	//console.log(respuesta);
				});


				// this.$http.get('http://127.0.0.1:8081/cereso/administrador/consulController/internos').then(function(response){
				//  	this.$set('internos', response.data);
				//  	//console.log(response.data);
				// });
			}
			
		
		},

		components: {
			modal: VueStrap.modal
		},
	});