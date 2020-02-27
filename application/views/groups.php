<div id="app">

	<div class="add-new-verb">
		<a class="add-menu" :href="baseUrl">Home</a>
		<a class="add-word-menu" :href="baseUrl">Nowe słowo EN</a>
		<a class="add-verb-menu" :href="baseUrl">Nowy czasownik EN</a>
		<form>
			<div class="form-row">
				<div class="col verb-pl-name">Grupy</div>
			</div>
			<hr class="mb-0">
			<div class="form-row verbs-form">
				<div class="col-md-12 pb-1">
					<label class="my-label-in-form">Nazwa grupy *</label>
					<input type="text" class="form-control" v-model="groupName">
				</div>
				<div class="col-md-12 pb-1">
					<label class="my-label-in-form">Dodatkowy opis</label>
					<textarea name="groupAdditional" rows="2" class="form-control" v-model="groupAdditional"></textarea>
				</div>
			</div>
			<button type="button" class="btn btn-success btn-block mt-20" @click="addGroup">Dodaj</button>
			<hr>
			<div class="form-row">
				<div class="col verb-pl-name">Dodane</div>
			</div>
			<hr>

			<div class="group" v-for="group in allGroups">
				<div class="group-name">
					<strong>{{group.groupName}}</strong><br>
<!--					<small>Liczba czasowników przypisana do grupy: 12</small>-->
				</div>
				<div class="group-options">Edytuj / Usuń</div>
				<div class="clearfix"></div>
			</div>


		</form>



		<div class="alert alert-warning field-info" role="alert" v-if="emptyFieldsError">Wypełnij wszytkie pola</div>
		<div class="alert alert-danger field-info"  role="alert" v-if="verbExistsError">Nope - jest już czasownik gdzie PL i Infinitive jest dokładnie taka sama :/</div>
		<div class="alert alert-success field-info" role="alert" v-if="insertOK">OK! Dodano do listy</div>
	</div>

</div>
</body>
	<script type="text/javascript" src="content/js/groups.js"></script>
</html>
