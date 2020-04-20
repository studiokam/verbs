<div id="app">
	<div class="container mt-100">
		<div class="row">
			<div class="col-sm-6 zi-100">
				<div class="add-new-verb">
					<a class="add-menu" :href="baseUrl">Home</a>
					<div class="add-verb-menu" v-if="showAllWords" @click="goto('words')">Nowy czasownik EN</div>
					<div class="edit-verb-menu" v-if="showEditWord" @click="endWordEdit">Wyjdź z edycji</div>
					<form>
						<div class="form-row">
							<div class="col verb-pl-name" v-if="showAllWords">Nowe słowo</div>
							<div class="col verb-pl-name" v-if="showEditWord">Edycja słowa</div>
						</div>
						<hr class="mb-0">
						<div class="form-row verbs-form">
							<div class="col-md-12 pb-1">
								<label class="my-label-in-form">PL *</label>
								<input type="text" class="form-control" v-model="wordPL">
							</div>
							<div class="col-md-12 pb-1">
								<label class="my-label-in-form">EN *</label>
								<input type="text" class="form-control" v-model="wordEN">
							</div>
							<div class="col-md-12 pb-1">
								<label class="my-label-in-form">PL dodatkowy opis</label>
								<textarea name="wordPLAdditional" rows="3" class="form-control"
										  v-model="wordPLAdditional"></textarea>
							</div>
							<div class="col-md-12 pb-1">
								<label class="my-label-in-form">Wymowa</label>
								<input type="text" class="form-control"
									   v-model="wordPronunciation">
							</div>
						</div>
					</form>
					<hr>
					<button type="button" class="btn btn-success btn-block mt-20"
							@click="addWord" v-if="showAllWords">Dodaj</button>
					<button type="button" class="btn btn-info btn-block mt-20"
							@click="editWordSend" v-if="showEditWord">Zapisz</button>

					<div class="alert alert-warning field-info" role="alert" v-if="emptyFieldsError">
						Wypełnij wszytkie pola
					</div>
					<div class="alert alert-danger field-info"  role="alert" v-if="wordExistsError">
						Nope - jest już czasownik gdzie PL i Infinitive jest dokładnie taka sama :/
					</div>
					<div class="alert alert-success field-info" role="alert" v-if="insertOK">
						OK! Dodano do listy
					</div>
				</div>
			</div>

			<div class="col-sm-6 ml--40" v-if="showAllWords">
				<div class="add-new-verb">
					<div class="form-row">
						<div class="col verb-pl-name">Wszystkie słowa</div>
					</div>
					<hr>
					<input type="text" class="form-control" v-model="searchQuery" placeholder="czego szukamy?"/>

					<div class="row mt-30">
						<div class="col-sm-12">

							<div class="verbs-all-verbs-field">
								<div class="verb" v-for="Word in filteredWords">
									<div class="row">
										<div class="col-sm-10">
											<strong>{{Word.wordPL}}</strong> - {{Word.wordEN}}
										</div>
										<div class="col-sm-2 text-right">
											<i class="verbs-list-edit fa fa-cog" @click="editWord(Word.id)"></i>
											<i class="verbs-list-delete fa fa-times" @click="deleteWord(Word.id)"></i>
										</div>
									</div>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 ml--40" v-if="showEditWord">
				<div class="add-new-verb">
					<div class="form-row">
						<div class="col verb-pl-name">Dodaj słowo do grupy</div>
					</div>
					<hr>
					<div class="verb-about">
						<div class="row">
							<div class="col-sm-9">
								<select class="custom-select" v-model="verbsListSelect">
									<option value="" disabled>Wybierz grupę</option>
									<option v-for="group in allGroups" :value="group.id">
										{{ group.groupName }}
									</option>
								</select>
							</div>
							<div class="col-sm-3 text-right">
								<button class="btn btn-success" @click="addVerbToGroup"
										:disabled="verbsListSelect == ''">Dodaj</button>
							</div>
						</div>
					</div>
					<div class="form-row mt-30">
						<div class="col verb-pl-name">Słowo przynależy do grup</div>
					</div>
					<hr>
					<div class="verb-about">
						- Wszystkie słowa
						<div v-for="group in verbGroups" v-if="group.groupName != 'Wszystkie czasowniki'">
							<hr class="mt-10 mb-10">

							<div class="row">
								<div class="col-sm-10">
									- {{group.groupName}}
								</div>
								<div class="col-sm-2 text-right">
									<i class="verbs-list-delete fa fa-times" @click="deleteVerbFromGroup(group.relationId)"></i>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>
</body>
	<script type="text/javascript" src="content/js/words.js"></script>
</html>
