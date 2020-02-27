var app = new Vue({
    el: '#app',
    data: {
		groupName: '',
		groupAdditional: '',
		allGroups: '',
        emptyFieldsError: false,
        verbExistsError: false,
        insertOK: false,
        baseUrl: ''
    },
    methods: {

        dataToSend() {
			return {
				'groupName': this.groupName,
				'groupAdditional': this.groupAdditional,
			};
        },
		addGroup() {
            let data = this.dataToSend();
			axios({
				method: 'post',
				url: 'groups/addNew',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allGroups = resp.allGroups;
					alert('dodano. ' + resp.message);
				} else {
					if (resp.validationErrors === 1) {
						alert('błąd walidacji')
					} else {
						alert('błąd zapisu. ' + resp.error)
					}
				}
				console.log(response.data);
			}, (error) => {
				console.log(error);
			});
        }
    },
    mounted() {
		axios.get('groups/startData')
		.then((response) => {
			let resp = response.data;
			this.allGroups = resp.allGroups;
            console.log(resp);
            this.baseUrl = resp.baseUrl;
		});

    },

})
