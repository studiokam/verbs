var app = new Vue({
    el: '#app',
    data: {
    	id: '',
		groupName: '',
		groupAdditional: '',
		allGroups: '',
        emptyFieldsError: false,
        verbExistsError: false,
        insertOK: false,
        baseUrl: '',
		editVerb: false
    },
    methods: {

        dataToSend() {
			return {
				'id': this.id,
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
					this.clearForm();
					// alert('dodano. ' + resp.message);
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
        },

		deleteGroup(id) {
			axios({
				method: 'post',
				url: 'groups/deleteGroup',
				data: id,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allGroups = resp.allGroups;
				}
			}, (error) => {
				console.log(error);
			});

		},

		editGroup(id) {

        	for (let i = 0; i < this.allGroups.length; i++) {
				if (this.allGroups[i].id == id) {
					this.groupName = this.allGroups[i].groupName;
					this.groupAdditional = this.allGroups[i].groupAdditional;
					this.id = this.allGroups[i].id;
					this.editVerb = true;
				}
			}
		},

		editGroupSend() {
			let data = this.dataToSend();
			console.log(data);

			axios({
				method: 'post',
				url: 'groups/editGroup',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allGroups = resp.allGroups;
					this.clearForm();
					this.editVerb = false;
				}
			}, (error) => {
				console.log(error);
			});
		},

		clearForm() {
        	this.id = '';
        	this.groupName = '';
        	this.groupAdditional = '';
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
